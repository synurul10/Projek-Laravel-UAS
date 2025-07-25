<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'email',
        'telepon',
        'alamat',
        'prodi_id',
    ];


    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function krs()
    {
    return $this->hasMany(Krs::class);
    }

}
