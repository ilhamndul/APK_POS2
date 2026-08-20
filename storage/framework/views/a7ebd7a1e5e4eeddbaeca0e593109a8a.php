<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h1 class="h3 fw-semibold mb-1">Daftar Produk</h1>
            <p class="text-secondary small mb-0">Kelola daftar produk dan stok toko.</p>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Produk::class)): ?>
        <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-primary d-flex align-items-center gap-1">
            <i class="bi bi-plus-lg"></i> Tambah produk
        </a>
        <?php endif; ?>
    </div>

    
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="<?php echo e(route('produk.index')); ?>" method="GET">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-secondary"></i>
                    </span>
                    <input
                        type="text"
                        name="search"
                        class="form-control border-start-0"
                        placeholder="Search nama produk"
                        value="<?php echo e(request('search')); ?>">
                    <button class="btn btn-dark px-4" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-dark small fw-bold">#</th>
                        <th scope="col" class="text-dark small fw-bold">USER</th>
                        <th scope="col" class="text-dark small fw-bold">FOTO</th>
                        <th scope="col" class="text-dark small fw-bold">NAMA JENIS</th>
                        <th scope="col" class="text-dark small fw-bold">NAMA PRODUK</th>
                        <th scope="col" class="text-dark small fw-bold">HARGA BELI</th>
                        <th scope="col" class="text-dark small fw-bold">HARGA JUAL</th>
                        <th scope="col" class="text-dark small fw-bold">STOK</th>
                        <th scope="col" class="text-dark small fw-bold text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-secondary"><?php echo e($products->firstItem() + $loop->index); ?></td>
                        <td class="text-secondary"><?php echo e($product->user->name ?? '-'); ?></td>
                        <td>
                            <?php if($product->foto): ?>
                                <img src="<?php echo e(asset('storage/'.$product->foto)); ?>"
                                     width="36" height="36"
                                     class="rounded-2 object-fit-cover border" alt="Foto Produk">
                            <?php else: ?>
                                <div class="rounded-2 border bg-light d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    <i class="bi bi-image text-muted small"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-bold text-dark"><?php echo e($product->jenis->nama_jenis ?? '-'); ?></td>
                        <td class="fw-bold text-dark"><?php echo e($product->nama); ?></td>
                        <td class="text-secondary">Rp <?php echo e(number_format($product->harga_beli, 0, ',', '.')); ?></td>
                        <td class="text-success fw-medium">Rp <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?></td>
                        <td>
                            <?php if($product->stok == 0): ?>
                                <span class="badge rounded-pill text-bg-danger fw-normal px-2 py-1">Habis</span>
                            <?php elseif($product->stok < 20): ?>
                                <span class="badge rounded-pill text-bg-warning fw-normal px-2 py-1"><?php echo e($product->stok); ?></span>
                            <?php else: ?>
                                <span class="badge rounded-pill text-bg-success fw-normal px-2 py-1"><?php echo e($product->stok); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $product)): ?>
                            <a href="<?php echo e(route('produk.edit', $product)); ?>"
                               class="btn btn-sm btn-outline-primary me-1"
                               title="Edit">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $product)): ?>
                            <form action="<?php echo e(route('produk.destroy', $product)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger"
                                        title="Hapus"
                                        onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="text-center text-secondary py-5">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            Data produk tidak tersedia.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views/produk/index.blade.php ENDPATH**/ ?>