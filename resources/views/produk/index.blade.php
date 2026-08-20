@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h1 class="h3 fw-semibold mb-1">Daftar Produk</h1>
            <p class="text-secondary small mb-0">Kelola daftar produk dan stok toko.</p>
        </div>
        @can('create', App\Models\Produk::class)
        <a href="{{ route('produk.create') }}" class="btn btn-primary d-flex align-items-center gap-1">
            <i class="bi bi-plus-lg"></i> Tambah produk
        </a>
        @endcan
    </div>

    {{-- Search Bar --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('produk.index') }}" method="GET">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-secondary"></i>
                    </span>
                    <input
                        type="text"
                        name="search"
                        class="form-control border-start-0"
                        placeholder="Search nama produk"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary px-4" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Produk --}}
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-dark small fw-bold">#</th>
                        <th scope="col" class="text-dark small fw-bold">USER</th>
                        <th scope="col" class="text-dark small fw-bold">FOTO</th>
                        <th scope="col" class="text-dark small fw-bold">NAMA JENIS</th>
                        <th scope="col" class="text-dark small fw-bold">NAMA PRODUK</th>
                        <th scope="col" class="text-dark small fw-bold">HARGA BELI</th>
                        <th scope="col" class="text-dark small fw-bold">HARGA JUAL</th>
                        <th scope="col" class="text-dark small fw-bold">STOK</th>
                        <th scope="col" class="text-dark small fw-bold text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td class="text-secondary">{{ $products->firstItem() + $loop->index }}</td>
                        <td class="text-secondary">{{ $product->user->name ?? '-' }}</td>
                        <td>
                            @if($product->foto)
                                <img src="{{ asset('storage/'.$product->foto) }}"
                                     width="36" height="36"
                                     class="rounded-2 object-fit-cover border" alt="Foto Produk">
                            @else
                                <div class="rounded-2 border bg-light d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    <i class="bi bi-image text-muted small"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-bold text-dark">{{ $product->jenis->nama_jenis ?? '-' }}</td>
                        <td class="fw-bold text-dark">{{ $product->nama }}</td>
                        <td class="text-secondary">Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                        <td class="text-success fw-medium">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td>
                        <td>
                            @if ($product->stok == 0)
                                <span class="badge rounded-pill text-bg-danger fw-normal px-2 py-1">Habis</span>
                            @elseif ($product->stok < 20)
                                <span class="badge rounded-pill text-bg-warning fw-normal px-2 py-1">{{ $product->stok }}</span>
                            @else
                                <span class="badge rounded-pill text-bg-success fw-normal px-2 py-1">{{ $product->stok }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @can('update', $product)
                            <a href="{{ route('produk.edit', $product) }}"
                               class="btn btn-sm btn-outline-primary me-1"
                               title="Edit">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            @endcan
                            @can('delete', $product)
                            <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                        title="Hapus"
                                        onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-secondary py-5">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            Data produk tidak tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
</div>
@endsection