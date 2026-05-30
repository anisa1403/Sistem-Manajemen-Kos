@extends('layouts.admin')

@section('title', 'Admin — Detail Sewa')

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
        body::before{
            content:'';
            position:fixed;
            inset:0;
            background:
                radial-gradient(circle at top left,
                rgba(201,168,76,.08),
                transparent 28%);
            pointer-events:none;
            z-index:-1;
        }
        a{
            text-decoration:none;
            color:inherit;
        }
        
        .main{
            padding:42px;
            display:flex;
            flex-direction:column;
            gap:28px;
        }
        
        .hero{
            position:relative;
            overflow:hidden;
            border:1px solid var(--border);
            border-radius:30px;
            padding:54px;
            background:
                linear-gradient(
                    to right,
                    rgba(8,11,16,.96),
                    rgba(8,11,16,.72)
                ),
                url('https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=1400&q=80')
                center/cover no-repeat;
        }
        .hero::after{
            content:'';
            position:absolute;
            inset:0;
            background:
                radial-gradient(
                    circle at right,
                    rgba(201,168,76,.1),
                    transparent 40%
                );
        }
        .hero-content{
            position:relative;
            z-index:2;
            max-width:700px;
        }
        .hero-eyebrow{
            font-size:.65rem;
            letter-spacing:.28em;
            color:var(--gold);
            text-transform:uppercase;
            margin-bottom:18px;
            animation:fadeUp .8s ease;
        }
        .hero-title{
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.8rem,5vw,4.2rem);
            line-height:1.08;
            color:var(--white);
            margin-bottom:18px;
            animation:fadeUp 1s ease;
        }
        .hero-title em{
            color:var(--gold-light);
            font-style:italic;
        }
        .hero-subtitle{
            color:var(--muted);
            line-height:1.9;
            max-width:560px;
            margin-bottom:30px;
            animation:fadeUp 1.2s ease;
        }
        .hero-actions{
            display:flex;
            gap:14px;
            flex-wrap:wrap;
            animation:fadeUp 1.35s ease;
        }
        .btn-gold,
        .btn-outline{
            position:relative;
            overflow:hidden;
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:14px 26px;
            border-radius:8px;
            font-size:.76rem;
            letter-spacing:.16em;
            text-transform:uppercase;
            transition:.3s;
        }
        .btn-gold{
            background:var(--gold);
            color:#111;
            font-weight:600;
        }
        .btn-gold:hover{
            background:var(--gold-light);
            transform:translateY(-2px);
        }
        .btn-outline{
            border:1px solid var(--border);
            color:var(--white);
        }
        .btn-outline:hover{
            border-color:var(--gold);
            color:var(--gold-light);
            transform:translateY(-2px);
        }
        .btn-gold::before{
            content:'';
            position:absolute;
            inset:0;
            background:linear-gradient(
                120deg,
                transparent,
                rgba(255,255,255,.22),
                transparent
            );
            transform:translateX(-120%);
            transition:.8s;
        }
        .btn-gold:hover::before{
            transform:translateX(120%);
        }
        
        .detail-card{
            background:rgba(13,17,23,.78);
            border:1px solid var(--border);
            border-radius:28px;
            overflow:hidden;
            backdrop-filter:blur(18px);
            transition:
                transform .45s ease,
                border-color .45s ease,
                box-shadow .45s ease;
        }
        .detail-card:hover{
            transform:translateY(-3px);
            border-color:rgba(201,168,76,.28);
            box-shadow:
                0 24px 60px rgba(0,0,0,.45),
                0 0 40px rgba(201,168,76,.06);
        }
        .detail-header{
            padding:32px;
            border-bottom:1px solid var(--border);
            display:flex;
            justify-content:space-between;
            gap:20px;
            align-items:center;
            flex-wrap:wrap;
        }
        .detail-label{
            font-size:.65rem;
            letter-spacing:.24em;
            color:var(--gold);
            text-transform:uppercase;
        }
        .detail-title{
            font-family:'Cormorant Garamond',serif;
            font-size:2.2rem;
            color:var(--white);
            margin-top:10px;
        }
        .detail-subtitle{
            margin-top:12px;
            color:var(--muted);
            line-height:1.8;
            max-width:560px;
        }
        .detail-badge{
            padding:12px 18px;
            border-radius:999px;
            border:1px solid var(--border);
            background:var(--gold-dim);
            color:var(--gold-light);
            font-size:.76rem;
            letter-spacing:.12em;
            text-transform:uppercase;
            animation:pulseGlow 4s infinite ease-in-out;
        }
        .detail-content{
            padding:32px;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
            gap:18px;
        }
        .detail-item{
            background:rgba(255,255,255,.03);
            border:1px solid rgba(255,255,255,.05);
            border-radius:22px;
            padding:20px;
            transition:.35s ease;
        }
        .detail-item:hover{
            transform:translateY(-4px);
            background:rgba(201,168,76,.05);
            border-color:rgba(201,168,76,.18);
        }
        .detail-item-label{
            font-size:.7rem;
            letter-spacing:.16em;
            text-transform:uppercase;
            color:var(--gold-light);
            margin-bottom:12px;
        }
        .detail-item-value{
            color:var(--white);
            line-height:1.8;
            word-break:break-word;
        }
        .detail-footer{
            padding:0 32px 32px;
        }
        .back-btn{
            position:relative;
            overflow:hidden;
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:14px 24px;
            border-radius:10px;
            background:var(--gold);
            color:#111;
            font-size:.76rem;
            letter-spacing:.14em;
            text-transform:uppercase;
            font-weight:600;
            transition:.3s;
        }
        .back-btn:hover{
            background:var(--gold-light);
            transform:translateY(-2px);
        }
        .back-btn::before{
            content:'';
            position:absolute;
            inset:0;
            background:linear-gradient(
                120deg,
                transparent,
                rgba(255,255,255,.24),
                transparent
            );
            transform:translateX(-120%);
            transition:.8s;
        }
        .back-btn:hover::before{
            transform:translateX(120%);
        }

        .reveal{
            opacity:0;
            transform:translateY(40px);
            transition:
                opacity .9s ease,
                transform .9s ease;
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
        @keyframes pulseGlow{
            0%{
                box-shadow:0 0 0 rgba(201,168,76,0);
            }
            50%{
                box-shadow:0 0 28px rgba(201,168,76,.12);
            }
            100%{
                box-shadow:0 0 0 rgba(201,168,76,0);
            }
        }
       
        @media(max-width:980px){
            .main{
                padding:24px;
            }
            .hero{
                padding:38px 28px;
            }
            .detail-header,
            .detail-content,
            .detail-footer{
                padding-left:24px;
                padding-right:24px;
            }
        }
</style>
@endpush

@section('content')

        <section class="hero reveal">

            <div class="hero-content">

                <div class="hero-eyebrow">
                    Detail Penyewaan
                </div>
                <h1 class="hero-title">
                    Informasi <em>Sewa</em> Penghuni
                </h1>
                <p class="hero-subtitle">
                    Lihat seluruh detail penyewaan kamar beserta informasi penghuni, pembayaran, dan data kamar secara lengkap.
                </p>

                <div class="hero-actions">
                    <a href="/admin/sewa" class="btn-gold">
                        <i data-feather="arrow-left"></i>
                        Kembali
                    </a>
                    <a href="/admin/pembayaran" class="btn-outline">
                        <i data-feather="credit-card"></i>
                        Pembayaran
                    </a>
                </div>

            </div>

        </section>

        <section class="detail-card reveal">

            <div class="detail-header">
                <div>
                    <div class="detail-label">
                        Data Penyewaan
                    </div>
                    <div class="detail-title">
                        Detail Sewa #{{ $sewa->id_sewa }}
                    </div>
                    <div class="detail-subtitle">
                        Informasi lengkap terkait penghuni, kamar, dan transaksi penyewaan yang tercatat di sistem.
                    </div>
                </div>
                <div class="detail-badge">
                    {{ $sewa->jumlah_bulan }} Bulan
                </div>
            </div>

            <div class="detail-content">

                <div class="detail-item">
                    <div class="detail-item-label">Pengguna</div>
                    <div class="detail-item-value">
                        {{ $sewa->user->nama }}
                        ({{ $sewa->user->username }})
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">Email</div>
                    <div class="detail-item-value">
                        {{ $sewa->user->email }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">No HP</div>
                    <div class="detail-item-value">
                        {{ $sewa->user->no_hp }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">No Kamar</div>
                    <div class="detail-item-value">
                        {{ $sewa->no_kamar }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">Tipe Kamar</div>
                    <div class="detail-item-value">
                        {{ $sewa->kamar->tipeKamar->tipe_kamar }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">Harga</div>
                    <div class="detail-item-value">
                        Rp {{ number_format($sewa->kamar->tipeKamar->harga) }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">Tanggal Masuk</div>
                    <div class="detail-item-value">
                        {{ $sewa->tgl_masuk }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">Jumlah Bulan</div>
                    <div class="detail-item-value">
                        {{ $sewa->jumlah_bulan }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">Keterangan</div>
                    <div class="detail-item-value">
                        {{ $sewa->keterangan }}
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-item-label">Jumlah Pembayaran</div>
                    <div class="detail-item-value">
                        {{ $sewa->pembayaran->count() }}
                    </div>
                </div>

            </div>

            <div class="detail-footer">

                <a href="/admin/sewa#daftar_sewa" class="back-btn">
                    <i data-feather="arrow-left"></i>
                    Kembali ke Daftar
                </a>

            </div>

        </section>
@endsection
