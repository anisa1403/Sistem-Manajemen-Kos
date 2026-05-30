<x-user-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=DM+Sans:wght@300;400;500;600;700&display=swap');

:root{
    --navy-900:#080f1c;
    --navy-800:#0d1829;
    --card-bg:rgba(13,24,41,.75);
    --card-border:rgba(255,255,255,.06);
    --gold:#c9a84c;
    --gold-light:#e7cd87;
    --gold-dim:rgba(201,168,76,.12);
    --text-1:#f0ece2;
    --text-2:#c8c1b3;
    --text-3:#7d7669;
    --radius-lg:24px;
    --radius-md:16px;
    --transition:.35s cubic-bezier(.4,0,.2,1);
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'DM Sans',sans-serif;
    background:
        linear-gradient(rgba(8,15,28,.88),rgba(8,15,28,.96)),
        url("{{ asset('storage/image/bg.png') }}");
    background-size:cover;
    background-position:center;
    color:var(--text-1);
}

.kamar-page{
    padding:2.5rem;
}

.page-hero{
    position:relative;
    overflow:hidden;
    margin-bottom:2rem;
    padding:2.8rem;
    border-radius:30px;
    background:rgba(8,15,28,.72);
    border:1px solid rgba(201,168,76,.12);
    backdrop-filter:blur(18px);
}

.page-hero::before{
    content:'';
    position:absolute;
    width:320px;
    height:320px;
    border-radius:50%;
    top:-120px;
    right:-100px;
    background:radial-gradient(circle, rgba(201,168,76,.14), transparent 70%);
}

.hero-inner{
    position:relative;
    z-index:2;
    display:flex;
    justify-content:space-between;
    gap:2rem;
    flex-wrap:wrap;
}

.hero-badge{
    display:inline-flex;
    align-items:center;
    gap:.55rem;
    padding:.55rem 1rem;
    border-radius:999px;
    background:rgba(201,168,76,.08);
    border:1px solid rgba(201,168,76,.18);
    color:var(--gold);
    font-size:.78rem;
    letter-spacing:.12em;
    text-transform:uppercase;
    margin-bottom:1rem;
}

.hero-badge svg{
    width:14px;
    height:14px;
    stroke:var(--gold)!important;
}

.page-title{
    font-family:'Cormorant Garamond',serif;
    font-size:clamp(2.3rem,4vw,3.2rem);
    line-height:1.05;
    margin-bottom:.8rem;
}

.page-title span{
    color:var(--gold);
    font-style:italic;
}

.page-subtitle{
    color:var(--text-3);
    max-width:640px;
    line-height:1.8;
    font-size:.95rem;
}

.breadcrumbs{
    display:flex;
    align-items:center;
    gap:.8rem;
    align-self:flex-end;
    flex-wrap:wrap;
}

.breadcrumbs a{
    display:flex;
    align-items:center;
    gap:.45rem;
    color:var(--text-3);
    text-decoration:none;
    font-size:.82rem;
    transition:var(--transition);
}

.breadcrumbs a:hover{
    color:var(--gold);
}

.breadcrumbs svg{
    width:14px;
    height:14px;
    stroke:currentColor!important;
}

.kamar-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:1.5rem;
}

.kamar-card{
    position:relative;
    overflow:hidden;
    background:var(--card-bg);
    border:1px solid var(--card-border);
    border-radius:var(--radius-lg);
    padding:1.6rem;
    backdrop-filter:blur(14px);
    transition:var(--transition);
}

.kamar-card:hover{
    transform:translateY(-6px);
    border-color:rgba(201,168,76,.18);
    box-shadow:0 20px 40px rgba(0,0,0,.28);
}

.kamar-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    right:0;
    height:2px;
    background:linear-gradient(90deg, transparent, var(--gold), transparent);
    opacity:.45;
}

.kamar-top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:1rem;
    margin-bottom:1.2rem;
}

.kamar-number{
    display:flex;
    align-items:center;
    gap:.9rem;
}

.kamar-icon{
    width:48px;
    height:48px;
    border-radius:15px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:var(--gold-dim);
    border:1px solid rgba(201,168,76,.18);
    flex-shrink:0;
}

