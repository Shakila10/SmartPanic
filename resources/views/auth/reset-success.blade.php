<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Berhasil Diatur - Smart Panic Button</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #800020; /* maroon */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 900px;
            max-width: 95%;
            background-color: #800020;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            border-radius: 12px;
            overflow: hidden;
        }

        /* Kiri - Pesan */
        .message-section {
            flex: 1;
            background-color: #F4EBD0; /* cream */
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h2 {
            color: #800020;
            font-weight: 700;
            margin-bottom: 10px;
        }

        p {
            color: #800020;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .btn-login {
            width: 150%;
            max-width: 250px;
            background-color: #800020;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 12px 0;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            transition: all 0.2s;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .btn-login:hover {
            background-color: #A3002E;
        }

        /* Kanan - Logo */
        .logo-section {
            flex: 1;
            background-color: #800020;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 30px;
        }

        .logo-section img {
            width: 350px;
            margin-bottom: 15px;
        }

        .logo-section h3 {
            font-size: 22px;
            font-weight: 600;
            text-align: center;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                max-width: 400px;
            }

            .logo-section {
                order: -1;
                padding: 20px;
            }

            .logo-section img {
                width: 150px;
            }

            .message-section {
                padding: 30px 20px;
            }
        }

        a {
            text-decoration: none; /* Hilangkan garis bawah */
        }

        a:focus,
        a:active {
            outline: none; /* Hilangkan garis biru saat diklik/fokus */
        }

    </style>
</head>
<body>

    <div class="container">
        <!-- Kiri: Pesan Berhasil -->
        <div class="message-section">
            <h2>Pengaturan Password Berhasil</h2>
            <p>Sekarang Anda dapat menggunakan kata sandi baru untuk masuk ke akun Anda.</p>

            <a href="{{ route('login') }}">
                <button class="btn-login">LOGIN</button>
            </a>
        </div>

        <!-- Kanan: Logo -->
        <div class="logo-section">
            <img src="{{ asset('images/LogoMerahSmartPanic.png') }}" alt="Logo Smart Panic Button">
        </div>
    </div>

</body>
</html>
