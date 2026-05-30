@extends('layouts.admin')

@section('title', 'Admin Detail Pembayaran — Arterra Living')

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
            --danger:#ef4444;
            --success:#22c55e;
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
                radial-gradient(circle at 20% 20%, rgba(201,168,76,.08), transparent 18%),
                radial-gradient(circle at 80% 10%, rgba(201,168,76,.06), transparent 16%),
                radial-gradient(circle at 50% 80%, rgba(201,168,76,.05), transparent 20%);
            z-index:-1;
            pointer-events:none;
        }
        a{
            text-decoration:none;
            color:inherit;
        }
@keyframes slideUp{
            from{
                opacity:0;
                transform:translateY(8px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }
        /* MAIN */
        .main{
            display:flex;
            flex-direction:column;
        }
  
        .hero{
            position:relative;
            min-height:30vh;
            display:flex;
            align-items:center;
            overflow:hidden;
            border-bottom:1px solid var(--border);
        }
        .hero-bg{
            position:absolute;
            inset:0;
            background:
                linear-gradient(to right, rgba(8,11,16,.96) 30%, rgba(8,11,16,.6) 100%),
                url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
        }
        .hero-overlay{
            position:absolute;
            inset:0;
            background:radial-gradient(circle at 80% 50%, rgba(201,168,76,.08), transparent 60%);
        }
        .hero-content{
            position:relative;
            z-index:2;
            padding:50px 72px 30px;
            max-width:720px;
        }
        .hero-eyebrow{
            font-size:.7rem;
            letter-spacing:.28em;
            text-transform:uppercase;
            color:var(--gold);
            margin-bottom:24px;
        }
        .hero-title{
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.8rem,5vw,4rem);
            font-weight:300;
            line-height:1.1;
            color:var(--white);
            margin-bottom:18px;
        }
        .hero-title em{
            color:var(--gold-light);
            font-style:italic;
        }
        .hero-desc{
            font-size:.95rem;
            line-height:1.9;
            color:var(--muted);
            max-width:540px;
        }

        .content{
            padding:10px;
        }
        .detail-card{
            background:rgba(13,17,23,.84);
            border:1px solid var(--border);
            border-radius:24px;
            overflow:hidden;
            backdrop-filter:blur(20px);
            box-shadow:0 20px 50px rgba(0,0,0,.3);
        }
        .detail-header{
            padding:28px 32px;
            border-bottom:1px solid var(--border);
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
            flex-wrap:wrap;
        }
        .detail-title{
            font-size:1.2rem;
            color:var(--white);
        }
        .detail-body{
            padding:32px;
            display:grid;
            grid-template-columns:1fr 420px;
            gap:32px;
        }
        .info-grid{
            display:grid;
            gap:18px;
        }
        .info-item{
            padding:22px;
            border-radius:18px;
            border:1px solid rgba(255,255,255,.06);
            background:rgba(255,255,255,.02);
        }
        .info-label{
            font-size:.7rem;
            letter-spacing:.18em;
            text-transform:uppercase;
            color:var(--gold);
            margin-bottom:10px;
        }
        .info-value{
            font-size:1rem;
            color:var(--white);
            line-height:1.7;
        }
        .proof-card{
            background:rgba(255,255,255,.02);
            border:1px solid rgba(255,255,255,.06);
            border-radius:20px;
            overflow:hidden;
        }
        .proof-header{
            padding:20px 24px;
            border-bottom:1px solid rgba(255,255,255,.06);
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .proof-title{
            color:var(--white);
            font-size:.95rem;
        }
        .proof-image-wrap{
            padding:24px;
        }
        .proof-image{
            width:100%;
            border-radius:18px;
            cursor:pointer;
            transition:.35s;
            border:1px solid rgba(255,255,255,.08);
        }
        .proof-image:hover{
            transform:scale(1.02);
        }
        .action-bar{
            display:flex;
            gap:14px;
            flex-wrap:wrap;
            margin-top:30px;
        }
        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            padding:14px 22px;
            border-radius:12px;
            border:none;
            cursor:pointer;
            transition:.3s;
            font-family:'Jost',sans-serif;
            font-size:.78rem;
            letter-spacing:.08em;
            text-transform:uppercase;
            font-weight:600;
        }
        .btn-success{
            background:rgba(34,197,94,.16);
            border:1px solid rgba(34,197,94,.3);
            color:#4ade80;
        }
        .btn-success:hover{
            transform:translateY(-2px);
            background:rgba(34,197,94,.24);
        }
        .btn-danger{
            background:rgba(239,68,68,.14);
            border:1px solid rgba(239,68,68,.28);
            color:#f87171;
        }
        .btn-danger:hover{
            transform:translateY(-2px);
            background:rgba(239,68,68,.22);
        }
        .btn-back{
            background:var(--gold);
            color:#0b0c10;
        }
        .btn-back:hover{
            background:var(--gold-light);
            transform:translateY(-2px);
        }
        /* IMAGE MODAL */
        .image-modal{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.88);
            backdrop-filter:blur(10px);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:30px;
            opacity:0;
            pointer-events:none;
            transition:.35s;
            z-index:9999;
        }
        .image-modal.show{
            opacity:1;
            pointer-events:all;
        }
        .image-modal img{
            max-width:90%;
            max-height:90vh;
            border-radius:20px;
            border:2px solid rgba(255,255,255,.08);
            animation:zoomIn .3s ease;
        }
        .close-modal{
            position:absolute;
            top:24px;
            right:24px;
            width:46px;
            height:46px;
            border-radius:50%;
            background:rgba(255,255,255,.08);
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            color:white;
            transition:.3s;
        }
        .close-modal:hover{
            background:rgba(239,68,68,.18);
            color:#f87171;
        }
        @keyframes zoomIn{
            from{
                transform:scale(.8);
                opacity:0;
            }
            to{
                transform:scale(1);
                opacity:1;
            }
        }
        /* REVEAL */
        .reveal{
            opacity:0;
            transform:translateY(30px);
            transition:.8s ease;
        }
        .reveal.visible{
            opacity:1;
            transform:translateY(0);
        }

        @media(max-width:1100px){
            .detail-body{
                grid-template-columns:1fr;
            }
        }
        @media(max-width:980px){
        .hero-content,
        .content{
            padding:50px 28px;
        }
        }
        @media(max-width:640px){
            .detail-header{
                padding:24px;
            }
            .detail-body{
                padding:24px;
            }
            .hero-title{
                font-size:2.5rem;
            }
        }
