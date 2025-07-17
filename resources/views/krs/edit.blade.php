@include('layout.header')

<h3>Edit Data KRS</h3>

<form action="{{ route('krs.update', $krs->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="mahasiswa_id">Mahasiswa:</label>
        <select name="mahasiswa_id" id="mahasiswa_id" required>
            @foreach($mahasiswas as $mhs)
                <option value="{{ $mhs->id }}" {{ $krs->mahasiswa_id == $mhs->id ? 'selected' : '' }}>
                    {{ $mhs->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="prodi_id">Prodi:</label>
        <select name="prodi_id" id="prodi_id" required>
            @foreach($prodis as $prodi)
                <option value="{{ $prodi->id }}" {{ $krs->prodi_id == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="matakuliah_id">Matakuliah:</label>
        <select name="matakuliah_id" id="matakuliah_id" required>
            @foreach($matakuliahs as $mk)
                <option value="{{ $mk->id }}" {{ $krs->matakuliah_id == $mk->id ? 'selected' : '' }}>
                    {{ $mk->nama_matakuliah }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="jadwal_id">Jadwal:</label>
        <select name="jadwal_id" id="jadwal_id" required>
            @foreach($jadwals as $jadwal)
                <option value="{{ $jadwal->id }}" {{ $krs->jadwal_id == $jadwal->id ? 'selected' : '' }}>
                    {{ $jadwal->hari }} ({{ $jadwal->jam_kuliah }}) - {{ $jadwal->ruang }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="tombol">Update</button>
</form>
<br>
<a href="{{ route('krs.index') }}" class="tombol">Kembali</a>

@include('layout.footer')
