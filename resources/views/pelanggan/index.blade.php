@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <div class="d-flex justify-content-between mb-3">

        <h3 class="fw-bold text-success">
            Data Pelanggan
        </h3>

        <a href="/pelanggan/create"
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
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th width="200">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach($pelanggan as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->nama }}</td>

                <td>{{ $item->alamat }}</td>

                <td>{{ $item->telepon }}</td>

                <td>

                    <a href="/pelanggan/{{ $item->id }}/edit"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="/pelanggan/{{ $item->id }}"
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