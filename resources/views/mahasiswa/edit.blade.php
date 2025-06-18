@include('layout.header')
    <h3>Edit Data Mahasiswa</h3>
<!-- edit data mahasiswa -->
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="form-group">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" required>
    </div>
    <div class="form-group">
        <label for="nama_mahasiswa">Nama Mahasiswa:</label>
        <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="{{ $mahasiswa->email }}" required>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" id="telepon" value="{{ $mahasiswa->telepon }}" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="{{ $mahasiswa->alamat }}" required>
    </div>
    <div class="form-group">
        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" id="prodi" value="{{ $mahasiswa->prodi }}" required>
    </div>
    <button type="submit" class="tombol">Update</button>
</form>
<br>
<a href="{{ route('mahasiswa.index') }}" class="tombol">Kembali</a>
@include('layout.footer')