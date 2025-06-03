@include('layout.header')
    <h3>Prodi List</h3>
    <a href="{{ route('prodi.create') }}" class="tombol">Add Prodi</a>
    <table>
        <thead>
            <try>
                <th>ID</th>
                <th>Kode Prodi</th>
                <th>Nama Prodi</th>
                <th>Jenjang</th>
                <th>Fakultas</th>
                <th>Actions+</th>
            </try>
        </thead>
        <tbody>
            @php $no= 1; @endphp
            @foreach ($allProdi as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->kode_prodi }}</td>
                <td>{{ $item->nama_prodi }}</td>
                <td>{{ $item->jenjang }}</td>
                <td>{{ $item->fakultas }}</td>
                <td>
                    <a href="{{ route('prodi.edit', $item->id) }}" class="tombol">Edit</a>
                    <form action="{{ route ('prodi.destroy', $item->id) }}" method="POST"
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