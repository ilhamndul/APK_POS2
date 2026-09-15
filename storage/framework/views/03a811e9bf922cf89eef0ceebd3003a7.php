<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">JayaMandiri</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" aria-current="page" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
        </li>

        
        <?php if(auth()->check() && auth()->user()->role_id == 1): ?>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('jenis*') ? 'active' : ''); ?>" href="<?php echo e(route('jenis.index')); ?>">Jenis</a>
          </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('produk*') ? 'active' : ''); ?>" aria-current="page" href="<?php echo e(route('produk.index')); ?>">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('penjualan*') ? 'active' : ''); ?>" aria-current="page" href="<?php echo e(route('penjualan.index')); ?>">Penjualan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('about') ? 'active' : ''); ?>" aria-current="page" href="<?php echo e(route('about')); ?>">About</a>
        </li>
      </ul>

      <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button class="btn btn-outline-danger" type="submit">Logout</button>
      </form>

    </div>
  </div>
</nav>



<?php /**PATH C:\laragon\www\APK_POS2\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>