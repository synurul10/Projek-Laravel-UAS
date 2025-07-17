<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allJadwal = Jadwal::with(['dosen', 'prodi', 'matakuliah'])->get();
        return view('jadwal.index', compact('allJadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = Dosen::all();
        $prodis = Prodi::all();
        $matakuliahs = Matakuliah::all();
        return view('jadwal.create', compact('dosens', 'prodis', 'matakuliahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'prodi_id' => 'required|exists:prodis,id',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required|string',
        ]);

        $jam_kuliah = $request->jam_mulai . ' - ' . $request->jam_selesai;

        Jadwal::create([
            'dosen_id' => $request->dosen_id,
            'prodi_id' => $request->prodi_id,
            'matakuliah_id' => $request->matakuliah_id,
            'hari' => $request->hari,
            'jam_kuliah' => $jam_kuliah,
            'ruang' => $request->ruang,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Data Jadwal berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $dosens = Dosen::all();
        $prodis = Prodi::all();
        $matakuliahs = Matakuliah::all();

        // Pecah jam kuliah untuk pengisian ulang input
        [$jam_mulai, $jam_selesai] = explode(' - ', $jadwal->jam_kuliah);

        return view('jadwal.edit', compact('jadwal', 'dosens', 'prodis', 'matakuliahs', 'jam_mulai', 'jam_selesai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'prodi_id' => 'required|exists:prodis,id',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required|string',
        ]);

        $jam_kuliah = $request->jam_mulai . ' - ' . $request->jam_selesai;

        $jadwal->update([
            'dosen_id' => $request->dosen_id,
            'prodi_id' => $request->prodi_id,
            'matakuliah_id' => $request->matakuliah_id,
            'hari' => $request->hari,
            'jam_kuliah' => $jam_kuliah,
            'ruang' => $request->ruang,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Data Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Data Jadwal berhasil dihapus.');
    }
}
