<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login POS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

   <style>
    body {
        background: linear-gradient(135deg, #e2e8f0, #f8fafc);
        min-height: 100vh;
    }
 


        .login-card {
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        .card-header {
            background: #022658;
            color: #fff;
            text-align: center;
            padding: 24px;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.5px;
            border: none;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
        }

        .form-control:focus {
            border-color: #022658;
            box-shadow: 0 0 0 0.25rem rgba(2, 38, 88, 0.15);
        }

        .btn-login {
            height: 48px;
            border-radius: 10px;
            font-weight: 600;
            background-color: #022658;
            border: none;
            transition: all 0.2s ease;
        }

        .btn-login:hover {
            background-color: #011d42;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-5 d-flex justify-content-center">

            <div class="card login-card shadow-lg">
                <div class="card-header">
                    🛒 POS Login
                </div>

                <div class="card-body p-4 bg-white">
                    <form action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="<?php echo e(old('email')); ?>"
                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Masukkan Email">

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Masukkan Password">

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="remember"
                                   id="remember">

                            <label class="form-check-label text-secondary small" for="remember">
                                Ingat Saya
                            </label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-white">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html><?php /**PATH C:\laragon\www\APK_POS2\resources\views/login.blade.php ENDPATH**/ ?>