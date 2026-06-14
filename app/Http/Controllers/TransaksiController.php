<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Obat;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('pelanggan')->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $obat = Obat::all();

        return view('transaksi.create',
            compact('pelanggan', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'obat_id' => 'required|array|min:1',
            'obat_id.*' => 'required|exists:obats,id',
            'jumlah' => 'required|array|min:1',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        $obatIds = $request->obat_id;
        $jumlahs = $request->jumlah;

        // Combine duplicates to perform accurate stock check
        $itemsToProcess = [];
        for ($i = 0; $i < count($obatIds); $i++) {
            $id = $obatIds[$i];
            $qty = (int)$jumlahs[$i];
            
            if (!isset($itemsToProcess[$id])) {
                $itemsToProcess[$id] = 0;
            }
            $itemsToProcess[$id] += $qty;
        }

        // Validate stock
        $errors = [];
        foreach ($itemsToProcess as $id => $totalQty) {
            $obat = Obat::findOrFail($id);
            if ($obat->stok < $totalQty) {
                $errors[] = "Stok untuk obat '{$obat->nama_obat}' tidak mencukupi. Stok saat ini: {$obat->stok}, jumlah yang ingin dibeli: {$totalQty}.";
            }
        }

        if (!empty($errors)) {
            return redirect()->back()
                ->withInput()
                ->withErrors($errors);
        }

        // Run DB transaction to ensure atomic execution
        DB::transaction(function () use ($request, $obatIds, $jumlahs) {
            $grandTotal = 0;
            $details = [];

            for ($i = 0; $i < count($obatIds); $i++) {
                $id = $obatIds[$i];
                $qty = (int)$jumlahs[$i];
                $obat = Obat::findOrFail($id);
                $subtotal = $obat->harga * $qty;
                $grandTotal += $subtotal;

                $details[] = [
                    'obat_id' => $id,
                    'jumlah' => $qty,
                    'subtotal' => $subtotal,
                    'obat_model' => $obat
                ];
            }

            // Create main transaction
            $transaksi = Transaksi::create([
                'pelanggan_id' => $request->pelanggan_id,
                'tanggal' => now(),
                'total' => $grandTotal
            ]);

            // Create details and deduct stock
            foreach ($details as $detail) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'obat_id' => $detail['obat_id'],
                    'jumlah' => $detail['jumlah'],
                    'subtotal' => $detail['subtotal']
                ]);

                // Deduct stock
                $obat = $detail['obat_model'];
                $obat->stok -= $detail['jumlah'];
                $obat->save();
            }
        });

        return redirect('/transaksi')
                ->with('success', 'Transaksi berhasil disimpan');
    }

    public function show(int $id)
    {
        $transaksi = Transaksi::with(
            'pelanggan',
            'detail.obat'
        )->findOrFail($id);

        return view('transaksi.show',
            compact('transaksi'));
    }

    public function destroy(int $id)
    {
        DB::transaction(function () use ($id) {
            $transaksi = Transaksi::with('detail.obat')->findOrFail($id);

            // Restore stocks
            foreach ($transaksi->detail as $detail) {
                if ($detail->obat) {
                    $detail->obat->stok += $detail->jumlah;
                    $detail->obat->save();
                }
            }

            $transaksi->delete();
        });

        return redirect('/transaksi')
                ->with('success', 'Transaksi berhasil dihapus');
    }
}