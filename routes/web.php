<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);

