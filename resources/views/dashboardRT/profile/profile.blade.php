<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Profil - Smart Panic</title>

<!-- Font dan Icons -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">

<style>
  :root {
    --color-primary: #800020;
    --color-secondary: #F4EBD0;
    --color-hover: #a03a55;
  }

  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: var(--color-primary);
    color: var(--color-secondary);
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

  /* === MAIN CONTENT === */
  .main {
      flex: 1;
      background-color: var(--color-primary);
      display: flex;
      justify-content: center;
      align-items: center;
      overflow-y: auto;
      padding: 20px;
  }

  /* === PROFILE CARD === */
  .profile-card {
      background-color: var(--color-secondary);
      width: 420px;
      padding: 36px 50px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      display: flex;
      flex-direction: column;
      gap: 32px;
      color: var(--color-primary);
      animation: fadeIn 0.5s ease;
  }

  .profile-icon-large {
      color: var(--color-primary);
      font-size: 82px;
      align-self: center;
  }

  .profile-info {
      display: flex;
      flex-direction: column;
      gap: 16px;
  }
  .profile-info .row {
      display: flex;
      justify-content: space-between;
      font-size: 15px;
      font-weight: 600;
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

<!-- HEADER -->
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
                <a href="{{ route('edukasi-tips') }}" class="menu-item">
                    <span class="material-icons-outlined">lightbulb</span> Edukasi & Tips Darurat
                </a>
                <a href="#" class="menu-item active">
                    <span class="material-icons-outlined">person</span> Profil
                </a>
            </div>
        </div>

        <a href="#" class="logout">
            <span class="material-icons-outlined">logout</span> Logout
        </a>
    </div>

    <!-- MAIN PROFILE -->
    <div class="main">
        <div class="profile-card">
            <span class="material-icons-outlined profile-icon-large">person</span>
            <div class="profile-info">
                <div class="row">
                    <span>Nama</span>
                    <span>Shakila Rama Wulandari</span>
                </div>
                <div class="row">
                    <span>Nomor HP</span>
                    <span>08987654321</span>
                </div>
                <div class="row">
                    <span>Alamat</span>
                    <span>Lorong Kuningan, Jl. Lingkar Barat II</span>
                </div>
            </div>
        </div>
    </div>

    @include('dashboardRT.layout.footer')
</div>

</body>
</html>
