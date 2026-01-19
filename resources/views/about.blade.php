<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Toko Kopi Gayo</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('kopi.png') }}" type="image/png">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --color-coffee: #4B3832;
            --color-latte: #BE9B7B;
            --color-cream: #FFF4E6;
            --color-leaf: #2C5F2D;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fafafa;
        }

        h1,
        h2,
        h3,
        .serif {
            font-family: 'Playfair Display', serif;
        }

        .navbar {
            background-color: white;
        }

        .text-coffee {
            color: var(--color-coffee);
        }

        .bg-coffee {
            background-color: var(--color-coffee);
        }

        .btn-coffee {
            background-color: var(--color-coffee);
            color: white;
            border-radius: 30px;
            padding: 10px 25px;
            transition: 0.3s;
        }

        .btn-coffee:hover {
            background-color: #3a2b26;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold serif fs-4 text-coffee" href="{{ route('home') }}"><i
                    class="bi bi-cup-hot-fill me-2"></i>Toko Kopi Gayo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#catalog">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link active fw-semibold text-coffee"
                            href="{{ route('about') }}">Tentang</a></li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-dark rounded-pill px-4 btn-sm">
                            <i class="bi bi-person-circle me-1"></i> Admin Area
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="py-5 mt-5 bg-coffee text-white text-center">
        <div class="container py-5">
            <h1 class="display-4 fw-bold mb-3">Tentang Kami</h1>
            <p class="lead opacity-75">Mengenal lebih dekat Toko Kopi Gayo dan perjalanan kami.</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="py-5">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div
                        style="height: 400px; width: 100%; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                        <img src="https://images.unsplash.com/photo-1586095516671-d085ff58cdd4?q=80&w=687&auto=format&fit=crop"
                            alt="Kopi Gayo" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="text-uppercase text-coffee fw-bold letter-spacing-2">Sejarah Kami</span>
                    <h2 class="display-5 fw-bold mt-2 mb-4">Dari Dataran Tinggi ke Cangkir Anda</h2>
                    <p class="text-muted fs-5">Toko Kopi Gayo lahir dari hasrat untuk memperkenalkan kekayaan cita rasa
                        kopi asli tanah Gayo, Aceh, kancah yang lebih luas. Kami bekerjasama langsung dengan para petani
                        lokal yang penuh dedikasi.</p>
                    <p class="text-muted">Kami percaya bahwa kopi bukan sekadar minuman, melainkan sebuah cerita tentang
                        tanah, iklim, dan tangan-tangan terampil yang merawatnya. Setiap biji yang kami sajikan telah
                        melalui proses seleksi ketat untuk memastikan kualitas terbaik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-4 text-center">
                <div class="col-md-6">
                    <div class="p-5 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-eye text-coffee display-4 mb-4"></i>
                        <h3 class="fw-bold mb-3">Visi Kami</h3>
                        <p class="text-muted">Menjadi penyedia kopi Gayo terbaik yang tidak hanya mengedepankan kualitas
                            rasa, tetapi juga kesejahteraan petani dan keberlanjutan lingkungan.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-5 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-bullseye text-coffee display-4 mb-4"></i>
                        <h3 class="fw-bold mb-3">Misi Kami</h3>
                        <ul class="text-start text-muted">
                            <li class="mb-2">Menyajikan produk kopi asli Gayo dengan standar kualitas premium.</li>
                            <li class="mb-2">Mendukung ekonomi lokal melalui kemitraan yang adil dengan petani.</li>
                            <li class="mb-2">Memberikan pelayanan terbaik dan edukasi kopi kepada pelanggan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-coffee text-white py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <h4 class="serif mb-3"><i class="bi bi-cup-hot-fill me-2"></i>Toko Kopi Gayo</h4>
                    <p class="opacity-75">Sistem informasi dan katalog digital untuk Toko Kopi Gayo. Menyajikan rasa
                        terbaik dari dataran tinggi.</p>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <h5 class="fw-bold mb-3">Tautan</h5>
                    <ul class="list-unstyled opacity-75">
                        <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Beranda</a></li>
                        <li><a href="{{ route('home') }}#catalog" class="text-white text-decoration-none">Katalog</a>
                        </li>
                        <li><a href="{{ route('about') }}" class="text-white text-decoration-none">Tentang</a></li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <h5 class="fw-bold mb-3">Hubungi Kami</h5>
                    <p class="opacity-75 mb-1"><i class="bi bi-geo-alt me-2"></i> Jl. Takengon - Bireuen, Aceh Tengah
                    </p>
                    <p class="opacity-75"><i class="bi bi-envelope me-2"></i> hello@tokokopigayo.com</p>
                </div>
            </div>
            <hr class="opacity-25 my-4">
            <div class="text-center opacity-50 small">
                &copy; {{ date('Y') }} Toko Kopi Gayo. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
