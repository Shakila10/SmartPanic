<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Warga - Smart Panic</title>

    <!-- Google Fonts & Icons -->
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
        .profile { background-color: var(--color-primary); width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .profile .material-icons-outlined { color: var(--color-secondary); font-size: 26px; }

        /* === LAYOUT === */
        .container { display: flex; height: calc(100vh - 70px); margin-top: 70px; overflow: hidden; }

        /* === SIDEBAR === */
        .sidebar { width: 280px; background-color: var(--color-secondary); display: flex; flex-direction: column; justify-content: space-between; padding: 50px 25px 30px 25px; border-right: 3px solid var(--color-primary); box-sizing: border-box; }
        .menu { display: flex; flex-direction: column; gap: 18px; }
        .menu-item { display: flex; align-items: center; gap: 16px; padding: 10px; text-decoration: none; color: var(--color-primary); font-weight: 500; font-size: 16px; border-radius: 8px; transition: all 0.2s ease; }
        .menu-item:hover, .menu-item.active { background-color: var(--color-primary); color: var(--color-secondary); transform: translateX(5px); }
        .menu-item .material-icons-outlined { font-size: 26px; }

        /* === MAIN === */
        .main { flex: 1; background-color: var(--color-primary); display: flex; flex-direction: column; justify-content: space-between; padding: 30px 40px; position: relative; }

        .content-area { flex-grow: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 40px; padding-bottom: 60px; }
        .tips-container { position: relative; width: 80%; max-width: 650px; }
        .tips { background-color: var(--color-secondary); padding: 30px; border-radius: 12px; text-align: center; font-weight: 500; font-size: 16px; color: var(--color-primary); box-shadow: 0px 4px 10px rgba(0,0,0,0.15); line-height: 1.6; }
        .tips-icon::before { content: '💡'; position: absolute; top: -20px; right: -10px; font-size: 35px; transform: rotate(15deg); }

        .emergency { background-color: var(--color-secondary); color: var(--color-primary); padding: 25px; border-radius: 12px; width: 60%; max-width: 500px; box-shadow: 0px 4px 10px rgba(0,0,0,0.15); text-align: center; }
        .emergency-header { display: flex; justify-content: center; align-items: center; gap: 8px; font-weight: 600; font-size: 18px; margin-bottom: 20px; }
        .emergency-numbers { display: flex; justify-content: space-around; flex-wrap: wrap; gap: 20px; }
        .emergency-item { text-align: center; }
        .icon-bg { background-color: var(--color-accent); border-radius: 50%; width: 55px; height: 55px; display: flex; align-items: center; justify-content: center; margin: 0 auto 8px auto; }
        .icon-bg .material-icons-round { font-size: 32px; }

        /* === FOOTER === */
        footer { display: flex; justify-content: space-between; align-items: center; background-color: rgba(255,255,255,0.05); color: var(--color-secondary); font-size: 13.5px; padding: 14px 25px; border-top: 1px solid rgba(255,255,255,0.25); border-radius: 10px 10px 0 0; box-shadow: 0 -2px 6px rgba(0,0,0,0.2); }
        footer .left, footer .right { display: flex; align-items: center; gap: 8px; }
        footer .material-icons-outlined { font-size: 16px; color: var(--color-accent); }
    </style>
</head>
<body>

    @include('dashboardWarga.layout.header')

    <div class="container">
        @include('dashboardWarga.layout.sidebar')

        <div class="main">
            <div class="content-area">
                <div class="tips-container">
                    <div class="tips-icon"></div>
                    <div class="tips">
                        Jika terjadi kebakaran: <b>Tetap tenang</b>, gunakan tangga darurat, dan tutup pintu saat keluar.
                    </div>
                </div>

                <div class="emergency">
                    <div class="emergency-header">
                        <span class="material-icons-outlined">notifications_active</span> Kontak Darurat
                    </div>
                    <div class="emergency-numbers">
                        <div class="emergency-item">
                            <div class="icon-bg">
                                <span class="material-icons-round" style="color:#003f8a;">local_police</span>
                            </div>
                            <span>110</span>
                        </div>
                        <div class="emergency-item">
                            <div class="icon-bg">
                                <span class="material-icons-round" style="color:#c62828;">local_hospital</span>
                            </div>
                            <span>113</span>
                        </div>
                        <div class="emergency-item">
                            <div class="icon-bg">
                                <span class="material-icons-round" style="color:#ff6f00;">fire_extinguisher</span>
                            </div>
                            <span>118</span>
                        </div>
                    </div>
                </div>
            </div>

            @include('dashboardWarga.layout.footer')
        </div>
    </div>

</body>
</html>
