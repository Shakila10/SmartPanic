<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan - Smart Panic</title>

    <!-- Font & Icons -->
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

        /* HEADER */
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

        /* LAYOUT */
        .container {
            display: flex;
            height: calc(100vh - 70px);
            margin-top: 70px;
        }

        /* SIDEBAR */
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

        /* MAIN */
        .main {
            flex: 1;
            background-color: var(--color-primary);
            padding: 30px 40px;
            overflow-y: auto;
        }

        /* CONTENT */
        .content-area {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 0 60px;
            color: var(--color-secondary);
        }

        .content-area h2 {
            font-size: 22px;
            margin-bottom: 25px;
        }

        .search-filter {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .search-filter input, .search-filter select {
            padding: 10px 12px;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .search-filter input {
            width: 250px;
        }

        /* CARD */
        .laporan-card {
            width: 80%;
            background-color: var(--color-secondary);
            border-radius: 12px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
            transition: 0.2s;
        }

        .laporan-card:hover { transform: translateY(-3px); }

        .laporan-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-bg {
            background-color: var(--color-accent);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-bg .material-icons-round { font-size: 30px; }

        .laporan-text h3 {
            font-size: 16px;
            margin: 0;
            color: var(--color-primary);
        }

        .laporan-text p {
            margin: 2px 0;
            font-size: 13.5px;
            color: #555;
        }

        .status {
            font-size: 13px;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 8px;
            color: #fff;
            text-transform: capitalize;
        }
        .status.diterima { background-color: #c77800; }
        .status.ditangani { background-color: #ffa726; }
        .status.selesai { background-color: #43a047; }
        .status.ditolak { background-color: #e53935; }

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
    @include('dashboardRT.layout.header')
 <div class="container">
        <div class="sidebar">
            <div>
                <div class="menu">
                    <a href="{{ route('dashboardRT') }}" class="menu-item">
                        <span class="material-icons-outlined">home</span> Beranda
                    </a>
                    <a href="{{ route('tambah-laporan') }}" class="menu-item active">
                        <span class="material-icons-outlined">post_add</span> Tambah Laporan
                    </a>
                    <a href="{{ route('riwayat-laporan') }}" class="menu-item">
                        <span class="material-icons-outlined">history</span> Riwayat Laporan
                    </a>
                    <a href="{{ route('edukasi-tips') }}" class="menu-item">
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
            <div class="content-area">
                <h2>Riwayat Laporan</h2>

                <!-- Filter (opsional) -->
                <div class="search-filter">
                    <input type="text" placeholder="Cari laporan...">
                    <select>
                        <option value="">Filter Status</option>
                        <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                        <option value="Sedang Ditangani">Sedang Ditangani</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>

                <!-- CARD DINAMIS -->
                @forelse($laporans as $laporan)
                    @php
                        $icon = 'report';
                        $color = '#c62828';

                        if (str_contains(strtolower($laporan->jenis_laporan), 'medis')) {
                            $icon = 'medical_services'; $color = '#1565c0';
                        } elseif (str_contains(strtolower($laporan->jenis_laporan), 'kebakaran')) {
                            $icon = 'fire_extinguisher'; $color = '#d32f2f';
                        } elseif (str_contains(strtolower($laporan->jenis_laporan), 'polisi') || str_contains(strtolower($laporan->jenis_laporan), 'maling')) {
                            $icon = 'local_police'; $color = '#2e7d32';
                        }

                        $statusClass = match(strtolower($laporan->status)) {
                            'menunggu verifikasi' => 'diterima',
                            'sedang ditangani' => 'ditangani',
                            'selesai' => 'selesai',
                            'ditolak' => 'ditolak',
                            default => 'diterima',
                        };
                    @endphp

                    <div class="laporan-card">
                        <div class="laporan-info">
                            <div class="icon-bg">
                                <span class="material-icons-round" style="color:{{ $color }}">{{ $icon }}</span>
                            </div>
                            <div class="laporan-text">
                                <h3>{{ ucfirst($laporan->jenis_laporan) }}</h3>
                                <p>{{ $laporan->nama_pelapor }}</p>
                                <p>{{ $laporan->lokasi }}</p>
                            </div>
                        </div>
                        <div class="status {{ $statusClass }}">{{ ucfirst($laporan->status) }}</div>
                    </div>
                @empty
                    <p>Tidak ada laporan yang ditemukan.</p>
                @endforelse
            </div>

            @include('dashboardRT.layout.footer')
        </div>
    </div>
</body>
</html>
