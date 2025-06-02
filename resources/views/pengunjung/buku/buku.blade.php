@extends('layouts.pengunjung')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Buku Perpustakaan</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('pengunjung.buku.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul..."
                value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <div class="row">
        @forelse ($bukus as $buku)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <!-- Tambahkan foto di sini -->
                <img src="{{ asset('uploads/buku/' . $buku->gambar) }}" 
                    class="card-img-top" 
                    alt="{{ $buku->judul }}"
                    style="object-fit: cover; height: 300px;">
                
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('pengunjung.buku.show', $buku->id) }}" 
                        class="text-decoration-none text-dark">
                            {{ $buku->judul }}
                        </a>
                    </h5>
                    <p class="card-text">
                        {{ Str::limit($buku->sinopsis, 100) }}
                    </p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">Tidak ada data buku</p>
        @endforelse
    </div>
</div>
@endsection
