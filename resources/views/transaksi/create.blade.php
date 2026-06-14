@extends('layouts.app')

@section('content')

<div class="card shadow p-4">

    <h3 class="fw-bold text-success mb-4">
        Tambah Transaksi
    </h3>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <h6 class="fw-bold"><i class="bi bi-exclamation-triangle-fill"></i> Terdapat Kesalahan:</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/transaksi" method="POST">

        @csrf

        <div class="mb-4">
            <label class="form-label fw-semibold">Pelanggan</label>
            <select name="pelanggan_id" class="form-select @error('pelanggan_id') is-invalid @enderror" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($pelanggan as $item)
                    <option value="{{ $item->id }}" {{ old('pelanggan_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            @error('pelanggan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <h5 class="fw-bold text-success mb-3">Daftar Obat yang Dibeli</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle" id="obat-table">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Obat</th>
                            <th width="200">Jumlah</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="obat_id[]" class="form-select" required>
                                    <option value="">Pilih Obat</option>
                                    @foreach($obat as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_obat }} (Stok: {{ $item->stok }} | Rp {{ number_format($item->harga) }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="jumlah[]" class="form-control" min="1" placeholder="Jumlah" required>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-remove-row w-100">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-outline-success btn-sm mt-2" id="btn-add-row">
                <i class="bi bi-plus-circle"></i> Tambah Baris Obat
            </button>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-success">
                <i class="bi bi-save"></i> Simpan Transaksi
            </button>
            <a href="/transaksi" class="btn btn-light">
                Kembali
            </a>
        </div>

    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.querySelector('#obat-table tbody');
    const btnAddRow = document.getElementById('btn-add-row');

    btnAddRow.addEventListener('click', function () {
        const firstRow = tableBody.querySelector('tr');
        if (!firstRow) return;

        const newRow = firstRow.cloneNode(true);
        
        // Reset selections and values in cloned row
        newRow.querySelector('select').value = '';
        newRow.querySelector('input').value = '';
        
        tableBody.appendChild(newRow);
    });

    tableBody.addEventListener('click', function (e) {
        if (e.target.closest('.btn-remove-row')) {
            const rows = tableBody.querySelectorAll('tr');
            if (rows.length > 1) {
                e.target.closest('tr').remove();
            } else {
                alert('Minimal harus ada 1 obat yang dibeli!');
            }
        }
    });
});
</script>

@endsection