@extends('layouts.app')

@section('content')

<div class="row g-4 mb-4">

    <!-- Card Obat -->
    <div class="col-md-3">
        <div class="card p-4 text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #198754 0%, #0f5132 100%); border-radius: 16px;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-white-50 fw-semibold text-uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Obat</h6>
                    <h2 class="fw-bold mb-0">{{ $totalObat }}</h2>
                </div>
                <div class="bg-white bg-opacity-25 rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                    <i class="bi bi-capsule-pill fs-3"></i>
                </div>
            </div>
            <div class="position-absolute" style="width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%; bottom: -40px; right: -40px;"></div>
        </div>
    </div>

    <!-- Card Supplier -->
    <div class="col-md-3">
        <div class="card p-4 text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #0d6efd 0%, #084298 100%); border-radius: 16px;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-white-50 fw-semibold text-uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Supplier</h6>
                    <h2 class="fw-bold mb-0">{{ $totalSupplier }}</h2>
                </div>
                <div class="bg-white bg-opacity-25 rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                    <i class="bi bi-truck fs-3"></i>
                </div>
            </div>
            <div class="position-absolute" style="width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%; bottom: -40px; right: -40px;"></div>
        </div>
    </div>

    <!-- Card Pelanggan -->
    <div class="col-md-3">
        <div class="card p-4 text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #6f42c1 0%, #432874 100%); border-radius: 16px;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-white-50 fw-semibold text-uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Pelanggan</h6>
                    <h2 class="fw-bold mb-0">{{ $totalPelanggan }}</h2>
                </div>
                <div class="bg-white bg-opacity-25 rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                    <i class="bi bi-people fs-3"></i>
                </div>
            </div>
            <div class="position-absolute" style="width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%; bottom: -40px; right: -40px;"></div>
        </div>
    </div>

    <!-- Card Transaksi -->
    <div class="col-md-3">
        <div class="card p-4 text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #fd7e14 0%, #b2590e 100%); border-radius: 16px;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-white-50 fw-semibold text-uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Transaksi</h6>
                    <h2 class="fw-bold mb-0">{{ $totalTransaksi }}</h2>
                </div>
                <div class="bg-white bg-opacity-25 rounded-3 p-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                    <i class="bi bi-receipt fs-3"></i>
                </div>
            </div>
            <div class="position-absolute" style="width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%; bottom: -40px; right: -40px;"></div>
        </div>
    </div>

</div>

<div class="card mt-4 p-4 shadow">

    <h3 class="fw-bold text-success">
        Selamat Datang di NindyaFarma 
    </h3>

    <p>
        Sistem Informasi Apotek modern berbasis Laravel dan Bootstrap.
    </p>

</div>

@endsection