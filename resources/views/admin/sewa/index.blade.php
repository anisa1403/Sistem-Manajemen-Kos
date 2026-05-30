@extends('layouts.admin')

@section('title', 'Admin — Daftar Sewa')

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
                url('https://plus.unsplash.com/premium_photo-1676823553207-758c7a66e9bb?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')
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
                rgba(255,255,255,.24),
                transparent
            );
            transform:translateX(-120%);
            transition:.8s;
        }
        .btn-gold:hover::before{
            transform:translateX(120%);
        }
        
        .table-card{
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
        .table-card:hover{
            transform:translateY(-3px);
            border-color:rgba(201,168,76,.28);
            box-shadow:
                0 24px 60px rgba(0,0,0,.45),
                0 0 40px rgba(201,168,76,.06);
        }
        .table-header{
            padding:30px;
            border-bottom:1px solid var(--border);
            display:flex;
            justify-content:space-between;
            gap:20px;
            align-items:center;
            flex-wrap:wrap;
        }
        .table-title-wrap small{
            font-size:.65rem;
            letter-spacing:.24em;
            color:var(--gold);
            text-transform:uppercase;
        }
        .table-title{
            font-family:'Cormorant Garamond',serif;
            font-size:2rem;
            color:var(--white);
            margin-top:8px;
        }
        .table-subtitle{
            margin-top:10px;
            color:var(--muted);
            line-height:1.8;
            max-width:520px;
            font-size:.92rem;
        }
        .table-badge{
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
        .table-wrapper{
            overflow-x:auto;
        }
        table{
            width:100%;
            border-collapse:collapse;
            min-width:1000px;
        }
        thead{
            background:rgba(255,255,255,.02);
        }
        th{
            padding:18px 22px;
            text-align:left;
            color:var(--gold-light);
            font-size:.7rem;
            letter-spacing:.16em;
            text-transform:uppercase;
            font-weight:500;
            border-bottom:1px solid var(--border);
        }
        td{
            padding:22px;
            border-bottom:1px solid rgba(255,255,255,.04);
            color:var(--text);
            font-size:.92rem;
        }
        tbody tr{
            transition:
                background .35s ease,
                transform .35s ease;
        }
        tbody tr:hover{
            background:rgba(201,168,76,.05);
            transform:translateX(4px);
        }
        .status-pill{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:8px 14px;
            border-radius:999px;
            background:rgba(201,168,76,.12);
            border:1px solid rgba(201,168,76,.18);
            color:var(--gold-light);
            font-size:.72rem;
            letter-spacing:.08em;
            text-transform:uppercase;
        }
        .table-action{
            position:relative;
            overflow:hidden;
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding:10px 18px;
            border-radius:10px;
            background:var(--gold);
            color:#111;
            font-size:.72rem;
            letter-spacing:.12em;
            text-transform:uppercase;
            font-weight:600;
            transition:.3s;
        }
        .table-action:hover{
            background:var(--gold-light);
            transform:translateY(-2px);
        }
        .table-action::before{
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
        .table-action:hover::before{
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
            .table-header{
                padding:24px;
            }
            table{
                min-width:900px;
            }
        }
</style>
@endpush

@section('content')
<section class="hero reveal">
    <div class="hero-content">
        <div class="hero-eyebrow">
            Modul Penyewaan
        </div>
        <h1 class="hero-title">
            Daftar <em>Sewa</em> Penghuni
        </h1>
        <p class="hero-subtitle">
            Pantau seluruh transaksi penyewaan kamar.
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

<section class="table-card reveal" id="daftar_sewa">
    <div class="table-header">
        <div class="table-title-wrap">
            <small>Data Penyewaan</small>
            <div class="table-title">
                Seluruh Transaksi Sewa
            </div>
            <div class="table-subtitle">
                Menampilkan seluruh data penyewaan kamar yang telah tercatat dalam sistem Arterra Living.
            </div>
        </div>
        <div class="table-badge">
            Total:
            {{ count($sewa) }}
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID Sewa</th>
                    <th>Pengguna</th>
                    <th>No Kamar</th>
                    <th>Tipe</th>
                    <th>Tanggal Masuk</th>
                    <th>Durasi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sewa as $item)
                <tr>
                    <td>
                        #{{ $item->id_sewa }}
                    </td>
                    <td>
                        {{ $item->user->nama }}
                    </td>
                    <td>
                        {{ $item->no_kamar }}
                    </td>
                    <td>
                        <span class="status-pill">
                            {{ $item->kamar->tipeKamar->tipe_kamar }}
                        </span>
                    </td>
                    <td>
                        {{ $item->tgl_masuk }}
                    </td>
                    <td>
                        {{ $item->jumlah_bulan }} Bulan
                    </td>
                    <td>
                        {{ $item->keterangan }}
                    </td>
                    <td>
                        <a href="/admin/sewa/{{ $item->id_sewa }}" class="table-action">
                            <i data-feather="eye"></i>
                            Detail
                        </a>
                    </td>
                </tr>
                
                @endforeach

            </tbody>

        </table>

    </div>

</section>
@endsection
