@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <h3 class="fw-bold text-warning mb-4">
        Edit Obat
    </h3>

    <form action="/obat/{{ $obat->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id"
                    class="form-control @error('kategori_id') is-invalid @enderror">
                @foreach($kategori as $item)
                    <option value="{{ $item->id }}"
                        {{ old('kategori_id', $obat->kategori_id) == $item->id ? 'selected' : '' }}>
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
                @foreach($supplier as $item)
                    <option value="{{ $item->id }}"
                        {{ old('supplier_id', $obat->supplier_id) == $item->id ? 'selected' : '' }}>
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
                   class="form-control @error('nama_obat') is-invalid @enderror"
                   value="{{ old('nama_obat', $obat->nama_obat) }}">
            @error('nama_obat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number"
                   name="stok"
                   class="form-control @error('stok') is-invalid @enderror"
                   value="{{ old('stok', $obat->stok) }}">
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number"
                   name="harga"
                   class="form-control @error('harga') is-invalid @enderror"
                   value="{{ old('harga', $obat->harga) }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Expired</label>
            <input type="date"
                   name="expired"
                   class="form-control @error('expired') is-invalid @enderror"
                   value="{{ old('expired', $obat->expired) }}">
            @error('expired')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-warning">
            Update
        </button>

    </form>

</div>

@endsection