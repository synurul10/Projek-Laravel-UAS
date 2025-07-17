@include('layout.header')

<h3>Form Tambah Data Prodi</h3>

<form action="{{ route('prodi.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kode_prodi">Kode Prodi:</label>
        <input type="text" name="kode_prodi" id="kode_prodi" required>
    </div>

    <div class="form-group">
        <label for="nama_prodi">Nama Prodi:</label>
        <input type="text" name="nama_prodi" id="nama_prodi" required>
    </div>

    <div class="form-group">
        <label for="jenjang">Jenjang:</label>
        <select name="jenjang" id="jenjang" required>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="Profesi">Profesi</option>
        </select>
    </div>

    <div class="form-group">
        <label for="fakultas">Fakultas:</label>
        <select name="fakultas" id="fakultas" required>
            <option value="PASCASARJANA">Program Pascasarjana</option>
            <option value="FKES">Fakultas Kesehatan</option>
            <option value="FILKOM">Fakultas Ilmu Komputer</option>
            <option value="FIKH">Fakultas Ilmu Komunikasi dan Hukum</option>
        </select>
    </div>

    <button type="submit" class="tombol">Simpan</button>
</form>

@if(session()->has('success'))
<script>
    alert("{{ session()->get('success') }}");
    window.location.href = "{{ route('prodi.index') }}";
</script>
@endif

@include('layout.footer')