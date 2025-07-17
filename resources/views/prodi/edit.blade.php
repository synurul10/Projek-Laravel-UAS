@include('layout.header')
    <h3>Edit Data Prodi</h3>
<!-- edit data prodi -->
    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="form-group">
        <label for="kode_prodi">Kode Prodi:</label>
        <input type="text" name="kode_prodi" id="kode_prodi" value="{{ $prodi->kode_prodi }}" required>
    </div>
    <div class="form-group">
        <label for="nama_prodi">Nama Prodi:</label>
        <input type="text" name="nama_prodi" id="nama_prodi" value="{{ $prodi->nama_prodi }}" required>
    </div>
    <div class="form-group">
        <label for="jenjang">Jenjang:</label>
        <select name="jenjang" id="jenjang" required>
            <option value="S1" {{ $prodi->jenjang == 'S1' ? 'selected' : '' }}>S1</option>
            <option value="S2" {{ $prodi->jenjang == 'S2' ? 'selected' : '' }}>S2</option>
            <option value="S3" {{ $prodi->jenjang == 'S3' ? 'selected' : '' }}>S3</option>
            <option value="D3" {{ $prodi->jenjang == 'D3' ? 'selected' : '' }}>D3</option>
            <option value="D4" {{ $prodi->jenjang == 'D4' ? 'selected' : '' }}>D4</option>
            <option value="Profesi" {{ $prodi->jenjang == 'Profesi' ? 'selected' : '' }}>Profesi</option>
        </select>
    </div>
    <div class="form-group">
        <label for="fakultas">Fakultas:</label>
        <select name="fakultas" id="fakultas" required>
        <option value="PASCASARJANA" {{ $prodi->fakultas == 'PASCASARJANA' ? 'selected' : '' }}>Program Pascasarjana</option>
        <option value="FKES" {{ $prodi->fakultas == 'FKES' ? 'selected' : '' }}>Fakultas Kesehatan</option>
        <option value="FILKOM" {{ $prodi->fakultas == 'FILKOM' ? 'selected' : '' }}>Fakultas Ilmu Komputer</option>
        <option value="FIKH" {{ $prodi->fakultas == 'FIKH' ? 'selected' : '' }}>Fakultas Ilmu Komunikasi dan Hukum</option>
        </select>
    </div>
    <button type="submit" class="tombol">Update</button>
</form>
<br>
<a href="{{ route('prodi.index') }}" class="tombol">Kembali</a>
@include('layout.footer')