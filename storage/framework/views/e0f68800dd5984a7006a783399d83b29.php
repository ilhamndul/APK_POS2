<?php $__env->startSection('title', 'Tambah Jenis'); ?>

<?php $__env->startSection('content'); ?>
<h4>Tambah Jenis</h4>

<form action="<?php echo e(route('jenis.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('jenis._form', ['jenis' => null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views/jenis/create.blade.php ENDPATH**/ ?>