<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil - Smart Panic</title>

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
      display: flex;
      flex-direction: column;
      min-height: 100vh;
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
      flex: 1;
      margin-top: 70px;
      min-height: calc(100vh - 70px - 50px);
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
      align-items: center;
      justify-content: center;
      padding: 40px;
      box-sizing: border-box;
      position: relative;
    }

    /* === PROFILE CARD === */
    .profile-card {
      background-color: var(--color-secondary);
      padding: 40px 50px;
      border-radius: 12px;
      box-shadow: 5px 5px 0px rgba(0,0,0,0.2);
      width: 480px;
      color: var(--color-primary);
      animation: fadeIn 0.5s ease;
    }

    .profile-icon {
      background-color: var(--color-primary);
      color: var(--color-secondary);
      width: 90px; height: 90px;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 50px;
      margin: 0 auto 25px;
    }

    .profile-form label {
      font-weight: 600;
      display: block;
      margin-top: 10px;
      margin-bottom: 6px;
    }

    .profile-form input {
      width: 100%;
      padding: 8px 10px;
      border: 1.5px solid var(--color-primary);
      border-radius: 8px;
      font-family: inherit;
      background-color: #fff;
      color: var(--color-primary);
    }

    .buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 25px;
    }

    .btn {
      flex: 1;
      background-color: var(--color-primary);
      color: var(--color-secondary);
      border: none;
      padding: 10px;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      margin: 0 5px;
    }

    .btn:hover { background-color: var(--color-hover); }

    .btn.cancel {
      background-color: #aaa;
    }

    .btn.cancel:hover {
      background-color: #888;
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
      width: 95%;
      margin-top: 60px;
    }

    footer .left,
    footer .right {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    footer .material-icons-outlined {
      font-size: 16px;
      color: var(--color-accent);
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
          <a href="{{ route('dashboardRT') }}" class="menu-item"><span class="material-icons-outlined">home</span> Beranda</a>
          <a href="{{ route('tambah-laporan') }}" class="menu-item"><span class="material-icons-outlined">post_add</span> Tambah Laporan</a>
          <a href="{{ route('riwayat-laporan') }}" class="menu-item"><span class="material-icons-outlined">history</span> Riwayat Laporan</a>
          <a href="{{ route('edukasi-tips') }}" class="menu-item"><span class="material-icons-outlined">lightbulb</span> Edukasi & Tips Darurat</a>
          <a href="{{ route('dashboardRT.profile') }}" class="menu-item active"><span class="material-icons-outlined">account_circle</span> Profil</a>
        </div>
      </div>

      <a href="{{ route('logout') }}" 
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
         class="logout">
        <span class="material-icons-outlined">logout</span> Logout
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
    </div>

    <!-- MAIN PROFILE FORM -->
    <div class="main">
      <div class="profile-card">
        <div class="profile-icon">
          <span class="material-icons-outlined">account_circle</span>
        </div>

        <form id="editProfileForm" class="profile-form">
          <label for="nama">Nama</label>
          <input type="text" id="nama" value="Shakila Rama Wulandari">

          <label for="hp">Nomor HP</label>
          <input type="text" id="hp" value="08987654321">

          <label for="alamat">Alamat</label>
          <input type="text" id="alamat" value="Lorong Kuningan, Jl. Lingkar Barat II">

          <div class="buttons">
            <button type="button" class="btn cancel" id="cancelBtn">Batal</button>
            <button type="submit" class="btn save">Simpan</button>
          </div>
        </form>
      </div>

      @include('dashboardRT.layout.footer')
    </div>
  </div>

  <script>
    document.getElementById("editProfileForm").addEventListener("submit", function(e) {
      e.preventDefault();
      alert("Perubahan profil berhasil disimpan!");
      window.location.href = "{{ route('dashboardRT.profile') }}"; // kembali ke halaman profil
    });

    document.getElementById("cancelBtn").addEventListener("click", function() {
      window.location.href = "{{ route('dashboardRT.profile') }}"; // batal, kembali ke profil
    });
  </script>
</body>
</html>
