<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Welcome Bar -->
    <div class="alert alert-success rounded-0 mb-0 text-center py-3" role="alert">
        Selamat Datang, sayadamin@gmail.com
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3">
        <a class="navbar-brand fw-bold" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="users">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="penjualan">Penjualan</a></li>
            </ul>
            <a href="logout" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container my-4">

        <div class="text-center mb-4">
            <h1 class="fw-bold">
                Ringkasan Hari ini
                <small class="text-muted d-block fs-5">(Rabu, 29 Juli 2026)</small>
            </h1>
        </div>

        <!-- Today's Sales -->
        <h3 class="mb-3">Today's Sales</h3>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        Total Nilai Penjualan Hari Ini
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold mb-0">Rp 4.665</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        Jumlah Transaksi Hari Ini
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold mb-0">1</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cash & Payment Status -->
        <h3 class="mb-3">Cash & Payment Status</h3>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        Total Pembayaran Tunai
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold mb-0">Rp 4.665</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-info text-white">
                        Total Pembayaran Non-Tunai
                    </div>
                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold mb-0">Rp 0</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Critical Inventory Status -->
        <h3 class="mb-3">Critical Inventory Status</h3>
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning">
                        <strong>Daftar Produk Rendah</strong>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-3">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <strong>Produk Habis Stok</strong>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-3">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Best Seller Products -->
        <h3 class="mb-3">Best Seller Products</h3>
        <div class="card shadow-sm mb-4">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Unit Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>hp oppo</td>
                            <td>18</td>
                            <td><span class="badge bg-primary">3</span></td>
                        </tr>
                        <tr>
                            <td>hp oppo</td>
                            <td>15</td>
                            <td><span class="badge bg-primary">1</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>