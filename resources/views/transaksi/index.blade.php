@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <div class="d-flex justify-content-between mb-3">

        <h3 class="fw-bold text-success">
            Data Transaksi
        </h3>

        <a href="/transaksi/create"
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

    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-0">

        <thead class="table-success">

            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th width="200">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach($transaksi as $item)

            <tr>

                <td>{{ $transaksi->firstItem() + $loop->index }}</td>

                <td>{{ $item->pelanggan->nama }}</td>

                <td>{{ $item->tanggal }}</td>

                <td>
                    Rp {{ number_format($item->total) }}
                </td>

                <td>

                    <a href="/transaksi/{{ $item->id }}"
                       class="btn btn-info btn-sm">

                        Detail

                    </a>

                    <form action="/transaksi/{{ $item->id }}"
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

    <div class="mt-4">
        {{ $transaksi->links() }}
    </div>

</div>

@endsection