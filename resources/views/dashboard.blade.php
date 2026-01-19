@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-bold text-dark">Dashboard Overview</h3>
        <p class="text-muted">Selamat datang kembali, Admin!</p>
    </div>

    <div class="row g-4 mb-4">
        <!-- Total Products Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 border-0"
                style="background: linear-gradient(135deg, #4B3832 0%, #6B4E46 100%); color: #FFF4E6;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-white-50 text-uppercase mb-2" style="letter-spacing: 1px;">Total Produk</h6>
                        <h2 class="display-4 fw-bold mb-0">{{ $totalProducts }}</h2>
                    </div>
                    <div class="opacity-25">
                        <i class="bi bi-box-seam display-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Low Stock Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 border-0"
                style="background: linear-gradient(135deg, #BE9B7B 0%, #D4B495 100%); color: #4B3832;">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-coffee text-uppercase mb-2 fw-bold" style="letter-spacing: 1px; opacity: 0.7;">Stok
                            Menipis</h6>
                        <h2 class="display-4 fw-bold mb-0">{{ $lowStock }}</h2>
                        <small class="fw-medium text-danger bg-white bg-opacity-25 px-2 py-1 rounded">Butuh Restock</small>
                    </div>
                    <div class="opacity-25">
                        <i class="bi bi-exclamation-triangle-fill display-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Logs -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="fw-bold mb-0 text-coffee">Aktivitas Stok Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Tanggal</th>
                                    <th>Produk</th>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentLogs as $log)
                                    <tr>
                                        <td class="ps-4 small text-muted">{{ $log->date->format('d/m/Y') }}</td>
                                        <td class="fw-medium text-dark">{{ $log->product->name ?? 'Produk Dihapus' }}</td>
                                        <td>
                                            @if ($log->type === 'in')
                                                <span
                                                    class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Masuk</span>
                                            @else
                                                <span
                                                    class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Keluar</span>
                                            @endif
                                        </td>
                                        <td class="fw-bold {{ $log->type === 'in' ? 'text-success' : 'text-danger' }}">
                                            {{ $log->type === 'in' ? '+' : '-' }}{{ $log->quantity }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Belum ada aktivitas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 text-center py-3">
                    <a href="{{ route('stocks.index') }}" class="text-decoration-none text-coffee fw-medium">Lihat Semua Log
                        <i class="bi bi-arrow-right s-1"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="fw-bold mb-0 text-coffee">Aksi Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <a href="{{ route('products.create') }}"
                            class="btn btn-coffee py-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-plus-circle fs-4 me-2"></i>
                            <span class="fw-bold">Tambah Produk</span>
                        </a>
                        <a href="{{ route('stocks.create') }}"
                            class="btn btn-outline-dark py-3 d-flex align-items-center justify-content-center"
                            style="border-color: #4B3832; color: #4B3832;">
                            <i class="bi bi-box-seam fs-4 me-2"></i>
                            <span class="fw-bold">Update Stok</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
