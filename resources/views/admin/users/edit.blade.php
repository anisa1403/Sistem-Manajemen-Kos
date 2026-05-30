@extends('layouts.admin')

@section('title', 'Admin — Edit User')

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
                url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=1400&q=80')
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
            max-width:680px;
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
            max-width:520px;
            animation:fadeUp 1.2s ease;
        }
        .form-card{
            background:rgba(13,17,23,.78);
            border:1px solid var(--border);
            border-radius:28px;
            padding:34px;
            backdrop-filter:blur(18px);
            transition:
                transform .45s ease,
                border-color .45s ease,
                box-shadow .45s ease;
        }
        .form-card:hover{
            transform:translateY(-3px);
            border-color:rgba(201,168,76,.28);
            box-shadow:
                0 24px 60px rgba(0,0,0,.45),
                0 0 40px rgba(201,168,76,.06);
        }
        .form-head small{
            font-size:.65rem;
            letter-spacing:.24em;
            color:var(--gold);
            text-transform:uppercase;
        }
        .form-title{
            font-family:'Cormorant Garamond',serif;
            font-size:2.1rem;
            color:var(--white);
            margin-top:8px;
        }
        .form-subtitle{
            margin-top:10px;
            color:var(--muted);
            line-height:1.8;
            margin-bottom:32px;
        }
        .alert-error{
            padding:18px 20px;
            border-radius:18px;
            background:rgba(239,68,68,.1);
            border:1px solid rgba(239,68,68,.22);
            color:#fecaca;
            margin-bottom:24px;
        }
        .alert-error ul{
            margin:0;
            padding-left:18px;
        }
        .form-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:20px;
        }
        .input-group{
            display:flex;
            flex-direction:column;
            gap:10px;
        }
        .input-group.full{
            grid-column:1 / -1;
        }
        label{
            color:var(--gold-light);
            font-size:.78rem;
            letter-spacing:.12em;
            text-transform:uppercase;
        }
        input{
            width:100%;
            padding:16px 18px;
            border-radius:16px;
            border:1px solid rgba(255,255,255,.08);
            background:rgba(255,255,255,.03);
            color:var(--white);
            font-family:'Jost',sans-serif;
            transition:.3s;
            outline:none;
        }
        input:focus{
            border-color:rgba(201,168,76,.4);
            background:rgba(201,168,76,.05);
            box-shadow:0 0 0 4px rgba(201,168,76,.06);
        }
        input::placeholder{
            color:#756c5f;
        }

        .form-actions{
            display:flex;
            gap:14px;
            flex-wrap:wrap;
            margin-top:34px;
        }
        .btn-gold,
        .btn-outline{
            position:relative;
            overflow:hidden;
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:14px 26px;
            border-radius:10px;
            font-size:.76rem;
            letter-spacing:.16em;
            text-transform:uppercase;
            transition:.3s;
        }
        .btn-gold{
            background:var(--gold);
            color:#111;
            font-weight:600;
            border:none;
            cursor:pointer;
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
       
        @media(max-width:980px){
            .main{
                padding:24px;
            }
            .hero{
                padding:38px 28px;
            }
            .form-card{
                padding:26px;
            }
            .form-grid{
                grid-template-columns:1fr;
            }
        }
</style>
@endpush

@section('content')
        <section class="hero reveal">

            <div class="hero-content">

                <div class="hero-eyebrow">
                    Modul Pengguna
                </div>

                <h1 class="hero-title">
                    Edit Data <em>User</em>
                </h1>

                <p class="hero-subtitle">
                    Perbarui informasi penghuni dan penyewa.
                </p>

            </div>

        </section>

        <section class="form-card reveal">

            <div class="form-head">

                <small>Form Pengguna</small>
                <div class="form-title">
                    Perbarui Informasi User
                </div>
                <div class="form-subtitle">
                    Pastikan seluruh data pengguna telah diperbarui dengan benar sebelum menyimpan perubahan.
                </div>

            </div>

            @if($errors->any())

                <div class="alert-error">

                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <form method="POST" action="/admin/user/{{ $user->id_user }}">

                @csrf
                @method('PUT')

                <div class="form-grid">

                    <div class="input-group">

                        <label for="username">
                            Username
                        </label>

                        <input
                            id="username"
                            name="username"
                            value="{{ old('username', $user->username) }}"
                            required
                        >

                    </div>

                    <div class="input-group">

                        <label for="nama">
                            Nama Lengkap
                        </label>

                        <input
                            id="nama"
                            name="nama"
                            value="{{ old('nama', $user->nama) }}"
                            required
                        >

                    </div>

                    <div class="input-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            required
                        >

                    </div>

                    <div class="input-group">

                        <label for="no_hp">
                            Nomor HP
                        </label>

                        <input
                            id="no_hp"
                            name="no_hp"
                            value="{{ old('no_hp', $user->no_hp) }}"
                            required
                        >

                    </div>

                    <div class="input-group full">

                        <label for="password">
                            Password Baru
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Kosongkan jika tidak ingin mengganti password"
                        >

                    </div>

                </div>

                <div class="form-actions">

                    <button type="submit" class="btn-gold">
                        <i data-feather="save"></i>
                        Simpan
                    </button>

                    <a href="/admin/user" class="btn-outline">
                        <i data-feather="arrow-left"></i>
                        Kembali
                    </a>

                </div>

            </form>

        </section>
@endsection
