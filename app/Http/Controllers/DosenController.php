<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $allDosen = Dosen::all();
        return view('dosen.index', compact('allDosen'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('dosen.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama_dosen' => 'required',
            'email'    => 'required',
            'telepon'   => 'required',
            'alamat'   => 'required',
            'prodi_id'   => 'required|exists:prodis,id',
            'jabatan_akademik'   => 'required',
            'pendidikan_terakhir'   => 'required',
        ]);

        $data = [
            'nidn' => $request->nidn,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'prodi_id' => $request->prodi_id,
            'jabatan_akademik' => $request->jabatan_akademik,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
        ];

        Dosen::create($data);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        $prodis = Prodi::all();
        return view('dosen.edit', compact('dosen', 'prodis'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'nama_dosen' => 'required',
            'email'    => 'required',
            'telepon'   => 'required',
            'alamat'   => 'required',
            'prodi_id'   => 'required|exists:prodis,id',
            'jabatan_akademik'   => 'required',
            'pendidikan_terakhir'   => 'required',
        ]);

        $data = [
            'nidn' => $request->nidn,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'prodi_id' => $request->prodi_id,
            'jabatan_akademik' => $request->jabatan_akademik,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
        ];

        $dosen->update($data);

        return redirect()->route('dosen.index')->with('success', 'Data Dosen Berhasil Diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus.');
    }
}
