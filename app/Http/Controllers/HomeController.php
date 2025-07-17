<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    return view('home', [
        'jumlahMahasiswa' => \App\Models\Mahasiswa::count(),
        'jumlahDosen' => \App\Models\Dosen::count(),
        'jumlahProdi' => \App\Models\Prodi::count(),
        'jumlahMatakuliah' => \App\Models\Matakuliah::count(),
    ]);
}

}
