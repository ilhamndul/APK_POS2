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

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Email</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan Email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label>Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan Password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
</html>