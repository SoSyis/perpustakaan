@extends('layouts.pengunjung')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Form Peminjaman Buku</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pengunjung.peminjaman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Pilih Buku</label>
                    <select name="buku_id" class="form-select" required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach($buku as $b)
                        <option value="{{ $b->id }}">
                            {{ $b->judul }} ({{ $b->kodeBuku }})
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="text" 
                           class="form-control" 
                           value="{{ now()->format('d F Y') }}" 
                           readonly>
                </div>

                <button type="submit" class="btn btn-primary">
                    Pinjam Buku
                </button>
            </form>
        </div>
    </div>
</div>
@endsection