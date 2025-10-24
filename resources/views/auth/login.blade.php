<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Panic Button</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #F4EBD0; /* cream */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 900px;
            max-width: 95%;
            background-color: #F4EBD0;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 12px;
            overflow: hidden;
        }

        /* Kiri - Logo */
        .logo-section {
            flex: 1;
            background-color: #F4EBD0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .logo-section img {
            width: 400px;
            margin-bottom: 15px;
        }

        .logo-section h3 {
            color: #800020;
            font-size: 22px;
            font-weight: 600;
            text-align: center;
        }

        /* Kanan - Form */
        .form-section {
            flex: 1;
            background-color: #800020; /* maroon */
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 5px;
            text-align: center;
        }

        p {
            color: #FFD6C2;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }

        .input-box {
            width: 100%;
            max-width: 300px;
            margin-bottom: 15px;
        }

        .input-box input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #FFD6C2;
            border-radius: 8px;
            outline: none;
            background-color: #fff;
            box-shadow: 2px 2px 5px rgba(255, 214, 194, 0.3);
            color: #800020;
            font-size: 14px;
        }

        .btn-submit {
            width: 110%;
            max-width: 300px;
            background-color: #FFD6C2;
            color: #800020;
            border: none;
            border-radius: 30px;
            padding: 10px 0;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            transition: all 0.2s;
        }

        .btn-submit:hover {
            background-color: #f1cdb5;
        }

        .text-muted {
            color: #fff;
            font-size: 13px;
            margin-top: 10px;
            text-align: center;
        }

        .text-muted a {
            color: #FFD6C2;
            font-weight: 600;
            text-decoration: none;
        }

        .or {
            font-size: 13px;
            margin: 15px 0;
            color: #FFD6C2;
            position: relative;
            text-align: center;
        }

        .or::before,
        .or::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background-color: #FFD6C2;
        }

        .or::before {
            left: 0;
        }

        .or::after {
            right: 0;
        }

        .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 30px;
            padding: 8px 10px;
            font-size: 13px;
            cursor: pointer;
            color: #444;
            transition: all 0.2s;
            max-width: 300px;
            width: 110%;
        }

        .btn-google:hover {
            background-color: #f7f7f7;
        }

        .btn-google img {
            width: 18px;
            margin-right: 8px;
        }

        /* Responsif */
        @media (max-width: 768px) {
            body {
                height: auto;
                padding: 20px 0;
            }

            .container {
                flex-direction: column;
                max-width: 00px;
            }

            .logo-section {
                order: -1;
                padding: 20px;
            }

            .logo-section img {
                width: 200px;
            }

            .form-section {
                padding: 30px 20px;
            }

            .input-box input {
                font-size: 13px;
            }

            .btn-google {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Logo Section -->
        <div class="logo-section">
            <img src="{{ asset('images/LogoCreamSmartPanic.png') }}" alt="Logo Smart Panic Button">
        </div>

        <!-- Form Section -->
        <div class="form-section">
            <h2>Selamat Datang Kembali!</h2>
            <p>Masuk untuk melanjutkan</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-box">
                    <input type="text" name="email" placeholder="Enter Username or Email" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>

                <button type="submit" class="btn-submit">Lanjutkan</button>
                
                <div class="text-muted">
                    <a href="#">Lupa Password?</a>
                </div>

                <div class="text-muted">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                </div>

                <div class="or">ATAU</div>

                <button type="button" class="btn-google">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                    Lanjutkan dengan Google
                </button>
            </form>
        </div>
    </div>

</body>
</html>
