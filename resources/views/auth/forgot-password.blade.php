<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Smart Panic Button</title>

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

        /* Form Kiri */
        .form-section {
            flex: 1;
            background-color: #F4EBD0; /* cream */
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: #800020;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }

        p {
            color: #800020;
            font-size: 14px;
            margin-bottom: 25px;
            text-align: center;
        }

        .input-box {
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }

        .input-box input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #FFD6C2;
            border-radius: 8px;
            outline: none;
            background-color: #fff;
            box-shadow: 2px 2px 5px rgba(122, 0, 31, 0.2);
            color: #800020;
            font-size: 14px;
        }

        .btn-submit {
            width: 110%;
            max-width: 300px;
            background-color: #800020;
            color: #fff;
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
            background-color: #A3002E;
        }

        .text-muted {
            color: #800020;
            font-size: 13px;
            margin-top: 15px;
            text-align: center;
        }

        .text-muted a {
            color: #800020;
            font-weight: 600;
            text-decoration: none;
        }

        /* Logo Kanan */
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

            .form-section {
                padding: 30px 20px;
            }

            .input-box input {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Form Section -->
        <div class="form-section">
            <h2>Lupa Password?</h2>
            <p>Masukkan email Anda untuk pemulihan kata sandi</p>

            @if (session('status'))
                <div style="color: green; font-size: 13px; margin-bottom: 10px;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-box">
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>

                <button type="submit" class="btn-submit">Reset Password</button>

                <div class="text-muted">
                    Kembali ke <a href="{{ route('login') }}">Halaman Login</a>
                </div>
            </form>
        </div>

        <!-- Logo Section -->
        <div class="logo-section">
            <img src="{{ asset('images/LogoMerahSmartPanic.png') }}" alt="Logo Smart Panic Button">
        </div>
    </div>

</body>
</html>
