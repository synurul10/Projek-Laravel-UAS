@include('layout.header')

<h3>Daftar Mata Kuliah</h3>
<a href="{{ route('matakuliah.create') }}" class="tombol">Add Matakuliah</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th>Dosen Pengampu</th>
            <th>Program Studi</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($allMatakuliah as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kode_matakuliah }}</td>
            <td>{{ $item->nama_matakuliah }}</td>
            <td>{{ $item->sks }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->dosen->nama_dosen ?? '-' }}</td>
            <td>{{ $item->prodi->nama_prodi ?? '-' }}</td>
            <td>
                <a href="{{ route('matakuliah.edit', $item->id) }}" class="tombol">Edit</a>
                <form action="{{ route('matakuliah.destroy', $item->id) }}" method="POST"
                    style="display:inline;" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
