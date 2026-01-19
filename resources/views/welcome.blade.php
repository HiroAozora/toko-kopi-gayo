<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kopi Gayo - Cita Rasa Asli</title>
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
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
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
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(75, 56, 50, 0.3);
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1497935586351-b67a49e012bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 80vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .product-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: 0.3s;
            background: white;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .product-img-wrapper {
            height: 250px;
            overflow: hidden;
            background: #f8f9fa;
            position: relative;
        }

        .product-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.5s;
        }

        .product-card:hover .product-img-wrapper img {
            transform: scale(1.05);
        }

        .stock-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.9);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--color-coffee);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold serif fs-4 text-coffee" href="#"><i
                    class="bi bi-cup-hot-fill me-2"></i>Toko Kopi Gayo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#catalog">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang</a></li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-dark rounded-pill px-4 btn-sm">
                            <i class="bi bi-person-circle me-1"></i> Admin Area
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Cita Rasa Asli Tanah Gayo</h1>
            <p class="lead mb-4 fs-4 fw-light">Nikmati keaslian kopi Gayo terbaik langsung dari petani.</p>
            <a href="#catalog" class="btn btn-coffee btn-lg">Lihat Produk Kami</a>
        </div>
    </header>

    <!-- Catalog Section -->
    <section id="catalog" class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-uppercase text-coffee fw-bold letter-spacing-2">Pilihan Terbaik</span>
                <h2 class="display-5 fw-bold mt-2">Katalog Kopi</h2>
                <div class="mx-auto mt-3" style="width: 60px; height: 3px; background: var(--color-latte);"></div>
            </div>

            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-md-6 col-lg-3">
                        <div class="product-card h-100" data-bs-toggle="modal"
                            data-bs-target="#productModal{{ $product->id }}">
                            <div class="product-img-wrapper">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <div
                                        class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-image fs-1"></i>
                                    </div>
                                @endif
                                <div class="stock-badge">
                                    @if ($product->stock > 0)
                                        Stok: {{ $product->stock }}
                                    @else
                                        <span class="text-danger">Habis</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body p-4 text-center">
                                <span
                                    class="badge bg-light text-coffee border border-coffee rounded-pill mb-2 px-3">{{ $product->category->name ?? 'Kopi' }}</span>
                                <h5 class="card-title fw-bold mb-1">{{ $product->name }}</h5>
                                <h5 class="text-coffee fw-bold mt-2">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</h5>
                            </div>
                        </div>

                        <!-- Modal Detail Produk -->
                        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content border-0 overflow-hidden" style="border-radius: 20px;">
                                    <div class="row g-0">
                                        <div class="col-md-6 bg-light" style="min-height: 400px;">
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    class="w-100 h-100" style="object-fit: cover;"
                                                    alt="{{ $product->name }}">
                                            @else
                                                <div
                                                    class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                                    <i class="bi bi-image fs-1"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-5 d-flex flex-column h-100 justify-content-center">
                                                <button type="button" class="btn-close ms-auto mb-3"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>

                                                <span
                                                    class="badge bg-coffee w-auto align-self-start mb-3">{{ $product->category->name ?? 'Kopi' }}</span>
                                                <h2 class="fw-bold text-coffee mb-2">{{ $product->name }}</h2>
                                                <h3 class="mb-4 text-dark">Rp
                                                    {{ number_format($product->price, 0, ',', '.') }}</h3>

                                                <div class="mb-4">
                                                    <small class="text-uppercase text-muted fw-bold">Deskripsi</small>
                                                    <p class="text-muted mt-2">{{ $product->description }}</p>
                                                </div>

                                                <div
                                                    class="alert {{ $product->stock > 0 ? 'alert-light border' : 'alert-danger' }} d-flex align-items-center mb-4">
                                                    <i
                                                        class="bi {{ $product->stock > 0 ? 'bi-box-seam' : 'bi-x-circle' }} me-2"></i>
                                                    <div>
                                                        <strong>Stok Tersedia:</strong>
                                                        {{ $product->stock > 0 ? $product->stock . ' pcs' : 'Habis' }}
                                                    </div>
                                                </div>

                                                @if ($product->stock > 0)
                                                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20membeli%20{{ urlencode($product->name) }}"
                                                        target="_blank"
                                                        class="btn btn-coffee w-100 btn-lg rounded-pill">
                                                        <i class="bi bi-whatsapp me-2"></i> Pesan Sekarang
                                                    </a>
                                                @else
                                                    <button class="btn btn-secondary w-100 btn-lg rounded-pill"
                                                        disabled>Stok Habis</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">Belum ada produk yang tersedia saat ini.</p>
                    </div>
                @endforelse
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
