<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai konvensi Laravel)
    protected $table = 'mahasiswas';

    // Kolom yang bisa diisi secara massal (untuk create/update)
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'email',
        'telepon',
        'alamat',
        'prodi',
    ];
}