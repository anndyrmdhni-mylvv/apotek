@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <h3 class="fw-bold text-success mb-4">
        Tambah Obat
    </h3>

    <form action="/obat" method="POST">

        @csrf

        <div class="mb-3">

            <label>Kategori</label>

            <select name="kategori_id"
                    class="form-control">

                <option>Pilih Kategori</option>

                @foreach($kategori as $item)

                    <option value="{{ $item->id }}">
                        {{ $item->nama_kategori }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Supplier</label>

            <select name="supplier_id"
                    class="form-control">

                <option>Pilih Supplier</option>

                @foreach($supplier as $item)

                    <option value="{{ $item->id }}">
                        {{ $item->nama_supplier }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Nama Obat</label>

            <input type="text"
                   name="nama_obat"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Stok</label>

            <input type="number"
                   name="stok"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Harga</label>

            <input type="number"
                   name="harga"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Tanggal Expired</label>

            <input type="date"
                   name="expired"
                   class="form-control">

        </div>

        <button class="btn btn-success">
            Simpan
        </button>

    </form>

</div>

@endsection