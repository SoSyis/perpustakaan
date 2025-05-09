@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Buku</h2>
    <a href="{{ route('admin.buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Kode Buku</th>
                <th>Link Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
            <tr>
                <td>
                    @if($buku->gambar)
                        <img src="{{ asset('uploads/buku/' . $buku->gambar) }}" 
                             alt="{{ $buku->judul }}" 
                             style="width: 100px; height: auto; object-fit: cover;"
                             onerror="this.src='https://via.placeholder.com/100x150?text=No+Image'">
                    @else
                        <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->kodeBuku }}</td>
                <td>
                    @if($buku->link_buku)
                        <a href="{{ $buku->link_buku }}" target="_blank" class="text-decoration-none link-break">
                        {{ $buku->link_buku }}
                        </a>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus buku?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
    .link-break {
        display: inline-block;
        max-width: 200px; /* bisa disesuaikan */
        word-wrap: break-word;
        word-break: break-all;
        white-space: normal;
    }
</style>