<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">

    @stack('styles')
    <style>
        :root{
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
            min-height:100vh;
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

        .layout{
            display:grid;
            grid-template-columns:260px 1fr;
            min-height:100vh;
        }

        .sidebar{
            position:sticky;
            top:0;
            height:100vh;
            background:var(--glass);
            border-right:1px solid var(--border);
            backdrop-filter:blur(24px);
            display:flex;
            flex-direction:column;
            padding:36px 20px 24px;
            overflow:hidden;
            z-index:100;
        }

        .sidebar::after{
            content:'';
            position:absolute;
            bottom:0;
            left:0;
            right:0;
            height:140px;
            background:linear-gradient(to top, rgba(201,168,76,.08), transparent);
            pointer-events:none;
        }

        .brand{
            padding-bottom:28px;
            border-bottom:1px solid var(--border);
            margin-bottom:30px;
        }

        .brand-est{
            font-size:.62rem;
            letter-spacing:.24em;
            color:var(--gold);
            margin-bottom:6px;
        }

        .brand-name{
            font-family:'Cormorant Garamond',serif;
            font-size:1.7rem;
            color:var(--white);
            line-height:1;
        }

        .brand-sub{
            margin-top:6px;
            font-size:.62rem;
            letter-spacing:.18em;
            color:var(--muted);
            text-transform:uppercase;
        }

        .brand-divider{
            width:34px;
            height:1px;
            background:var(--gold);
            margin-top:12px;
        }

        .nav-label{
            font-size:.62rem;
            letter-spacing:.22em;
            text-transform:uppercase;
            color:var(--muted);
            margin-bottom:12px;
            padding-left:14px;
        }

        .nav-list{
            list-style:none;
            display:flex;
            flex-direction:column;
            gap:4px;
        }

        .nav-item a{
            display:flex;
            align-items:center;
            gap:12px;
            padding:12px 14px;
            border-radius:12px;
            color:var(--muted);
            transition:.3s ease;
            position:relative;
            font-size:.88rem;
        }

        .nav-item a:hover,
        .nav-item.active a{
            background:var(--gold-dim);
            color:var(--gold-light);
            transform:translateX(4px);
        }

        .nav-item.active a::before{
            content:'';
            position:absolute;
            left:0;
            top:20%;
            width:2px;
            height:60%;
            background:var(--gold);
            border-radius:2px;
        }

        .nav-icon{
            width:30px;
            height:30px;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-shrink:0;
        }

        .nav-icon svg{
            width:16px;
            height:16px;
        }

        .user-card{
            margin-top:auto;
            border-top:1px solid var(--border);
            padding-top:22px;
            position:relative;
            z-index:2;
        }

        .user-card-inner{
            display:flex;
            align-items:center;
            gap:12px;
            padding:10px 12px;
            border-radius:12px;
            cursor:pointer;
            transition:.3s;
            background:rgba(255,255,255,.02);
        }

        .user-card-inner:hover{
            background:var(--gold-dim);
        }

        .gear-wrap {
            display:flex;
            align-items:center;
            justify-content:center;
            color:rgba(201,168,76,0.45);
            transition:color .3s ease;
        }

        .user-card-inner:hover .gear-wrap {
            color:var(--gold);
        }

        .icon-spin {
            display:inline-block;
            transition:transform .3s ease;
        }

        .user-card-inner:hover .icon-spin {
            animation:spin 2s linear infinite;
        }

        @keyframes spin {
            from { transform:rotate(0deg); }
            to { transform:rotate(360deg); }
        }

        .user-avatar{
            width:42px;
            height:42px;
            border-radius:12px;
            border:1px solid var(--gold);
            background:linear-gradient(135deg, rgba(201,168,76,.2), rgba(201,168,76,.05));
            display:flex;
            align-items:center;
            justify-content:center;
            font-family:'Cormorant Garamond',serif;
            color:var(--gold-light);
            font-size:1rem;
            font-weight:600;
            flex-shrink:0;
        }

        .user-name{
            font-size:.85rem;
            color:var(--white);
            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
        }

        .user-role{
            font-size:.68rem;
            color:var(--gold);
            letter-spacing:.08em;
        }

        .profile-popover {
            position:absolute;
            bottom:calc(100% + 0.6rem);
            left:0;
            right:0;
            background:rgba(10,18,34,.96);
            border:1px solid rgba(201,168,76,.18);
            border-radius:14px;
            padding:.5rem;
            box-shadow:0 -18px 40px rgba(0,0,0,.35), 0 0 0 1px rgba(255,255,255,.03);
            z-index:120;
            display:flex;
            flex-direction:column;
            gap:.25rem;
            opacity:0;
            visibility:hidden;
            transform:translateY(10px);
            transition:opacity .25s ease, transform .25s ease, visibility .25s ease;
        }

        .profile-popover.active {
            opacity:1;
            visibility:visible;
            transform:translateY(0);
        }

        .popover-item {
            display:flex;
            align-items:center;
            gap:.75rem;
            padding:.75rem .85rem;
            color:var(--text);
            font-size:.88rem;
            border-radius:12px;
            transition:background .2s ease, color .2s ease;
            text-decoration:none;
        }

        .popover-item:hover {
            background:rgba(255,255,255,.05);
            color:var(--white);
        }

        .popover-icon {
            width:30px;
            height:30px;
            border-radius:10px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:rgba(255,255,255,.05);
        }

        .popover-item.danger-item {
            color:#fda4af;
        }

        .main{
            padding:48px;
            display:flex;
            flex-direction:column;
            gap:32px;
        }

        .reveal{
            opacity:0;
            transform:translateY(30px);
            transition:.9s ease;
        }

        .reveal.visible{
            opacity:1;
            transform:translateY(0);
        }

        @media(max-width:980px){
            .layout{
                grid-template-columns:1fr;
            }
            .sidebar{
                position:relative;
                height:auto;
            }
            .main{
                padding:24px;
            }
        }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-est">EST. 2026</div>
            <div class="brand-name">Arterra Living</div>
            <div class="brand-sub">Comfy Residence</div>
            <div class="brand-divider"></div>
        </div>

        <div class="nav-label">Menu Utama</div>
        <ul class="nav-list">
            <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a href="/admin/dashboard">
                    <span class="nav-icon"><i data-feather="home"></i></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}">
                <a href="/admin/user">
                    <span class="nav-icon"><i data-feather="users"></i></span>
                    Pengguna
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/tipe-kamar*') ? 'active' : '' }}">
                <a href="/admin/tipe-kamar">
                    <span class="nav-icon"><i data-feather="tag"></i></span>
                    Tipe Kamar
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/kamar*') ? 'active' : '' }}">
                <a href="/admin/kamar">
                    <span class="nav-icon"><i data-feather="layers"></i></span>
                    Kamar
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/sewa*') ? 'active' : '' }}">
                <a href="/admin/sewa">
                    <span class="nav-icon"><i data-feather="file-text"></i></span>
                    Sewa
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/pembayaran*') ? 'active' : '' }}">
                <a href="/admin/pembayaran">
                    <span class="nav-icon"><i data-feather="credit-card"></i></span>
                    Pembayaran
                </a>
            </li>
        </ul>

        <div class="user-card">
            <div class="user-card-inner" onclick="toggleProfilePopover(event)">
                <div class="user-avatar">A</div>
                <div class="user-info">
                    <div class="user-name">Administrator</div>
                    <div class="user-role">Pengelola Kos</div>
                </div>
                <span class="gear-wrap">
                    <i data-feather="settings" width="16" height="16" class="icon-spin"></i>
                </span>
            </div>
            <div id="profilePopover" class="profile-popover">
                <a href="#" onclick="confirmLogout(event)" class="popover-item danger-item">
                    <span class="popover-icon"><i data-feather="log-out"></i></span>
                    Logout
                </a>
            </div>
        </div>
    </aside>

    <main class="main">
        @yield('content')
    </main>
</div>

<script>
    feather.replace();
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add('visible');
            }
        });
    },{ threshold:0.1 });
    reveals.forEach(el => observer.observe(el));
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleProfilePopover(event) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById('profilePopover').classList.toggle('active');
    }

    function closeProfilePopover() {
        const popover = document.getElementById('profilePopover');
        if (popover) popover.classList.remove('active');
    }

    document.addEventListener('click', function(e) {
        const popover = document.getElementById('profilePopover');
        const card = document.querySelector('.user-card');
        if (popover && popover.classList.contains('active') && card && !card.contains(e.target)) {
            closeProfilePopover();
        }
    });

    function confirmLogout(event) {
        if (event) { event.preventDefault(); event.stopPropagation(); }
        closeProfilePopover();
        setTimeout(() => {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda akan keluar dari panel admin.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4a8a4e',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Ya, Keluar!',
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
            }).then(result => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        }, 100);
    }
</script>
<form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display:none;">@csrf</form>

@stack('scripts')
</body>
</html>
