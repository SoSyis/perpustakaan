<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Online Digital</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        .hero-section {
            padding: 100px 0;
            background: linear-gradient(45deg, #f8f9fa, #e9ecef);
        }

        .library-img {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
        }

        .cta-button {
            transition: transform 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-3px);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">E-Library</a>
            
            <!-- Login Button -->
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-primary px-4">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary px-4">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Register
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Jelajahi Dunia Literasi Digital
                    </h1>
                    <p class="lead mb-4 text-muted">
                        Akses ribuan buku digital, jurnal ilmiah, dan materi pembelajaran 
                        secara online kapan saja dan di mana saja. Mulai petualangan 
                        membacamu sekarang!
                    </p>
                    <a href="{{ route('login') }}" class="cta-button btn btn-primary btn-lg px-5 py-3">
                        Mulai Jelajahi <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/perpus.png') }}"  alt="Library" class="library-img rounded-3">
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>