@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Daftar Kategori</h3>
        <a href="{{ route('categories.create') }}" class="btn btn-coffee shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Produk</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <td class="ps-4">{{ $categories->firstItem() + $key }}</td>
                                <td class="fw-medium">{{ $category->name }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($category->description, 50) }}</td>
                                <td><span
                                        class="badge bg-secondary bg-opacity-10 text-dark">{{ $category->products_count ?? 0 }}
                                        Produk</span></td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-action="{{ route('categories.destroy', $category->id) }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">Belum ada kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
@endsection
