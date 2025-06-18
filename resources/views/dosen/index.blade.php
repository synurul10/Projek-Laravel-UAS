@include('layout.header')
    <h3>Dosen</h3>
    <a href="{{ route('dosen.create') }}" class="tombol">Add Dosen</a>
    <table>
        <thead>
            <try>
                <th>ID</th>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Prodi</th>
                <th>Jabatan Akademik</th>
                <th>Pendidikan Terakhir</th>
                <th>Actions+</th>
            </try>
        </thead>
        <tbody>
            @php $no= 1; @endphp
            @foreach ($allDosen as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->nidn }}</td>
                <td>{{ $item->nama_dosen }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->prodi }}</td>
                <td>{{ $item->jabatan_akademik }}</td>
                <td>{{ $item->pendidikan_terakhir }}</td>
                <td>
                    <a href="{{ route('dosen.edit', $item->id) }}" class="tombol">Edit</a>
                    <form action="{{ route ('dosen.destroy', $item->id) }}" method="POST"
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