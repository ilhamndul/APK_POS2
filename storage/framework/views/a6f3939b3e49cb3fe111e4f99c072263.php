<?php $__env->startSection('content'); ?>

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

            
            <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Create User
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">

            
            <form action="<?php echo e(route('admin.users.index')); ?>" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama atau email..."
                        value="<?php echo e(request('search')); ?>">

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
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td><?php echo e($loop->iteration + ($users->currentPage() - 1) * $users->perPage()); ?></td>

                    <td class="fw-semibold">
                        <?php echo e($user->name); ?>

                    </td>

                    <td><?php echo e($user->email); ?></td>

                    <td>
                        <?php if($user->role && strtolower($user->role->name) == 'admin'): ?>
                            <span class="badge bg-success">Admin</span>
                        <?php else: ?>
                            <span class="badge bg-primary">Kasir</span>
                        <?php endif; ?>
                    </td>

                    <td>

                        
                        <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>

                        
                        <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>"
                              method="POST"
                              class="d-inline">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus user?')">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>
                    <td colspan="5" class="text-center py-4">
                        Tidak ada data user.
                    </td>
                </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

        
        <?php if($users->hasPages()): ?>
            <div class="card-footer bg-white py-3 border-0">
                <div class="d-flex justify-content-end">
                    <?php echo e($users->links()); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views/users/index.blade.php ENDPATH**/ ?>