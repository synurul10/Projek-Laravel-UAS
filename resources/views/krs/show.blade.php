@include('layout.header')

<div class="container">
    <h3 class="mt-4 mb-3">Detail KRS - <strong>{{ $mahasiswa->nama_mahasiswa }}</strong></h3>

    <table class="mb-4">
    <tr>
        <th align="left">Nama Mahasiswa</th>
        <td>: {{ $mahasiswa->nama_mahasiswa }}</td>
    </tr>
    <tr>
        <th align="left">NIM</th>
        <td>: {{ $mahasiswa->nim }}</td>
    </tr>
    <tr>
        <th align="left">Prodi</th>
        <td>: {{ $mahasiswa->prodi->nama_prodi }}</td>
    </tr>
</table>


    <h4 class="mb-3"><strong>Daftar Mata Kuliah yang Diambil</strong></h4>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #007bff; color: white;">
            <tr>
                <th>No</th>
                <th>Matakuliah</th>
                <th>Hari</th>
                <th>Jam Kuliah</th>
                <th>Ruang</th>
                <th>Dosen</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa->krs as $krs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $krs->jadwal->matakuliah->nama_matakuliah ?? '-' }}</td>
                <td>{{ $krs->jadwal->hari ?? '-' }}</td>
                <td>{{ $krs->jadwal->jam_kuliah ?? '-' }}</td>
                <td>{{ $krs->jadwal->ruang ?? '-' }}</td>
                <td>{{ $krs->jadwal->dosen->nama_dosen ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center">Belum ada matakuliah yang diambil.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('krs.index') }}" class="tombol">Kembali</a>
</div>

@include('layout.footer')
