@extends('layouts.admin')

@section('title', 'Admin - Tambah User')

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
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
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
                radial-gradient(circle at top left, rgba(201,168,76,.08), transparent 25%),
                radial-gradient(circle at bottom right, rgba(201,168,76,.05), transparent 30%);
            pointer-events:none;
            z-index:-1;
        }
        a{
            text-decoration:none;
            color:inherit;
        }
        .main{
            padding:48px;
            display:flex;
            flex-direction:column;
            gap:32px;
        }
        .hero{
            position:relative;
            overflow:hidden;
            border:1px solid var(--border);
            border-radius:30px;
            min-height:280px;
            background:
                linear-gradient(
                    to right,
                    rgba(8,11,16,.95),
                    rgba(8,11,16,.75)
                ),
                url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1600&q=80')
                center/cover no-repeat;
            display:flex;
            align-items:center;
            padding:60px;
        }
        .hero::before{
            content:'';
            position:absolute;
            inset:0;
            background:
                radial-gradient(
                    ellipse at right,
                    rgba(201,168,76,.12),
                    transparent 60%
                );
        }
        .hero-content{
            position:relative;
            z-index:2;
            max-width:620px;
            animation:fadeUp 1s ease;
        }
        .hero-eyebrow{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:24px;
        }
        .hero-eyebrow span{
            font-size:.7rem;
            letter-spacing:.24em;
            color:var(--gold);
            text-transform:uppercase;
        }
        .line{
            width:42px;
            height:1px;
            background:var(--gold);
        }
        .hero-title{
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.8rem,5vw,4.2rem);
            line-height:1.08;
            color:var(--white);
            margin-bottom:18px;
        }
        .hero-title em{
            color:var(--gold-light);
            font-style:italic;
        }
        .hero-desc{
            color:var(--muted);
            line-height:1.9;
            font-size:.96rem;
            max-width:520px;
        }

        .form-card{
            background:rgba(13,17,23,.82);
            border:1px solid var(--border);
            border-radius:28px;
            padding:40px;
            backdrop-filter:blur(16px);
            position:relative;
            overflow:hidden;
        }
        .form-card::before{
            content:'';
            position:absolute;
            top:0;
            left:0;
            right:0;
            height:1px;
            background:linear-gradient(
                to right,
                transparent,
                var(--gold),
                transparent
            );
        }
        .section-header{
            margin-bottom:34px;
        }
        .section-eyebrow{
            font-size:.65rem;
            letter-spacing:.24em;
            text-transform:uppercase;
            color:var(--gold);
            margin-bottom:10px;
        }
        .section-title{
            font-family:'Cormorant Garamond',serif;
            font-size:2.3rem;
            color:var(--white);
        }
        .section-title em{
            color:var(--gold-light);
            font-style:italic;
        }
        .alert{
            margin-bottom:24px;
            padding:18px 20px;
            border-radius:18px;
            background:rgba(239,68,68,.08);
            border:1px solid rgba(239,68,68,.18);
            color:#fecaca;
        }
        .alert ul{
            padding-left:18px;
            line-height:1.9;
        }
        .form-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
            gap:22px;
        }
        .input-group{
            display:flex;
            flex-direction:column;
            gap:10px;
        }
        .input-group.full{
            grid-column:1/-1;
        }
        label{
            font-size:.82rem;
            letter-spacing:.08em;
            text-transform:uppercase;
            color:var(--gold-light);
        }
        input{
            width:100%;
            padding:16px 18px;
            border-radius:18px;
            border:1px solid rgba(255,255,255,.08);
            background:rgba(255,255,255,.03);
            color:var(--white);
            font-family:'Jost',sans-serif;
            transition:.3s;
            outline:none;
        }
        input::placeholder{
            color:#7d7468;
        }
        input:focus{
            border-color:rgba(201,168,76,.45);
            background:rgba(201,168,76,.05);
            box-shadow:0 0 0 4px rgba(201,168,76,.08);
            transform:translateY(-1px);
        }
        .form-actions{
            display:flex;
            gap:14px;
            margin-top:34px;
            flex-wrap:wrap;
        }
        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            padding:15px 26px;
            border-radius:14px;
            font-size:.8rem;
            letter-spacing:.12em;
            text-transform:uppercase;
            font-weight:600;
            cursor:pointer;
            transition:.3s ease;
            border:none;
        }
        .btn-primary{
            background:var(--gold);
            color:#111;
        }
        .btn-primary:hover{
            background:var(--gold-light);
            transform:translateY(-3px);
            box-shadow:0 16px 30px rgba(201,168,76,.18);
        }
        .btn-secondary{
            background:transparent;
            color:var(--white);
            border:1px solid var(--border);
        }
        .btn-secondary:hover{
            border-color:var(--gold);
            color:var(--gold-light);
            transform:translateY(-3px);
        }
        /* REVEAL */
        .reveal{
            opacity:0;
            transform:translateY(30px);
            transition:.9s ease;
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
        @keyframes fadeDown{
            from{
                opacity:0;
                transform:translateY(-24px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        @media(max-width:980px){
            .main{
                padding:24px;
            }
            .hero{
                padding:40px 28px;
                min-height:auto;
            }
            .form-card{
                padding:28px;
            }
        }
</style>
@endpush

@section('content')
        <section class="hero reveal">

            <div class="hero-content">

                <div class="hero-eyebrow">
                    <div class="line"></div>
                    <span>Administrator Panel</span>
                    <div class="line"></div>
                </div>

                <h1 class="hero-title">
                    Tambah <em>Pengguna Baru</em>
                </h1>

                <p class="hero-desc">
                    Tambahkan data penghuni baru ke dalam sistem Arterra Living. Pastikan untuk mengisi semua informasi dengan benar agar proses pendaftaran berjalan lancar.
                </p>

            </div>

        </section>

        <section class="form-card reveal">

            <div class="section-header">
                <div class="section-eyebrow">
                    Formulir Data
                </div>

                <div class="section-title">
                    Input <em>Pengguna</em>
                </div>
            </div>

            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/admin/user" autocomplete="off">

                @csrf

                <div class="form-grid">

                    <div class="input-group">
                    <label for="username">Username</label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Masukkan username"
                        autocomplete="off"
                        required
                    >
                </div>

                <div class="input-group">
                    <label for="nama">Nama Lengkap</label>
                    <input
                        id="nama"
                        name="nama"
                        type="text"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="off"
                        required
                    >
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        autocomplete="off"
                        required
                    >
                </div>

                <div class="input-group">
                    <label for="no_hp">No HP</label>
                    <input
                        id="no_hp"
                        name="no_hp"
                        type="text"
                        placeholder="Masukkan nomor HP"
                        autocomplete="off"
                        required
                    >
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="new-password"
                        required
                    >
                </div>

                </div>

                <div class="form-actions">

                    <button type="submit" class="btn btn-primary">
                        <i data-feather="save"></i>
                        Simpan User
                    </button>

                    <a href="/admin/user" class="btn btn-secondary">
                        <i data-feather="arrow-left"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </section>
@endsection
