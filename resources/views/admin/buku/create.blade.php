@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Buku</h2>
    <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
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
            <label>Cover Buku</label>
            <input type="file" name="gambar" class="form-control">
            <small class="text-muted">Format: JPEG/PNG, Maksimal 2MB</small>
        </div>
            <div class="mb-3">
            <label>Link Buku (URL)</label>
            <input type="url" name="link_buku" class="form-control" 
            placeholder="Contoh: https://drive.google.com/...">
        </div> 
        <div class="mb-3">
            <label>Kode Buku</label>
            <input type="text" name="kodeBuku" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection