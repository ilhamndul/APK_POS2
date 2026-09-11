@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            
            {{-- Card Struk Digital --}}
            <div class="card shadow-sm border-0 font-monospace" id="printableArea">
                <div class="card-body p-4">
                    
                    {{-- Header Struk --}}
                    <div class="text-center mb-3">
                        <div class="fs-1 text-dark mb-1">🛒</div>
                        <h4 class="fw-bold mb-1">Point Of Sale</h4>
                        <p class="small text-muted mb-1">Jl. Babakan Cikareo</p>
                        <p class="small text-muted mb-1">Tlp. 085788390355</p>
                        <p class="small text-muted mb-0">Selamat datang di toko kami</p>
                    </div>

                    <div class="border-top border-secondary border-dashed my-3"></div>

                    {{-- Info Transaksi --}}
                    <div class="row small text-muted mb-2">
                        <div class="col-6">
                            <div>No: #{{ $penjualan->id }}</div>
                            <div>{{ $penjualan->created_at->format('Y-m-d') }}</div>
                            <div>{{ $penjualan->created_at->format('H:i:s') }}</div>
                        </div>
                        <div class="col-6 text-end">
                            <div>Kasir: {{ $penjualan->user->name ?? '-' }}</div>
                            <div>Metode: {{ $penjualan->metode_pembayaran }}</div>
                        </div>
                    </div>

                    <div class="border-top border-secondary border-dashed my-3"></div>

                    {{-- Item Pembelian --}}
                    <div class="mb-3">
                        @foreach($penjualan->itemPenjualan as $index => $item)
                        <div class="mb-2">
                            <div class="fw-bold text-dark">{{ $index + 1 }}. {{ $item->produk->nama ?? '-' }}</div>
                            <div class="d-flex justify-content-between small text-muted">
                                <span>{{ $item->kuantitas }} x Rp {{ number_format($item->harga_satuan ?? ($item->subtotal / $item->kuantitas), 0, ',', '.') }}</span>
                                <span class="fw-semibold text-dark">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-top border-secondary border-dashed my-3"></div>

                    {{-- Ringkasan Total --}}
                    <div class="small mb-2">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Total QTY</span>
                            <span>: {{ $penjualan->itemPenjualan->sum('kuantitas') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span>Sub Total</span>
                            <span>Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bold fs-6 text-dark my-2">
                            <span>Total</span>
                            <span>Rp {{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}</span>
                        </div>
                        
                        {{-- Detail Bayar & Kembalian --}}
                        <div class="d-flex justify-content-between text-muted mb-1">
                            <span>Bayar ({{ $penjualan->metode_pembayaran }})</span>
                            <span>Rp {{ number_format($penjualan->bayar ?? $penjualan->total_pembayaran, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between text-muted fw-bold">
                            <span>Kembalian</span>
                            <span class="text-success">Rp {{ number_format($penjualan->kembalian ?? 0, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="border-top border-secondary border-dashed my-3"></div>

                    {{-- Footer & Pesan --}}
                    <div class="text-center small text-muted">
                        <p class="mb-1">Terima kasih telah berbelanja di toko kami</p>
                        <p class="mb-0 text-danger" style="font-size: 0.75rem;">*Barang yang sudah dibeli tidak dapat dikembalikan</p>
                    </div>

                </div>
            </div>

            {{-- Tombol Cetak --}}
            <div class="d-grid gap-2 mt-3">
                <button onclick="window.print()" class="btn btn-primary">
                    🖨️ Cetak Struk
                </button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-outline-secondary">
                    &larr; Kembali ke Riwayat
                </a>
            </div>

        </div>
    </div>
</div>

@endsection