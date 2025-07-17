@include('layout.header')
<h3>Edit Data Matakuliah</h3>

<form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="kode_matakuliah">Kode Matakuliah:</label>
        <input type="text" name="kode_matakuliah" id="kode_matakuliah" value="{{ $matakuliah->kode_matakuliah }}" required>
    </div>

    <div class="form-group">
        <label for="nama_matakuliah">Nama Matakuliah:</label>
        <input type="text" name="nama_matakuliah" id="nama_matakuliah" value="{{ $matakuliah->nama_matakuliah }}" required>
    </div>

    <div class="form-group">
        <label for="sks">SKS:</label>
        <input type="number" name="sks" id="sks" value="{{ $matakuliah->sks }}" required min="1">
    </div>

    <div class="form-group">
        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" id="kelas" value="{{ $matakuliah->kelas }}" required>
    </div>

    <div class="form-group">
        <label for="dosen_id">Dosen Pengampu:</label>
        <select name="dosen_id" id="dosen_id" required>
            @foreach($allDosen as $dosen)
                <option value="{{ $dosen->id }}" {{ $dosen->id == $matakuliah->dosen_id ? 'selected' : '' }}>
                    {{ $dosen->nama_dosen }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="prodi_id">Program Studi:</label>
        <select name="prodi_id" id="prodi_id" required>
            @foreach($allProdi as $prodi)
                <option value="{{ $prodi->id }}" {{ $prodi->id == $matakuliah->prodi_id ? 'selected' : '' }}>
                    {{ $prodi->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="tombol">Update</button>
</form>
<br>
<a href="{{ route('matakuliah.index') }}" class="tombol">Kembali</a>
@include('layout.footer')
