@extends('layouts.app')

@section('title', 'Tentang Perusahaan')

@section('content')
<div class="container py-4" style="max-width: 850px;">
    
    <!-- Header Halaman -->
    <div class="text-center mb-4">
        <h3 class="fw-bold text-dark">Tentang Perusahaan & Sistem</h3>
        <p class="text-muted small">Profil resmi Jaya Mandiri dan informasi aplikasi Point of Sale (POS).</p>
    </div>

    <!-- Card Utama -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
        <div class="card-body">
            
            <!-- LOGO PERUSAHAAN -->
            <div class="text-center mb-4 pb-3 border-bottom">
               <img src="{{ asset('storage/img/logo.png') }}" alt="Logo CV. Jaya Mandiri" class="img-fluid mb-2" style="max-height: 200px; width: auto;">
                <h4 class="fw-bold text-dark mb-1"> Jaya Mandiri</h4>
                <p class="text-muted small mb-0">Pusat Perdagangan Umum, Sembako, dan Kebutuhan Grosir</p>
            </div>

            <!-- Detail Alamat & Kontak -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 h-100">
                        <h6 class="fw-bold text-dark mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Alamat Kantor & Toko</h6>
                        <p class="text-secondary small mb-0">
                            Jl. Babakan Cikareo Belakang Dmeia Mesin Rt/Rw 003/003<br>
                            Kota Tasikmalaya, Jawa Barat
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 h-100">
                        <h6 class="fw-bold text-dark mb-2"><i class="bi bi-headset text-success me-2"></i>Kontak & Layanan</h6>
                        <p class="text-secondary small mb-1"><strong>Telepon/WhatsApp:</strong> 0857-8839-0355</p>
                        <p class="text-secondary small mb-0"><strong>Jam Operasional:</strong> Senin - Minggu (08.00 - 22.00 WIB)</p>
                    </div>
                </div>
            </div>

            <!-- Produk yang Dijual -->
            <div class="mb-4">
                <h5 class="fw-bold text-dark mb-3"><i class="bi bi-box-seam text-primary me-2"></i>Jenis Produk yang Dijual</h5>
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="border rounded-3 p-2 small text-secondary d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2 fs-5"></i>
                            <span>Bahan Pokok & Sembako (Beras, Minyak, Gula)</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-2 small text-secondary d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2 fs-5"></i>
                            <span>Makanan Ringan & Aneka Minuman</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-2 small text-secondary d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2 fs-5"></i>
                            <span>Kebutuhan Rumah Tangga & Kebersihan</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-2 small text-secondary d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2 fs-5"></i>
                            <span>Alat Tulis Kantor & Keperluan Sekolah</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center pt-3 border-top gap-3">

                <a href="{{ route('penjualan.index') }}" class="btn btn-primary btn-sm px-3 rounded-2">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Penjualan
                </a>
            </div>

        </div>
    </div>

</div>
@endsection