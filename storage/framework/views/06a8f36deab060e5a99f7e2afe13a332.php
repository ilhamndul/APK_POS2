<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-light">

<!-- NAVBAR UTAMA -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo e(route('dashboard')); ?>">Point of Sale</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('jenis*') ? 'active' : ''); ?>" href="<?php echo e(route('jenis.index')); ?>">Jenis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('produk*') ? 'active' : ''); ?>" href="<?php echo e(route('produk.index')); ?>">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('penjualan*') ? 'active' : ''); ?>" href="<?php echo e(route('penjualan.index')); ?>">Penjualan</a>
                </li>
            </ul>

            <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                <?php echo csrf_field(); ?>
                <button class="btn btn-outline-danger btn-sm px-3" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</div>

</body>
</html><?php /**PATH C:\laragon\www\APK_POS2\resources\views/layouts/app.blade.php ENDPATH**/ ?>