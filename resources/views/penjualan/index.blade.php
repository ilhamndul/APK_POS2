@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')
<div class="container my-4">

    {{-- Alert Error --}}
    @if(session('errors'))
    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
        {{ session('errors') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Riwayat Penjualan</h3>
            <p class="text-muted small mb-0">Kelola dan pantau seluruh transaksi penjualan</p>
        </div>
        <a href="{{ route('penjualan.create') }}" class="btn btn-primary px-3 shadow-sm rounded-2">
            <i class="bi bi-plus-lg me-1"></i> Create
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-header bg-white py-3 border-0">
            <form action="{{ route('penjualan.index') }}" method="GET">
                <div class="row g-2 align-items-center">
                    <!-- Form Search -->
                    <div class="col-md-5">
                        <div class="input-group">
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari nama atau email..."
                                value="{{ request('search') }}">
                        </div>
                    </div>

                    <!-- Filter Tanggal Mulai & Selesai -->
                    <div class="col-md-3">
                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}" placeholder="Dari Tanggal">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}" placeholder="Sampai Tanggal">
                    </div>

                    <!-- Tombol Aksi Filter -->
                    <div class="col-md-1 d-flex gap-1">
                        <button class="btn btn-primary w-100" title="Cari / Filter">
                            <i class="bi bi-search"></i>
                        </button>
                        @if(request('search') || request('start_date') || request('end_date'))
                            <a href="{{ route('penjualan.index') }}" class="btn btn-secondary w-100" title="Reset Filter">
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="ps-3" style="width: 50px;">#</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Kasir</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                    <tr>
                        <th scope="row" class="ps-3 fw-bold text-muted">{{ $sales->firstItem() + $loop->index }}</th>
                        <td>{{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}</td>
                        <td class="fw-semibold text-dark">{{ $sale->user->name }}</td>
                        <td class="fw-bold text-primary">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</td>
                        <td>
                            @if(strtoupper($sale->metode_pembayaran) == 'QRIS')
                                <span class="badge bg-info text-dark px-2 py-1">QRIS</span>
                            @else
                                <span class="badge bg-secondary px-2 py-1">{{ $sale->metode_pembayaran }}</span>
                            @endif
                        </td>
                        <td>
                            @if(strtoupper($sale->status) == 'COMPLETED')
                                <span class="badge bg-success-subtle text-success border border-success px-2 py-1">COMPLETED</span>
                            @else
                                <span class="badge bg-warning-subtle text-warning border border-warning px-2 py-1">{{ strtoupper($sale->status) }}</span>
                            @endif
                        </td>
                        <td class="text-center pe-3">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('penjualan.show', $sale->id) }}" class="btn btn-sm btn-primary rounded-2">Detail</a>

                        

                                @can('view', $sale)
                                    <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-sm btn-warning rounded-2">Edit</a>
                                @endcan

                                @can('delete', $sale)
                                    <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger rounded-2" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Data Tidak Ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($sales->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            <div class="d-flex justify-content-end">
                {{ $sales->links() }}
            </div>
        </div>
        @endif

    </div>
</div>
@endsection