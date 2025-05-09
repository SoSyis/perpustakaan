@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Buku</h2>
    <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
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
        
        <!-- Input Gambar dengan Preview -->
        <div class="mb-3">
            <label>Cover Buku</label>
            @if($buku->gambar)
                <div class="mb-2">
                    <img src="{{ asset('uploads/buku/' . $buku->gambar) }}" 
                         alt="Current Cover" 
                         style="max-width: 200px;"
                         class="img-thumbnail">
                    <div class="form-text">Gambar saat ini</div>
                </div>
            @endif
            <input type="file" name="gambar" class="form-control">
            <small class="text-muted">Format: JPEG/PNG, Maksimal 2MB</small>
        </div>

        <!-- Input Link Buku -->
        <div class="mb-3">
            <label>Link Buku (URL)</label>
            <input type="url" 
                   name="link_buku" 
                   class="form-control" 
                   value="{{ $buku->link_buku }}"
                   placeholder="Contoh: https://drive.google.com/...">
        </div>

        <div class="mb-3">
            <label>Kode Buku</label>
            <input type="text" name="kodeBuku" class="form-control" value="{{ $buku->kodeBuku }}" required>
        </div>
        
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection