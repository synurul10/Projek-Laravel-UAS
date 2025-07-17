@include('layout.header')

<h3>Edit Jadwal</h3>

<form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="dosen_id">Dosen Pengampu:</label>
        <select name="dosen_id" id="dosen_id" required>
            <option value="">-- Pilih Dosen --</option>
            @foreach ($dosens as $dosen)
                <option value="{{ $dosen->id }}" {{ $jadwal->dosen_id == $dosen->id ? 'selected' : '' }}>
                    {{ $dosen->nama_dosen }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="prodi_id">Program Studi:</label>
        <select name="prodi_id" id="prodi_id" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach ($prodis as $prodi)
                <option value="{{ $prodi->id }}" {{ $jadwal->prodi_id == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="matakuliah_id">Matakuliah:</label>
        <select name="matakuliah_id" id="matakuliah_id" required>
            <option value="">-- Pilih Matakuliah --</option>
            @foreach ($matakuliahs as $mk)
                <option value="{{ $mk->id }}" {{ $jadwal->matakuliah_id == $mk->id ? 'selected' : '' }}>
                    {{ $mk->nama_matakuliah }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="hari">Hari:</label>
        <select name="hari" id="hari" required>
            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
                <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
            @endforeach
        </select>
    </div>

    @php
        [$jam_mulai, $jam_selesai] = explode(' - ', $jadwal->jam_kuliah);
    @endphp

    <div class="form-group">
        <label for="jam_mulai">Jam Kuliah:</label>
        <div style="display: flex; align-items: center; gap: 8px;">
            <input type="time" id="jam_mulai" name="jam_mulai" value="{{ $jam_mulai }}" required>
            <span>-</span>
            <input type="time" id="jam_selesai" name="jam_selesai" value="{{ $jam_selesai }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="ruang">Ruang:</label>
        <input type="text" name="ruang" id="ruang" value="{{ $jadwal->ruang }}" required>
    </div>

    <button type="submit" class="tombol">Update</button>
</form>

<br>
<a href="{{ route('jadwal.index') }}" class="tombol">Kembali</a>

@include('layout.footer')
