<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Smart Panic Button</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #F4EBD0; /* Cream */
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
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 18px rgba(0, 0, 0, 0.25);
        }

        /* Kiri - Logo */
        .logo-section {
            flex: 1;
            background-color: #F4EBD0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .logo-section img {
            width: 350px;
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
            background-color: #800020; /* Maroon */
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 8px;
            text-align: center;
        }

        p {
            color: #F4EBD0;
            font-size: 14px;
            margin-bottom: 25px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .input-box {
            width: 90%;
            max-width: 300px;
            margin-bottom: 18px;
        }

        .input-box input {
            width: 90%;
            padding: 12px 15px;
            border: 1px solid #F4EBD0;
            border-radius: 10px;
            background-color: #fff;
            color: #800020;
            font-size: 14px;
            outline: none;
            box-shadow: 2px 2px 8px rgba(255, 214, 194, 0.3);
            transition: all 0.2s;
        }

        .input-box input:focus {
            border-color: #F4EBD0;
            box-shadow: 0 0 8px rgba(255, 214, 194, 0.5);
        }

        .btn-submit {
            width: 100%;
            max-width: 300px;
            background-color: #F4EBD0;
            color: #800020;
            border: none;
            border-radius: 30px;
            padding: 12px 0;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.25);
            transition: all 0.2s ease-in-out;
        }

        .btn-submit:hover {
            background-color: #f1cdb5;
            transform: scale(1.03);
        }

        /* Responsif */
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
                padding: 30px 20px;
            }

            .logo-section img {
                width: 200px;
            }

            .form-section {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Bagian Logo -->
        <div class="logo-section">
            <img src="{{ asset('images/LogoCreamSmartPanic.png') }}" alt="Logo Smart Panic Button">
        </div>

        <!-- Bagian Form -->
        <div class="form-section">
            <h2>Membuat Password Baru</h2>
            <p>Tetapkan kata sandi baru Anda agar dapat masuk dan mengakses Smart Panic Button.</p>
            <!-- manual tanpa token -->
             <form method="POST" action="#">
                @csrf
                <div class="input-box">
                    <input type="password" name="password" placeholder="New Password" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>
                </div>

                <button type="submit" class="btn-submit">Reset Password</button>
            </form>

        </div>
    </div>

</body>
</html>