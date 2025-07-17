<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
    {{-- Tampilkan navbar hanya jika bukan di halaman home --}}
    @if (!Request::is('home'))
    <div class="nav">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('prodi.index') }}">Prodi</a></li>
            <li><a href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
            <li><a href="{{ route('dosen.index') }}">Dosen</a></li>
            <li><a href="{{ route('matakuliah.index') }}">Matakuliah</a></li>
            <li><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
            <li><a href="{{ route('krs.index') }}">KRS</a></li>
        </ul>
    </div>
    @endif
