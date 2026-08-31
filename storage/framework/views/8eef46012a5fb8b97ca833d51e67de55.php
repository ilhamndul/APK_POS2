<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h3 class="fw-bold mb-1">🧾 Transaksi #<?php echo e($penjualan->id); ?></h3>
            <p class="text-muted mb-0"><?php echo e($penjualan->created_at->format('d F Y, H:i')); ?> WIB</p>
        </div>
        <span class="badge bg-<?php echo e($penjualan->status == 'COMPLETED' ? 'success' : 'warning'); ?> px-3 py-2 fs-6">
            <?php echo e($penjualan->status); ?>

        </span>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom-0 pt-3">
                    <h6 class="fw-bold mb-0">Item Pembelian</h6>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr class="text-muted small text-uppercase">
                                <th>Produk</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="fw-semibold"><?php echo e($item->produk->nama ?? '-'); ?></td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border"><?php echo e($item->kuantitas); ?>x</span>
                                </td>
                                <td class="text-end">Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Ringkasan Pembayaran</h6>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Kasir</span>
                        <span class="fw-semibold"><?php echo e($penjualan->user->name ?? '-'); ?></span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Metode</span>
                        <span class="badge bg-dark"><?php echo e($penjualan->metode_pembayaran); ?></span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold fs-5">Total</span>
                        <span class="fw-bold fs-4 text-primary">
                            Rp <?php echo e(number_format($penjualan->total_pembayaran, 0, ',', '.')); ?>

                        </span>
                    </div>
                </div>
            </div>

            <a href="<?php echo e(route('penjualan.index')); ?>" class="btn btn-outline-secondary w-100 mt-3">
                &larr; Kembali ke Riwayat
            </a>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views/penjualan/detail.blade.php ENDPATH**/ ?>