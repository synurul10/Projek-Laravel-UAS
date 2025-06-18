<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai konvensi Laravel)
    protected $table = 'dosens';

    // Kolom yang bisa diisi secara massal (untuk create/update)
    protected $fillable = [
        'nidn',
        'nama_dosen',
        'email',
        'telepon',
        'alamat',
        'prodi',
        'jabatan_akademik',
        'pendidikan_terakhir'
    ];
}