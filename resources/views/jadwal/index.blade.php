@include('layout.header')

<h3>Data Jadwal</h3>
<a href="{{ route('jadwal.create') }}" class="tombol">Tambah Jadwal</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Dosen</th>
            <th>Program Studi</th>
            <th>Matakuliah</th>
            <th>Hari</th>
            <th>Jam Kuliah</th>
            <th>Ruang</th>
            <th>Actions+</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($allJadwal as $jadwal)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $jadwal->dosen->nama_dosen }}</td>
                <td>{{ $jadwal->prodi->nama_prodi }}</td>
                <td>{{ $jadwal->matakuliah->nama_matakuliah }}</td>
                <td>{{ $jadwal->hari }}</td>
                <td>{{ $jadwal->jam_kuliah }}</td>
                <td>{{ $jadwal->ruang }}</td>
                <td>
                    <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="tombol">Edit</a>
                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST"
                        onclick="return confirm('Yakin ingin menghapus jadwal ini?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('layout.footer')
