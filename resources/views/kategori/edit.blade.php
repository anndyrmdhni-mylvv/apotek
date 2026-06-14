@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <h3 class="fw-bold text-warning mb-4">
        Edit Kategori
    </h3>

    <form action="/kategori/{{ $kategori->id }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text"
                   name="nama_kategori"
                   class="form-control @error('nama_kategori') is-invalid @enderror"
                   value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-warning">
            Update
        </button>

    </form>

</div>

@endsection