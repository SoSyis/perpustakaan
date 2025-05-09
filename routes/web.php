<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\UserController;

// Halaman utama
Route::get('/', fn () => view('welcome'));

// Dashboard umum (pengguna terautentikasi)
Route::get('/dashboard', fn () => view('home'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==============================
// ADMIN & PETUGAS SECTION
// ==============================
Route::prefix('admin')->middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');

    // CRUD Buku
    Route::resource('buku', BukuController::class)->names('admin.buku');

    // CRUD Peminjaman (tanpa show, edit, update)
    Route::resource('peminjaman', PeminjamanController::class)
        ->except(['show', 'edit', 'update'])
        ->names('admin.peminjaman');

    // CRUD User hanya untuk admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->names('admin.users');
    });
});

// Petugas route (hanya dashboard & kelola buku khusus tampilan petugas)
Route::prefix('petugas')->middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/dashboard', fn () => view('petugas.dashboard'))->name('petugas.dashboard');
    Route::get('/kelola-buku', fn () => view('petugas.kelola-buku'))->name('petugas.kelola-buku');
});

// ==============================
// PENGUNJUNG SECTION
// ==============================
Route::middleware(['auth', 'role:pengunjung,admin,petugas'])->group(function () {
    Route::get('/home', fn () => view('home'))->name('home');

    // Buku (lihat, detail, sudah pinjam)
    Route::get('/buku', [BukuController::class, 'indexForPengunjung'])->name('pengunjung.buku.index');
    Route::get('/buku/{id}', [BukuController::class, 'showForPengunjung'])
        ->where('id', '[0-9]+')->name('pengunjung.buku.show');
    Route::get('/buku/sudahpinjam/{id}', [BukuController::class, 'showSudahPinjam'])->name('pengunjung.buku.sudahpinjam');

    // Peminjaman
    Route::get('/pinjam-buku', [PeminjamanController::class, 'createForPengunjung'])->name('pengunjung.peminjaman.create');
    Route::post('/pinjam-buku', [PeminjamanController::class, 'storeForPengunjung'])->name('pengunjung.peminjaman.store');
    Route::get('/riwayat-peminjaman', [PeminjamanController::class, 'riwayatPeminjaman'])->name('pengunjung.peminjaman.riwayat');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroyForPengunjung'])->name('pengunjung.peminjaman.destroy');
});

// Auth route bawaan Laravel
require __DIR__ . '/auth.php';
