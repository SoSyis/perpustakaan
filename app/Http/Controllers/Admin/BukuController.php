<?php

namespace App\Http\Controllers\Admin;

use id;
use index;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    // Di dalam BukuController (app/Http/Controllers/Admin/BukuController.php)
    public function indexForPengunjung(Request $request)
    {
        $query = Buku::query();
    
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
    
        $bukus = $query->get();
    
        return view('pengunjung.buku.buku', compact('bukus'));
    }
    

    public function showForPengunjung($id)
    {
        $buku = Buku::findOrFail($id);
        return view('pengunjung.buku.show', compact('buku'));
    }

    public function showSudahPinjam($id)
    {
        $buku = Buku::findOrFail($id);

        $peminjaman = Peminjaman::where('buku_id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('pengunjung.buku.sudahpinjam', compact('buku', 'peminjaman'));
    }

    // Hanya admin/petugas yang bisa akses
    public function __construct()
    {
        $this->middleware('role:admin,petugas,pengunjung');
    }

    // Tampilkan daftar buku
    public function index()
    {
        $bukus = Buku::all();
        return view('admin.buku.index', compact('bukus'));

            $query = Buku::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('judul', 'like', '%' . $request->search . '%');
    }

    $bukus = $query->get(); // atau paginate jika kamu pakai pagination

    return view('pengunjung.buku.buku', compact('bukus'));
    }

    // Form tambah buku
    public function create()
    {
        return view('admin.buku.create');
    }

    // Simpan buku baru
public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'sinopsis' => 'required',
        'jumlahHalaman' => 'required|numeric',
        'kodeBuku' => 'required|unique:bukus',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'link_buku' => 'nullable|url'
    ]);

    $data = $request->except('gambar');

    // Upload gambar
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('uploads/buku'), $namaGambar);
        $data['gambar'] = $namaGambar;
    }

    Buku::create($data);

    return redirect()->route('admin.buku.index')
        ->with('success', 'Buku berhasil ditambahkan!');
}

    // Form edit buku
    public function edit(Buku $buku)
    {
        return view('admin.buku.edit', compact('buku'));
    }

    // Update buku
public function update(Request $request, Buku $buku)
{
        $request->validate([
        // ... validasi lainnya
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'link_buku' => 'nullable|url'
    ]);

    $data = $request->except('gambar');

    // Update gambar
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama
        if ($buku->gambar && file_exists(public_path('uploads/buku/' . $buku->gambar))) {
            unlink(public_path('uploads/buku/' . $buku->gambar));
        }

        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('uploads/buku'), $namaGambar);
        $data['gambar'] = $namaGambar;
    }

    $buku->update($data);

    return redirect()->route('admin.buku.index')
        ->with('success', 'Buku berhasil diperbarui!');
}

    // Hapus buku
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}