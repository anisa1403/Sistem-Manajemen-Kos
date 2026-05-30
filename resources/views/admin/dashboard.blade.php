@extends('layouts.admin')

@section('title', 'Admin Dashboard — Arterra Living')

@push('styles')
<style>:root{
            --bg:#080b10;
            --surface:#0d1117;
            --glass:rgba(10,12,18,.82);
            --border:rgba(180,148,72,.18);
            --gold:#c9a84c;
            --gold-light:#e2c97e;
            --gold-dim:rgba(201,168,76,.12);
            --text:#e8e0d0;
            --muted:#8a8070;
            --white:#f5f0e8;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            font-family:'Jost',sans-serif;
            background:var(--bg);
            color:var(--text);
            overflow-x:hidden;
        }
        a{
            text-decoration:none;
            color:inherit;
        }
        
        @keyframes slideUpMenu{
            from{
                opacity:0;
                transform:translateY(8px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .main{
            display:flex;
            flex-direction:column;
        }
       
        .hero{
            position:relative;
            min-height:100vh;
            display:flex;
            align-items:center;
            overflow:hidden;
            border-radius:24px;
            margin: 20px;
        }
        .hero-bg{
            position:absolute;
            inset:0;
            border-radius:24px;
            background:
                linear-gradient(
                    to right,
                    rgba(8,11,16,.96) 30%,
                    rgba(8,11,16,.5) 100%
                ),
                url('https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=1600&q=80')
                center/cover no-repeat;
        }
        .hero-overlay{
            position:absolute;
            inset:0;
            background:
                radial-gradient(
                    ellipse at 80% 50%,
                    rgba(201,168,76,.08),
                    transparent 60%
                );
        }
        .hero-content{
            position:relative;
            z-index:2;
            max-width:700px;
            padding:80px 72px;
        }
        .hero-eyebrow{
            display:flex;
            align-items:center;
            gap:14px;
            margin-bottom:28px;
            animation:fadeUp .8s;
        }
        .hero-eyebrow span{
            font-size:.64rem;
            letter-spacing:.28em;
            color:var(--gold);
            text-transform:uppercase;
        }
        .eyebrow-line{
            width:40px;
            height:1px;
            background:var(--gold);
        }
        .hero-title{
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(3rem,5vw,4.4rem);
            line-height:1.08;
            color:var(--white);
            margin-bottom:14px;
            animation:fadeUp .9s;
        }
        .hero-title em{
            font-style:italic;
            color:var(--gold-light);
        }
        .hero-subtitle{
            font-size:1rem;
            color:var(--muted);
            line-height:1.9;
            max-width:500px;
            margin-bottom:36px;
            animation:fadeUp 1s;
        }
        .hero-actions{
            display:flex;
            gap:14px;
            flex-wrap:wrap;
            animation:fadeUp 1.1s;
        }
        .btn-gold{
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:14px 28px;
            background:var(--gold);
            color:#111;
            border-radius:6px;
            font-size:.78rem;
            letter-spacing:.14em;
            text-transform:uppercase;
            font-weight:600;
            transition:.3s;
        }
        .btn-gold:hover{
            background:var(--gold-light);
            transform:translateY(-2px);
        }
        .btn-outline{
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:14px 28px;
            border:1px solid var(--border);
            border-radius:6px;
            font-size:.78rem;
            letter-spacing:.14em;
            text-transform:uppercase;
            color:var(--white);
            transition:.3s;
        }
        .btn-outline:hover{
            border-color:var(--gold);
            color:var(--gold-light);
            transform:translateY(-2px);
        }
        /* =========================
            FLOATING STATS
        ========================= */
        .hero-stats{
            position:absolute;
            right:60px;
            top:50%;
            transform:translateY(-50%);
            display:flex;
            flex-direction:column;
            gap:14px;
            z-index:2;
        }
        .hero-stat{
            background:rgba(13,17,23,.85);
            border:1px solid var(--border);
            border-radius:16px;
            padding:20px;
            min-width:180px;
            backdrop-filter:blur(14px);
            animation:fadeLeft .8s;
        }
        .hero-stat-icon{
            width:34px;
            height:34px;
            border-radius:10px;
            background:var(--gold-dim);
            display:flex;
            align-items:center;
            justify-content:center;
            color:var(--gold);
            margin-bottom:10px;
        }
        .hero-stat-value{
            font-family:'Cormorant Garamond',serif;
            font-size:1.8rem;
            color:var(--white);
            margin-bottom:4px;
        }
        .hero-stat-label{
            font-size:.64rem;
            letter-spacing:.18em;
            color:var(--muted);
            text-transform:uppercase;
        }
        /* =========================
            SECTION
        ========================= */
        .section{
            padding:30px 72px;
            border-top:1px solid var(--border);
        }
        .section-header{
            margin-bottom:50px;
        }
        .section-eyebrow{
            font-size:.62rem;
            letter-spacing:.24em;
            text-transform:uppercase;
            color:var(--gold);
            margin-bottom:10px;
        }
        .section-title{
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2rem,4vw,3rem);
            color:var(--white);
        }
        .section-title em{
            color:var(--gold-light);
            font-style:italic;
        }
        
        .stats-grid{
            display:grid;
            grid-template-columns:repeat(5,minmax(0, 1fr));
            gap:12px;
        }
        .stat-card{
            background:rgba(13,17,23,.75);
            border:1px solid var(--border);
            border-radius:18px;
            padding:28px 24px;
            transition:.3s;
            position:relative;
            overflow:hidden;
        }
        .stat-card:hover{
            transform:translateY(-4px);
            border-color:rgba(201,168,76,.4);
        }
        .stat-card::before{
            content:'';
            position:absolute;
            top:0;
            left:0;
            right:0;
            height:2px;
            background:linear-gradient(
                to right,
                transparent,
                var(--gold),
                transparent
            );
            opacity:0;
            transition:.3s;
        }
        .stat-card:hover::before{
            opacity:1;
        }
        .stat-icon{
            width:38px;
            height:38px;
            border-radius:10px;
            background:var(--gold-dim);
            display:flex;
            align-items:center;
            justify-content:center;
            color:var(--gold);
            margin-bottom:16px;
        }
        .stat-label{
            font-size:.68rem;
            letter-spacing:.14em;
            text-transform:uppercase;
            color:var(--muted);
            margin-bottom:8px;
        }
        .stat-value{
            font-family:'Cormorant Garamond',serif;
            font-size:2.2rem;
            color:var(--white);
            margin-bottom:8px;
        }
        .stat-note{
            font-size:.8rem;
            color:var(--muted);
            line-height:1.7;
        }

        .actions-grid{
            display:grid;
            grid-template-columns:repeat(5,minmax(0,1fr));
            gap:12px;
        }
        .action-card{
            background:rgba(13,17,23,.72);
            border:1px solid var(--border);
            border-radius:16px;
            padding:24px;
            transition:.3s;
            display:flex;
            flex-direction:column;
            gap:12px;
        }
        .action-card:hover{
            transform:translateY(-4px);
            background:var(--gold-dim);
            border-color:rgba(201,168,76,.35);
        }
        .action-card-icon{
            width:42px;
            height:42px;
            border-radius:12px;
            background:var(--gold-dim);
            display:flex;
            align-items:center;
            justify-content:center;
            color:var(--gold);
        }
        .action-card-title{
            color:var(--white);
            font-size:.95rem;
        }
        .action-card-desc{
            color:var(--muted);
            line-height:1.7;
            font-size:.8rem;
        }
        .action-arrow{
            margin-top:auto;
            color:var(--gold);
            opacity:0;
            transform:translateX(-6px);
            transition:.3s;
        }
        .action-card:hover .action-arrow{
            opacity:1;
            transform:translateX(0);
        }

        .footer{
            padding:28px 72px;
            border-top:1px solid var(--border);
            display:flex;
            justify-content:space-between;
            gap:20px;
            color:var(--muted);
            font-size:.74rem;
        }
        .footer-brand{
            color:var(--gold-light);
            font-family:'Cormorant Garamond',serif;
            font-size:1rem;
        }

        .modal-overlay{
            position:fixed;
            inset:0;
            background:rgba(4,6,10,.85);
            backdrop-filter:blur(10px);
            display:flex;
            align-items:center;
            justify-content:center;
            z-index:999;
            opacity:0;
            pointer-events:none;
            transition:.3s;
        }
        .modal-overlay.show{
            opacity:1;
            pointer-events:all;
        }
        .modal{
            width:90%;
            max-width:400px;
            background:#0d1117;
            border:1px solid var(--border);
            border-radius:22px;
            padding:42px;
            text-align:center;
            transform:scale(.9);
            transition:.35s cubic-bezier(.34,1.56,.64,1);
            position:relative;
        }
        .modal-overlay.show .modal{
            transform:scale(1);
        }
        .modal-icon{
            width:68px;
            height:68px;
            border-radius:50%;
            background:rgba(239,68,68,.12);
            border:1px solid rgba(239,68,68,.24);
            display:flex;
            align-items:center;
            justify-content:center;
            color:#f87171;
            margin:0 auto 24px;
        }
        .modal-title{
            font-family:'Cormorant Garamond',serif;
            font-size:1.8rem;
            color:var(--white);
            margin-bottom:12px;
        }
        .modal-desc{
            color:var(--muted);
            line-height:1.8;
            margin-bottom:32px;
            font-size:.88rem;
        }
        .modal-actions{
            display:flex;
            gap:12px;
        }
        .btn-cancel,
        .btn-logout{
            flex:1;
            padding:13px;
            border-radius:10px;
            cursor:pointer;
            font-family:'Jost',sans-serif;
            transition:.3s;
            border:none;
        }
        .btn-cancel{
            background:transparent;
            border:1px solid var(--border);
            color:var(--muted);
        }
        .btn-cancel:hover{
            border-color:var(--gold);
            color:var(--gold-light);
        }
        .btn-logout{
            background:rgba(239,68,68,.15);
            border:1px solid rgba(239,68,68,.3);
            color:#f87171;
            font-weight:600;
        }
        .btn-logout:hover{
            background:rgba(239,68,68,.22);
        }
    
        .reveal{
            opacity:0;
            transform:translateY(28px);
            transition:.8s ease;
        }
        .reveal.visible{
            opacity:1;
            transform:translateY(0);
        }
        
        @keyframes fadeUp{
            from{
                opacity:0;
                transform:translateY(24px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }
        @keyframes fadeLeft{
            from{
                opacity:0;
                transform:translateX(24px);
            }
            to{
                opacity:1;
                transform:translateX(0);
            }
        }
        @media(max-width:980px){
        .hero-stats{
                display:none;
            }
            .hero-content,
            .section,
            .footer{
                padding-left:32px;
                padding-right:32px;
            }
            .footer{
                flex-direction:column;
                text-align:center;
            }
        }
</style>
@endpush

@section('content')
        <section class="hero">

            <div class="hero-bg"></div>
            <div class="hero-overlay"></div>

            <div class="hero-content">

                <div class="hero-eyebrow">
                    <div class="eyebrow-line"></div>
                    <span>Arterra Living — Admin Panel</span>
                    <div class="eyebrow-line"></div>
                </div>

                <h1 class="hero-title">
                    Selamat Datang,<br>
                    <em>Administrator</em>
                </h1>

                <p class="hero-subtitle">
                    Kelola seluruh operasional hunian Anda dari satu dashboard dan mudah digunakan. Pantau statistik, kelola kamar, dan atur data penghuni dengan efisien.
                </p>

                <div class="hero-actions">

                    <a href="/admin/kamar" class="btn-gold">
                        <i data-feather="layers"></i>
                        Kelola Kamar
                    </a>

                    <a href="/admin/pembayaran" class="btn-outline">
                        <i data-feather="credit-card"></i>
                        Pembayaran
                    </a>

                </div>

            </div>

        </section>

        <section class="section reveal">

            <div class="section-header">
                <div class="section-eyebrow">
                    Statistik Utama
                </div>

                <div class="section-title">
                    Ringkasan <em>Operasional</em>
                </div>
            </div>

            <div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon">
            <i data-feather="users"></i>
        </div>
        <div class="stat-label">Total Pengguna</div>
        <div class="stat-value">{{ $totalUsers ?? 0 }}</div>
        <div class="stat-note">Penyewa terdaftar di sistem.</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i data-feather="layers"></i>
        </div>
        <div class="stat-label">Total Kamar</div>
        <div class="stat-value">{{ $totalKamar ?? 0 }}</div>
        <div class="stat-note">Seluruh kamar yang tersedia.</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i data-feather="file-text"></i>
        </div>
        <div class="stat-label">Total Sewa</div>
        <div class="stat-value">{{ $totalSewa ?? 0 }}</div>
        <div class="stat-note">Transaksi sewa tercatat.</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i data-feather="clock"></i>
        </div>
        <div class="stat-label">Total Pembayaran</div>
        <div class="stat-value">{{ $pendingPayments ?? 0 }}</div>
        <div class="stat-note">Jumlah transaksi pembayaran tercatat.</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i data-feather="trending-up"></i>
        </div>
        <div class="stat-label">Total Pendapatan</div>
        <div class="stat-value">
            Rp {{ number_format($validRevenue ?? 0, 0, ',', '.') }}
        </div>
        <div class="stat-note">Akumulasi pendapatan.</div>
    </div>

            </div>

        </section>

        <section class="section reveal">

            <div class="section-header">
                <div class="section-eyebrow">
                    Navigasi Cepat
                </div>
                <div class="section-title">
                    Modul <em>Manajemen</em>
                </div>

            </div>

            <div class="actions-grid">

                <a href="/admin/user" class="action-card">
                    <div class="action-card-icon">
                        <i data-feather="users"></i>
                    </div>
                    <div class="action-card-title">
                        Pengguna
                    </div>
                    <div class="action-card-desc">
                        Kelola seluruh data penghuni dan penyewa.
                    </div>
                    <div class="action-arrow">
                        <i data-feather="arrow-right"></i>
                    </div>
                </a>

                <a href="/admin/kamar" class="action-card">
                    <div class="action-card-icon">
                        <i data-feather="layers"></i>
                    </div>
                    <div class="action-card-title">
                        Kamar
                    </div>
                    <div class="action-card-desc">
                        Atur status dan informasi kamar.
                    </div>
                    <div class="action-arrow">
                        <i data-feather="arrow-right"></i>
                    </div>
                </a>

                <a href="/admin/tipe-kamar" class="action-card">
                    <div class="action-card-icon">
                        <i data-feather="layers"></i>
                    </div>
                    <div class="action-card-title">
                        Tipe Kamar
                    </div>
                    <div class="action-card-desc">
                        Atur informasi tipe kamar.
                    </div>
                    <div class="action-arrow">
                        <i data-feather="arrow-right"></i>
                    </div>
                </a>

                <a href="/admin/sewa" class="action-card">
                    <div class="action-card-icon">
                        <i data-feather="credit-card"></i>
                    </div>
                    <div class="action-card-title">
                        Sewa
                    </div>
                    <div class="action-card-desc">
                        Kelola data penyewaan kamar.
                    </div>

                    <div class="action-arrow">
                        <i data-feather="arrow-right"></i>
                    </div>
                </a>

                <a href="/admin/pembayaran" class="action-card">
                    <div class="action-card-icon">
                        <i data-feather="credit-card"></i>
                    </div>
                    <div class="action-card-title">
                        Pembayaran
                    </div>
                    <div class="action-card-desc">
                        Laporan transaksi pembayaran.
                    </div>
                    <div class="action-arrow">
                        <i data-feather="arrow-right"></i>
                    </div>
                </a>

            </div>

        </section>

        <footer class="footer">
            <div class="footer-brand">
                Arterra Living
            </div>

            <div>
                © 2026 Arterra Living · Comfy Residence
            </div>
        </footer>
@endsection
