@include('layout.header')

<h3>Data KRS</h3>
<a href="{{ route('krs.create') }}" class="tombol">Tambah KRS</a>

<table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead style="background-color: #007bff; color: white;">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Prodi</th>
            <th>Jumlah Matakuliah</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($allKrs as $krs)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $krs->mahasiswa->nama_mahasiswa }}</td>
            <td>{{ $krs->prodi->nama_prodi }}</td>
            <td>{{ $krs->mahasiswa->krs->count() }} matakuliah</td>
           <td>
    <a href="{{ route('krs.show', $krs->mahasiswa_id) }}" class="tombol">Detail</a>

    @if($krs->first_krs)
    <a href="{{ route('krs.edit', $firstKrs->id) }}" class="btn btn-primary btn-sm">Edit</a>

<form action="{{ route('krs.destroy', $firstKrs->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Yakin hapus salah satu data KRS mahasiswa ini?')" class="btn btn-primary btn-sm">Delete</button>
</form>

@endif

</td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('layout.footer')


