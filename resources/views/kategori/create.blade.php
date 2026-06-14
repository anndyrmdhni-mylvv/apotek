@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <h3 class="fw-bold text-success mb-4">
        Tambah Kategori
    </h3>

    <form action="/kategori" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text"
                   name="nama_kategori"
                   class="form-control @error('nama_kategori') is-invalid @enderror"
                   value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">
            Simpan
        </button>

    </form>

</div>

@endsection