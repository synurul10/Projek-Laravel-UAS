<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';

    protected $fillable = [
        'nidn',
        'nama_dosen',
        'email',
        'telepon',
        'alamat',
        'prodi_id', // gunakan foreign key, bukan string 'prodi'
        'jabatan_akademik',
        'pendidikan_terakhir'
    ];

    // Relasi ke Prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
