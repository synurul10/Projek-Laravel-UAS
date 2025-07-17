<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $allKrs = Krs::with('mahasiswa', 'prodi')
            ->select('mahasiswa_id', 'prodi_id')
            ->groupBy('mahasiswa_id', 'prodi_id')
            ->get();

        return view('krs.index', compact('allKrs'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $prodis = Prodi::all();
        $jadwals = Jadwal::all();
        $matakuliahs = Matakuliah::all();

        return view('krs.create', compact('mahasiswas', 'prodis', 'jadwals', 'matakuliahs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswas,id',
            'prodi_id'       => 'required|exists:prodis,id',
            'jadwal_id'      => 'required|exists:jadwals,id',
            'matakuliah_id'  => 'required|exists:matakuliahs,id',
        ]);

        Krs::create($validated);

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil ditambahkan.');
    }

    public function edit(Krs $krs)
    {
        $mahasiswas = Mahasiswa::all();
        $prodis = Prodi::all();
        $jadwals = Jadwal::all();
        $matakuliahs = Matakuliah::all();

        return view('krs.edit', compact('krs', 'mahasiswas', 'prodis', 'jadwals', 'matakuliahs'));
    }

    public function update(Request $request, Krs $krs)
    {
        $validated = $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswas,id',
            'prodi_id'       => 'required|exists:prodis,id',
            'jadwal_id'      => 'required|exists:jadwals,id',
            'matakuliah_id'  => 'required|exists:matakuliahs,id',
        ]);

        $krs->update($validated);

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil diperbarui.');
    }

    public function destroy(Krs $krs)
    {
        $krs->delete();

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil dihapus.');
    }

    /**
     * Menampilkan detail KRS milik satu mahasiswa
     */
    public function show($mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::with(['prodi', 'krs.jadwal.dosen', 'krs.matakuliah'])
                        ->findOrFail($mahasiswa_id);

        return view('krs.show', compact('mahasiswa'));
    }
}
