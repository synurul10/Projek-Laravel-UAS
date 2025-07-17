@extends('layout.main')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">🎓 Selamat Datang di Sistem Informasi Akademik</h2>
        <p class="text-muted">Gunakan sistem ini untuk mengelola data mahasiswa, dosen, matakuliah, jadwal, dan KRS secara efisien.</p>
    </div>

    {{-- Ringkasan Dashboard --}}
    <div class="d-flex flex-wrap gap-4 justify-content-center">
        <div class="info-box shadow-sm" style="background-color: #e0f7e9;">
            <h4 class="mb-1">📚 Mahasiswa</h4>
            <p class="text-muted mb-0">{{ $jumlahMahasiswa }} terdaftar</p>
        </div>
        <div class="info-box shadow-sm" style="background-color: #e3f6f9;">
            <h4 class="mb-1">👨‍🏫 Dosen</h4>
            <p class="text-muted mb-0">{{ $jumlahDosen }} terdaftar</p>
        </div>
        <div class="info-box shadow-sm" style="background-color: #fde2e4;">
            <h4 class="mb-1">🏫 Prodi</h4>
            <p class="text-muted mb-0">{{ $jumlahProdi }} program</p>
        </div>
        <div class="info-box shadow-sm" style="background-color: #fff7d6;">
            <h4 class="mb-1">📖 Matakuliah</h4>
            <p class="text-muted mb-0">{{ $jumlahMatakuliah }} mata kuliah</p>
        </div>
    </div>

    {{-- Navigasi Cepat --}}
    <div class="mt-5 text-center">
        <h5 class="mb-3">🚀 Navigasi Cepat</h5>
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-success">📚 Data Mahasiswa</a>
            <a href="{{ route('dosen.index') }}" class="btn btn-outline-primary">👨‍🏫 Data Dosen</a>
            <a href="{{ route('prodi.index') }}" class="btn btn-outline-danger">🏫 Data Prodi</a>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-outline-warning">📖 Matakuliah</a>
            <a href="{{ route('jadwal.index') }}" class="btn btn-outline-info">📅 Jadwal</a>
            <a href="{{ route('krs.index') }}" class="btn btn-outline-dark">📝 Data KRS</a>
        </div>
    </div>

    <div class="text-center mt-5 text-muted">
        <small>© {{ now()->year }} Sistem Informasi Akademik</small>
    </div>
</div>

{{-- Tambahan Style --}}
<style>
    .info-box {
        flex: 1 1 220px;
        padding: 25px;
        border-radius: 15px;
        transition: 0.3s ease;
        text-align: center;
    }

    .info-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
