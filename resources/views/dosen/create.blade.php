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
    <label for="prodi_id">Prodi:</label>
    <select name="prodi_id" id="prodi_id" required>
        <option value="">-- Pilih Prodi --</option>
        @foreach ($prodis as $prodi)
            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
        @endforeach
    </select>
</div>

    <div class="form-group">
        <label for="jabatan_akademik">Jabatan Akademik:</label>
        <select name="jabatan_akademik" id="jabatan_akademik" required>
            <option value="Asisten Ahli">Asisten Ahli</option>
            <option value="Lektor">Lektor</option>
            <option value="Lektor Kepala">Lektor Kepala</option>
            <option value="Profesor">Profesor atau Guru Besar</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pendidikan_terakhir">Pendidikan Terakhir:</label>
        <select name="pendidikan_terakhir" id="pendidikan_terakhir" required>
            <option value="S2">S2 Magister</option>
            <option value="S3">S3 Doktor</option>
        </select>
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