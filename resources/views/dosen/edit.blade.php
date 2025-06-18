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
        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" id="prodi" value="{{ $dosen->prodi }}" required>
    </div>
    <div class="form-group">
        <label for="prodi">Jabatan Akademik:</label>
        <input type="text" name="jabatan_akademik" id="jabatan_akademik" value="{{ $dosen->jabatan_akademik }}" required>
    </div>
    <div class="form-group">
        <label for="prodi">Pendidikan Terakhir:</label>
        <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" value="{{ $dosen->pendidikan_terakhir }}" required>
    </div>
    <button type="submit" class="tombol">Update</button>
</form>
<br>
<a href="{{ route('dosen.index') }}" class="tombol">Kembali</a>
@include('layout.footer')