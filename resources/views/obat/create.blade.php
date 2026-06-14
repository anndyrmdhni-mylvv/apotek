@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <h3 class="fw-bold text-success mb-4">
        Tambah Obat
    </h3>

    <form action="/obat" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id"
                    class="form-control @error('kategori_id') is-invalid @enderror">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $item)
                    <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Supplier</label>
            <select name="supplier_id"
                    class="form-control @error('supplier_id') is-invalid @enderror">
                <option value="">Pilih Supplier</option>
                @foreach($supplier as $item)
                    <option value="{{ $item->id }}" {{ old('supplier_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_supplier }}
                    </option>
                @endforeach
            </select>
            @error('supplier_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Obat</label>
            <input type="text"
                   name="nama_obat"
                   class="form-control @error('nama_obat') is-invalid @enderror" value="{{ old('nama_obat') }}">
            @error('nama_obat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number"
                   name="stok"
                   class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}">
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number"
                   name="harga"
                   class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Expired</label>
            <input type="date"
                   name="expired"
                   class="form-control @error('expired') is-invalid @enderror" value="{{ old('expired') }}">
            @error('expired')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">
            Simpan
        </button>

    </form>

</div>

@endsection