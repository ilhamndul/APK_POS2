<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

    
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Jenis Produk</h2>
        <a href="<?php echo e(route('jenis.create')); ?>" class="btn btn-primary">+ Tambah Jenis</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="bg-light text-uppercase text-secondary small fw-bold">
            <tr>
                <th>No</th>
                <th>Nama Jenis</th>
                <th>Dibuat Oleh (User)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($item->nama_jenis); ?></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <!-- Lingkaran Avatar Inisial -->
                            <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold flex-shrink-0" 
                                style="width: 32px; height: 32px; font-size: 0.8rem;">
                                <?php echo e(strtoupper(substr($sale->user->name ?? $item->user->name ?? 'K', 0, 1))); ?>

                            </div>

                            <!-- Nama User Sejajar Samping -->
                            <span class="fw-semibold text-dark small">
                                <?php echo e($sale->user->name ?? $item->user->name ?? 'Kasir'); ?>

                            </span>
                        </div>
                    </td>
                    <td>
                        <a href="<?php echo e(route('jenis.edit', $item->id)); ?>" class="btn btn-sm btn-outline-warning d-inline-flex align-items-center gap-1 px-2.5 py-1">Edit</a>
                        <form action="<?php echo e(route('jenis.destroy', $item->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" 
                            class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1 px-2.5 py-1" 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                title="Hapus Produk">
                             <i class="bi bi-trash"></i>
                            <span>Hapus</span>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center">Data jenis belum ada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views/jenis/index.blade.php ENDPATH**/ ?>