<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login POS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#353a41, #f8f9fa);
            min-height:100vh;
        }

        .login-card{
            width:100%;
            max-width:400px;
            border:none;
            border-radius:15px;
        }

        .card-header{
            background:#2c3138;
            color:#fff;
            text-align:center;
            padding:20px;
            font-size:24px;
            font-weight:bold;
        }

        .form-control{
            height:48px;
            border-radius:10px;
        }

        .btn-login{
            height:48px;
            border-radius:10px;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card login-card shadow-lg">

                <div class="card-header">
                    🛒 POS Login
                </div>

                <div class="card-body p-4">

                    <form action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label>Email</label>
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
                            <label>Password</label>
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

                        <div class="form-check mb-3">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="remember"
                                   id="remember">

                            <label class="form-check-label" for="remember">
                                Ingat Saya
                            </label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-login">
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