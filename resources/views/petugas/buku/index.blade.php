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
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Kode Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
            <tr>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->kodeBuku }}</td>
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