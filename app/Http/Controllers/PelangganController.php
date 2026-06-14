<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::paginate(10);

        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric|digits_between:12,13'
        ]);

        Pelanggan::create($request->all());

        return redirect('/pelanggan')
                ->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric|digits_between:12,13'
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update($request->all());

        return redirect('/pelanggan')
                ->with('success', 'Pelanggan berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();

        return redirect('/pelanggan')
                ->with('success', 'Pelanggan berhasil dihapus');
    }
}