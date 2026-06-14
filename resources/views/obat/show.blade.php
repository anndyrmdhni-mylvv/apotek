@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <div class="d-flex justify-content-between mb-4">

        <h3 class="fw-bold text-success">
            Detail Obat
        </h3>

        <a href="/obat"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

    <table class="table table-bordered">

        <tr>
            <th width="250">Nama Obat</th>
            <td>{{ $obat->nama_obat }}</td>
        </tr>

        <tr>
            <th>Kategori</th>
            <td>{{ $obat->kategori->nama_kategori }}</td>
        </tr>

        <tr>
            <th>Supplier</th>
            <td>{{ $obat->supplier->nama_supplier }}</td>
        </tr>

        <tr>
            <th>Stok</th>
            <td>{{ $obat->stok }}</td>
        </tr>

        <tr>
            <th>Harga</th>
            <td>Rp {{ number_format($obat->harga) }}</td>
        </tr>

        <tr>
            <th>Tanggal Expired</th>
            <td>{{ $obat->expired }}</td>
        </tr>

    </table>

</div>

@endsection