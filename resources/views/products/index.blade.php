@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Daftar Produk</h3>
        <a href="{{ route('products.create') }}" class="btn btn-coffee shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Produk
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $key => $product)
                            <tr>
                                <td class="ps-4">{{ $products->firstItem() + $key }}</td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="rounded" width="50" height="50" style="object-fit: cover;">
                                    @else
                                        <div class="bg-secondary bg-opacity-10 rounded d-flex align-items-center justify-content-center text-muted"
                                            style="width: 50px; height: 50px;">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="fw-medium">{{ $product->name }}</td>
                                <td><span
                                        class="badge bg-secondary bg-opacity-10 text-dark border">{{ $product->category->name ?? '-' }}</span>
                                </td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>
                                    @if ($product->stock <= 5)
                                        <span class="badge bg-danger">Stok Menipis ({{ $product->stock }})</span>
                                    @else
                                        <span class="badge bg-success bg-opacity-75">{{ $product->stock }}</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-action="{{ route('products.destroy', $product->id) }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">Belum ada data produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
@endsection
