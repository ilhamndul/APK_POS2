<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('errors')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('errors')); ?>

        </div>
    <?php endif; ?>

    <h4 class="mb-3">
        <?php echo e($mode == 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan'); ?>

    </h4>
    <div class="row">

        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="max-height:70vh; overflow:auto">
                    <div class="mb-3">
                        <form method="GET" action="<?php echo e(route('penjualan.create')); ?>">
                            <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control"
                                placeholder="Cari produk..." onkeyup="this.form.submit()">
                        </form>
                    </div>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form method="POST" action="<?php echo e(route('itempenjualan.store')); ?>" class="row mb-2">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                            <div class="col-7">
                                <button type="button"
                                    class="btn btn-outline-primary w-100 text-start p-2 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="<?php echo e(asset('storage/' . $product->foto)); ?>" alt="Gambar"
                                            class="rounded-circle" style="width:45px; height:45px; object-fit:cover">
                                        <div>
                                            <div class="fw-semibold"><?php echo e($product->nama); ?></div>
                                            <small class="text-muted"><?php echo e(number_format($product->harga_jual)); ?></small>
                                        </div>
                                    </div>
                                </button>
                            </div>

                            <div class="col-3">
                                <input type="number" name="quantity" value="1" min="1" class="form-control">
                            </div>

                            <div class="col-2">
                                <button type="submit"
                                    class="btn btn-primary w-100 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">+</button>
                            </div>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        
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
                        <?php $__empty_1 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($item->produk->nama); ?></td>
                                <td>Rp <?php echo e(number_format($item->produk->harga_jual)); ?></td>
                                <td>
                                    <form method="POST" action="<?php echo e(route('itempenjualan.update', $item->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="number" name="quantity" value="<?php echo e($item->kuantitas); ?>"
                                            class="form-control form-control-sm">
                                    </form>
                                </td>
                                <td>Rp <?php echo e(number_format($item->subtotal)); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $item)): ?>
                                    <form method="POST" action="<?php echo e(route('itempenjualan.destroy', $item->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada item di keranjang</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-bold">Total Pembayaran:</span>
                        <h4 class="fw-bold m-0 text-primary">Rp <?php echo e(number_format($sale->itemPenjualan->sum('subtotal'))); ?></h4>
                    </div>

                    <form method="POST" action="<?php echo e(route('penjualan.update', $sale->id)); ?>"
                        onsubmit="return confirm('Yakin ingin checkout ?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-2">
                            <label for="payment_method" class="form-label font-weight-bold">Metode Pembayaran</label>
                            <select name="payment_method" id="payment_method" class="form-select" required>
                                <option value="CASH">Cash</option>
                                <option value="QRIS">QRIS</option>
                            </select>
                        </div>

                        
                        <div id="qris-wrapper" class="text-center my-3 p-3 bg-light rounded border d-none">
                            <p class="fw-bold text-dark mb-2">Scan QRIS Toko untuk Membayar:</p>
                            <img src="<?php echo e(asset('assets/img/qris.png')); ?>" 
                                 alt="Kode QRIS" 
                                 class="img-fluid rounded border p-2 bg-white mb-2" 
                                 style="max-width: 200px;">
                            <small class="d-block text-muted">Pastikan pembayaran berhasil sebelum klik Checkout.</small>
                        </div>

                        
                        <div id="bayar-wrapper">
                            <div class="mb-2">
                                <label for="bayar" class="form-label font-weight-bold">Uang Diterima / Bayar (Rp)</label>
                                <input type="number" 
                                       name="bayar" 
                                       id="bayar" 
                                       class="form-control" 
                                       placeholder="Masukkan nominal bayar" 
                                       required 
                                       <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>
                            </div>

                            <div class="mb-3 p-2 bg-light rounded border">
                                <small class="text-muted d-block font-weight-bold">Kembalian:</small>
                                <h5 id="text-kembalian" class="text-success font-weight-bold m-0">Rp 0</h5>
                            </div>
                        </div>

                        <button type="submit" 
                                id="btn-checkout" 
                                class="btn btn-success w-100 py-2 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>" 
                                disabled>
                            Checkout
                        </button>
                    </form>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                    <form action="<?php echo e(route('penjualan.destroy', $sale->id)); ?>" method="POST"
                        onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-outline-danger w-100 mt-2 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">
                            Batalkan Transaksi
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const totalHarga = <?php echo e($sale->itemPenjualan->sum('subtotal') ?? 0); ?>;
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>