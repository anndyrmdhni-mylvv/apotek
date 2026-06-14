<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'login']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('authcustom')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('kategori', KategoriController::class);

    Route::resource('supplier', SupplierController::class);

    Route::resource('obat', ObatController::class);

    Route::resource('pelanggan', PelangganController::class);

    Route::resource('transaksi', TransaksiController::class);

});