.kamar-icon svg{
    width:20px;
    height:20px;
    stroke:var(--gold)!important;
}

.kamar-title{
    font-family:'Cormorant Garamond',serif;
    font-size:1.5rem;
    font-weight:600;
    margin-bottom:.15rem;
}

.kamar-type{
    color:var(--text-3);
    font-size:.85rem;
}

.price-box{
    display:flex;
    align-items:center;
    gap:.9rem;
    padding:1rem 1.1rem;
    margin-bottom:1.2rem;
    border-radius:18px;
    background:rgba(201,168,76,.07);
    border:1px solid rgba(201,168,76,.14);
}

.price-icon{
    width:42px;
    height:42px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:rgba(201,168,76,.1);
    border:1px solid rgba(201,168,76,.18);
    flex-shrink:0;
}

.price-icon svg{
    width:18px;
    height:18px;
    stroke:var(--gold)!important;
}

.price-label{
    color:var(--text-3);
    font-size:.76rem;
    text-transform:uppercase;
    letter-spacing:.08em;
    margin-bottom:.2rem;
}

.price-value{
    font-size:1.3rem;
    font-weight:700;
    color:var(--gold-light);
}

.facility-box{
    display:flex;
    align-items:flex-start;
    gap:.8rem;
    margin-bottom:1.4rem;
    color:var(--text-2);
    line-height:1.7;
    font-size:.9rem;
}

.facility-box svg{
    width:16px;
    height:16px;
    stroke:var(--gold)!important;
    flex-shrink:0;
    margin-top:3px;
}

.btn-sewa{
    width:100%;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:.7rem;
    padding:1rem 1.2rem;
    border-radius:16px;
    text-decoration:none;
    background:linear-gradient(135deg,var(--gold),#a47c26);
    color:#140d00;
    font-weight:700;
    transition:var(--transition);
    box-shadow:0 10px 30px rgba(201,168,76,.18);
}

.btn-sewa:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 40px rgba(201,168,76,.28);
}

.btn-sewa svg{
    width:16px;
    height:16px;
    stroke:#140d00!important;
}

.empty-card{
    grid-column:1 / -1;
    padding:3rem 2rem;
    text-align:center;
    border-radius:28px;
    background:var(--card-bg);
    border:1px solid var(--card-border);
    backdrop-filter:blur(14px);
}

.empty-icon{
    width:70px;
    height:70px;
    border-radius:22px;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 1.3rem;
    background:var(--gold-dim);
    border:1px solid rgba(201,168,76,.18);
}

.empty-icon svg{
    width:28px;
    height:28px;
    stroke:var(--gold)!important;
}

.empty-title{
    font-family:'Cormorant Garamond',serif;
    font-size:2rem;
    margin-bottom:.5rem;
}

.empty-text{
    color:var(--text-3);
    max-width:520px;
    margin:auto;
    line-height:1.8;
}

@media(max-width:768px){

    .kamar-page{
        padding:1.2rem;
    }

    .page-hero{
        padding:2rem 1.5rem;
    }

    .hero-inner{
        flex-direction:column;
    }

    .breadcrumbs{
        align-self:flex-start;
    }

    .kamar-grid{
        grid-template-columns:1fr;
    }
}

.sidebar {
    width: 280px;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    background: rgba(15, 23, 42, .87);
    border-right: 1px solid rgba(148, 163, 184, .08);
    color: #e2e8f0;
    display: grid;
    grid-template-rows: auto 1fr auto;
    z-index: 30;
    padding: 1.6rem 1rem;
}

.sidebar-brand-wrap {
    margin-bottom: 1.8rem;
}

.sidebar-brand {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: 1rem;
    align-items: center;
    text-decoration: none;
    color: inherit;
}

.brand-est {
    font-size: 0.85rem;
    color: rgba(148, 163, 184, .75);
    margin-bottom: .65rem;
}

.brand-icon {
    width: 52px;
    height: 52px;
    background: rgba(148, 163, 184, .1);
    border-radius: 18px;
    display: grid;
    place-items: center;
}

.brand-texts {
    display: grid;
    gap: 0.1rem;
}

