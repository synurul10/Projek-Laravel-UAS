<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMatakuliah = Matakuliah::with(['dosen', 'prodi'])->get();
        return view('matakuliah.index', compact('allMatakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allDosen = Dosen::all();
        $allProdi = Prodi::all();
        return view('matakuliah.create', compact('allDosen', 'allProdi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required|unique:matakuliahs,kode_matakuliah',
            'nama_matakuliah' => 'required',
            'sks' => 'required',
            'kelas' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $data = $request->only([
            'kode_matakuliah',
            'nama_matakuliah',
            'sks',
            'kelas',
            'dosen_id',
            'prodi_id',
        ]);

        Matakuliah::create($data);

        return redirect()->route('matakuliah.index')->with('success', 'Data Matakuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah)
    {
        $allDosen = Dosen::all();
        $allProdi = Prodi::all();
        return view('matakuliah.edit', compact('matakuliah', 'allDosen', 'allProdi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required|unique:matakuliahs,kode_matakuliah,' . $matakuliah->id,
            'nama_matakuliah' => 'required',
            'sks' => 'required',
            'kelas' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $data = $request->only([
            'kode_matakuliah',
            'nama_matakuliah',
            'sks',
            'kelas',
            'dosen_id',
            'prodi_id',
        ]);

        $matakuliah->update($data);

        return redirect()->route('matakuliah.index')->with('success', 'Data Matakuliah Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Data Matakuliah berhasil dihapus.');
    }
}
