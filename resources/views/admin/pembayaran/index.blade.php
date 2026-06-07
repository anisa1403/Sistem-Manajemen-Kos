@extends('layouts.admin')

@section('title', 'Admin Pembayaran — Arterra Living')

@push('styles')
<style>
:root{
    --bg:#080b10;
    --surface:#0d1117;
    --glass:rgba(10,12,18,.82);
    --border:rgba(180,148,72,.16);
    --gold:#c9a84c;
    --gold-light:#e2c97e;
    --gold-dim:rgba(201,168,76,.1);
    --text:#e8e0d0;
    --muted:#8a8070;
    --white:#f5f0e8;
    --danger:#ef4444;
    --success:#22c55e;
}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
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
        radial-gradient(circle at top left,rgba(201,168,76,.08),transparent 28%),
        radial-gradient(circle at bottom right,rgba(201,168,76,.06),transparent 25%);
    pointer-events:none;
    z-index:-1;
}
a{text-decoration:none;color:inherit}

.main{display:flex;flex-direction:column}

.hero{
    position:relative;
    min-height:360px;
    display:flex;
    align-items:center;
    overflow:hidden;
    border-radius:30px;
    border-bottom:1px solid var(--border);
}
.hero-bg{
    position:absolute;
    inset:0;
    background:
        linear-gradient(to right,rgba(8,11,16,.96) 28%,rgba(8,11,16,.6) 100%),
        url('https://images.unsplash.com/photo-1767423802472-f5fd07dfdb10?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')
        center/cover no-repeat;
}
.hero-overlay{
    position:absolute;
    inset:0;
    background:radial-gradient(ellipse at 80% 50%,rgba(201,168,76,.1),transparent 60%);
}
.hero-content{
    position:relative;
    z-index:2;
    padding:80px 72px;
    max-width:760px;
}
.hero-eyebrow{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:24px;
    animation:fadeUp .8s ease;
}
.hero-eyebrow span{
    font-size:.64rem;
    letter-spacing:.28em;
    text-transform:uppercase;
    color:var(--gold);
}
.eyebrow-line{width:42px;height:1px;background:var(--gold)}
.hero-title{
    font-family:'Cormorant Garamond',serif;
    font-size:clamp(2.7rem,5vw,4.2rem);
    line-height:1.08;
    color:var(--white);
    margin-bottom:16px;
    animation:fadeUp .9s ease;
}
.hero-title em{color:var(--gold-light);font-style:italic}
.hero-subtitle{
    font-size:1rem;
    line-height:1.9;
    color:var(--muted);
    max-width:560px;
    margin-bottom:34px;
    animation:fadeUp 1s ease;
}
.hero-actions{display:flex;gap:14px;flex-wrap:wrap;animation:fadeUp 1.1s ease}
.btn-gold,
.btn-outline{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    border-radius:8px;
    padding:14px 24px;
    transition:.3s ease;
    font-size:.76rem;
    letter-spacing:.14em;
    text-transform:uppercase;
    font-weight:600;
    cursor:pointer;
    border:none;
}
.btn-gold{background:var(--gold);color:#111}
.btn-gold:hover{background:var(--gold-light);transform:translateY(-2px)}
.btn-outline{border:1px solid var(--border);background:transparent;color:var(--white)}
.btn-outline:hover{border-color:var(--gold);color:var(--gold-light);transform:translateY(-2px)}

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
    border-radius:18px;
    padding:22px;
    min-width:190px;
    backdrop-filter:blur(14px);
    animation:fadeLeft .9s ease;
}
.hero-stat-icon{
    width:36px;
    height:36px;
    border-radius:10px;
    background:var(--gold-dim);
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--gold);
    margin-bottom:12px;
}
.hero-stat-value{
    font-family:'Cormorant Garamond',serif;
    font-size:2rem;
    color:var(--white);
    margin-bottom:6px;
}
.hero-stat-label{
    font-size:.64rem;
    letter-spacing:.18em;
    text-transform:uppercase;
    color:var(--muted);
}

