@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Peminjaman</h2>
    <form action="{{ route('admin.peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Peminjam</label>
            <select name="user_id" class="form-select" required>
                <option value="">Pilih Pengunjung</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label>Buku</label>
            <select name="buku_id" class="form-select" required>
                <option value="">Pilih Buku</option>
                @foreach($buku as $b)
                    <option value="{{ $b->id }}">{{ $b->judul }} ({{ $b->kodeBuku }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection