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
            background-color: transparent;
            color: var(--color-secondary);
            animation: fadeIn 0.5s ease;
        }

        .education-title {
            text-align: center;
            color: var(--color-secondary);
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 35px;
            position: relative;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .tip-card:hover {
            transform: translateY(-5px);
            background-color: #fff8e6;
             border-color: var(--color-primary);
        }

        .tip-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .tip-card h3 {
            font-size: 16px;
            margin-bottom: 10px;
            color: var(--color-primary);
        }

        .tip-card p {
            font-size: 14px;
            line-height: 1.6;
            color: #333;
        }

        /* === NOMOR DARURAT === */
        .emergency-contact {
            margin-top: 40px;
            background-color: var(--color-secondary);
            border-left: 5px solid var(--color-primary);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .contact-title {
            color: var(--color-primary);
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .emergency-contact ul {
            list-style: none;
            padding: 0;
            margin: 0 0 10px 0;
        }

        .emergency-contact li {
            font-size: 15px;
            margin-bottom: 8px;
            color: #333;
        }

        .note {
            font-size: 13px;
            color: #555;
            font-style: italic;
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

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    @include('dashboardRT.layout.header')

    <div class="container">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div>
                <div class="menu">
                    <a href="{{ route('dashboardRT') }}" class="menu-item">
                        <span class="material-icons-outlined">home</span> Beranda
                    </a>
                    <a href="{{ route('tambah-laporan') }}" class="menu-item">
                        <span class="material-icons-outlined">post_add</span> Tambah Laporan
                    </a>
                    <a href="{{ route('riwayat-laporan') }}" class="menu-item">
                        <span class="material-icons-outlined">history</span> Riwayat Laporan
                    </a>
                    <a href="#" class="menu-item active">
                        <span class="material-icons-outlined">lightbulb</span> Edukasi & Tips Darurat
                    </a>
                </div>
            </div>
            
        </div>

        <!-- MAIN CONTENT -->
        <div class="main">
            <div class="education-section">
                <h2 class="education-title">Edukasi & Tips Darurat</h2>

                <div class="tips-grid">
                    <div class="tip-card">
                        <div class="tip-icon">🔥</div>
                        <h3>Cara Mendeteksi dan Menangani Kebakaran Dini</h3>
                        <p>Jika mencium bau asap atau mendengar alarm kebakaran, segera periksa sumbernya dari jarak aman. 
                        Matikan peralatan listrik dan jangan gunakan lift. Tutup hidung dan mulut dengan kain basah, lalu merunduk saat berjalan menuju pintu keluar. 
                        Jika api membesar, segera keluar rumah dan hubungi <strong>113</strong>.</p>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">💉</div>
                        <h3>Gejala Kritis yang Memerlukan Pertolongan Medis</h3>
                        <p>Waspadai tanda bahaya seperti nyeri dada berat, sesak napas mendadak, pingsan, kejang, atau perdarahan hebat. 
                        Segera hubungi <strong>119</strong> untuk ambulans. Jika memungkinkan, berikan pertolongan pertama seperti menjaga jalan napas tetap terbuka dan menghentikan pendarahan.</p>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">🚨</div>
                        <h3>Cara Mengenali Situasi Berisiko</h3>
                        <p>Hindari berjalan sendirian di tempat sepi atau gelap. Jika merasa diikuti, masuklah ke area ramai. Aktifkan fitur darurat di ponsel, dan beri tahu keluarga atau tetangga jika kamu merasa tidak aman.</p>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">🧭</div>
                        <h3>Kenali Jalur Evakuasi dan Titik Kumpul</h3>
                        <p>Warga perlu mengetahui jalur evakuasi dan titik kumpul aman di lingkungan RT. Saat evakuasi, jangan membawa barang berat — utamakan keselamatan diri dan bantu lansia atau anak-anak.</p>
                    </div>

                    <div class="tip-card">
                        <div class="tip-icon">💊</div>
                        <h3>Dasar Pertolongan Pertama</h3>
                        <p>Untuk luka ringan, bersihkan dengan air bersih dan tutup perban steril. Jika seseorang tidak sadarkan diri dan tidak bernapas, lakukan <strong>CPR</strong> (30 tekanan dada + 2 napas buatan).</p>
                    </div>
                </div>

                <!-- Nomor Darurat -->
                <div class="emergency-contact">
                    <h2 class="contact-title">📞 Nomor Darurat yang Bisa Dihubungi</h2>
                    <ul>
                        <li><strong>🔥 Pemadam Kebakaran:</strong> 113</li>
                        <li><strong>🚑 Ambulans / Gawat Darurat:</strong> 119</li>
                        <li><strong>👮 Kepolisian:</strong> 110</li>
                        <li><strong>⚡ PLN (Listrik):</strong> 123</li>
                        <li><strong>🌊 BPBD (Bencana Alam):</strong> 117</li>
                        <li><strong>📱 Ketua RT:</strong> +62 812-3456-7890</li>
                    </ul>
                    <p class="note">Simpan nomor-nomor ini di ponsel kamu dan bagikan kepada keluarga agar siap digunakan kapan saja.</p>
                </div>
            </div>

            @include('dashboardRT.layout.footer')
        </div>
    </div>
</body>
</html>
