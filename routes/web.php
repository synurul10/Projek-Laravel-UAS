<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('dosen', DosenController::class);
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('jadwal', JadwalController::class);

// Hapus route default `show` dari resource agar tidak bentrok
Route::resource('krs', KrsController::class)->except(['show']);

// ✅ Route khusus untuk menampilkan detail KRS berdasarkan mahasiswa
Route::get('/krs/detail/{mahasiswa_id}', [KrsController::class, 'show'])->name('krs.show');

Route::get('/home', [HomeController::class, 'index'])->name('home');