.section{padding:80px 72px}
.section-header{
    display:flex;
    justify-content:space-between;
    align-items:flex-end;
    gap:20px;
    margin-bottom:24px;
    flex-wrap:wrap;
}
.search-row{
    width:100%;
    display:flex;
    justify-content:flex-start;
    gap:12px;
    flex-wrap:wrap;
    margin-bottom:20px;
}
.search-form{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    align-items:center;
    width:100%;
    max-width:520px;
}
.search-input{
    flex:1;
    min-width:200px;
    padding:14px 18px;
    border-radius:16px;
    border:1px solid rgba(255,255,255,.08);
    background:rgba(255,255,255,.03);
    color:var(--white);
    outline:none;
    transition:.3s ease;
}
.search-input:focus{
    border-color:rgba(201,168,76,.45);
    background:rgba(201,168,76,.05);
}
.section-eyebrow{
    font-size:.62rem;
    letter-spacing:.24em;
    text-transform:uppercase;
    color:var(--gold);
    margin-bottom:12px;
}
.section-title{
    font-family:'Cormorant Garamond',serif;
    font-size:clamp(2rem,4vw,3rem);
    color:var(--white);
}
.section-title em{color:var(--gold-light);font-style:italic}

.alert{
    margin-bottom:24px;
    padding:18px 22px;
    border-radius:18px;
    background:rgba(201,168,76,.08);
    border:1px solid rgba(201,168,76,.18);
    color:var(--gold-light);
    animation:fadeUp .6s ease;
}

