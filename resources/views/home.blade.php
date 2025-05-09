@extends('layouts.pengunjung')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Selamat Datang, {{ Auth::user()->role }} Hebat!</h1>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('pengunjung.buku.index') }}" class="text-decoration-none text-dark">
                        Daftar Buku
                    </a></h5>
                    <p class="card-text">Daftar buku terpopuler bulan ini.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('pengunjung.peminjaman.create') }}" class="text-decoration-none text-dark">
                        Pinjam Buku
                    </a></h5>
                    <p class="card-text">Pinjam Buku Online.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('pengunjung.peminjaman.riwayat') }}" class="text-decoration-none text-dark">
                        Riwayat Peminjaman
                    </a></h5>
                    <p class="card-text">Lihat riwayat peminjaman Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Tambahkan CSS khusus jika diperlukan -->
<style>
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>