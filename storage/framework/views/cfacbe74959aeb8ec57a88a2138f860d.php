

<?php $__env->startSection('title', 'Edit Jenis'); ?>

<?php $__env->startSection('content'); ?>
<h4>Edit Jenis</h4>

<form action="<?php echo e(route('jenis.update', $jenis)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <?php echo $__env->make('jenis._form', ['jenis' => $jenis], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views/jenis/edit.blade.php ENDPATH**/ ?>