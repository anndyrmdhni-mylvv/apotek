<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();

        return view('supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric|digits_between:12,13'
        ]);

        Supplier::create($request->all());

        return redirect('/supplier')
                ->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric|digits_between:12,13'
        ]);

        $supplier = Supplier::findOrFail($id);

        $supplier->update($request->all());

        return redirect('/supplier')
                ->with('success', 'Supplier berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect('/supplier')
                ->with('success', 'Supplier berhasil dihapus');
    }
}