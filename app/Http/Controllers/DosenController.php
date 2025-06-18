<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allDosen = Dosen::all();
        return view('dosen.index', compact('allDosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama_dosen' => 'required',
            'email'    => 'required',
            'telepon'   => 'required',
            'alamat'   => 'required',
            'prodi'   => 'required',
            'jabatan_akademik'   => 'required',
            'pendidikan_terakhir'   => 'required',
        ]);

        //buat data
        $data = [
            'nidn' => $request->nidn,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'jabatan_akademik' => $request->jabatan_akademik,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
        ];

        Dosen::create($data);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'nama_dosen' => 'required',
            'email'    => 'required',
            'telepon'   => 'required',
            'alamat'   => 'required',
            'prodi'   => 'required',
            'jabatan_akademik'   => 'required',
            'pendidikan_terakhir'   => 'required',
        ]);
        //buat data
        $data = [
            'nidn' => $request->nidn,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'jabatan_akademik' => $request->jabatan_akademik,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
        ];

        $dosen->update($data);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus.');
    }
}
