<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Perpustakaan Digital</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .sidebar {
            height: 100vh;
            background: #2c3e50;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .main-content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar p-4">
                <h4>Menu {{ Auth::user()->role }}</h4>
                <p>Role Anda: {{ Auth::user()->role }}</p>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item mb-3">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="{{ route('profile.edit') }}" class="nav-link">Profil (GUNAKAN < UNTUK KEMBALI)</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">Kelola Petugas  (Khusus Role Admin)</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="{{ route('admin.buku.index') }}" class="nav-link">Kelola Buku</a>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="{{ route('admin.peminjaman.index') }}" class="nav-link">Kelola peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Konten Utama -->
            <div class="col-md-9 main-content">
                @yield('content') <!-- Ini area untuk konten halaman -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>