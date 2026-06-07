@extends('layouts.admin')

@section('title', 'Admin — Daftar Kamar')

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
}
*{margin:0;padding:0;box-sizing:border-box}
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
        url('https://images.unsplash.com/photo-1505691938895-1758d7feb511?w=1400&q=80')
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
.btn-gold,.btn-outline,.btn-danger{
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
.btn-danger{
    background:rgba(239,68,68,.14);
    border:1px solid rgba(239,68,68,.22);
    color:#f87171;
    padding:10px 18px;
    letter-spacing:.08em;
}
.btn-danger:hover{background:rgba(239,68,68,.2)}

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
.table{width:100%;border-collapse:collapse;min-width:760px}
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
.status-pill{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:8px 14px;
    border-radius:999px;
    background:rgba(201,168,76,.08);
    border:1px solid rgba(201,168,76,.18);
    color:var(--gold-light);
    font-size:.72rem;
    letter-spacing:.08em;
    text-transform:uppercase;
}
.action-group{display:flex;gap:10px;flex-wrap:wrap}
.btn-edit{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 18px;
    border-radius:8px;
    font-size:.72rem;
    letter-spacing:.12em;
    text-transform:uppercase;
    font-weight:600;
    transition:.3s;
    cursor:pointer;
    background:transparent;
    border:1px solid var(--border);
    color:var(--white);
}
.btn-edit:hover{border-color:var(--gold);color:var(--gold-light);transform:translateY(-2px)}
.empty{padding:44px;text-align:center;color:var(--muted)}

.reveal{opacity:0;transform:translateY(30px);transition:.8s ease}
.reveal.visible{opacity:1;transform:translateY(0)}

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
            <span>Modul Kamar</span>
            <div class="eyebrow-line"></div>
        </div>

        <h1 class="hero-title">
            Kelola Data <br>
            <em>Kamar</em>
        </h1>

        <p class="hero-subtitle">
            Kelola seluruh kamar, serta fasilitas.
        </p>

        <div class="hero-actions">
            <a href="/admin/tipe-kamar" class="btn-gold">
                <i data-feather="layers"></i>
                Daftar Tipe Kamar
            </a>
            <a href="/admin/dashboard" class="btn-outline">
                <i data-feather="grid"></i>
                Dashboard
            </a>
        </div>
    </div>

    <div class="hero-stats">
        <div class="hero-stat">
            <div class="hero-stat-icon">
                <i data-feather="home"></i>
            </div>
            <div class="hero-stat-value">{{ $data->count() }}</div>
            <div class="hero-stat-label">Total Kamar</div>
        </div>
    </div>
</section>

<section class="section reveal">

    <div class="section-header">
        <div>
            <div class="section-eyebrow">Data Kamar</div>
            <div class="section-title">Seluruh Data <em>Kamar</em></div>
        </div>

        <div class="search-row">
            <form method="GET" action="{{ url()->current() }}" class="search-form">
                <input
                    type="search"
                    name="q"
                    class="search-input"
                    value="{{ request('q') }}"
                    placeholder="Cari kamar, tipe, atau fasilitas..."
                    aria-label="Cari kamar"
                >
                <button type="submit" class="btn-outline">Cari</button>
                @if(request('q'))
                    <a href="{{ url()->current() }}" class="btn-outline">Reset</a>
                @endif
            </form>
            <a href="/admin/kamar/create" class="btn-gold">
                <i data-feather="plus"></i>
                Tambah Kamar
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
                        <th>No Kamar</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{ $item->no_kamar }}</td>
                        <td>
                            <span class="status-pill">
                                {{ $item->tipe->tipe_kamar }}
                            </span>
                        </td>
                        <td>Rp {{ number_format($item->tipe->harga) }}</td>
                        <td>{{ $item->fasilitas }}</td>
                        <td>
                            <div class="action-group">
                                <a href="/admin/kamar/{{ $item->no_kamar }}/edit" class="btn-edit">
                                    <i data-feather="edit-2"></i>
                                    Edit
                                </a>
                                <form method="POST" action="/admin/kamar/{{ $item->no_kamar }}" class="delete-kamar-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger delete-kamar-btn">
                                        <i data-feather="trash-2"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty">Belum ada data kamar yang tersedia.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>

@push('scripts')
<script>
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible') });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-kamar-form').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const swalConfig = {
                    title: 'Apakah Anda yakin?',
                    text: 'Kamar akan dihapus permanen dan tidak dapat dipulihkan.',
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
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush

@endsection