@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 .125rem .5rem rgba(0,0,0,.08);
}

.table th{
    background:#f8f9fa;
}

.table td,
.table th{
    vertical-align:middle;
}

.btn{
    border-radius:8px;
}

.badge{
    font-size:13px;
    padding:7px 12px;
    min-width: 70px;
}

.form-control{
    border-radius:8px;
}

.table tbody tr:hover{
    background:#f8f9fa;
}
</style>

<div class="container py-4">

    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1">Pengguna</h2>
                <p class="text-muted mb-0">
                    Kelola semua pengguna yang terdaftar.
                </p>
            </div>

            {{-- Diberi prefix admin. --}}
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Create User
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">

            {{-- Diberi prefix admin. --}}
            <form action="{{ route('admin.users.index') }}" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama atau email..."
                        value="{{ request('search') }}">

                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i> Search
                    </button>

                </div>

            </form>

        </div>
    </div>

    <div class="card">
        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                       <th class="text-center" width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($users as $user)

                <tr>

                    <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>

                    <td class="fw-semibold">
                        {{ $user->name }}
                    </td>

                    <td>{{ $user->email }}</td>

                    <td>
                        @if($user->role && strtolower($user->role->name) == 'admin')
                            <span class="badge bg-success">Admin</span>
                        @else
                            <span class="badge bg-primary">Kasir</span>
                        @endif
                    </td>
<!-- Header Tabel -->

<td>
    <a href="{{ route('admin.users.edit', $user) }}"
       class="btn btn-sm btn-outline-primary me-1"
       title="Edit">
        <i class="bi bi-pencil-square"></i> Edit
    </a>

    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-outline-danger"
                title="Hapus"
                onclick="return confirm('Apakah anda yakin akan menghapus pengguna ini?')">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </form>
</td>
                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center py-4">
                        Tidak ada data user.
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{-- Navigasi Halaman / Pagination --}}
        @if ($users->hasPages())
            <div class="card-footer bg-white py-3 border-0">
                <div class="d-flex justify-content-end">
                    {{ $users->links() }}
                </div>
            </div>
        @endif
    </div>

</div>

@endsection