@include('layout.header')

<h3>Edit Data Mahasiswa</h3>

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
        <label for="prodi_id">Prodi:</label>
        <select name="prodi_id" id="prodi_id" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach ($prodis as $prodi)
                <option value="{{ $prodi->id }}"
                    {{ $mahasiswa->prodi_id == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama_prodi }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="tombol">Update</button>
</form>

<br>
<a href="{{ route('mahasiswa.index') }}" class="tombol">Kembali</a>

@include('layout.footer')
