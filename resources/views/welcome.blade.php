<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arterra Living - Comfy Residence</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C97A;
            --gold-dim: #7a6128;
            --navy: #0D1B2A;
            --navy-mid: #162236;
            --navy-light: #1E2F45;
            --navy-card: rgba(14, 25, 40, 0.85);
            --white: #F8F5EF;
            --white-dim: rgba(248, 245, 239, 0.7);
            --accent: #3B82F6;
            --font-display: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'DM Sans', sans-serif;
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }

        html { scroll-behavior: smooth; 
    }

        body {
            background: var(--navy);
            color: var(--white);
            font-family: var(--font-body);
            overflow-x: hidden;
        }

        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 3rem;
            background: linear-gradient(to bottom, rgba(13,27,42,0.95) 0%, transparent 100%);
            backdrop-filter: blur(4px);
            border-bottom: 1px solid rgba(201,168,76,0.12);
            transition: background 0.4s;
        }
        nav.scrolled {
            background: rgba(13,27,42,0.97);
            border-bottom-color: rgba(201,168,76,0.25);
        }
        .nav-logo {
            display: flex; flex-direction: column;
        }
        .nav-logo .est {
            font-family: var(--font-body);
            font-size: 0.55rem;
            letter-spacing: 0.35em;
            color: var(--gold);
            text-transform: uppercase;
        }
        .nav-logo .name {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--white);
            line-height: 1.1;
            letter-spacing: 0.04em;
        }
        .nav-logo .sub {
            font-size: 0.5rem;
            letter-spacing: 0.3em;
            color: var(--gold);
            text-transform: uppercase;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .nav-links a {
            text-decoration: none;
            font-size: 0.8rem;
            letter-spacing: 0.06em;
            padding: 0.5rem 1.2rem;
            border-radius: 4px;
            transition: all 0.25s;
            border: 1px solid transparent;
        }
        .nav-links .btn-ghost {
            color: var(--white-dim);
        }
        .nav-links .btn-ghost:hover {
            color: var(--white);
            border-color: rgba(201,168,76,0.3);
            background: rgba(201,168,76,0.07);
        }
        .nav-links .btn-outline {
            color: var(--white-dim);
            border-color: rgba(201,168,76,0.3);
        }
        .nav-links .btn-outline:hover {
            color: var(--gold);
            border-color: var(--gold);
            background: rgba(201,168,76,0.07);
        }
        .nav-links .btn-gold {
            background: var(--gold);
            color: var(--navy);
            font-weight: 500;
            border-color: var(--gold);
        }
        .nav-links .btn-gold:hover {
            background: var(--gold-light);
            border-color: var(--gold-light);
        }

        .btn-login{
            background: #ffffff;
            color: #2b1d0e;
            border: 2px solid #d4a762;
            padding: 10px 22px;
            border-radius: 999px;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-login:hover{
            background: #d4a762;
            color: white;
        }

        .hero {
            position: relative;
            height: 100vh;
            min-height: 650px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to bottom, rgba(13,27,42,0.55) 0%, rgba(13,27,42,0.3) 40%, rgba(13,27,42,0.75) 80%, rgba(13,27,42,1) 100%),
                url('https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=1920&q=85') center/cover no-repeat;
            transform: scale(1.04);
            transition: transform 8s ease-out;
        }
        .hero-bg.loaded { transform: scale(1); }
        .hero-particles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }
        .particle {
            position: absolute;
            width: 2px; height: 2px;
            background: var(--gold);
            border-radius: 50%;
            animation: float-up linear infinite;
            opacity: 0;
        }
        @keyframes float-up {
            0% { transform: translateY(100vh) translateX(0); opacity: 0; }
            10% { opacity: 0.6; }
            90% { opacity: 0.3; }
            100% { transform: translateY(-10vh) translateX(20px); opacity: 0; }
        }
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            padding: 0 2rem;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.65rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gold);
            border: 1px solid rgba(201,168,76,0.4);
            padding: 0.4rem 1.2rem;
            border-radius: 100px;
            margin-bottom: 1.5rem;
            opacity: 0;
            animation: fade-up 0.8s ease forwards 0.3s;
        }
        .hero-badge::before {
            content: '';
            width: 4px; height: 4px;
            border-radius: 50%;
            background: var(--gold);
        }
        .hero-title {
            font-family: var(--font-display);
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 300;
            line-height: 1.08;
            letter-spacing: 0.02em;
            margin-bottom: 1rem;
            opacity: 0;
            animation: fade-up 1s ease forwards 0.5s;
        }
        .hero-title em {
            font-style: italic;
            color: var(--gold-light);
        }
        .hero-sub {
            font-size: 1rem;
            color: var(--white-dim);
            font-weight: 300;
            letter-spacing: 0.04em;
            max-width: 500px;
            margin: 0 auto 2.5rem;
            line-height: 1.7;
            opacity: 0;
            animation: fade-up 1s ease forwards 0.7s;
        }
        .hero-cta {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            animation: fade-up 1s ease forwards 0.9s;
        }
        .cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.85rem 2rem;
            background: var(--gold);
            color: var(--navy);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border-radius: 4px;
            border: 1px solid var(--gold);
            transition: all 0.3s;
        }
        .cta-primary:hover { 
            background: var(--gold-light); 
            border-color: var(--gold-light); 
            transform: translateY(-2px); 
            box-shadow: 0 12px 30px rgba(201,168,76,0.3); 
        }
        .cta-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.85rem 2rem;
            background: transparent;
            color: var(--white);
            text-decoration: none;
            font-weight: 400;
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border-radius: 4px;
            border: 1px solid rgba(248,245,239,0.35);
            transition: all 0.3s;
        }
        .cta-secondary:hover { 
            border-color: var(--white); 
            background: rgba(248,245,239,0.08); 
            transform: translateY(-2px); 
        }
        .hero-scroll {
            position: absolute;
            bottom: 2.5rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: var(--gold);
            font-size: 0.55rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            opacity: 0;
            animation: fade-up 1s ease forwards 1.3s;
        }
        .scroll-line {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, var(--gold), transparent);
            animation: scroll-pulse 2s ease-in-out infinite;
        }
        @keyframes scroll-pulse {
            0%, 100% { opacity: 0.4; transform: scaleY(1); }
            50% { opacity: 1; transform: scaleY(1.2); }
        }

        @keyframes fade-up {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stats-bar {
            background: rgba(201,168,76,0.06);
            border-top: 1px solid rgba(201,168,76,0.2);
            border-bottom: 1px solid rgba(201,168,76,0.2);
            padding: 1.5rem 3rem;
            display: flex;
            justify-content: center;
            gap: 4rem;
            flex-wrap: wrap;
        }
        .stat-item { 
            text-align: center; 
        }
        .stat-num {
            font-family: var(--font-display);
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--gold-light);
            display: block;
        }
        .stat-label {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--white-dim);
        }


        section { padding: 6rem 3rem; }

        .section-label {
            font-size: 0.6rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .section-label::before {
            content: '';
            width: 30px; height: 1px;
            background: var(--gold);
        }
        .section-title {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 300;
            line-height: 1.15;
            margin-bottom: 1rem;
        }
        .section-title em {
            font-style: italic;
            color: var(--gold-light);
        }
        .section-body {
            font-size: 0.95rem;
            color: var(--white-dim);
            line-height: 1.8;
            max-width: 520px;
        }

        .why-section { background: var(--navy-mid); }
        .why-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            max-width: 1100px;
            margin: 0 auto;
            align-items: center;
        }
        .why-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-top: 3rem;
        }
        .feature-card {
            background: rgba(201,168,76,0.05);
            border: 1px solid rgba(201,168,76,0.15);
            border-radius: 8px;
            padding: 1.5rem;
            transition: all 0.35s;
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s;
        }
        .feature-card:hover { background: rgba(201,168,76,0.1); border-color: rgba(201,168,76,0.35); transform: translateY(-4px); }
        .feature-card:hover::before { transform: scaleX(1); }
        .feature-icon {
            width: 40px; height: 40px;
            background: rgba(201,168,76,0.1);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
        .feature-name {
            font-family: var(--font-display);
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
        }
        .feature-desc {
            font-size: 0.78rem;
            color: var(--white-dim);
            line-height: 1.6;
        }
        .why-image-wrap {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
        }
        .why-image-wrap img {
            width: 100%;
            aspect-ratio: 4/5;
            object-fit: cover;
            display: block;
            border-radius: 12px;
            filter: brightness(0.85);
            transition: filter 0.4s;
        }
        .why-image-wrap:hover img { filter: brightness(0.95); }
        .why-image-badge {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            right: 1.5rem;
            background: rgba(13,27,42,0.9);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(201,168,76,0.25);
            border-radius: 8px;
            padding: 1rem 1.2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .badge-star {
            font-size: 1.5rem;
            color: var(--gold);
        }
        .badge-text { 
            font-size: 0.8rem; 
            color: var(--white-dim); 
            line-height: 1.5; 
        }
        .badge-text strong { 
            display: block; 
            color: var(--white); 
            font-size: 0.9rem; 
            margin-bottom: 0.1rem; 
        }

        .maps-section {
            background: var(--navy);
            max-width: 1100px;
            margin: 0 auto;
            padding: 6rem 0;
        }
        .maps-wrapper {
            max-width: 1100px;
            margin: 3rem auto 0;
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 3rem;
            align-items: start;
        }
        .maps-info {}
        .maps-address {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
            padding: 1.2rem;
            background: rgba(201,168,76,0.05);
            border: 1px solid rgba(201,168,76,0.15);
            border-radius: 8px;
        }
        .maps-address .addr-icon { 
            font-size: 1.2rem; 
            margin-top: 2px; 
        }
        .maps-address .addr-text { 
            font-size: 0.85rem; 
            color: var(--white-dim); 
            line-height: 1.7; 
        }
        .maps-address .addr-text strong { 
            display: block; 
            color: var(--white); 
            margin-bottom: 0.25rem; 
            font-size: 0.9rem; 
        }
        .map-embed {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(201,168,76,0.2);
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        }
        .map-embed iframe {
            width: 100%; height: 380px; display: block; border: none;
        }

        .gallery-strip {
            padding: 2rem 0;
            overflow: hidden;
            background: var(--navy-mid);
            position: relative;
        }
        .gallery-strip::before,
        .gallery-strip::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 120px;
            z-index: 2;
        }
        .gallery-strip::before { 
            left: 0; 
            background: linear-gradient(to right, var(--navy-mid), transparent); 
        }
        .gallery-strip::after { 
            right: 0; 
            background: linear-gradient(to left, var(--navy-mid), transparent); 
        }
        .gallery-track {
            display: flex;
            gap: 1rem;
            animation: marquee 30s linear infinite;
            width: max-content;
        }
        .gallery-track:hover { animation-play-state: paused; }
        @keyframes marquee {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        .gallery-img {
            width: 220px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            flex-shrink: 0;
            filter: brightness(0.75) saturate(0.85);
            transition: all 0.4s;
        }
        .gallery-img:hover { 
            filter: brightness(0.95) 
            saturate(1.1); 
            transform: scale(1.03); 
        }

        footer {
            background: rgba(0,0,0,0.4);
            border-top: 1px solid rgba(201,168,76,0.2);
            padding: 3rem 3rem 2rem;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 3rem;
            max-width: 1100px;
            margin: 0 auto 3rem;
        }
        .footer-brand .name {
            font-family: var(--font-display);
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .footer-brand p {
            font-size: 0.82rem;
            color: var(--white-dim);
            line-height: 1.7;
            max-width: 260px;
        }
        .footer-socials {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }
        .social-btn {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: rgba(201,168,76,0.08);
            border: 1px solid rgba(201,168,76,0.25);
            display: flex; align-items: center; justify-content: center;
            text-decoration: none;
            color: var(--white-dim);
            font-size: 1rem;
            transition: all 0.3s;
        }
        .social-btn:hover { 
            background: var(--gold); 
            border-color: var(--gold); 
            color: var(--navy); 
            transform: translateY(-3px); 
        }
        .footer-col h4 {
            font-family: var(--font-display);
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--gold-light);
            margin-bottom: 1.2rem;
        }
        .footer-col ul { 
            list-style: none; 
        }
        .footer-col ul li { 
            margin-bottom: 0.6rem; 
        }
        .footer-col ul li a {
            text-decoration: none;
            color: var(--white-dim);
            font-size: 0.82rem;
            transition: color 0.2s;
        }
        .footer-col ul li a:hover { 
            color: var(--gold-light); 
        }
        .footer-bottom {
            max-width: 1100px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid rgba(201,168,76,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.72rem;
            color: rgba(248,245,239,0.4);
        }
        .gold-divider {
            width: 40px; height: 1px;
            background: var(--gold);
            margin: 1.2rem 0;
        }

        .wa-float {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 999;
        }
        .wa-btn {
            width: 56px; height: 56px;
            border-radius: 50%;
            background: #25D366;
            display: flex; 
            align-items: center; 
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(37,211,102,0.5);
            animation: wa-pulse 3s ease-in-out infinite;
            transition: transform 0.3s;
        }
        .wa-btn:hover { transform: scale(1.1); }
        @keyframes wa-pulse {
            0%, 100% { box-shadow: 0 4px 20px rgba(37,211,102,0.5); }
            50% { box-shadow: 0 4px 35px rgba(37,211,102,0.8), 0 0 0 8px rgba(37,211,102,0.1); }
        }
        .wa-tooltip {
            position: absolute;
            right: 70px;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(13,27,42,0.95);
            border: 1px solid rgba(201,168,76,0.25);
            color: var(--white);
            font-size: 0.75rem;
            padding: 0.5rem 0.9rem;
            border-radius: 6px;
            white-space: nowrap;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .wa-float:hover .wa-tooltip { opacity: 1; }

        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-left {
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal-left.visible { 
            opacity: 1; 
        transform: translateX(0); 
    }
        .reveal-right {
            opacity: 0;
            transform: translateX(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal-right.visible { 
            opacity: 1; 
            transform: translateX(0); 
        }
        .delay-1 { 
            transition-delay: 0.1s; 
        }
        .delay-2 { 
            transition-delay: 0.2s; 
        }
        .delay-3 { 
            transition-delay: 0.3s; 
        }
        .delay-4 { 
            transition-delay: 0.4s; 
        }

        @media (max-width: 768px) {
            nav { padding: 1rem 1.5rem; }
            nav .nav-links .btn-ghost { display: none; }
            section { padding: 4rem 1.5rem; }
            .why-grid { grid-template-columns: 1fr; gap: 2.5rem; }
            .why-image-wrap { order: -1; }
            .why-image-wrap img { aspect-ratio: 16/9; }
            .maps-wrapper { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
            .footer-bottom { flex-direction: column; gap: 0.5rem; text-align: center; }
            .stats-bar { gap: 2rem; padding: 1.5rem; }
        }
    </style>
</head>
<body>

<nav id="navbar">
    <div class="nav-logo">
        <span class="est">Est. 2026</span>
        <span class="name">Arterra Living</span>
        <span class="sub">Comfy Residence</span>
    </div>
    <div class="nav-links">
        <a href="#why" class="btn-ghost">Kenapa Kami</a>
        <a href="#lokasi" class="btn-ghost">Lokasi</a>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/') }}" class="btn-outline">Dashboard</a>
                
            @else
                <a href="{{ route('login') }}" class="btn-outline">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-gold">Daftar Sekarang</a>
                @endif
            @endauth
        @endif
    </div>
</nav>

<section class="hero" id="hero">
    <div class="hero-bg" id="heroBg"></div>
    <div class="hero-particles" id="particles"></div>
    <div class="hero-content">
        <div class="hero-badge">✦ Comfy Residence · Kos Eksklusif</div>
        <h1 class="hero-title">
            Temukan <em>Hunian</em><br>Terbaik Anda
        </h1>
        <p class="hero-sub">
            Nikmati kenyamanan tinggal di Arterra Living, ruang hidup modern yang dirancang untuk kualitas dan ketenangan.
        </p>
        <div class="hero-cta">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="cta-primary">
                    <i data-feather="home" width="14" height="14"></i>
                    Lihat Kamar Tersedia
                </a>
            @endif
            <a href="#why" class="cta-secondary">
                Pelajari Lebih Lanjut
                <i data-feather="arrow-right" width="14" height="14"></i>
            </a>
        </div>
    </div>
    <div class="hero-scroll">
        <div class="scroll-line"></div>
        <span>Scroll</span>
    </div>
</section>

<!-- STATS BAR -->
<div class="stats-bar">
    <div class="stat-item reveal delay-1">
        <span class="stat-num">50+</span>
        <span class="stat-label">Penghuni Bahagia</span>
    </div>
    <div class="stat-item reveal delay-2">
        <span class="stat-num">4.9★</span>
        <span class="stat-label">Rating Penghuni</span>
    </div>
    <div class="stat-item reveal delay-3">
        <span class="stat-num">24/7</span>
        <span class="stat-label">Layanan Admin</span>
    </div>
    <div class="stat-item reveal delay-4">
        <span class="stat-num">100%</span>
        <span class="stat-label">Aman & Terjamin</span>
    </div>
</div>

<div id="why" class="why-section">
    <div style="padding: 6rem 3rem;">
        <div class="why-grid">
            <div>
                <div class="section-label reveal">Keunggulan Kami</div>
                <h2 class="section-title reveal delay-1">Mengapa Memilih <em>Arterra Living?</em></h2>
                <div class="gold-divider reveal delay-2"></div>
                <p class="section-body reveal delay-2">
                    Kami menghadirkan pengalaman tinggal yang lebih dari sekadar kamar kos. Fasilitas lengkap, lingkungan aman, dan manajemen profesional untuk kenyamanan hidup Anda sehari-hari.
                </p>
                <div class="why-features">
                    <div class="feature-card reveal delay-1">
                        <div class="feature-icon"><i data-feather="shield" width="24" height="24"></i></div>
                        <div class="feature-name">Keamanan 24 Jam</div>
                        <div class="feature-desc">CCTV aktif dan akses kunci digital untuk keamanan penuh Anda.</div>
                    </div>
                    <div class="feature-card reveal delay-2">
                        <div class="feature-icon"><i data-feather="wifi" width="24" height="24"></i></div>
                        <div class="feature-name">WiFi Supercepat</div>
                        <div class="feature-desc">Internet fiber optik tanpa batas untuk kerja & hiburan.</div>
                    </div>
                    <div class="feature-card reveal delay-3">
                        <div class="feature-icon"><i data-feather="star" width="24" height="24"></i></div>
                        <div class="feature-name">Kamar Bersih</div>
                        <div class="feature-desc">Layanan kebersihan rutin agar kamar selalu nyaman.</div>
                    </div>
                    <div class="feature-card reveal delay-4">
                        <div class="feature-icon"><i data-feather="credit-card" width="24" height="24"></i></div>
                        <div class="feature-name">Bayar Online</div>
                        <div class="feature-desc">Pembayaran sewa mudah, tagihan transparan via aplikasi.</div>
                    </div>
                    <div class="feature-card reveal delay-1">
                        <div class="feature-icon"><i data-feather="droplet" width="24" height="24"></i></div>
                        <div class="feature-name">Kamar Mandi Dalam</div>
                        <div class="feature-desc">Privasi lebih dengan kamar mandi pribadi di setiap unit.</div>
                    </div>
                    <div class="feature-card reveal delay-2">
                        <div class="feature-icon"><i data-feather="globe" width="24" height="24"></i></div>
                        <div class="feature-name">Lingkungan Asri</div>
                        <div class="feature-desc">Lokasi strategis dekat pusat kota namun tetap tenang.</div>
                    </div>
                </div>
            </div>
            <div class="why-image-wrap reveal-right">
                <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&q=85" alt="Kamar Arterra Living" loading="lazy">
                <div class="why-image-badge">
                    <div class="badge-star">★</div>
                    <div class="badge-text">
                        <strong>Penghuni Terpuaskan</strong>
                        "Nyaman, bersih, dan manajemen cepat tanggap. Sangat direkomendasikan!"
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gallery-strip">
    <div class="gallery-track" id="galleryTrack">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1555854877-bab0e564b8d5?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1484154218962-a197022b5858?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1540518614846-7eded433c457?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1555854877-bab0e564b8d5?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1484154218962-a197022b5858?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1540518614846-7eded433c457?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=400&q=80" alt="">
        <img class="gallery-img" src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=400&q=80" alt="">
    </div>
</div>

<section id="lokasi">
    <div class="maps-section">
        <div class="section-label reveal">Lokasi Kami</div>
        <h2 class="section-title reveal delay-1">Mudah Ditemukan, <em>Strategis</em></h2>
        <div class="maps-wrapper">
            <div class="maps-info reveal-left">
                <p class="section-body" style="margin-bottom: 1.5rem;">
                    Arterra Living berlokasi di posisi strategis, dekat dengan pusat kota, kampus, dan fasilitas umum. Mudah dijangkau dari berbagai penjuru kota.
                </p>
                <div class="maps-address">
                    <div class="addr-icon"><i data-feather="map-pin" width="18" height="18"></i></div>
                    <div class="addr-text">
                        <strong>Arterra Living · Comfy Residence</strong>
                        Jl. Patenggangan, Gang B No. 2<br>
                        Kecamatan Padang Utara, Kota Padang, 25172<br>
                        <span style="color: var(--gold); margin-top: 0.3rem; display: inline-block; font-size: 0.8rem;">Buka setiap hari · 06.00 – 22.00</span>
                    </div>
                </div>
                <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
                    <a href="https://wa.me/6285174087331?text=Halo%2C%20saya%20ingin%20menanyakan%20informasi%20tentang%20kos%20Arterra%20Living.%20Apakah%20masih%20ada%20kamar%20yang%20tersedia%3F" target="_blank" class="cta-primary" style="font-size: 0.78rem; padding: 0.65rem 1.4rem;">
                        <i data-feather="message-circle" width="16" height="16"></i> Tanya via WhatsApp
                    </a>
                </div>
            </div>
            <div class="map-embed reveal-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.333765826593!2d100.34269327448065!3d-0.8929698353217143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4bf975f551b39%3A0xefdb056a9ab63b05!2sOrange%20Mart!5e0!3m2!1sid!2sid!4v1779114247885!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="footer-grid">
        <div class="footer-brand reveal">
            <div class="name">Arterra Living</div>
            <div class="gold-divider" style="margin: 0.75rem 0;"></div>
            <p>Comfy residence untuk kehidupan Anda. Nyaman, aman, dan terjangkau, tempat Anda benar-benar bisa pulang.</p>
            <div class="footer-socials">
                <a href="https://instagram.com/" target="_blank" class="social-btn" title="Instagram" aria-label="Instagram">
                    <i data-feather="instagram" width="18" height="18"></i>
                </a>
                <a href="https://facebook.com/" target="_blank" class="social-btn" title="Facebook" aria-label="Facebook">
                    <i data-feather="facebook" width="18" height="18"></i>
                </a>
                <a href="https://wa.me/6285174087331?text=Halo%2C%20saya%20tertarik%20dengan%20kos%20Arterra%20Living.%20Boleh%20saya%20tanya%20informasi%20lebih%20lanjut%3F" target="_blank" class="social-btn" title="WhatsApp Admin" aria-label="WhatsApp" style="background: rgba(37,211,102,0.1); border-color: rgba(37,211,102,0.3); color: #25D366;">
                    <i data-feather="message-circle" width="18" height="18"></i>
                </a>
            </div>
        </div>
        <div class="footer-col reveal delay-2">
            <h4>Navigasi</h4>
            <ul>
                <li><a href="#hero">Beranda</a></li>
                <li><a href="#why">Fasilitas</a></li>
                <li><a href="#lokasi">Lokasi</a></li>
                @if (Route::has('login'))
                    <li><a href="{{ route('login') }}">Login Penghuni</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Daftar Baru</a></li>
                    @endif
                @endif
            </ul>
        </div>
        <div class="footer-col reveal delay-3">
            <h4>Kontak Admin</h4>
            <ul>
                <li><a href="https://wa.me/6285174087331?text=Halo%2C%20saya%20ingin%20menanyakan%20kamar%20kos%20Arterra%20Living." target="_blank"><i data-feather="phone"></i> 0851-7408-7331</a></li>
                <li><a href="https://instagram.com/" target="_blank"><i data-feather="instagram"></i> @arterraliving</a></li>
                <li><a href="mailto:admin@arterraliving.id"><i data-feather="mail"></i> admin@arterraliving.id</a></li>
                <li><a href="#lokasi"><i data-feather="map-pin"></i> Lihat Lokasi</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 Arterra Living by Ayuviana Khairunnisa' All rights reserved.</span>
        <span style="color: rgba(201,168,76,0.5);">Est. 2026 · Hunian Terbaik untuk Anda</span>
    </div>
</footer>

<div class="wa-float">
    <div class="wa-tooltip">Chat dengan Admin</div>
    <a class="wa-btn"
       href="https://wa.me/6285174087331?text=Halo%20Kak%2C%20saya%20tertarik%20dengan%20kos%20Arterra%20Living.%20Boleh%20tanya-tanya%20dulu%20ya%20Kak%3F%20%F0%9F%98%8A"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Chat WhatsApp Admin">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>
</div>

<script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 60);
    });

    const heroBg = document.getElementById('heroBg');
    heroBg.classList.add('loaded');
    window.addEventListener('scroll', () => {
        const y = window.scrollY;
        heroBg.style.transform = `scale(1) translateY(${y * 0.3}px)`;
    });

    const particlesEl = document.getElementById('particles');
    for (let i = 0; i < 18; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.left = Math.random() * 100 + '%';
        p.style.animationDuration = (8 + Math.random() * 14) + 's';
        p.style.animationDelay = (Math.random() * 10) + 's';
        p.style.width = p.style.height = (1 + Math.random() * 3) + 'px';
        particlesEl.appendChild(p);
    }
    
    const reveals = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.12 });
    reveals.forEach(el => observer.observe(el));

    document.addEventListener('DOMContentLoaded', () => {
        if (window.feather) {
            feather.replace();
        }
    });
</script>

</body>
</html>