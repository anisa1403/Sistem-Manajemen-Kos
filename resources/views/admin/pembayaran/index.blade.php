@extends('layouts.admin')

@section('title', 'Admin Pembayaran — Arterra Living')

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
        /* HERO */
        .hero{
            position:relative;
            min-height:55vh;
            display:flex;
            align-items:center;
            overflow:hidden;
            border-bottom:1px solid var(--border);
            border-radius:24px;
            margin: 20px;
        }
        .hero-bg{
            position:absolute;
            inset:0;
            border-radius:24px;
            background:
                linear-gradient(to right, rgba(8,11,16,.96) 30%, rgba(8,11,16,.6) 100%),
                url('https://images.unsplash.com/photo-1767423802472-f5fd07dfdb10?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover no-repeat;
        }
        .hero-overlay{
            position:absolute;
            inset:0;
            background:radial-gradient(circle at 80% 50%, rgba(201,168,76,.08), transparent 60%);
        }
        .hero-content{
            position:relative;
            z-index:2;
            padding:20px;
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
            margin-bottom:32px;
        }
        .hero-actions{
            display:flex;
            gap:14px;
            flex-wrap:wrap;
        }
        .btn-gold,
        .btn-outline{
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:13px 28px;
            border-radius:6px;
            transition:.3s;
            font-size:.8rem;
            letter-spacing:.12em;
            text-transform:uppercase;
        }
        .btn-gold{
            background:var(--gold);
            color:#0b0c10;
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
        /* CONTENT */
        .content{
            padding:10px;
        }
        .section-header{
            margin-bottom:36px;
        }
        .section-eyebrow{
            font-size:.65rem;
            letter-spacing:.22em;
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
        /* TABLE CARD */
        .table-card{
            background:rgba(13,17,23,.84);
            border:1px solid var(--border);
            border-radius:22px;
            overflow:hidden;
            backdrop-filter:blur(20px);
            box-shadow:0 20px 50px rgba(0,0,0,.3);
        }
        .table-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
            padding:24px 28px;
            border-bottom:1px solid var(--border);
        }
        .table-title{
            font-size:1rem;
            color:var(--white);
            font-weight:500;
        }
        .table-badge{
            background:var(--gold-dim);
            color:var(--gold-light);
            padding:10px 14px;
            border-radius:999px;
            font-size:.72rem;
            letter-spacing:.1em;
            text-transform:uppercase;
        }
        .table-wrap{
            overflow-x:auto;
        }
        table{
            width:100%;
            border-collapse:collapse;
            min-width:900px;
        }
        th{
            text-align:left;
            padding:18px 24px;
            font-size:.74rem;
            letter-spacing:.12em;
            text-transform:uppercase;
            color:var(--muted);
            border-bottom:1px solid rgba(255,255,255,.06);
            font-weight:500;
        }
        td{
            padding:20px 24px;
            border-bottom:1px solid rgba(255,255,255,.04);
            color:var(--text);
            font-size:.88rem;
        }
        tbody tr:hover{
            background:rgba(201,168,76,.04);
        }
  
        .table-actions{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }
        .btn-action{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            padding:10px 16px;
            border-radius:10px;
            transition:.3s;
            font-size:.76rem;
            letter-spacing:.08em;
            text-transform:uppercase;
            border:none;
            cursor:pointer;
        }
        .btn-view{
            background:rgba(255,255,255,.05);
            border:1px solid rgba(255,255,255,.08);
            color:var(--white);
        }
        .btn-view:hover{
            border-color:var(--gold);
            color:var(--gold-light);
            transform:translateY(-2px);
        }
        .btn-detail{
            background:var(--gold);
            color:#0a0c10;
            font-weight:600;
        }
        .btn-detail:hover{
            background:var(--gold-light);
            transform:translateY(-2px);
        }

        .reveal{
            opacity:0;
            transform:translateY(30px);
            transition:.8s ease;
        }
        .reveal.visible{
            opacity:1;
            transform:translateY(0);
        }

        .modal-overlay{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.75);
            backdrop-filter:blur(12px);
            display:flex;
            align-items:center;
            justify-content:center;
            opacity:0;
            pointer-events:none;
            transition:.3s;
            z-index:9999;
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
            transition:.35s;
        }
        .modal-overlay.show .modal{
            transform:scale(1);
        }
        .modal-icon{
            width:64px;
            height:64px;
            margin:0 auto 24px;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            background:rgba(239,68,68,.12);
            border:1px solid rgba(239,68,68,.25);
            color:#f87171;
        }
        .modal-title{
            font-family:'Cormorant Garamond',serif;
            font-size:1.9rem;
            color:var(--white);
            margin-bottom:10px;
        }
        .modal-desc{
            color:var(--muted);
            line-height:1.8;
            margin-bottom:28px;
            font-size:.9rem;
        }
        .modal-actions{
            display:flex;
            gap:12px;
        }
        .btn-cancel,
        .btn-logout{
            flex:1;
            padding:12px;
            border-radius:10px;
            cursor:pointer;
            transition:.25s;
            font-family:'Jost',sans-serif;
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
            background:rgba(239,68,68,.24);
        }

        .proof-modal{
            position:relative;
            width:90%;
            max-width:900px;
            max-height:90vh;
            background:#0d1117;
            border:1px solid var(--border);
            border-radius:24px;
            overflow:hidden;
            padding:20px;
            transform:scale(.9);
            transition:.35s;
            box-shadow:0 25px 60px rgba(0,0,0,.5);
        }
        .modal-overlay.show .proof-modal{
            transform:scale(1);
        }
        .proof-modal img{
            width:100%;
            max-height:80vh;
            object-fit:contain;
            border-radius:16px;
            display:block;
        }
        .proof-close{
            position:absolute;
            top:14px;
            right:14px;
            width:42px;
            height:42px;
            border:none;
            border-radius:50%;
            background:rgba(0,0,0,.6);
            color:var(--white);
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            transition:.25s;
            z-index:5;
        }
        .proof-close:hover{
            background:var(--gold);
            color:#0b0c10;
            transform:rotate(90deg);
        }
        /* RESPONSIVE */
        @media(max-width:980px){
.hero-content,
            .content{
                padding:50px 28px;
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
                    Arterra Living — Payment Management
                </div>
                <h1 class="hero-title">
                    Kelola <em>Pembayaran</em><br>
                </h1>
                <p class="hero-desc">
                    Pantau transaksi penghuni dan kelola seluruh data pembayaran.
                </p>
                <div class="hero-actions">
                    <a href="#tablePembayaran" class="btn-gold">
                        <i data-feather="credit-card"></i>
                        Lihat Pembayaran
                    </a>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="section-header reveal">
                <div class="section-eyebrow">Data Pembayaran</div>

                <div class="section-title">
                    Daftar <em>Transaksi</em>
                </div>
            </div>

            <div class="table-card reveal" id="tablePembayaran">

                <div class="table-header">
                    <div class="table-title">
                        Seluruh Data Pembayaran Penghuni
                    </div>

                    <div class="table-badge">
                        Total: {{ count($pembayaran) }}
                    </div>
                </div>

                <div class="table-wrap">

                    <table>

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pengguna</th>
                                <th>Kamar</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Bukti</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($pembayaran as $item)
                            <tr>
                                <td>{{ $item->id_pembayaran }}</td>
                                <td>{{ $item->sewa->user->nama }}</td>
                                <td>{{ $item->sewa->no_kamar }}</td>
                                <td>{{ $item->tgl_bayar }}</td>
                                <td>
                                    Rp {{ number_format($item->jumlah) }}
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="btn-action btn-view"
                                        onclick="openProofModal('{{ asset('storage/'.$item->bukti) }}')"
                                    >
                                        <i data-feather="image"></i>
                                        Lihat
                                    </button>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </section>

    <!-- pop up bukti -->
    <div id="proofModalOverlay" class="modal-overlay" aria-hidden="true">
        <div class="proof-modal" role="dialog" aria-modal="true">
            <button class="proof-close" aria-label="Tutup" onclick="closeProofModal()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <img id="proofModalImage" src="" alt="Bukti Pembayaran">
        </div>
    </div>

@push('scripts')
<script>
    function openProofModal(src) {
        const overlay = document.getElementById('proofModalOverlay');
        const img = document.getElementById('proofModalImage');
        if (!overlay || !img) return;
        img.src = src;
        overlay.classList.add('show');
        overlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeProofModal() {
        const overlay = document.getElementById('proofModalOverlay');
        const img = document.getElementById('proofModalImage');
        if (!overlay || !img) return;
        overlay.classList.remove('show');
        overlay.setAttribute('aria-hidden', 'true');
        setTimeout(() => { img.src = ''; }, 300);
        document.body.style.overflow = '';
    }

    document.addEventListener('click', function(e) {
        const overlay = document.getElementById('proofModalOverlay');
        if (!overlay) return;
        if (overlay.classList.contains('show') && e.target === overlay) {
            closeProofModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeProofModal();
    });
</script>
@endpush

@endsection
