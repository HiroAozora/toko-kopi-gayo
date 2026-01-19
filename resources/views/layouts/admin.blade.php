<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Toko Kopi Gayo</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('kopi.png') }}" type="image/png">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-coffee: #4B3832;
            --color-latte: #BE9B7B;
            --color-cream: #FFF4E6;
            --color-leaf: #2C5F2D;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-cream);
        }

        .sidebar {
            background-color: var(--color-coffee);
            color: var(--color-cream);
            min-height: 100vh;
        }

        .sidebar a,
        .sidebar button {
            color: rgba(255, 244, 230, 0.7);
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 8px;
            transition: 0.3s;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
        }

        .sidebar a:hover,
        .sidebar a.active,
        .sidebar button:hover {
            background-color: var(--color-latte);
            color: var(--color-coffee);
            font-weight: 500;
        }

        .btn-coffee {
            background-color: var(--color-coffee);
            color: white;
        }

        .btn-coffee:hover {
            background-color: #3a2b26;
            color: white;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar (Desktop) -->
        <div class="sidebar p-3 d-none d-md-block" style="width: 280px; flex-shrink: 0;">
            <h4 class="mt-2 mb-4 ps-2 fw-bold"><i class="bi bi-cup-hot-fill me-2"></i>Toko Kopi Gayo</h4>
            <ul class="list-unstyled">
                <li class="mb-2"><a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i
                            class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.*') ? 'active' : '' }}"><i class="bi bi-tags me-2"></i>
                        Kategori</a></li>
                <li class="mb-2"><a href="{{ route('products.index') }}"
                        class="{{ request()->routeIs('products.*') ? 'active' : '' }}"><i
                            class="bi bi-box-seam me-2"></i> Produk</a></li>
                <li class="mb-2"><a href="{{ route('stocks.index') }}"
                        class="{{ request()->routeIs('stocks.*') ? 'active' : '' }}"><i
                            class="bi bi-clipboard-data me-2"></i> Stok Log</a></li>
                <li class="mt-4 mb-2"><a href="{{ route('home') }}" target="_blank"><i class="bi bi-globe me-2"></i>
                        Lihat
                        Website</a></li>
                <li class="mt-auto">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Mobile Header (Visible only on mobile) -->
        <!-- Content Area -->
        <div class="flex-grow-1">
            <!-- Mobile Navbar -->
            <nav class="navbar navbar-light bg-white shadow-sm d-md-none p-3">
                <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <span class="fw-bold ms-2">Admin Panel</span>
            </nav>

            <div class="p-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Mobile Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start sidebar" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li class="mb-2"><a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>
                        Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('products.index') }}"><i class="bi bi-box-seam me-2"></i>
                        Produk</a></li>
                <li class="mb-2"><a href="{{ route('stocks.index') }}"><i class="bi bi-clipboard-data me-2"></i> Stok
                        Log</a></li>
                <li class="mt-4 mb-2"><a href="{{ route('home') }}"><i class="bi bi-globe me-2"></i> Lihat Website</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Global Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                <div class="modal-body p-4 text-center">
                    <div class="mb-3 text-danger opacity-75">
                        <i class="bi bi-exclamation-circle-fill display-1"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Konfirmasi Hapus</h4>
                    <p class="text-muted mb-4">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat
                        dibatalkan.</p>
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                        <form id="deleteForm" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Delete Modal Script -->
    <script>
        const deleteModal = document.getElementById('deleteModal');
        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const action = button.getAttribute('data-action');
                const form = deleteModal.querySelector('#deleteForm');
                form.action = action;
            });
        }
    </script>
</body>

</html>
