<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

// Guest Routes (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated Routes (Sudah Login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Only Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // Menggunakan Resource Controller agar menghasilkan nama route admin.users.index, admin.users.create, dll.
        Route::resource('users', UserController::class);
    });

    // Admin & Kasir Routes
    Route::middleware('role:admin,kasir')->group(function () {
        Route::resource('/produk', ProdukController::class)->names('produk');
        Route::resource('/penjualan', PenjualanController::class);
        Route::resource('/itempenjualan', ItemPenjualanController::class);
    });
});