.table-wrapper{
    background:rgba(13,17,23,.74);
    border:1px solid var(--border);
    border-radius:28px;
    overflow:hidden;
    backdrop-filter:blur(18px);
    animation:fadeUp 1s ease;
}
.table-scroll{overflow-x:auto}
.table{
    width:100%;
    border-collapse:collapse;
    min-width:900px;
}
.table thead{background:rgba(255,255,255,.02)}
.table th{
    padding:22px;
    text-align:left;
    color:var(--gold);
    font-size:.72rem;
    letter-spacing:.16em;
    text-transform:uppercase;
    font-weight:600;
    border-bottom:1px solid var(--border);
}
.table td{
    padding:22px;
    border-bottom:1px solid rgba(255,255,255,.04);
    color:var(--text);
    font-size:.92rem;
    transition:.3s ease;
}
.table tbody tr{transition:.3s ease}
.table tbody tr:hover{background:rgba(201,168,76,.05);transform:scale(1.002)}
.action-group{display:flex;gap:10px;flex-wrap:wrap}
.btn-action{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    padding:10px 16px;
    border-radius:8px;
    transition:.3s ease;
    font-size:.72rem;
    letter-spacing:.08em;
    text-transform:uppercase;
    font-weight:600;
    border:none;
    cursor:pointer;
}
.btn-view{
    background:transparent;
    border:1px solid var(--border);
    color:var(--white);
}
.btn-view:hover{border-color:var(--gold);color:var(--gold-light);transform:translateY(-2px)}
.btn-detail{background:var(--gold);color:#111}
.btn-detail:hover{background:var(--gold-light);transform:translateY(-2px)}
.btn-delete{
    background:rgba(239,68,68,.14);
    border:1px solid rgba(239,68,68,.22);
    color:#f87171;
}
.btn-delete:hover{background:rgba(239,68,68,.22);transform:translateY(-2px)}
.empty{padding:44px;text-align:center;color:var(--muted)}

.reveal{opacity:0;transform:translateY(30px);transition:.8s ease}
.reveal.visible{opacity:1;transform:translateY(0)}

/* Modal bukti */
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
.modal-overlay.show{opacity:1;pointer-events:all}
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
.modal-overlay.show .proof-modal{transform:scale(1)}
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
.proof-close:hover{background:var(--gold);color:#0b0c10;transform:rotate(90deg)}

@keyframes fadeUp{
    from{opacity:0;transform:translateY(24px)}
    to{opacity:1;transform:translateY(0)}
}
@keyframes fadeLeft{
    from{opacity:0;transform:translateX(24px)}
    to{opacity:1;transform:translateX(0)}
}

@media(max-width:980px){
    .hero-stats{display:none}
    .hero-content,.section{padding-left:32px;padding-right:32px}
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
            <span>Payment Management</span>
            <div class="eyebrow-line"></div>
        </div>

        <h1 class="hero-title">
            Kelola <em>Pembayaran</em><br>
            Penghuni
        </h1>

        <p class="hero-subtitle">
            Pantau transaksi penghuni dan kelola seluruh data pembayaran.
        </p>

        <div class="hero-actions">
            <a href="/admin/dashboard" class="btn-outline">
                <i data-feather="grid"></i>
                Dashboard
            </a>
        </div>
    </div>

    <div class="hero-stats">
        <div class="hero-stat">
            <div class="hero-stat-icon">
                <i data-feather="credit-card"></i>
            </div>
            <div class="hero-stat-value">{{ count($pembayaran) }}</div>
            <div class="hero-stat-label">Total Pembayaran</div>
        </div>
    </div>
</section>

<section class="section reveal" id="tablePembayaran">

    <div class="section-header">
        <div>
            <div class="section-eyebrow">Data Pembayaran</div>
            <div class="section-title">Daftar <em>Transaksi</em></div>
        </div>

        <div class="search-row">
            <form method="GET" action="{{ url()->current() }}" class="search-form">
                <input
                    type="search"
                    name="q"
                    class="search-input"
                    value="{{ request('q') }}"
                    placeholder="Cari pengguna atau kamar"
                    aria-label="Cari pembayaran"
                >
                <button type="submit" class="btn-outline">Cari</button>
                @if(request('q'))
                    <a href="{{ url()->current() }}" class="btn-outline">Reset</a>
                @endif
            </form>
            <a href="/admin/pembayaran/create" class="btn-gold">
                <i data-feather="plus-circle"></i>
                Tambah Pembayaran
            </a>
            <a href="/admin/pembayaran/cetak-semua" target="_blank" class="btn-outline">
                <i data-feather="printer"></i>
                Cetak Semua PDF
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="table-wrapper">
        <div class="table-scroll">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pengguna</th>
                        <th>Kamar</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayaran as $item)
                    <tr>
                        <td>{{ $item->id_pembayaran }}</td>
                        <td>{{ $item->sewa->user->nama }}</td>
                        <td>{{ $item->sewa->no_kamar }}</td>
                        <td>{{ $item->tgl_bayar }}</td>
                        <td>Rp {{ number_format($item->jumlah) }}</td>
                        <td>
                            <div class="action-group">
                                <button
                                    type="button"
                                    class="btn-action btn-view"
                                    onclick="openProofModal('{{ asset('storage/'.$item->bukti) }}')"
                                >
                                    <i data-feather="image"></i>
                                    Lihat Bukti
                                </button>

                                <a href="/admin/pembayaran/{{ $item->id_pembayaran }}" class="btn-action btn-detail">
                                    <i data-feather="file-text"></i>
                                    Detail
                                </a>
                                <a href="/admin/pembayaran/{{ $item->id_pembayaran }}/cetak" target="_blank" class="btn-action btn-view">
                                    <i data-feather="printer"></i>
                                    Cetak
                                </a>

                                <form
                                    action="/admin/pembayaran/{{ $item->id_pembayaran }}"
                                    method="POST"
                                    class="delete-pembayaran-form"
                                    style="display:inline;"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">
                                        <i data-feather="trash-2"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>

<div id="proofModalOverlay" class="modal-overlay" aria-hidden="true">
    <div class="proof-modal" role="dialog" aria-modal="true">
        <button class="proof-close" aria-label="Tutup" onclick="closeProofModal()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <img id="proofModalImage" src="" alt="Bukti Pembayaran">
    </div>
</div>

@push('scripts')
<script>
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible') });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swal === 'undefined') return;

        document.querySelectorAll('.delete-pembayaran-form').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const swalConfig = {
                    title: 'Apakah Anda yakin?',
                    text: 'Pembayaran akan dihapus permanen dan tidak dapat dipulihkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#00ab09',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    background: 'rgba(8,15,28,0.97)',
                    color: '#f5f0e8',
                    iconColor: '#f87171',
                    allowOutsideClick: false,
                    didOpen: () => {
                        const popup = Swal.getPopup();
                        if (popup) {
                            popup.style.backdropFilter = 'blur(20px)';
                            popup.style.webkitBackdropFilter = 'blur(20px)';
                            popup.style.border = '1px solid rgba(201,168,76,0.2)';
                            popup.style.borderRadius = '20px';
                            popup.style.boxShadow = '0 30px 60px -15px rgba(0,0,0,0.7)';
                        }
                    }
                };

                Swal.fire(swalConfig).then((result) => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    });

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
        if (overlay.classList.contains('show') && e.target === overlay) closeProofModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeProofModal();
    });
</script>
@endpush

@endsection