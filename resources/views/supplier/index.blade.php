@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <div class="d-flex justify-content-between mb-3">

        <h3 class="fw-bold text-success">
            Data Supplier
        </h3>

        <a href="/supplier/create"
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
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th width="200">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach($supplier as $item)

            <tr>

                <td>{{ $supplier->firstItem() + $loop->index }}</td>

                <td>{{ $item->nama_supplier }}</td>

                <td>{{ $item->alamat }}</td>

                <td>{{ $item->telepon }}</td>

                <td>

                    <a href="/supplier/{{ $item->id }}/edit"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="/supplier/{{ $item->id }}"
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
        {{ $supplier->links() }}
    </div>

</div>

@endsection