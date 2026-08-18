<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// 1. Halaman Utama Langsung Ditujukan ke Form Login
Route::get('/', function () {
    return view('login');
})->name('login');

// Route alternatif jika ada yang mengakses /login
Route::get('/login', function () {
    return redirect('/');
});

// Memproses Auth (Login & Logout)
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::post('/logout', [AuthController::class, 'logout']);

// 2. Halaman Admin (Hanya Bisa Diakses Setelah Login & Merupakan Admin)
Route::get('/dashboard-admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin']);

// 3. Route Pendaftaran & Peserta
Route::get('/beranda', [PendaftaranController::class, 'index']);
Route::get('/daftar', [PendaftaranController::class, 'formDaftar']);
Route::post('/simpan-pendaftaran', [PendaftaranController::class, 'simpanData']);

Route::get('/edit-peserta/{id}', [PendaftaranController::class, 'formEdit']);
Route::put('/update-peserta/{id}', [PendaftaranController::class, 'updateData']);
Route::delete('/hapus-peserta/{id}', [PendaftaranController::class, 'hapusData']);