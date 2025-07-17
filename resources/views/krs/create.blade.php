@include('layout.header')

<h3>Form Tambah Data KRS</h3>

<form action="{{ route('krs.store') }}" method="POST">
    @csrf

<div class="form-group">
    <label for="mahasiswa_id">Mahasiswa:</label>
    <select name="mahasiswa_id" id="mahasiswa_id" required>
        <option value="">-- Pilih Mahasiswa --</option>
        @foreach ($mahasiswas as $mhs)
            <option value="{{ $mhs->id }}">{{ $mhs->nama_mahasiswa }}</option>
        @endforeach
    </select>
</div>


    <div class="form-group">
        <label for="prodi_id">Prodi:</label>
        <select name="prodi_id" id="prodi_id" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodis as $prodi)
                <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="matakuliah_id">Matakuliah:</label>
        <select name="matakuliah_id" id="matakuliah_id" required>
            <option value="">-- Pilih Matakuliah --</option>
            @foreach($matakuliahs as $mk)
                <option value="{{ $mk->id }}">{{ $mk->nama_matakuliah }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="jadwal_id">Jadwal:</label>
        <select name="jadwal_id" id="jadwal_id" required>
            <option value="">-- Pilih Jadwal --</option>
            @foreach($jadwals as $jadwal)
                <option value="{{ $jadwal->id }}">
                    {{ $jadwal->hari }} ({{ $jadwal->jam_kuliah }}) - {{ $jadwal->ruang }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="tombol">Simpan</button>
</form>

@if(session()->has('success'))
<script>
    alert("{{ session()->get('success') }}");
    window.location.href = "{{ route('krs.index') }}";
</script>
@endif

@include('layout.footer')
