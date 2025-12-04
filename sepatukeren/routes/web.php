<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/customers', CustomerController::class)->names('customers');
    Route::resource('/kategori', KategoriController::class)->names('kategori');
    Route::resource('/produk', ProdukController::class)->names('produk');

});

Route::middleware(['auth','role:user'])->prefix('user')->name('user.')->group(function() {

    Route::get('/dashboard', [KategoriController::class, 'dashboardKategori'])->name('dashboard');

    Route::get('/kategori', [KategoriController::class, 'userKategori'])->name('kategori.index');
    Route::get('/kategori/{id}', [KategoriController::class, 'kategoriDetail'])->name('kategori.detail');

    Route::get('/produk', [ProdukController::class, 'userProduk'])->name('produk.index');
    Route::get('/produk/{id}', [ProdukController::class, 'userProdukDetail'])->name('produk.detail');

    // 🔥 FIX ROUTE INI
    Route::get('/produk/kategori/{id}', [ProdukController::class, 'filterByKategori'])->name('produk.byKategori');

});


Route::get('/', function () {
    if (!auth()->check()) return redirect('/login');
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
});
