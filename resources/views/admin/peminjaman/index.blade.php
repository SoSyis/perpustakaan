@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Peminjaman</h2>
    <a href="{{ route('admin.peminjaman.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
                <th>Link Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $p)
            <tr>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->buku->judul }}</td>
                <td>{{ $p->tanggal_pinjam }}</td>
                <td>{{ $p->status }}</td>
                <td class="text-danger">{{ $p->buku_link ?? 'Fitur dalam pengembangan' }}</td>
                <td>
                    <form action="{{ route('admin.peminjaman.destroy', $p->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Hapus data peminjaman?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection