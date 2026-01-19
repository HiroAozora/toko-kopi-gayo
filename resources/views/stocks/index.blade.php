@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">Riwayat Stok Log</h3>
        <a href="{{ route('stocks.create') }}" class="btn btn-coffee shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Catat Stok Baru
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Tanggal</th>
                            <th>Produk</th>
                            <th>Tipe</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td class="ps-4">{{ $log->date->format('d M Y') }}</td>
                                <td class="fw-medium">{{ $log->product->name ?? 'Produk Dihapus' }}</td>
                                <td>
                                    @if ($log->type === 'in')
                                        <span class="badge bg-success bg-opacity-10 text-success"><i
                                                class="bi bi-arrow-down-circle me-1"></i> Masuk</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger"><i
                                                class="bi bi-arrow-up-circle me-1"></i> Keluar</span>
                                    @endif
                                </td>
                                <td class="fw-bold {{ $log->type === 'in' ? 'text-success' : 'text-danger' }}">
                                    {{ $log->type === 'in' ? '+' : '-' }}{{ $log->quantity }}
                                </td>
                                <td class="text-muted small">{{ $log->note ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">Belum ada riwayat stok.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">
        {{ $logs->links('pagination::bootstrap-5') }}
    </div>
@endsection
