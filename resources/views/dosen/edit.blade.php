@include('layout.header')
    <h3>Edit Data Dosen</h3>
<!-- edit data dosen -->
    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="form-group">
        <label for="nidn">NIDN:</label>
        <input type="text" name="nidn" id="nidn" value="{{ $dosen->nidn }}" required>
    </div>
    <div class="form-group">
        <label for="nama_dosen">Nama Dosen:</label>
        <input type="text" name="nama_dosen" id="nama_dosen" value="{{ $dosen->nama_dosen }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="{{ $dosen->email }}" required>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" id="telepon" value="{{ $dosen->telepon }}" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="{{ $dosen->alamat }}" required>
    </div>
    <div class="form-group">
    <label for="prodi_id">Prodi:</label>
    <select name="prodi_id" id="prodi_id" required>
        <option value="">-- Pilih Prodi --</option>
        @foreach ($prodis as $prodi)
            <option value="{{ $prodi->id }}" {{ $dosen->prodi_id == $prodi->id ? 'selected' : '' }}>
                {{ $prodi->nama_prodi }}
            </option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for="jabatan_akademik">Jabatan Akademik:</label>
        <select name="jabatan_akademik" id="jabatan_akademik" required>
            <option value="Asisten Ahli" {{ $dosen->jabatan_akademik == 'AA' ? 'selected' : ''}}>Asisten Ahli</option>
            <option value="Lektor" {{ $dosen->jabatan_akademik == 'L' ? 'selected' : ''}}>Lektor</option>
            <option value="Lektor Kepala" {{ $dosen->jabatan_akademik == 'LK' ? 'selected' : ''}}>Lektor Kepala</option>
            <option value="Profesor" {{ $dosen->jabatan_akademik == 'Prof' ? 'selected' : ''}}>Profesor atau Guru Besar</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pendidikan_terakhir">Pendidikan Terakhir:</label>
        <select name="pendidikan_terakhir" id="pendidikan_terakhir" required>
            <option value="S2" {{ $dosen->pendidikan_terakhir == 'S2' ? 'selected' : ''}}>S2 Magister</option>
            <option value="S3" {{ $dosen->pendidikan_terakhir == 'S3' ? 'selected' : ''}}>S3 Doktor</option>
        </select>
    </div>


    <button type="submit" class="tombol">Update</button>
</form>
<br>
<a href="{{ route('dosen.index') }}" class="tombol">Kembali</a>
@include('layout.footer')