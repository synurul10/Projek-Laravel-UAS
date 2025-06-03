<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allProdi = Prodi::all();
        return view('prodi.index', compact('allProdi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_prodi' => 'required|unique:prodis,kode_prodi',
            'nama_prodi' => 'required',
            'jenjang'    => 'required',
            'fakultas'   => 'required',
        ]);

        //buat data
        $data = [
            'kode_prodi' => $request->kode_prodi,
            'nama_prodi' => $request->nama_prodi,
            'jenjang' => $request->jenjang,
            'fakultas' => $request->fakultas,
        ];

        Prodi::create($data);

        return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validated = $request->validate([
            'kode_prodi' => 'required|unique:prodis,kode_prodi,' . $prodi->id,
            'nama_prodi' => 'required',
            'jenjang'    => 'required',
            'fakultas'   => 'required',
        ]);
        //buat data
        $data = [
            'kode_prodi' => $request->kode_prodi,
            'nama_prodi' => $request->nama_prodi,
            'jenjang' => $request->jenjang,
            'fakultas' => $request->fakultas,
        ];

        $prodi->update($data);

        return redirect()->route('prodi.index')->with('success', 'Data Prodi Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil dihapus.');
    }
}