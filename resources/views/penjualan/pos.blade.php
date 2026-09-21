@extends('layouts.app')

@section('title', 'POS')

@section('content')
    @if (session('errors'))
        <div class="alert alert-danger">
            {{ session('errors') }}
        </div>
    @endif

    <h4 class="mb-3">
        {{ $mode == 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
    </h4>
    <div class="row">

        {{-- PRODUK --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="max-height:70vh; overflow:auto">
                    <div class="mb-3">
                        <form method="GET" action="{{ route('penjualan.create') }}">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Cari produk..." onkeyup="this.form.submit()">
                        </form>
                    </div>

                    @foreach ($products as $product)
                        <form method="POST" action="{{ route('itempenjualan.store') }}" class="row mb-2">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="col-7">
                                <button type="button"
                                    class="btn btn-outline-primary w-100 text-start p-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('storage/' . $product->foto) }}" alt="Gambar"
                                            class="rounded-circle" style="width:45px; height:45px; object-fit:cover">
                                        <div>
                                            <div class="fw-semibold">{{ $product->nama }}</div>
                                            <small class="text-muted">{{ number_format($product->harga_jual) }}</small>
                                        </div>
                                    </div>
                                </button>
                            </div>

                            <div class="col-3">
                                <input type="number" name="quantity" value="1" min="1" class="form-control">
                            </div>

                            <div class="col-2">
                                <button type="submit"
                                    class="btn btn-primary w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">+</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- KERANJANG --}}
        <div class="col-md-6">
            <div class="card">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sale->itemPenjualan as $item)
                            <tr>
                                <td>{{ $item->produk->nama }}</td>
                                <td>Rp {{ number_format($item->produk->harga_jual) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item->kuantitas }}"
                                            class="form-control form-control-sm">
                                    </form>
                                </td>
                                <td>Rp {{ number_format($item->subtotal) }}</td>
                                <td>
                                    @can('delete', $item)
                                    <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada item di keranjang</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-bold">Total Pembayaran:</span>
                        <h4 class="fw-bold m-0 text-primary">Rp {{ number_format($sale->itemPenjualan->sum('subtotal')) }}</h4>
                    </div>

                    <form method="POST" action="{{ route('penjualan.update', $sale->id) }}"
                        onsubmit="return confirm('Yakin ingin checkout ?')">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label for="payment_method" class="form-label font-weight-bold">Metode Pembayaran</label>
                            <select name="payment_method" id="payment_method" class="form-select" required>
                                <option value="CASH">Cash</option>
                                <option value="QRIS">QRIS</option>
                            </select>
                        </div>

                        {{-- QRIS WRAPPER --}}
                        <div id="qris-wrapper" class="text-center my-3 p-3 bg-light rounded border d-none">
                            <p class="fw-bold text-dark mb-2">Scan QRIS Toko untuk Membayar:</p>
                            <img src="{{ asset('assets/img/qris.png') }}" 
                                 alt="Kode QRIS" 
                                 class="img-fluid rounded border p-2 bg-white mb-2" 
                                 style="max-width: 200px;">
                            <small class="d-block text-muted">Pastikan pembayaran berhasil sebelum klik Checkout.</small>
                        </div>

                        {{-- CASH WRAPPER (Input Bayar + Kembalian Digabung) --}}
                        <div id="bayar-wrapper">
                            <div class="mb-2">
                                <label for="bayar" class="form-label font-weight-bold">Uang Diterima / Bayar (Rp)</label>
                                <input type="number" 
                                       name="bayar" 
                                       id="bayar" 
                                       class="form-control" 
                                       placeholder="Masukkan nominal bayar" 
                                       required 
                                       {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                            </div>

                            <div class="mb-3 p-2 bg-light rounded border">
                                <small class="text-muted d-block font-weight-bold">Kembalian:</small>
                                <h5 id="text-kembalian" class="text-success font-weight-bold m-0">Rp 0</h5>
                            </div>
                        </div>

                        <button type="submit" 
                                id="btn-checkout" 
                                class="btn btn-success w-100 py-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}" 
                                disabled>
                            Checkout
                        </button>
                    </form>

                    @can('delete', $sale)
                    <form action="{{ route('penjualan.destroy', $sale->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger w-100 mt-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                            Batalkan Transaksi
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const totalHarga = {{ $sale->itemPenjualan->sum('subtotal') ?? 0 }};
        const paymentMethod = document.getElementById('payment_method');
        const qrisWrapper = document.getElementById('qris-wrapper');
        const bayarWrapper = document.getElementById('bayar-wrapper');
        const inputBayar = document.getElementById('bayar');
        const textKembalian = document.getElementById('text-kembalian');
        const btnCheckout = document.getElementById('btn-checkout');

        function togglePaymentMode() {
            if (paymentMethod.value === 'QRIS') {
                qrisWrapper.classList.remove('d-none');
                bayarWrapper.classList.add('d-none');
                inputBayar.value = totalHarga;
                btnCheckout.disabled = totalHarga <= 0;
            } else {
                qrisWrapper.classList.add('d-none');
                bayarWrapper.classList.remove('d-none'); 
                inputBayar.value = '';
                textKembalian.innerText = 'Rp 0';
                btnCheckout.disabled = true;
            }
        }

        togglePaymentMode();
        paymentMethod.addEventListener('change', togglePaymentMode);

        if (inputBayar) {
            inputBayar.addEventListener('input', function () {
                if (paymentMethod.value === 'CASH') {
                    const bayar = parseFloat(this.value) || 0;
                    const kembalian = bayar - totalHarga;

                    if (bayar >= totalHarga && totalHarga > 0) {
                        textKembalian.innerText = 'Rp ' + kembalian.toLocaleString('id-ID');
                        textKembalian.className = 'text-success font-weight-bold m-0 h5';
                        btnCheckout.disabled = false;
                    } else {
                        const kurang = Math.abs(kembalian);
                        textKembalian.innerText = 'Kurang: Rp ' + kurang.toLocaleString('id-ID');
                        textKembalian.className = 'text-danger font-weight-bold m-0 h5';
                        btnCheckout.disabled = true;
                    }
                }
            });
        }
    });
    </script>
@endsection