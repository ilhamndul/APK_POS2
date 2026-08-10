@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<div class="container-fluid px-0">

    <!-- Header & Button Create -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold mb-0">Halaman Produk</h1>
        @can('create', App\Models\Produk::class)
            <a href="{{ route('produk.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Create
            </a>
        @endcan
    </div>

    <!-- Search Bar -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('produk.index') }}" method="GET">
                <div class="input-group">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama produk..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table Product Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3 ps-3">#</th>
                            <th scope="col" class="py-3">User</th>
                            <th scope="col" class="py-3">Foto</th>
                            <th scope="col" class="py-3">Nama</th>
                            <th scope="col" class="py-3">Harga Beli</th>
                            <th scope="col" class="py-3">Harga Jual</th>
                            <th scope="col" class="py-3">Stok</th>
                            <th scope="col" class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th scope="row" class="ps-3">{{ $products->firstItem() + $loop->index }}</th>
                            <td>{{ $product->user->name ?? '-' }}</td>
                            <td>
                                @if($product->foto)
                                    <img src="{{ asset('storage/'.$product->foto) }}" alt="Foto Produk" class="rounded" width="50" height="50" style="object-fit: cover;">
                                @else
                                    <span class="text-muted small">Tidak ada</span>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $product->nama }}</td>
                            <td>Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $product->stok > 0 ? 'bg-secondary' : 'bg-danger' }}">
                                    {{ $product->stok }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-1">
                                    @can('update', $product)
                                    <a href="{{ route('produk.edit', $product) }}" class="btn btn-warning btn-sm text-white px-3">Edit</a>
                                    @endcan
                                    
                                    @can('delete', $product)
                                    <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3" onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">Hapus</button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <p class="text-muted mb-0">Data tidak tersedia.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->links() }}
    </div>

</div>
@endsection