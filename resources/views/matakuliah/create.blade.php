@include('layout.header')

<h3>Form Tambah Data Matakuliah</h3>

<form action="{{ route('matakuliah.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kode_matakuliah">Kode Matakuliah:</label>
        <input type="text" name="kode_matakuliah" id="kode_matakuliah" required>
    </div>

    <div class="form-group">
        <label for="nama_matakuliah">Nama Matakuliah:</label>
        <input type="text" name="nama_matakuliah" id="nama_matakuliah" required>
    </div>

    <div class="form-group">
        <label for="sks">SKS:</label>
        <input type="number" name="sks" id="sks" required min="1">
    </div>

    <div class="form-group">
        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" id="kelas" required>
    </div>

    <div class="form-group">
        <label for="dosen_id">Dosen Pengampu:</label>
        <select name="dosen_id" id="dosen_id" required>
            <option value="">-- Pilih Dosen --</option>
            @foreach($allDosen as $dosen)
                <option value="{{ $dosen->id }}">{{ $dosen->nama_dosen }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="prodi_id">Program Studi:</label>
        <select name="prodi_id" id="prodi_id" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach($allProdi as $prodi)
                <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="tombol">Simpan</button>
</form>

@if(session()->has('success'))
<script>
    alert("{{ session()->get('success') }}");
    window.location.href = "{{ route('matakuliah.index') }}";
</script>
@endif

@include('layout.footer')
