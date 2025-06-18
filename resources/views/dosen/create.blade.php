@include('layout.header')

<h3>Form Tambah Data Dosen</h3>

<form action="{{ route('dosen.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nidn">NIDN:</label>
        <input type="text" name="nidn" id="nidn" required>
    </div>

    <div class="form-group">
        <label for="nama_dosen">Nama Dosen:</label>
        <input type="text" name="nama_dosen" id="nama_dosen" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>
    </div>

    <div class="form-group">
        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" id="telepon" required>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" required>
    </div>

    <div class="form-group">
        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" id="prodi" required>
    </div>

    <div class="form-group">
        <label for="jabatan_akademik">Jabatan Akademik:</label>
        <input type="text" name="jabatan_akademik" id="jabatan_akademik" required>
    </div>

    <div class="form-group">
        <label for="pendidikan_terakhir">Pendidikan Terakhir:</label>
        <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
    </div>

    <button type="submit" class="tombol">Simpan</button>
</form>

@if(session()->has('success'))
<script>
    alert("{{ session()->get('success') }}");
    window.location.href = "{{ route('dosen.index') }}";
</script>
@endif

@include('layout.footer')