</style>
@endpush

@section('content')
        <section class="hero">

            <div class="hero-bg"></div>
            <div class="hero-overlay"></div>

            <div class="hero-content reveal">

                <div class="hero-eyebrow">
                    Arterra Living — Payment Detail
                </div>
                <h1 class="hero-title">
                    Detail <em>Pembayaran</em><br>
                    Penghuni
                </h1>
                <p class="hero-desc">
                    Detail pembayaran yang dilaporkan penghuni.
                </p>

            </div>

        </section>

        <section class="content">

            <div class="detail-card reveal">

                <div class="detail-header">
                    <div class="detail-title">
                        Pembayaran #{{ $pembayaran->id_pembayaran }}
                    </div>
                </div>

                <div class="detail-body">
                    <div>
                        <div class="info-grid">

                            <div class="info-item">
                                <div class="info-label">Nama Pengguna</div>
                                <div class="info-value">
                                    {{ optional(optional($pembayaran->sewa)->user)->nama ?? '-' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Username</div>
                                <div class="info-value">
                                    {{ optional(optional($pembayaran->sewa)->user)->username ?? '-' }}
                                </div>
                            </div>

                                <div class="info-item">
                                <div class="info-label">Nomor Kamar</div>
                                <div class="info-value">
                                    {{ optional($pembayaran->sewa)->no_kamar ?? '-' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Tanggal Pembayaran</div>
                                <div class="info-value">
                                    {{ $pembayaran->tgl_bayar }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Jumlah Pembayaran</div>
                                <div class="info-value">
                                    Rp {{ number_format($pembayaran->jumlah) }}
                                </div>
                            </div>

                        </div>

                        <div class="action-bar">

                                <a href="/admin/pembayaran#tablePembayaran" class="btn btn-back">
                                    <i data-feather="arrow-left"></i>
                                    Kembali
                                </a>

                        </div>

                    </div>

                    <div class="proof-card">

                        <div class="proof-header">
                            <div class="proof-title">
                                Bukti Pembayaran
                            </div>
                            <i data-feather="image"></i>
                        </div>
                        <div class="proof-image-wrap">
                            <img
                                src="{{ asset('storage/'.$pembayaran->bukti) }}"
                                alt="Bukti Pembayaran"
                                class="proof-image"
                                onclick="openImageModal(this.src)"
                            >
                        </div>

                    </div>

                </div>

            </div>

        </section>
@endsection
