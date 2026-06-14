@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <h3 class="fw-bold text-warning mb-4">
        Edit Pelanggan
    </h3>

    <form action="/pelanggan/{{ $pelanggan->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text"
                   name="nama"
                   class="form-control @error('nama') is-invalid @enderror"
                   value="{{ old('nama', $pelanggan->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat"
                      class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $pelanggan->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="text"
                   name="telepon"
                   class="form-control @error('telepon') is-invalid @enderror"
                   value="{{ old('telepon', $pelanggan->telepon) }}">
            @error('telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-warning">
            <i class="bi bi-pencil-square"></i> Update
        </button>

    </form>

</div>

@endsection