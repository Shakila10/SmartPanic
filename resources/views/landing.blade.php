<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Panic Button</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --maroon: #800020;
            --cream: #F4EBD0;
            --accent: #ff3535ff;
            --dark: #3A3A3A;
            --light-cream: #FFFCEF; 
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--cream);
            color: var(--dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            /* Padding atas disesuaikan dengan header fixed */
            padding-top: 71px; 
            /* Padding bawah ditingkatkan untuk memberi ruang di atas footer fixed */
            padding-bottom: 70px; 
        }

        /* --- STICKY HEADER --- */
       header {
            background-color: var(--cream);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 35px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            /* Bayangan yang lebih lembut */
            box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
            border-bottom: 1px solid var(--light-gray);
        }

         .logo-text { 
            font-size: 1.25rem; 
            font-weight: 700; 
            color: var(--maroon);
        }


        /* LOGO, NAVIGATION, HERO, FEATURES, ABOUT (CSS inti tidak diubah) */

        .logo { display: flex; align-items: center; gap: 8px; }
        .logo img { height: 55px; width: auto; object-fit: contain; }
        nav { display: flex; align-items: center; gap: 20px; }
        nav a { text-decoration: none; color: var(--maroon); font-weight: 500; font-size: 0.9rem; transition: color 0.3s; }
        nav a:hover { color: var(--accent); }
        .profile { background-color: var(--maroon); color: white; padding: 5px 12px; border-radius: 25px; display: flex; align-items: center; gap: 6px; font-weight: 500; font-size: 0.85rem; transition: 0.3s; text-decoration: none; }
        .profile:hover { background-color: #9b0028; transform: scale(1.05); }
        .hero { background-color: var(--maroon); color: white; display: flex; justify-content: center; align-items: center; padding: 80px 40px; flex-wrap: wrap; gap: 50px; text-align: left; }
        .hero-content { max-width: 500px; }
        .hero h1 { font-size: 2.5rem; line-height: 1.2; margin-bottom: 12px; font-weight: 700; }
        .hero p { font-size: 1.1rem; opacity: 0.9; }
        .hero-image img { width: 320px; border-radius: 25px; box-shadow: 0 8px 20px rgba(0,0,0,0.25); }
        .features { text-align: center; padding: 70px 20px; background: var(--cream); }
        .features h2 { color: var(--maroon); font-size: 2rem; margin-bottom: 50px; font-weight: 600; }
        .feature-grid { display: flex; justify-content: center; flex-wrap: wrap; gap: 35px; }
        .feature { background: var(--maroon); color: white; width: 260px; height: 150px; border-radius: 15px; box-shadow: 0 8px 16px rgba(0,0,0,0.15); display: flex; flex-direction: column; justify-content: center; align-items: center; transition: 0.3s; font-size: 1.05rem; }
        .feature i { font-size: 2.3rem; margin-bottom: 10px; }
        .feature:hover { transform: translateY(-6px); background: #9b0028; }
        .about { background: var(--maroon); color: white; display: flex; justify-content: center; align-items: center; gap: 70px; flex-wrap: wrap; padding: 80px 50px; }
        .about-text { max-width: 500px; }
        .about h3 { font-size: 1.8rem; margin-bottom: 18px; font-weight: 600; }
        .about p { font-size: 1rem; line-height: 1.7; opacity: 0.95; }
        .about img { width: 300px; border-radius: 20px; box-shadow: 0 6px 20px rgba(0,0,0,0.3); }

        /* --- CONTACT SECTION --- */
        .contact-section {
            background: var(--cream); 
            color: var(--maroon);
            padding: 40px 0;
            text-align: center;
            border-top: 1px solid rgba(128,0,32,0.1);
            margin-bottom: 25px; 
        }

        .contact-content {
            display: flex;
            /* Mendorong ke kiri dan kanan */
            justify-content: space-between; 
            align-items: flex-start;
            flex-wrap: wrap;
            /* Mengatur lebar maksimum dan ruang tepi */
            max-width: 1000px; /* Lebar yang lebih ideal untuk dua kolom */
            margin: 0 auto;
            padding: 0 50px; 
        }

        .contact-item-group {
            /* Penting: Pastikan teks rata kiri secara default */
            max-width: 350px;
            text-align: left; 
            line-height: 1.6;
        }

        .contact-item-group strong {
            font-size: 1.2rem;
            display: block;
            margin-bottom: 15px;
            color: var(--maroon);
            font-weight: 700;
        }
        
        .contact-us-details {
            /* Pastikan Kontak Kami berada di sebelah kanan */
            margin-left: auto;
            max-width: 350px;
        }

        /* Perbaikan styling untuk menampung IG */
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .contact-item a {
            color: var(--maroon);
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-item a:hover {
            color: var(--accent);
        }

        .contact-item i {
            margin-right: 10px;
            color: var(--maroon);
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }


        /* --- FOOTER (HANYA COPYRIGHT - FIXED) --- */
        footer {
            background: var(--maroon); 
            color: white;
            text-align: center;
            padding: 15px 20px; 
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 -1px 4px rgba(0,0,0,0.2);
        }

        footer p {
            margin: 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }


        /* RESPONSIVE */
        @media (max-width: 768px) {
            body {
                padding-top: 120px;
                padding-bottom: 47px; 
            }

            header { flex-direction: column; gap: 10px; text-align: center; padding: 10px; }
            nav { flex-wrap: wrap; justify-content: center; }

            .contact-section { margin-bottom: 0; padding-bottom: 60px; }

            .contact-content {
                flex-direction: column;
                gap: 25px;
                align-items: center;
                padding: 0 20px; 
            }
            
            .contact-item-group {
                max-width: 100%;
                text-align: center; /* Pusatkan di mobile */
            }

            .contact-us-details { margin-left: 0; }

            .contact-item { justify-content: center; }
        }
    </style>
</head>

<body>
    <header>
    <div class="logo">
        <img src="{{ asset('images/LogoCreamSmartPanic.png') }}" alt="Smart Panic Logo">
        <span class="logo-text">Smart Panic</span>
    </div>
    <nav>
        <a href="#home">Home</a>
        <a href="#fitur">Fitur</a>
        <a href="#about">About Us</a>
        <a href="#contact-section">Contact</a>
        <a href="#" class="profile"> <i class="fa-solid fa-user"></i> Profil </a>
    </nav>
</header>

    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Keamanan Dalam Genggaman Anda</h1>
            <p>Laporkan keadaan darurat dengan cepat, tepat, dan terpercaya hanya dengan satu sentuhan.</p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/LogoHP.png') }}" alt="Smart Panic App">
        </div>
    </section>

    <section class="features" id="fitur">
        <h2>Fitur Unggulan</h2>
        <div class="feature-grid">
            <div class="feature"><i class="fa-solid fa-triangle-exclamation"></i> Tambah Laporan</div>
            <div class="feature"><i class="fa-solid fa-graduation-cap"></i> Edukasi & Tips</div>
            <div class="feature"><i class="fa-solid fa-id-card"></i> Profil</div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-text">
            <h3>Apa Itu Smart Panic Button?</h3>
            <p>
                Smart Panic Button adalah platform digital terpadu yang membantu warga melaporkan kejadian darurat 
                secara cepat dan akurat. Sistem ini secara otomatis mengirimkan notifikasi dan lokasi pelapor kepada 
                pihak berwenang seperti pengurus RT dan warga sekitar untuk penanganan segera.
            </p>
        </div>
        <div class="about-image">
            <img src="{{ asset('images/LogoHP.png') }}" alt="Smart Panic Illustration">
        </div>
    </section>

    <section class="contact-section" id="contact-section">
        <div class="contact-content">
            <div class="contact-item-group">
                <strong>Smart Panic Button</strong>
                Solusi cepat dan aman untuk pelaporan keadaan darurat masyarakat.
            </div>
            <div class="contact-item-group contact-us-details">
                <strong>Kontak Kami</strong>
                <div class="contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:smartpanic@gmail.com">smartpanic@gmail.com</a>
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:+6289634561160">0896-3456-1160</a>
                </div>
                <div class="contact-item">
                    <i class="fa-brands fa-instagram"></i>
                    <a href="" target="_blank">@smartpanic_official</a>
                </div>
                <div class="contact-item">
                    <i class=""></i>
                    <a href="" target="_blank"></a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2025 Smart Panic Button. All Rights Reserved.</p>
    </footer>
</body>
</html>

