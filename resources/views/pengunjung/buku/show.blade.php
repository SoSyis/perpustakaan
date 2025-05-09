@extends('layouts.pengunjung')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Detail Buku</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h3>{{ $buku->judul }}</h3>
                    <p class="text-muted">Oleh: {{ $buku->penulis }}</p>
                    <hr>
                    <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                    <p><strong>Jumlah Halaman:</strong> {{ $buku->jumlahHalaman }}</p>
                    <p><strong>Kode Buku:</strong> {{ $buku->kodeBuku }}</p>
                    <h5 class="mt-4">Sinopsis Lengkap:</h5>
                    <p>{{ $buku->sinopsis }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <!-- Tempat untuk gambar buku (opsional) -->
                    <img src="{{ asset('uploads/buku/' . $buku->gambar) }}" 
                    class="img-fluid rounded" 
                    alt="Cover Buku"
                    onerror="this.src='https://via.placeholder.com/200x300/CCCCCC/808080?text=Sampul+Buku'">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('pengunjung.buku.index') }}" class="btn btn-secondary">
                Kembali ke Daftar Buku
            </a>
        </div>
    </div>
</div>
@endsection