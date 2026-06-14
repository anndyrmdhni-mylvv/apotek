<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::with('kategori', 'supplier')->get();

        return view('obat.index', compact('obat'));
    }

    public function show(int $id)
    {
        $obat = Obat::with('kategori', 'supplier')
                    ->findOrFail($id);

        return view('obat.show', compact('obat'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $supplier = Supplier::all();

        return view('obat.create', compact('kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'nama_obat' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'expired' => 'required'
        ]);

        Obat::create($request->all());

        return redirect('/obat')
                ->with('success', 'Obat berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $obat = Obat::findOrFail($id);

        $kategori = Kategori::all();
        $supplier = Supplier::all();

        return view('obat.edit',
            compact('obat', 'kategori', 'supplier'));
    }

    public function update(Request $request,int  $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'nama_obat' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'expired' => 'required'
        ]);

        $obat = Obat::findOrFail( $id);

        $obat->update($request->all());

        return redirect('/obat')
                ->with('success', 'Obat berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $obat = Obat::findOrFail($id);

        $obat->delete();

        return redirect('/obat')
                ->with('success', 'Obat berhasil dihapus');
    }
}