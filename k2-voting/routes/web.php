<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemilihanController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/hasil', [PemilihanController::class, 'results'])->name('hasil');
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/pemilihan', [PemilihanController::class, 'index'])->name('user.index');
    Route::post('/pemilihan/pilih', [PemilihanController::class, 'store'])->name('user.store');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    // Kandidat
    Route::get('/admin/kandidat', [KandidatController::class, 'index'])->name('admin.kandidat.index');
    Route::get('/admin/kandidat/create', [KandidatController::class, 'create'])->name('admin.kandidat.create');
    Route::post('/admin/kandidat/store', [KandidatController::class, 'store'])->name('kandidat.store');
    Route::get('/admin/kandidat/edit/{id}', [KandidatController::class, 'edit'])->name('admin.kandidat.edit');
    Route::put('/admin/kandidat/update/{id}', [KandidatController::class, 'update'])->name('kandidat.update');
    Route::delete('/admin/kandidat/delete/{id}', [KandidatController::class, 'destroy'])->name('kandidat.destroy');
    // Kategori
    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/admin/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/admin/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/admin/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    //hasil
    Route::get('/admin/riwayat', [PemilihanController::class, 'history'])->name('admin.hasil.riwayat');
});
