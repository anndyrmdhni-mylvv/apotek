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

            <label>Kategori</label>

            <select name="kategori_id"
                    class="form-control">

                @foreach($kategori as $item)

                    <option value="{{ $item->id }}"
                        {{ $obat->kategori_id == $item->id ? 'selected' : '' }}>

                        {{ $item->nama_kategori }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Supplier</label>

            <select name="supplier_id"
                    class="form-control">

                @foreach($supplier as $item)

                    <option value="{{ $item->id }}"
                        {{ $obat->supplier_id == $item->id ? 'selected' : '' }}>

                        {{ $item->nama_supplier }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Nama Obat</label>

            <input type="text"
                   name="nama_obat"
                   class="form-control"
                   value="{{ $obat->nama_obat }}">

        </div>

        <div class="mb-3">

            <label>Stok</label>

            <input type="number"
                   name="stok"
                   class="form-control"
                   value="{{ $obat->stok }}">

        </div>

        <div class="mb-3">

            <label>Harga</label>

            <input type="number"
                   name="harga"
                   class="form-control"
                   value="{{ $obat->harga }}">

        </div>

        <div class="mb-3">

            <label>Tanggal Expired</label>

            <input type="date"
                   name="expired"
                   class="form-control"
                   value="{{ $obat->expired }}">

        </div>

        <button class="btn btn-warning">
            Update
        </button>

    </form>

</div>

@endsection