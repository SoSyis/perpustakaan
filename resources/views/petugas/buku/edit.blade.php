@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Buku</h2>
    <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
        </div>
        <div class="mb-3">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" rows="3" required>{{ $buku->sinopsis }}</textarea>
        </div>
        <div class="mb-3">
            <label>Jumlah Halaman</label>
            <input type="number" name="jumlahHalaman" class="form-control" value="{{ $buku->jumlahHalaman }}" required>
        </div>
        <div class="mb-3">
            <label>Kode Buku</label>
            <input type="text" name="kodeBuku" class="form-control" value="{{ $buku->kodeBuku }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection