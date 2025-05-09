@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Buku</h2>
    <form action="{{ route('admin.buku.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label>Jumlah Halaman</label>
            <input type="number" name="jumlahHalaman" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kode Buku</label>
            <input type="text" name="kodeBuku" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection