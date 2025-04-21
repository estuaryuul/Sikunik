<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKuNik - Welcome</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #243B80, #ffffff);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }

        /* .login-page {
            background-image: url('background1.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        } */

        /* Logo di Pojok Kiri Atas */
        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo {
            width: 80px;
        }

        /* Kontainer Tengah */
        .content-container {
            max-width: 800px;
            width: 100%;
        }

        /* Judul lebih ke atas dan rata kanan */
        .title-container {
            text-align: right;
            margin-top: -50px;
        }

        h6 {
            font-weight: bold;
            margin-bottom: 5px;
        }

        h3 {
            font-weight: 700;
        }

        /* Deskripsi lebih ke bawah dan rata kiri */
        .description {
            text-align: left;
            margin-top: 40px;
        }

        .btn-login {
            background-color: #0b2c58;
            color: white;
            border-radius: 8px;
            padding: 10px 30px;
            font-size: 18px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-login:hover {
            background-color: #081d3a;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Logo di Pojok Kiri Atas -->
    <!-- <div class="logo-container">
        <img src="logo-jdih.png" alt="Logo JDIH" class="logo">
    </div> -->

    <!-- Konten Tengah -->
    <div class="content-container">
        <!-- Judul lebih ke atas dan rata kanan -->
        <div class="title-container">
            <h6><strong>Sistem Informasi Kunjungan Elektronik (SIKuNik)</strong></h6>
            <h3>Pusat Layanan Literasi Hukum & Pembinaan <br> JDIHN</h3>
        </div>

        <!-- Deskripsi lebih ke bawah dan rata kiri -->
        <div class="description">
            <p>Selamat Datang di Website Kunjungan Elektronik, silahkan login untuk mengisi Buku Tamu Kunjungan.</p>
            <a href="login" class="btn btn-login"><strong>Login</strong></a>
        </div>
    </div>
</body>

</html>
