<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKuNik - Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">

    <style>
        /* Background Gradient */
        body {
            background: linear-gradient(to right, #243B80, #ffffff);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }

        /* Kotak Login */
        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        /* Judul */
        .login-title {
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* Input field container */
        .input-group {
            position: relative;
        }

        /* Input field */
        .form-control {
            border-radius: 8px;
            height: 40px;
            padding-right: 40px;
            /* Memberi ruang untuk ikon */
        }

        /* Label di pojok kiri */
        .form-label {
            font-weight: bold;
            display: block;
            text-align: left;
        }

        /* Icon di pojok kanan input */
        .input-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
        }

        /* Tombol login */
        .btn-login {
            background-color: #0b2c58;
            color: white;
            border-radius: 8px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
        }

        .btn-login:hover {
            background-color: #081d3a;
            color: white;
        }

        /* Logo */
        .logo {
            width: 80px;
            margin-bottom: 15px;
        }
    </style>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"></a>
        </div>

        <!-- /.login-logo -->
        <div class="login-container">
            <!-- Logo -->
            <img src="logo-jdihn.png" alt="Logo JDIH" class="logo">

            <!-- Judul -->
            <h3 class="login-title">Pusat Layanan Literasi Hukum & Pembinaan JDIHN</h3>

            <!-- Deskripsi -->
            <p class="text-left">Jika ingin mengisi Buku Tamu Kunjungan, silahkan Login.</p>
            <form action="{{ route('postlogin') }}" method="post">
                {{ csrf_field() }}

                <!-- Input Email -->
                <form action="login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Nama Instansi atau Email </label>
                        <div class="input-group">
                            <input type="text" id="email" class="form-control" name="email"
                                placeholder="Masukan Nama atau Email" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <span class="input-icon"><i class="fas fa-envelope"></i></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="Masukan Password" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                        </div>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="btn btn-login"><strong>Masuk</strong></button>
                </form>
        </div>
    </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
