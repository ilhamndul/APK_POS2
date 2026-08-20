<div class="mb-3">
    <label class="form-label fw-bold">Nama Jenis</label>
    <input type="text" name="nama_jenis" class="form-control <?php $__errorArgs = ['nama_jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('nama_jenis', $jenis->nama_jenis ?? '')); ?>" required>
    <?php $__errorArgs = ['nama_jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<button class="btn btn-success mt-2" type="submit">Simpan</button>
<a href="<?php echo e(route('jenis.index')); ?>" class="btn btn-secondary mt-2">Kembali</a><?php /**PATH C:\laragon\www\APK_POS2\resources\views/jenis/_form.blade.php ENDPATH**/ ?>