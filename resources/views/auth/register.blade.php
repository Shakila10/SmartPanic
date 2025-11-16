<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Smart Panic Button</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #800020;
            /* maroon */
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
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            overflow: hidden;
        }

        .form-section {
            flex: 1;
            background-color: #F4EBD0;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: #800020;
            font-weight: 700;
            margin-bottom: 5px;
            text-align: center;
        }

        p {
            color: #800020;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }

        .input-box {
            width: 100%;
            max-width: 300px;
            margin-bottom: 15px;
        }

        .input-box input,
        .input-box select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #FFD6C2;
            border-radius: 8px;
            outline: none;
            background-color: #fff;
            box-shadow: 2px 2px 5px rgba(122, 0, 31, 0.2);
            color: #800020;
            font-size: 14px;
            box-sizing: border-box;
            /* biar ukuran sama pas */
        }

        /* --- tambahan khusus untuk dropdown --- */
        .input-box select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='%23800020' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            cursor: pointer;
        }

        .input-box select:focus {
            border-color: #A3002E;
            box-shadow: 0 0 6px rgba(128, 0, 32, 0.4);
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
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            transition: all 0.2s;
        }

        .btn-submit:hover {
            background-color: #A3002E;
        }

        .text-muted {
            color: #800020;
            font-size: 13px;
            margin-top: 10px;
            text-align: center;
        }

        .text-muted a {
            color: #800020;
            font-weight: 600;
            text-decoration: none;
        }

        .or {
            font-size: 13px;
            margin: 15px 0;
            color: #800020;
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
            background-color: #800020;
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
            width: 500px;
            margin-bottom: 15px;
        }

        .logo-section h3 {
            font-size: 22px;
            font-weight: 600;
            text-align: center;
        }

        @media (max-width: 768px) {
            body {
                height: auto;
                padding: 20px 0;
            }

            .container {
                flex-direction: column;
                max-width: 400px;
            }

            .logo-section {
                order: -1;
                padding: 20px;
            }

            .logo-section img {
                width: 120px;
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
        <div class="form-section">
            <h2>Sign Up!</h2>
            <p>Buat akun baru Anda</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-box">
                    <input type="text" name="username" placeholder="Nama Lengkap" required>
                </div>

                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                </div>


                <div class="input-box">
                    <input type="text" name="no_hp" placeholder="Nomor HP (contoh: 08xxx)" required>
                </div>

                <div class="input-box">
                    <select name="role_id" required>
                        <option value="" disabled selected hidden>Daftar Sebagai</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="input-box">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>

                <button type="submit" class="btn-submit">Buat Akun</button>

                <div class="text-muted">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                </div>

                <div class="or">ATAU</div>

                <button type="button" class="btn-google">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                    Lanjutkan dengan Google
                </button>
            </form>
        </div>

        <div class="logo-section">
            <img src="{{ asset('images/LogoMerahSmartPanic.png') }}" alt="Logo Smart Panic Button">
        </div>
    </div>

</body>

</html>