.brand-name {
    font-size: 1.05rem;
    font-weight: 700;
}

.brand-sub {
    color: rgba(203, 213, 225, .8);
    font-size: 0.9rem;
}

.sidebar-rule {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-top: 1.45rem;
}

.brand-rule-line {
    width: 100%;
    height: 1px;
    background: rgba(148, 163, 184, .18);
}

.brand-rule-diamond {
    width: 10px;
    height: 10px;
    transform: rotate(45deg);
    border-radius: 3px;
    background: rgba(224, 231, 255, .18);
}

.sidebar-scroll {
    overflow-y: auto;
    padding-right: .5rem;
}

.nav-label {
    font-size: 0.78rem;
    text-transform: uppercase;
    letter-spacing: 0.16em;
    color: rgba(148, 163, 184, .8);
    margin-bottom: 1rem;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    gap: 0.75rem;
}

.sidebar-item {
    border-radius: 14px;
}

.sidebar-item a {
    display: grid;
    grid-template-columns: 36px 1fr;
    gap: 1rem;
    align-items: center;
    padding: 0.95rem 1rem;
    text-decoration: none;
    color: inherit;
    transition: background .2s ease, transform .2s ease;
}

.sidebar-item a:hover,
.sidebar-item.active a {
    background: rgba(66, 153, 225, .12);
    transform: translateX(1px);
}

.nav-icon {
    width: 36px;
    height: 36px;
    display: grid;
    place-items: center;
    background: rgba(148, 163, 184, .1);
    border-radius: 12px;
}

.sidebar-divider {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .75rem;
    margin: 1.75rem 0;
}

.sidebar-divider-dot {
    width: 12px;
    height: 12px;
    border-radius: 999px;
    background: rgba(148, 163, 184, .4);
}

.sidebar-footer {
    padding-top: 1.5rem;
}

.sidebar-footer-divider {
    height: 1px;
    background: rgba(148, 163, 184, .12);
    margin-bottom: 1.35rem;
}

.sidebar-profile-card {
    display: flex;
    align-items: center;
    gap: 0.9rem;
    padding: 1rem;
    border-radius: 16px;
    background: rgba(148, 163, 184, .08);
    cursor: pointer;
}

.avatar {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: rgba(66, 153, 225, .12);
    color: #e2e8f0;
    font-weight: 700;
}

.profile-info {
    display: grid;
    gap: 0.15rem;
}

.profile-name {
    font-weight: 700;
}

.profile-role {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    color: rgba(203, 213, 225, .78);
    font-size: 0.88rem;
}

.role-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #68d391;
}

.gear-wrap {
    display: grid;
    place-items: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: rgba(148, 163, 184, .12);
}

.profile-popover {
    display: none;
    position: absolute;
    bottom: 88px;
    left: 1rem;
    width: calc(100% - 2rem);
    background: rgba(15, 23, 42, .97);
    border: 1px solid rgba(148, 163, 184, .12);
    border-radius: 18px;
    padding: 0.9rem;
    box-shadow: 0 20px 45px rgba(15, 23, 42, .25);
    z-index: 40;
}

.popover-item {
    display: flex;
    align-items: center;
    gap: .75rem;
    padding: .9rem 1rem;
    border-radius: 14px;
    text-decoration: none;
    color: #e2e8f0;
}

.popover-item:hover {
    background: rgba(148, 163, 184, .08);
}

.popover-icon {
    width: 34px;
    height: 34px;
    display: grid;
    place-items: center;
    background: rgba(148, 163, 184, .08);
    border-radius: 12px;
}

.popover-sep {
    height: 1px;
    background: rgba(148, 163, 184, .08);
    margin: 0.5rem 0;
}

.danger-item {
    color: #fecaca;
}

#profilePopover.open {
    display: block;
}

@media (max-width: 1024px) {
    .sidebar {
        position: static;
        width: 100%;
        height: auto;
        border-right: none;
        border-bottom: 1px solid rgba(148, 163, 184, .08);
    }
}
</style>

