@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Tambah Produk Baru</h3>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm" style="max-width: 800px;">
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" selected disabled>Pilih Kategori...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="price" class="form-label">Harga (IDR)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok Awal</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}"
                            placeholder="Masukkan jumlah stok awal (opsional)" min="0">
                        <div class="form-text">Biarkan kosong jika stok 0.</div>
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="image" class="form-label">Gambar Produk</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, JPEG. Max: 2MB.</div>
                    </div>

                    <div class="col-12 mt-4 text-end">
                        <button type="submit" class="btn btn-coffee px-4 py-2">
                            <i class="bi bi-save me-1"></i> Simpan Produk
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
