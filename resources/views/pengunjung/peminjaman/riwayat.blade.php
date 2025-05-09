@extends('layouts.pengunjung')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>Riwayat Peminjaman Anda</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Kode Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Detail</th>
                        <th>Kembalikan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $p)
                    <tr>
                        <td>{{ $p->buku->judul }}</td>
                        <td>{{ $p->buku->kodeBuku }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('pengunjung.buku.sudahpinjam', $p->buku->id) }}" 
                               class="btn btn-sm btn-primary">
                                Lihat Buku
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('pengunjung.peminjaman.destroy', $p->id) }}" 
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin mengembalikan buku?')">
                                    Kembalikan
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada riwayat peminjaman</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