<div class="dashboard-container">
    @php $active = 'kamar'; @endphp
    @php $active = $active ?? ''; @endphp
    <aside class="sidebar">
        <div class="sidebar-brand-wrap">
            <div class="brand-est">Est. 2026</div>
            <a href="{{ url('/user') }}" class="sidebar-brand">
                <div class="brand-icon">
                    <i data-feather="home"></i>
                </div>
                <div class="brand-texts">
                    <span class="brand-name">Arterra Living</span>
                    <span class="brand-sub">Comfy Residence</span>
                </div>
            </a>
            <div class="brand-rule">
                <div class="brand-rule-line"></div>
                <div class="brand-rule-diamond"></div>
                <div class="brand-rule-line" style="background:linear-gradient(90deg,rgba(201,168,76,0.05),rgba(201,168,76,0.45));"></div>
            </div>
        </div>

        <div class="sidebar-scroll">
            <div class="nav-label">Menu Utama</div>
            <ul class="sidebar-menu">
                <li class="sidebar-item {{ $active === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ url('/user') }}">
                        <span class="nav-icon"><i data-feather="grid"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ $active === 'kamar' ? 'active' : '' }}">
                    <a href="{{ url('/user/kamar') }}">
                        <span class="nav-icon"><i data-feather="layers"></i></span>
                        <span>Kamar Kos</span>
                    </a>
                </li>
                <li class="sidebar-item {{ $active === 'pembayaran' ? 'active' : '' }}">
                    <a href="{{ url('/user/pembayaran') }}">
                        <span class="nav-icon"><i data-feather="credit-card"></i></span>
                        <span>Pembayaran</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-divider">
                <span></span>
                <div class="sidebar-divider-dot"></div>
                <span></span>
            </div>
        </div>

        <div class="sidebar-footer">
            <div class="sidebar-footer-divider"></div>
            <div id="profilePopover" class="profile-popover">
                <a href="{{ route('profile.edit') }}" class="popover-item">
                    <span class="popover-icon"><i data-feather="user"></i></span>
                    Ubah Profil
                </a>
                <div class="popover-sep"></div>
                <a href="#" onclick="confirmLogout(event)" class="popover-item danger-item">
                    <span class="popover-icon"><i data-feather="log-out"></i></span>
                    Keluar Aplikasi
                </a>
            </div>
            <div class="sidebar-profile-card" onclick="toggleProfilePopover(event)">
                <span class="avatar">{{ strtoupper(substr(auth()->user()->nama, 0, 1)) }}</span>
                <div class="profile-info">
                    <span class="profile-name">{{ auth()->user()->nama }}</span>
                    <span class="profile-role">
                        <span class="role-dot"></span>
                        Penyewa Kos
                    </span>
                </div>
                <span class="gear-wrap">
                    <i data-feather="settings" width="16" height="16" class="icon-spin"></i>
                </span>
            </div>
        </div>
    </aside>
    <form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display:none;">@csrf</form>
    <main class="main-content">
        <div class="kamar-page">

    <!-- HERO -->
    <div class="page-hero">
        <div class="hero-inner">

            <div>
                <div class="hero-badge">
                    <i data-feather="home"></i>
                    Arterra Living
                </div>

                <h1 class="page-title">
                    Daftar <span>Kamar</span>
                </h1>

                <p class="page-subtitle">
                    Temukan kamar yang sesuai dengan kebutuhan, kenyamanan, dan budget Anda.
                </p>
            </div>

            <div class="breadcrumbs">
                <a href="/user">
                    <i data-feather="grid"></i>
                    Dashboard
                </a>

                <a href="/user#daftar-kamar">
                    <i data-feather="layers"></i>
                    Daftar Kamar
                </a>
            </div>

        </div>
    </div>

    <!-- GRID -->
    <div class="kamar-grid">



