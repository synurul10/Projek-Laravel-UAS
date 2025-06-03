@include('layout.header')

<h3>Form Tambah Data Mahasiswa</h3>

<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required>
    </div>

    <div class="form-group">
        <label for="nama_mahasiswa">Nama Mahasiswa:</label>
        <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" required>
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

    <button type="submit" class="tombol">Simpan</button>
</form>

@if(session()->has('success'))
<script>
    alert("{{ session()->get('success') }}");
    window.location.href = "{{ route('mahasiswa.index') }}";
</script>
@endif

@include('layout.footer')