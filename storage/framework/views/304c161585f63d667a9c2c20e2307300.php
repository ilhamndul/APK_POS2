<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-4">

    
    <?php if(session('errors')): ?>
    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
        <?php echo e(session('errors')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Riwayat Penjualan</h3>
            <p class="text-muted small mb-0">Kelola dan pantau seluruh transaksi penjualan</p>
        </div>
        <a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-primary px-3 shadow-sm rounded-2">
            <i class="bi bi-plus-lg me-1"></i> Create
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-header bg-white py-3 border-0">
            <form action="<?php echo e(route('penjualan.index')); ?>" method="GET">
                <div class="row g-2 align-items-center">
                    <!-- Form Search -->
                    <div class="col-md-5">
                        <div class="input-group">
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari nama atau email..."
                                value="<?php echo e(request('search')); ?>">
                        </div>
                    </div>

                    <!-- Filter Tanggal Mulai & Selesai -->
                    <div class="col-md-3">
                        <input type="date" name="start_date" class="form-control" value="<?php echo e(request('start_date')); ?>" placeholder="Dari Tanggal">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="end_date" class="form-control" value="<?php echo e(request('end_date')); ?>" placeholder="Sampai Tanggal">
                    </div>

                    <!-- Tombol Aksi Filter -->
                    <div class="col-md-1 d-flex gap-1">
                        <button class="btn btn-primary w-100" title="Cari / Filter">
                            <i class="bi bi-search"></i>
                        </button>
                        <?php if(request('search') || request('start_date') || request('end_date')): ?>
                            <a href="<?php echo e(route('penjualan.index')); ?>" class="btn btn-secondary w-100" title="Reset Filter">
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>
                        <?php endif; ?>
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
                    <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <th scope="row" class="ps-3 fw-bold text-muted"><?php echo e($sales->firstItem() + $loop->index); ?></th>
                        <td><?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?></td>
                        <td class="fw-semibold text-dark"><?php echo e($sale->user->name); ?></td>
                        <td class="fw-bold text-primary">Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?></td>
                        <td>
                            <?php if(strtoupper($sale->metode_pembayaran) == 'QRIS'): ?>
                                <span class="badge bg-info text-dark px-2 py-1">QRIS</span>
                            <?php else: ?>
                                <span class="badge bg-secondary px-2 py-1"><?php echo e($sale->metode_pembayaran); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(strtoupper($sale->status) == 'COMPLETED'): ?>
                                <span class="badge bg-success-subtle text-success border border-success px-2 py-1">COMPLETED</span>
                            <?php else: ?>
                                <span class="badge bg-warning-subtle text-warning border border-warning px-2 py-1"><?php echo e(strtoupper($sale->status)); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center pe-3">
                            <div class="d-inline-flex gap-1">
                                <a href="<?php echo e(route('penjualan.show', $sale->id)); ?>" class="btn btn-sm btn-primary rounded-2">Detail</a>

                        

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>
                                    <a href="<?php echo e(route('penjualan.edit', $sale)); ?>" class="btn btn-sm btn-warning rounded-2">Edit</a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                                    <form action="<?php echo e(route('penjualan.destroy', $sale)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-sm btn-danger rounded-2" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Data Tidak Ditemukan</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($sales->hasPages()): ?>
        <div class="card-footer bg-white border-0 py-3">
            <div class="d-flex justify-content-end">
                <?php echo e($sales->links()); ?>

            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views/penjualan/index.blade.php ENDPATH**/ ?>