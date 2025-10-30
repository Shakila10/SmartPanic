<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi & Tips Darurat - Smart Panic</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">

    <style>
        :root {
            --color-primary: #800020;
            --color-secondary: #F4EBD0;
            --color-hover: #a03a55;
            --color-accent: #f4e9a8;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-secondary);
            color: var(--color-primary);
        }

        /* === HEADER === */
        .top-header {
            width: 100%;
            background-color: var(--color-secondary);
            color: var(--color-primary);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            box-sizing: border-box;
            border-bottom: 3px solid var(--color-primary);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .header-left { display: flex; align-items: center; gap: 12px; }
        .header-left img { height: 38px; width: auto; }
        .header-left h1 { font-size: 20px; font-weight: 700; letter-spacing: 1px; }
        .profile {
            background-color: var(--color-primary);
            width: 45px; height: 45px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
        }
        .profile .material-icons-outlined {
            color: var(--color-secondary);
            font-size: 26px;
        }

        /* === LAYOUT === */
        .container {
            display: flex;
            height: calc(100vh - 70px);
            margin-top: 70px;
            overflow: hidden;
        }

        /* === SIDEBAR === */
        .sidebar {
            width: 280px;
            background-color: var(--color-secondary);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 50px 25px 30px 25px;
            border-right: 3px solid var(--color-primary);
            box-sizing: border-box;
        }

        .menu { display: flex; flex-direction: column; gap: 18px; }

        .menu-item {
            display: flex; align-items: center; gap: 16px;
            padding: 10px;
            text-decoration: none;
            color: var(--color-primary);
            font-weight: 500;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .menu-item:hover, .menu-item.active {
            background-color: var(--color-primary);
            color: var(--color-secondary);
            transform: translateX(5px);
        }

        .menu-item .material-icons-outlined { font-size: 26px; }

        .logout {
            display: flex; align-items: center; gap: 15px;
            margin-top: 30px;
            text-decoration: none;
            color: var(--color-primary);
            font-weight: 500;
            transition: 0.2s;
        }

        .logout:hover { color: var(--color-hover); }

        /* === MAIN === */
        .main {
            flex: 1;
            background-color: var(--color-primary);
            display: flex;
            flex-direction: column;
            padding: 30px 40px;
            overflow-y: auto;
        }

        /* === EDUKASI SECTION === */
        .education-section {
            background-color: var(--color-primary);
            border-radius: 12px;
            padding: 20px;
            color: var(--color-secondary);
        }

        .education-title {
            text-align: center;
            background-color: var(--color-secondary);
            color: var(--color-primary);
            display: inline-block;
            padding: 10px 25px;
            border-radius: 15px;
            font-weight: 700;
            margin: 10px auto 30px auto;
            display: block;
            font-size: 18px;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            justify-items: center;
        }

        .tip-card {
            background-color: var(--color-secondary);
            color: var(--color-primary);
            padding: 18px;
            border-radius: 12px;
            width: 90%;
            max-width: 270px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            transition: 0.3s;
        }

        .tip-card:hover {
            transform: translateY(-5px);
            background-color: #fff8e6;
        }

        .tip-icon {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .tip-card a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 14.5px;
            line-height: 1.4;
        }

        .tip-card a:hover {
            color: var(--color-hover);
            text-decoration: underline;
        }

        footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255,255,255,0.05);
            color: var(--color-secondary);
            font-size: 13.5px;
            padding: 14px 25px;
            border-top: 1px solid rgba(255,255,255,0.25);
            border-radius: 10px 10px 0 0;
            box-shadow: 0 -2px 6px rgba(0,0,0,0.2);
            margin-top: 20px;
        }
    </style>
</head>

<body>
    @include('dashboardWarga.layout.header')

    <div class="container">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div>
                <div class="menu">
                    <a href="{{ route('dashboardWarga') }}" class="menu-item">
                        <span class="material-icons-outlined">home</span> Beranda
                    </a>
                    <a href="{{ route('tambah-laporan') }}" class="menu-item">
                        <span class="material-icons-outlined">post_add</span> Tambah Laporan
                    </a>
                    <a href="#" class="menu-item active">
                        <span class="material-icons-outlined">lightbulb</span> Edukasi & Tips Darurat
                    </a>
                </div>
            </div>

            <a href="#" class="logout">
                <span class="material-icons-outlined">logout</span> Logout
            </a>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main">
            <div class="education-section">
                <h2 class="education-title">Edukasi & Tips Darurat</h2>

                <div class="tips-grid">
                    <div class="tip-card">
                        <div class="tip-icon">🔥</div>
                        <a href="#">Cara Mendeteksi Kebakaran Dini (Bau Asap, Alarm Kebakaran)</a>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">💉</div>
                        <a href="#">Gejala Kritis yang Memerlukan Pertolongan Medis</a>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">🚨</div>
                        <a href="#">Cara Mengenali Situasi Berisiko (Lingkungan Gelap, Sepi, dll)</a>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">🔥</div>
                        <a href="#">Mengenal Jalur Evakuasi dan Titik Kumpul Terdekat</a>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">💊</div>
                        <a href="#">Dasar Pertolongan Pertama (Serangan Jantung, dll)</a>
                    </div>
                </div>
            </div>

            <footer>
                <div class="left">RT.35, Bagan Pete, Kec. Alam Barajo, Kota Jambi</div>
                <div class="right">©2025 Copyright: Smart Panic</div>
            </footer>
        </div>
    </div>
</body>
</html>
