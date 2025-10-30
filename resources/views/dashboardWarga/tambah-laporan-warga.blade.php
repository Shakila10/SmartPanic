<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Laporan - Smart Panic</title>

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
        .header-center { font-size: 18px; font-weight: 600; margin: 0; }
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
            justify-content: space-between;
            padding: 30px 40px;
            position: relative;
            overflow-y: auto;
        }

        /* === FORM AREA === */
        .content-area {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            padding: 30px 0 60px;
        }

        .form-section, .report-section {
            background: var(--color-secondary);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
        }

        .form-section {
            width: 50%;
            max-width: 450px;  /* Mengecilkan form */
        }

        .report-section {
            width: 35%;
            max-width: 320px;
        }

        .form-section h3, .report-section h2 {
            text-align: center;
            margin-bottom: 20px;
            color: var(--color-primary);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid var(--color-primary);
            border-radius: 6px;
            font-size: 14px;
            color: var(--color-primary);
            background-color: #fff;
            box-sizing: border-box;
        }

        textarea { resize: vertical; min-height: 80px; }

        button {
            background-color: var(--color-primary);
            color: var(--color-secondary);
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover { background-color: var(--color-hover); transform: scale(1.02); }

        /* === KONTAK DARURAT === */
        .emergency-numbers {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 15px;
        }

        .emergency-item {
            text-align: center;
            font-weight: 600;
        }

        .icon-bg {
            background-color: var(--color-accent);
            border-radius: 50%;
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px auto;
        }

        .icon-bg .material-icons-round { font-size: 32px; }

        /* === FOOTER === */
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
        }

        footer .left, footer .right { display: flex; align-items: center; gap: 8px; }
        footer .material-icons-outlined { font-size: 16px; color: var(--color-accent); }
    </style>
</head>

<body>
    @include('dashboardWarga.layout.header')

    <div class="container">
        <div class="sidebar">
            <div>
                <div class="menu">
                    <a href="{{ route('dashboardWarga') }}" class="menu-item">
                        <span class="material-icons-outlined">home</span> Beranda
                    </a>
                    <a href="{{ route('tambah-laporan-warga') }}" class="menu-item active">
                        <span class="material-icons-outlined">post_add</span> Tambah Laporan
                    </a>
                <a href="{{ route('edukasi-tips-warga') }}" class="menu-item">
                        <span class="material-icons-outlined">lightbulb</span> Edukasi & Tips Darurat
                    </a>

                </div>
            </div>

            <a href="#" class="logout">
                <span class="material-icons-outlined">logout</span> Logout
            </a>
        </div>

        <div class="main">
            <div class="content-area">
                <!-- === KONTAK DARURAT === -->
                <section class="report-section">
                    <h2>Kontak Darurat</h2>
                    <div class="emergency-numbers">
                        <div class="emergency-item">
                            <div class="icon-bg"><span class="material-icons-round" style="color:#003f8a;">local_police</span></div>
                            <span>110 Polisi</span>
                        </div>
                        <div class="emergency-item">
                            <div class="icon-bg"><span class="material-icons-round" style="color:#c62828;">local_hospital</span></div>
                            <span>113 Ambulans</span>
                        </div>
                        <div class="emergency-item">
                            <div class="icon-bg"><span class="material-icons-round" style="color:#ff6f00;">fire_extinguisher</span></div>
                            <span>118 Pemadam</span>
                        </div>
                    </div>
                </section>

                <!-- === FORM LAPORAN DARURAT === -->
                <section class="form-section">
                    <h3>Formulir Laporan Darurat</h3>
                    <form action="{{ route('laporan.store') }}" method="POST" id="laporanForm">
                        @csrf
                        <input type="text" name="nama" placeholder="Nama Pelapor" required>

                        <select name="jenis_insiden" id="jenisInsiden" required>
                            <option value="" disabled selected>Pilih Jenis Insiden</option>
                            <option value="Kebakaran">Kebakaran</option>
                            <option value="Kesehatan">Kesehatan / Medis</option>
                            <option value="Kriminal">Kriminalitas / Keamanan</option>
                            <option value="Bencana">Bencana Alam</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>

                        <input type="text" id="lainnyaInput" name="jenis_lainnya" placeholder="Tulis Jenis Kejadian" style="display:none;">

                        <input type="text" name="lokasi" placeholder="Lokasi Kejadian" required>
                        <textarea name="deskripsi" placeholder="Deskripsi Singkat Kejadian" required></textarea>
                        <button type="submit">Kirim Laporan</button>
                    </form>
                </section>
            </div>

            @include('dashboardWarga.layout.footer')
        </div>
    </div>

    <script>
        // Munculkan input tambahan bila memilih "Lainnya"
        const jenisInsiden = document.getElementById('jenisInsiden');
        const lainnyaInput = document.getElementById('lainnyaInput');

        jenisInsiden.addEventListener('change', function() {
            if (this.value === 'Lainnya') {
                lainnyaInput.style.display = 'block';
                lainnyaInput.required = true;
            } else {
                lainnyaInput.style.display = 'none';
                lainnyaInput.required = false;
                lainnyaInput.value = '';
            }
        });
    </script>
</body>
</html>
