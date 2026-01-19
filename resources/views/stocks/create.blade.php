@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Catat Perubahan Stok</h3>
        <a href="{{ route('stocks.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            <form action="{{ route('stocks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="product_id" class="form-label">Produk</label>
                    <select class="form-select" id="product_id" name="product_id" required>
                        <option value="" selected disabled>Pilih Produk...</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} (Stok: {{ $product->stock }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="type" class="form-label">Jenis</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="in">Barang Masuk (In)</option>
                            <option value="out">Barang Keluar (Out)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="note" class="form-label">Catatan (Opsional)</label>
                    <textarea class="form-control" id="note" name="note" rows="2"></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-coffee px-4">
                        <i class="bi bi-save me-1"></i> Simpan Stok Log
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
