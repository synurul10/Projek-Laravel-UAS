@include('layout.header')

<h3>Form Tambah Jadwal</h3>

<form action="{{ route('jadwal.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="dosen_id">Dosen Pengampu:</label>
        <select name="dosen_id" id="dosen_id" required>
            <option value="">-- Pilih Dosen --</option>
            @foreach ($dosens as $dosen)
                <option value="{{ $dosen->id }}">{{ $dosen->nama_dosen }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="prodi_id">Program Studi:</label>
        <select name="prodi_id" id="prodi_id" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach ($prodis as $prodi)
                <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="matakuliah_id">Matakuliah:</label>
        <select name="matakuliah_id" id="matakuliah_id" required>
            <option value="">-- Pilih Matakuliah --</option>
            @foreach ($matakuliahs as $mk)
                <option value="{{ $mk->id }}">{{ $mk->nama_matakuliah }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="hari">Hari:</label>
        <select name="hari" id="hari" required>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
        </select>
    </div>

    <div class="form-group">
        <label for="jam_mulai">Jam Kuliah:</label>
        <div style="display: flex; align-items: center; gap: 8px;">
            <input type="time" name="jam_mulai" id="jam_mulai" required>
            <span>-</span>
            <input type="time" name="jam_selesai" id="jam_selesai" required>
        </div>
    </div>

    <div class="form-group">
        <label for="ruang">Ruang:</label>
        <input type="text" name="ruang" id="ruang" required>
    </div>

    <button type="submit" class="tombol">Simpan</button>
</form>

@if(session()->has('success'))
<script>
    alert("{{ session('success') }}");
    window.location.href = "{{ route('jadwal.index') }}";
</script>
@endif

@include('layout.footer')