@forelse($kamar as $k)

                @php $tipe = $k->tipeKamar; @endphp

            <div class="kamar-card">

                <!-- TOP -->
                <div class="kamar-top">

                    <div class="kamar-number">

                        <div class="kamar-icon">
                            <i data-feather="home"></i>
                        </div>

                        <div>
                            <h3 class="kamar-title">
                                Kamar {{ $k->no_kamar }}
                            </h3>

                            <div class="kamar-type">
                                {{ $tipe->tipe_kamar }}
                            </div>
                        </div>

                    </div>

                </div>

                <!-- PRICE -->
                <div class="price-box">

                    <div class="price-icon">
                        <i data-feather="credit-card"></i>
                    </div>

                    <div>
                        <div class="price-label">
                            Harga per bulan
                        </div>

                        <div class="price-value">
                            Rp {{ number_format($tipe->harga, 0, ',', '.') }}
                        </div>
                    </div>

                </div>

                <!-- FACILITY -->
                <div class="facility-box">
                    <i data-feather="check-circle"></i>

                    <div>
                        {{ Str::limit($k->fasilitas, 120) }}
                    </div>
                </div>
                <a href="{{ url('/user/sewa/'.$k->no_kamar) }}" class="btn-sewa kamar-sewa-link" data-no-kamar="{{ $k->no_kamar }}">
                    <i data-feather="arrow-right-circle"></i>
                    Sewa Sekarang
                </a>


            </div>

        @empty

            <div class="empty-card">

                <div class="empty-icon">
                    <i data-feather="inbox"></i>
                </div>

                <h2 class="empty-title">
                    Tidak Ada Kamar
                </h2>

                <p class="empty-text">
                    Saat ini belum ada kamar yang tersedia. Silakan kembali lagi nanti untuk melihat kamar yang tersedia.
                </p>

            </div>

        @endforelse

    </div>
    </main>
</div>

@php $allowedNoKamarInt = $allowedNoKamar === null ? 'null' : (int) $allowedNoKamar; @endphp

<script>
    feather.replace();

    function showBlockedSewaPopup(message) {
        Swal.fire({
            title: 'Tidak bisa melakukan sewa',
            text: message,
            icon: 'warning',
            showCancelButton: false,
            confirmButtonText: 'OK',
            background: 'rgba(8,15,28,0.97)',
            color: '#f0ece2',
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
        });
    }

    function refreshFeatherIcons(){
        feather.replace();
        document.querySelectorAll('.btn-sewa svg').forEach(svg=>{
            svg.style.cssText += ';stroke:#140d00!important;';
        });
        document.querySelectorAll('.breadcrumbs svg').forEach(svg=>{
            svg.style.cssText += ';stroke:currentColor!important;';
        });
        document.querySelectorAll('.kamar-icon svg, .price-icon svg, .facility-box svg, .empty-icon svg').forEach(svg=>{
            svg.style.cssText += ';stroke:var(--gold)!important;';
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        refreshFeatherIcons();

        const allowedNoKamar = @json($allowedNoKamarInt);

        document.querySelectorAll('a.kamar-sewa-link').forEach(link => {
            link.addEventListener('click', function (e) {
                const clickedNo = parseInt(this.dataset.noKamar, 10);

                if (allowedNoKamar !== null && clickedNo !== allowedNoKamar) {
                    e.preventDefault();
                    e.stopPropagation();
                    if (e.stopImmediatePropagation) e.stopImmediatePropagation();

                    showBlockedSewaPopup('Anda hanya bisa menyewa/ memperpanjang kamar yang sebelumnya Anda sewa.');
                }
            }, { capture: true });
        });
    });

    function toggleProfilePopover(event) {
        event.stopPropagation();
        const popover = document.getElementById('profilePopover');
        if (popover) popover.classList.toggle('open');
    }

    function closeProfilePopover() {
        const popover = document.getElementById('profilePopover');
        if (popover && popover.classList.contains('open')) {
            popover.classList.remove('open');
        }
    }

    function confirmLogout(event) {
        event.preventDefault();
        closeProfilePopover();
        if (confirm('Apakah Anda yakin ingin keluar?')) {
            document.getElementById('logoutForm').submit();
        }
    }

    document.addEventListener('click', function(event) {
        const popover = document.getElementById('profilePopover');
        if (!popover) return;
        const profileCard = document.querySelector('.sidebar-profile-card');
        if (profileCard && !profileCard.contains(event.target)) {
            popover.classList.remove('open');
        }
    });
</script>

</x-user-layout>
