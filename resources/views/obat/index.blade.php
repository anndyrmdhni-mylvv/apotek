@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <div class="d-flex justify-content-between mb-3">

        <h3 class="fw-bold text-success">
            Data Obat
        </h3>

        <a href="/obat/create"
           class="btn btn-success">

            <i class="bi bi-plus-circle"></i>
            Tambah

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <table class="table table-bordered table-hover">

        <thead class="table-success">

            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Expired</th>
                <th width="200">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach($obat as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->nama_obat }}</td>

                <td>{{ $item->kategori->nama_kategori }}</td>

                <td>{{ $item->supplier->nama_supplier }}</td>

                <td>{{ $item->stok }}</td>

                <td>Rp {{ number_format($item->harga) }}</td>

                <td>{{ $item->expired }}</td>

                <td>

                    <a href="/obat/{{ $item->id }}/edit"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a href="/obat/{{ $item->id }}"
                        class="btn btn-info btn-sm">

                         Detail

                    </a>

                    <form action="/obat/{{ $item->id }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger btn-sm btn-delete-trigger">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection