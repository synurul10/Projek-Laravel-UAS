<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $allMahasiswa = Mahasiswa::with('prodi')->get(); // agar relasi prodi ikut dimuat
        return view('mahasiswa.index', compact('allMahasiswa'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama_mahasiswa' => 'required',
            'email'    => 'required|email',
            'telepon'   => 'required',
            'alamat'   => 'required',
            'prodi_id'   => 'required|exists:prodis,id',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    public function show($mahasiswa_id)
    {
    $mahasiswa = \App\Models\Mahasiswa::with(['prodi', 'krs.jadwal.dosen', 'krs.matakuliah'])
                    ->where('id', $mahasiswa_id)
                    ->firstOrFail();

    return view('krs.show', compact('mahasiswa'));
    }


    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama_mahasiswa' => 'required',
            'email'    => 'required|email',
            'telepon'   => 'required',
            'alamat'   => 'required',
            'prodi_id'   => 'required|exists:prodis,id',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}
