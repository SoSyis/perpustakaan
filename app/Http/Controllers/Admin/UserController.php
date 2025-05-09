<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Hanya admin yang bisa akses
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    // Tampilkan daftar user dengan role 'petugas'
    public function index()
    {
        $users = User::where('role', 'petugas')->get();
        return view('admin.users.index', compact('users'));
    }

    // Form tambah user dengan role 'petugas'
    public function create()
    {
        return view('admin.users.create');
    }

    // Simpan user baru dengan role 'petugas'
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas', // Set role secara otomatis
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Petugas berhasil ditambahkan!');
    }

    // Form edit user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Petugas berhasil diperbarui!');
    }

    // Hapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'Petugas berhasil dihapus!');
    }
}