<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Tipe Kamar</title>
    <style>
    :root {
        color-scheme: dark;        
        --bg: #0b1120;            
        --surface: #111827;           
        --surface-soft: #161f36;
        --text: #e2e8f0;            
        --muted: #94a3b8;            
        --border: rgba(148,163,184,.18);            
    }

    * { 
        box-sizing: border-box
    }

    html { 
        scroll-behavior: smooth
     }
    body {
        margin: 0;
        min-height: 100vh;            
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;            
        background: radial-gradient(circle at top left, rgba(124,58,237,.18), transparent 28%),
                    linear-gradient(180deg, #020617 0%, #0b1120 100%);                        
        color: var(--text);            
    }
    body::before {
        content: '';           
        position: fixed;            
        inset: 0;            
        background-image: radial-gradient(circle at 20% 20%, rgba(124,58,237,.14), transparent 15%),
                            radial-gradient(circle at 80% 10%, rgba(59,130,246,.12), transparent 14%),
                            radial-gradient(circle at 50% 85%, rgba(16,185,129,.12), transparent 22%);                             
        pointer-events: none;           
        opacity: .75;            
        z-index: -1;            
    }
    a { color: inherit;
        text-decoration: none
     }
    .layout { 
        display: grid;            
        grid-template-columns: 280px 1fr;            
        gap: 24px;            
        padding: 24px;            
    }
    .sidebar { display: flex;
        flex-direction: column;
        gap: 24px;
        background: rgba(15,23,42,.95);
        border: 1px solid var(--border);
        border-radius: 30px;
        padding: 28px 24px;
        min-height: calc(100vh - 48px)
    }
    .brand { display: flex;
        align-items: center;
        gap: 14px
    }
    .brand-chip { width: 44px;
        height: 44px;
        border-radius: 16px;
        background: rgba(124,58,237,.2);
        display: grid;
        place-items: center;
        font-size: 1.2rem
    }
        .brand-text { display: flex;
         flex-direction: column;
         gap: 4px
    }
        .brand-text strong { display: block;
         font-size: 1.15rem
    }
        .brand-text small { color: var(--muted)
    }
        .sidebar p { margin: 0;
         line-height: 1.8;
         color: var(--muted)
    }
        .nav-list { list-style: none;
         padding: 0;
         margin: 0;
         display: grid;
         gap: 10px
    }
        .nav-item { border-radius: 18px;
         overflow: hidden
    }
        .nav-item a { display: flex;
         align-items: center;
         gap: 14px;
         padding: 14px 16px;
         border-radius: 18px;
         transition: background .2s ease, transform .2s ease;
         color: var(--text)
    }
        .nav-item a:hover, .nav-item.active a { background: rgba(124,58,237,.18);
         transform: translateX(2px)
    }
        .nav-icon { width: 34px;
         height: 34px;
         border-radius: 12px;
         display: grid;
         place-items: center;
         background: rgba(255,255,255,.06);
         font-size: 1.1rem
    }
        .main { display: flex;
         flex-direction: column;
         gap: 24px
    }
        .topbar { display: flex;
         justify-content: space-between;
         gap: 20px;
         align-items: center;
         background: rgba(15,23,42,.95);
         border: 1px solid var(--border);
         border-radius: 30px;
         padding: 28px
    }
        .topbar h1 { margin: 0;
         font-size: clamp(2rem, 2.6vw, 2.5rem);
         line-height: 1.05
    }
        .topbar p { margin: 12px 0 0;
         color: var(--muted);
         max-width: 520px;
         line-height: 1.7
    }
        .badges { display: flex;
         flex-wrap: wrap;
         gap: 12px
    }
        .badge { display: inline-flex;
         align-items: center;
         gap: 10px;
         padding: 12px 16px;
         border-radius: 999px;
         background: rgba(124,58,237,.14);
         color: #f8fafc;
         font-size: .95rem
    }
        .content-card, .table-card, .form-card, .detail-card { background: rgba(15,23,42,.95);
         border: 1px solid rgba(148,163,184,.18);
         border-radius: 28px;
         padding: 28px;
         box-shadow: 0 25px 50px rgba(15, 23, 42, .12)
    }
        .section-title { margin: 0 0 1rem;
         font-size: 1.4rem
    }
        .input-group { display: grid;
         gap: .85rem;
         margin-bottom: 1rem
    }
        label { color: #cbd5e1;
         font-weight: 600
    }
        input, select, textarea { width: 100%;
         padding: 1rem 1.05rem;
         border-radius: 18px;
         border: 1px solid rgba(148,163,184,.18);
         background: rgba(255,255,255,.05);
         color: #eef2ff
    }
        textarea { min-height: 140px;
         resize: vertical
    }
        .btn, .link-button { display: inline-flex;
         align-items: center;
         justify-content: center;
         gap: .5rem;
         border-radius: 16px;
         padding: .85rem 1.2rem;
         border: 1px solid transparent;
         font-weight: 700;
         transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
         cursor: pointer;
         text-decoration: none;
         color: white
    }
        .btn-primary { background: linear-gradient(135deg, #7c3aed, #2563eb)
    }
        .btn-secondary { background: rgba(255,255,255,.08);
         color: #eef2ff;
         border-color: rgba(255,255,255,.14)
    }
        .btn-danger { background: #ef4444
    }
        .btn-success { background: #22c55e
    }
        .btn:hover, .link-button:hover { transform: translateY(-1px);
         box-shadow: 0 18px 35px rgba(59, 130, 246, .18)
    }
        .alert { padding: 1rem 1.2rem;
         border-radius: 18px;
         background: rgba(34,197,94,.12);
         border: 1px solid rgba(34,197,94,.2);
         color: #d1fae5
    }
        .alert-error { background: rgba(248,113,113,.12);
         border-color: rgba(248,113,113,.22);
         color: #fecaca
    }
        @media (
            max-width: 980px) { .layout { grid-template-columns: 1fr
    } .sidebar { min-height: auto
    } .topbar { flex-direction: column;
         align-items: flex-start
    } 
    }
        @media (max-width: 760px) { .table { min-width: 100%
     } }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div>
                <div class="brand">
                    <div class="brand-chip">KK</div>
                    <div class="brand-text">
                        <strong>KosKita Admin</strong>
                        <small>Panel manajemen kos modern</small>
                    </div>
                </div>
                <p>Kelola seluruh data kos</p>
            </div>
            <ul class="nav-list">
                <li class="nav-item"><a href="/admin/dashboard"><span class="nav-icon"><i data-feather="home"></i></span> Dashboard</a></li>
                <li class="nav-item"><a href="/admin/user"><span class="nav-icon"><i data-feather="users"></i></span> Pengguna</a></li>
                    <li class="nav-item"><a href="/admin/tipe-kamar"><span class="nav-icon"><i data-feather="tag"></i></span> Tipe Kamar</a></li>
                <li class="nav-item"><a href="/kamar"><span class="nav-icon"><i data-feather="layers"></i></span> Kamar</a></li>
                <li class="nav-item"><a href="/sewa"><span class="nav-icon"><i data-feather="file-text"></i></span> Sewa</a></li>
                <li class="nav-item"><a href="/pembayaran"><span class="nav-icon"><i data-feather="credit-card"></i></span> Pembayaran</a></li>
                <li class="nav-item"><a href="/admin-logout"><span class="nav-icon"><i data-feather="log-out"></i></span> Logout</a></li>
            </ul>
        </aside>
        <main class="main">
            <section class="topbar">
                <div>
                    <h1>Admin - Tambah Tipe Kamar</h1>
                    <p>Tambahkan opsi tipe kamar baru lengkap dengan harga dan fasilitas.</p>
                </div>
                <div class="badges"><span class="badge">Tipe Kamar</span></div>
            </section>
            <div class="form-card">
                <h2 class="section-title">Form Tambah Tipe Kamar</h2>
                @if($errors->any())
                    <div class="alert alert-error"><ul style="margin:0;
        
        padding-left:18px;
        
        ">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
                @endif
                    <form method="POST" action="/admin/tipe-kamar">
                    @csrf
                    <div class="input-group"><label for="tipe_kamar">Tipe Kamar</label><input id="tipe_kamar" name="tipe_kamar" value="{{ old('tipe_kamar') }}" required></div>
                    <div class="input-group"><label for="harga">Harga</label><input id="harga" name="harga" value="{{ old('harga') }}" required></div>
                    <div style="display:flex;
        
        gap:.85rem;
        
         flex-wrap:wrap;
        
         margin-top:1rem;
        
        "><button type="submit" class="btn btn-primary">Simpan</button><a href="/admin/tipe-kamar" class="btn btn-secondary">Batal</a></div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>