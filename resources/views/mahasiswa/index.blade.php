@include('layout.header')

<h3>Mahasiswa</h3>
<a href="{{ route('mahasiswa.create') }}" class="tombol">Add Mahasiswa</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Prodi</th>
            <th>Actions+</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($allMahasiswa as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->nim }}</td>
            <td>{{ $item->nama_mahasiswa }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->telepon }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->prodi->nama_prodi ?? '-' }}</td>
            <td>
                <a href="{{ route('mahasiswa.edit', $item->id) }}" class="tombol">Edit</a>
                <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                      style="display:inline;">
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
