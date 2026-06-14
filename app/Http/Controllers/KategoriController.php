<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::paginate(10);

        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori'
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/kategori')
                ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $kategori = Kategori::findOrFail( $id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori,' . $id
        ]);

        $kategori = Kategori::findOrFail( $id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/kategori')
                ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $kategori = Kategori::findOrFail( $id);

        $kategori->delete();

        return redirect('/kategori')
                ->with('success', 'Kategori berhasil dihapus');
    }
}