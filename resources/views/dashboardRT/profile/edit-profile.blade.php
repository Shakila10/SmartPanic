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
            background: var(--color-secondary);
            color: var(--color-primary);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .top-header {
            width: 100%;
            background: var(--color-secondary);
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

        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-left img {
            height: 38px;
            width: auto;
        }

        .header-left h1 {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .profile {
            background: var(--color-primary);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .profile .material-icons-outlined {
            color: var(--color-secondary);
            font-size: 26px;
        }

        .container {
            display: flex;
            flex: 1;
            margin-top: 70px;
            min-height: calc(100vh - 70px - 50px);
        }

        .sidebar {
            width: 280px;
            background: var(--color-secondary);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 50px 25px 30px;
            border-right: 3px solid var(--color-primary);
            box-sizing: border-box;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 10px;
            text-decoration: none;
            color: var(--color-primary);
            font-weight: 500;
            font-size: 16px;
            border-radius: 8px;
            transition: .2s;
        }

        .menu-item:hover,
        .menu-item.active {
            background: var(--color-primary);
            color: var(--color-secondary);
            transform: translateX(5px);
        }

        .menu-item .material-icons-outlined {
            font-size: 26px;
        }

        .logout {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
            text-decoration: none;
            color: var(--color-primary);
            font-weight: 500;
            transition: .2s;
        }

        .logout:hover {
            color: var(--color-hover);
        }

        .main {
            flex: 1;
            background: var(--color-primary);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            box-sizing: border-box;
            position: relative;
        }

        .profile-card {
            background: var(--color-secondary);
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 5px 5px 0 rgba(0, 0, 0, .2);
            width: 480px;
            color: var(--color-primary);
            animation: fadeIn .5s ease;
        }

        .profile-photo {
            position: relative;
            width: 130px;
            height: 130px;
            margin: 0 auto 25px;
        }

        .profile-photo img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--color-primary);
            background: #fff;
        }

        .photo-edit {
            position: absolute;
            bottom: 0;
            right: 0;
            background: var(--color-primary);
            color: var(--color-secondary);
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .photo-edit:hover {
            background: var(--color-hover);
        }

        input[type="file"] {
            display: none;
        }

        .profile-form label {
            font-weight: 600;
            display: block;
            margin-top: 10px;
            margin-bottom: 6px;
        }

        .profile-form input {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid var(--color-primary);
            border-radius: 8px;
            font-family: inherit;
            background: #fff;
            color: var(--color-primary);
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
            gap: 10px;
        }

        .btn {
            flex: 1;
            background: var(--color-primary);
            color: var(--color-secondary);
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
            text-align: center;
        }

        .btn:hover {
            background: var(--color-hover);
        }

        .btn.cancel {
            background: #aaa;
        }

        .btn.cancel:hover {
            background: #888;
        }

        footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, .05);
            color: var(--color-secondary);
            font-size: 13.5px;
            padding: 14px 25px;
            border-top: 1px solid rgba(255, 255, 255, .25);
            border-radius: 10px 10px 0 0;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, .2);
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
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width:768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 3px solid var(--color-primary);
            }

            .profile-card {
                width: 100%;
                max-width: 480px;
            }
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
                    <a href="{{ route('dashboardRT') }}" class="menu-item"><span
                            class="material-icons-outlined">home</span> Beranda</a>
                    <a href="{{ route('tambah-laporan') }}" class="menu-item"><span
                            class="material-icons-outlined">post_add</span> Tambah Laporan</a>
                    <a href="{{ route('riwayat-laporan') }}" class="menu-item"><span
                            class="material-icons-outlined">history</span> Riwayat Laporan</a>
                    <a href="{{ route('edukasi-tips') }}" class="menu-item"><span
                            class="material-icons-outlined">lightbulb</span> Edukasi & Tips Darurat</a>
                </div>
            </div>

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
                <span class="material-icons-outlined">logout</span> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;"> @csrf </form>
        </div>

        <!-- MAIN PROFILE FORM -->
        <div class="main">
            <div class="profile-card">

                {{-- Alert sukses --}}
                @if (session('status'))
                    <div style="background:#d1fae5;color:#065f46;padding:10px;border-radius:8px;margin-bottom:15px;">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Alert error --}}
                @if ($errors->any())
                    <div style="background:#fee2e2;color:#991b1b;padding:10px;border-radius:8px;margin-bottom:15px;">
                        <ul style="margin:0;padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FOTO PROFIL + UBAH -->
                <div class="profile-photo">
                    <img id="profileImg"
                        src="{{ $user->photo ?? null ? asset('storage/' . $user->photo) : '/images/placeholder.png' }}"
                        alt="Foto Profil">
                    <label for="fileInput" class="photo-edit" title="Ganti foto">
                        <span class="material-icons-outlined">edit</span>
                    </label>
                    <input type="file" id="fileInput" name="photo" form="editProfileForm" accept="image/*">
                </div>

                <!-- FORM UPDATE PROFIL -->
                <form id="editProfileForm" class="profile-form" method="POST"
                    action="{{ route('dashboardRT.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="name" value="{{ old('name', $user->name ?? '') }}"
                        required>

                    <label for="hp">Nomor HP</label>
                    <input type="text" id="hp" name="no_hp" value="{{ old('no_hp', $user->no_hp ?? '') }}">

                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat"
                        value="{{ old('alamat', $user->alamat ?? '') }}">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                        required>

                    <div class="buttons">
                        <a href="{{ url()->previous() }}" class="btn cancel">Batal</a>
                        <button type="submit" class="btn save">Simpan</button>
                    </div>
                </form>
            </div>

            @include('dashboardRT.layout.footer')
        </div>
    </div>

    <script>
        // Preview foto profil (client-side)
        const fileInput = document.getElementById("fileInput");
        const profileImg = document.getElementById("profileImg");
        if (fileInput) {
            fileInput.addEventListener("change", (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => profileImg.src = e.target.result;
                    reader.readAsDataURL(file);
                }
            });
        }
    </script>
</body>

</html>
