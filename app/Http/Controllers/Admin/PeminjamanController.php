<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    // Di dalam PeminjamanController
    public function riwayatPeminjaman()
    {
        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->get();

        return view('pengunjung.peminjaman.riwayat', compact('peminjaman'));
    }

    public function destroyForPengunjung($id)
    {
        $peminjaman = Peminjaman::where('user_id', auth()->id())
            ->findOrFail($id);
            
        $peminjaman->delete();
        
        return redirect()->back()
            ->with('success', 'Buku berhasil dikembalikan!');
    }

    // Di dalam PeminjamanController (app/Http/Controllers/Admin/PeminjamanController.php)
    public function createForPengunjung()
    {
        $buku = Buku::all();
        return view('pengunjung.peminjaman.create', compact('buku'));
    }

    public function storeForPengunjung(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
        ]);

        Peminjaman::create([
            'user_id' => auth()->id(), // Ambil ID pengunjung yang login
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => now(), // Tanggal sekarang
            'status' => 'Dipinjam',
            'buku_link' => 'Dalam pengembangan'
        ]);

        return redirect()->route('pengunjung.buku.index')
            ->with('success', 'Buku berhasil dipinjam!');
    }

    public function __construct()
    {
        $this->middleware('role:admin,petugas,pengunjung');
    }

    // Tampilkan semua peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->get();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    // Form tambah peminjaman
    public function create()
    {
        $users = User::where('role', 'pengunjung')->get();
        $buku = Buku::all();
        return view('admin.peminjaman.create', compact('users', 'buku'));
    }

    // Simpan peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        Peminjaman::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'buku_link' => 'Dalam pengembangan' // Temporary
        ]);

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Peminjaman berhasil dicatat!');
    }

    // Hapus peminjaman
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('admin.peminjaman.index')
            ->with('danger', 'Peminjaman dihapus!');
    }
}