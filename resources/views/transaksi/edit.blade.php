@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success mb-0">
            Detail Transaksi
        </h3>
        <a href="/transaksi" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <table class="table table-bordered">

        <tr>
            <th width="250">Pelanggan</th>
            <td>{{ $transaksi->pelanggan->nama }}</td>
        </tr>

        <tr>
            <th>Tanggal</th>
            <td>{{ $transaksi->tanggal }}</td>
        </tr>

        <tr>
            <th>Total</th>
            <td>
                Rp {{ number_format($transaksi->total) }}
            </td>
        </tr>

    </table>

    <h5 class="mt-4">Data Obat</h5>

    <table class="table table-bordered">

        <thead class="table-success">

            <tr>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>

        </thead>

        <tbody>

            @foreach($transaksi->detail as $item)

            <tr>

                <td>{{ $item->obat->nama_obat }}</td>

                <td>{{ $item->jumlah }}</td>

                <td>
                    Rp {{ number_format($item->subtotal) }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection