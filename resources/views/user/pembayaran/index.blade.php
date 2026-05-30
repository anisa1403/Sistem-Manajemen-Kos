<x-user-layout>
    <script src="https://unpkg.com/feather-icons"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap');

*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

:root {
    --navy-900: #080f1c;
    --navy-800: #0d1829;
    --navy-700: #111f35;
    --navy-600: #172641;
    --navy-500: #1e3050;
    --card-bg:  rgba(13, 24, 41, 0.72);
    --card-border: rgba(255,255,255,0.06);
    --gold:     #c9a84c;
    --gold-lt:  #e0c47a;
    --gold-dim: rgba(201,168,76,0.18);
    --gold-glow:rgba(201,168,76,0.28);
    --accent:   #4f7fff;
    --accent-lt:rgba(79,127,255,0.15);
    --success:  #22c55e;
    --danger:   #ef4444;
    --text-1:   #f0ece2;
    --text-2:   #c4bfb0;
    --text-3:   #7a7568;
    --sidebar-w:280px;
    --radius-lg:18px;
    --radius-md:12px;
    --radius-sm:8px;
    --transition: 0.3s cubic-bezier(.4,0,.2,1);
}

html { 
    scroll-behavior: smooth; 
}
html, body {
    height: auto;
    overflow-x: hidden;
    overflow-y: auto;
    font-family: 'DM Sans', sans-serif;
    background: var(--navy-900);
    color: var(--text-1);
}

body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
    pointer-events: none;
    z-index: 0;
    opacity: 0.6;
}

body {
    background-color: var(--navy-900);
    background-image:
        linear-gradient(180deg, rgba(8,15,28,0.3) 0%, rgba(8,15,28,1) 80%),
        url("{{ asset('storage/image/bg.png') }}");
    background-size: 100% 700px;
    background-position: top center;
    background-repeat: no-repeat;
}

.reveal {
    opacity: 0;
    transform: translateY(32px);
    transition: opacity 0.7s cubic-bezier(.4,0,.2,1), transform 0.7s cubic-bezier(.4,0,.2,1);
}
.reveal.reveal-left  { transform: translateX(-32px); }
.reveal.reveal-right { transform: translateX(32px); }
.reveal.reveal-scale { transform: scale(0.94) translateY(16px); }
.reveal.visible {
    opacity: 1;
    transform: none;
}
.reveal-delay-1 { transition-delay: 0.1s; }
.reveal-delay-2 { transition-delay: 0.2s; }
.reveal-delay-3 { transition-delay: 0.3s; }
.reveal-delay-4 { transition-delay: 0.4s; }
.reveal-delay-5 { transition-delay: 0.5s; }

.dashboard-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
    position: relative;
    z-index: 1;
}

.sidebar {
    width: var(--sidebar-w);
    background: rgba(6, 12, 24, 0.92);
    backdrop-filter: blur(40px) saturate(1.4);
    -webkit-backdrop-filter: blur(40px) saturate(1.4);
    border-right: 1px solid rgba(201,168,76,0.12);
    position: fixed;
    top: 0; left: 0; bottom: 0;
    z-index: 100;
    display: flex;
    flex-direction: column;
    padding-bottom: 1.5rem;
    overflow: hidden;
}
.sidebar::before {
    content: '';
    position: absolute;
    top: -80px; left: -80px;
    width: 260px; height: 260px;
    background: radial-gradient(circle, rgba(201,168,76,0.1) 0%, transparent 65%);
    pointer-events: none;
}
.sidebar::after {
    content: '';
    position: absolute;
    bottom: 80px; right: -40px;
    width: 180px; height: 180px;
    background: radial-gradient(circle, rgba(79,127,255,0.06) 0%, transparent 65%);
    pointer-events: none;
}

.sidebar-brand-wrap {
    padding: 1.75rem 1.5rem 1.5rem;
    border-bottom: 1px solid rgba(201,168,76,0.1);
    position: relative;
    flex-shrink: 0;
}
.brand-est {
    font-size: 0.58rem;
    letter-spacing: 0.32em;
    text-transform: uppercase;
    color: var(--gold);
    opacity: 0.7;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 0.9rem;
}
.brand-est::before, .brand-est::after {
    content: '';
    flex: 1;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201,168,76,0.3));
}
.brand-est::after { background: linear-gradient(90deg, rgba(201,168,76,0.3), transparent); }
.sidebar-brand {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    text-decoration: none;
}
.brand-icon {
    width: 44px; height: 44px;
    border-radius: 11px;
    background: linear-gradient(135deg, rgba(201,168,76,0.22), rgba(201,168,76,0.06));
    border: 1px solid rgba(201,168,76,0.3);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    animation: brandPulse 5s ease-in-out infinite;
}
.brand-icon i { width: 20px; height: 20px; stroke: var(--gold) !important; fill: none; }
@keyframes brandPulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(201,168,76,0); }
    50%       { box-shadow: 0 0 18px 3px rgba(201,168,76,0.2); }
}
.brand-texts { display: flex; flex-direction: column; gap: 1px; }
.brand-name {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.5rem;
    font-weight: 600;
    letter-spacing: 0.03em;
    background: linear-gradient(135deg, #f5ead5 0%, var(--gold) 50%, #e0c882 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.1;
}
.brand-sub {
    font-size: 0.58rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: rgba(201,168,76,0.5);
}
.brand-rule { display: flex; align-items: center; gap: 8px; margin-top: 1.1rem; }
.brand-rule-line { flex: 1; height: 1px; background: linear-gradient(90deg, rgba(201,168,76,0.45), rgba(201,168,76,0.05)); }
.brand-rule-diamond { width: 5px; height: 5px; background: var(--gold); transform: rotate(45deg); opacity: 0.45; flex-shrink: 0; }

.sidebar-scroll {
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
    padding: 0.85rem 1.25rem 0;
    scrollbar-width: none;
}
.sidebar-scroll::-webkit-scrollbar { display: none; }
.nav-label {
    font-size: 0.58rem;
    font-weight: 600;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: rgba(201,168,76,0.45);
    padding: 0 0.5rem;
    margin: 0.5rem 0 0.6rem;
    display: flex;
    align-items: center;
    gap: 8px;
}
.nav-label::after { 
    content: '';
    flex: 1; 
    height: 1px;
    background: rgba(255,255,255,0.04); 
}
.sidebar-menu { 
    list-style: none; 
    display: flex;
    flex-direction: column; 
    gap: 0.2rem; 
    margin-bottom: 1rem; 
}
.sidebar-item a,
.sidebar-item button {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    padding: 0.72rem 0.95rem;
    color: var(--text-2);
    text-decoration: none;
    font-size: 0.87rem;
    font-weight: 400;
    border-radius: var(--radius-md);
    border: 1px solid transparent;
    background: transparent;
    width: 100%;
    text-align: left;
    cursor: pointer;
    position: relative;
    transition: var(--transition);
    letter-spacing: 0.01em;
}
.nav-icon {
    width: 32px; height: 32px;
    border-radius: var(--radius-sm);
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: var(--transition);
}
aside .nav-icon svg { stroke: #7a7568 !important; fill: none !important; width: 15px !important; height: 15px !important; }
.sidebar-item a:hover {
    color: var(--text-1);
    background: rgba(201,168,76,0.05);
    border-color: rgba(201,168,76,0.08);
    transform: translateX(3px);
}
.sidebar-item a:hover .nav-icon { background: rgba(201,168,76,0.12); border-color: rgba(201,168,76,0.25); }
.sidebar-item a:hover .nav-icon svg { stroke: var(--gold) !important; }
.sidebar-item.active a {
    background: linear-gradient(90deg, rgba(201,168,76,0.11) 0%, rgba(201,168,76,0.02) 100%);
    color: #f0e6c8;
    border-color: rgba(201,168,76,0.22);
    box-shadow: inset 3px 0 0 0 var(--gold);
}
.sidebar-item.active a .nav-icon { background: rgba(201,168,76,0.16); border-color: rgba(201,168,76,0.32); }
.sidebar-item.active a .nav-icon svg { stroke: var(--gold) !important; }
.sidebar-item.active a::after {
    content: '';
    position: absolute;
    right: 14px;
    width: 5px; height: 5px;
    background: var(--gold);
    border-radius: 50%;
    box-shadow: 0 0 8px var(--gold);
    opacity: 0.75;
}
.sidebar-divider { 
    display: flex;
    lign-items: center; 
    gap: 8px; 
    padding: 0.2rem 0.5rem; 
    margin: 0.4rem 0; 
}
.sidebar-divider span { 
    flex: 1; 
    height: 1px; 
    background: rgba(255,255,255,0.04); 
}
.sidebar-divider-dot { 
    width: 3px; 
    height: 3px; 
    border-radius: 50%; 
    background: rgba(255,255,255,0.08); 
}

.sidebar-footer {
    padding: 0 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
    position: relative;
    flex-shrink: 0;
}
.sidebar-footer-divider { height: 1px; background: linear-gradient(90deg, rgba(201,168,76,0.18), transparent); margin-bottom: 0.5rem; }
.sidebar-profile-card {
    display: flex;
    align-items: center;
    gap: 0.7rem;
    padding: 0.85rem;
    background: rgba(201,168,76,0.04);
    border: 1px solid rgba(201,168,76,0.1);
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: var(--transition);
}
.sidebar-profile-card:hover {
    background: rgba(201,168,76,0.09);
    border-color: rgba(201,168,76,0.28);
    box-shadow: 0 4px 18px rgba(0,0,0,0.25), inset 0 0 12px rgba(201,168,76,0.05);
    transform: translateY(-2px);
}
.avatar {
    width: 36px; height: 36px;
    border-radius: 9px;
    background: linear-gradient(135deg, var(--gold), #9b7820);
    color: #1a1200;
    font-weight: 700;
    font-size: 0.9rem;
    font-family: 'Cormorant Garamond', serif;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: transform var(--transition);
}
.sidebar-profile-card:hover .avatar { 
    transform: scale(1.06); 
}
.profile-info { 
    display: flex; 
    flex-direction: column; 
    flex-grow: 1; 
    overflow: hidden; 
}
.profile-name { 
    font-size: 0.84rem; 
    font-weight: 500; 
    color: #f0e6c8; 
    white-space: nowrap; 
    overflow: hidden; 
    text-overflow: ellipsis; 
}
.profile-role { 
    font-size: 0.66rem; 
    color: rgba(201,168,76,0.5); 
    display: flex; 
    align-items: center; 
    gap: 4px; 
    margin-top: 2px; 
    letter-spacing: 0.06em; 
}
.role-dot { 
    width: 5px; 
    height: 5px; 
    border-radius: 50%; 
    background: var(--success); 
    display: inline-block; 
}
.gear-wrap { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    color: rgba(201,168,76,0.4); 
    transition: color var(--transition); 
}
.sidebar-profile-card:hover .gear-wrap { 
    color: var(--gold); 
}
.icon-spin { 
    display: inline-block; 
    transition: transform var(--transition); 
}
.sidebar-profile-card:hover .icon-spin { 
    animation: spin 2s linear infinite; 
}

@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
.profile-popover {
    position: absolute;
    bottom: calc(100% + 0.6rem);
    left: 0; right: 0;
    background: rgba(10, 18, 34, 0.97);
    border: 1px solid rgba(201,168,76,0.18);
    border-radius: var(--radius-md);
    padding: 0.45rem;
    box-shadow: 0 -12px 40px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.03);
    z-index: 110;
    display: flex;
    flex-direction: column;
    gap: 0.2rem;
    opacity: 0;
    visibility: hidden;
    transform: translateY(8px);
    transition: all var(--transition);
}
.profile-popover.active { opacity: 1; visibility: visible; transform: translateY(0); }
.popover-item {
    display: flex;
    align-items: center;
    gap: 0.7rem;
    padding: 0.7rem 0.95rem;
    color: var(--text-2);
    text-decoration: none;
    font-size: 0.84rem;
    border-radius: var(--radius-sm);
    transition: var(--transition);
}
.popover-item:hover { 
    background: rgba(255,255,255,0.04); 
    color: var(--text-1); 
}
.popover-icon { 
    width: 28px; 
    height: 28px; 
    border-radius: 7px; 
    background: rgba(255,255,255,0.04); 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    flex-shrink: 0; 
}
.popover-icon svg { 
    stroke: #7a7568 !important; 
    fill: none !important; 
    width: 14px !important; 
    height: 14px !important; 
}
.popover-item.danger-item { 
    color: #fca5a5; 
}
.popover-item.danger-item:hover { 
    background: rgba(239,68,68,0.08); 
}
.popover-item.danger-item .popover-icon { 
    background: rgba(239,68,68,0.09); 
}
.popover-item.danger-item .popover-icon svg { 
    stroke: #fca5a5 !important; 
}
.popover-sep { 
    height: 1px; 
    background: rgba(201,168,76,0.08); 
    margin: 2px 0; 
}

.main-content {
    margin-left: var(--sidebar-w);
    width: calc(100% - var(--sidebar-w));
    min-height: 100vh;
    padding: 0;
}

.page-hero {
    position: relative;
    padding: 3.5rem 3rem 3rem;
    overflow: hidden;
    border-bottom: 1px solid rgba(201,168,76,0.08);
}
.page-hero::before {
    content: '';
    position: absolute;
    top: -120px; left: -120px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(201,168,76,0.07) 0%, transparent 65%);
    pointer-events: none;
}
.page-hero::after {
    content: '';
    position: absolute;
    bottom: -60px; right: 10%;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(79,127,255,0.04) 0%, transparent 65%);
    pointer-events: none;
}
.page-hero-inner {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1.5rem;
}
.page-hero-left {}
.page-hero-ornament {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 1rem;
    opacity: 0;
    animation: heroFadeUp 0.8s ease-out 0.2s forwards;
}
.page-hero-ornament-line { 
    width: 32px; 
    height: 1px; 
    background: linear-gradient(90deg, transparent, var(--gold)); 
}
.page-hero-ornament-text { 
    font-size: 0.62rem; 
    font-weight: 600; 
    letter-spacing: 0.26em; 
    text-transform: uppercase; 
    color: var(--gold); 
    opacity: 0.8; 
}
.page-hero-ornament-diamond { 
    width: 4px; 
    height: 4px; 
    background: var(--gold); 
    transform: rotate(45deg); 
    opacity: 0.55; 
}
.page-hero-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(2rem, 3.5vw, 2.9rem);
    font-weight: 600;
    line-height: 1.1;
    margin-bottom: 0.6rem;
    opacity: 0;
    animation: heroFadeUp 0.8s ease-out 0.35s forwards;
}
.page-hero-title .title-light {
    background: linear-gradient(135deg, #f5ead5 0%, #e8d5a0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.page-hero-title .title-gold {
    background: linear-gradient(135deg, var(--gold) 0%, var(--gold-lt) 60%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-style: italic;
}
.page-hero-sub {
    color: ivory;
    font-size: 0.92rem;
    line-height: 1.65;
    max-width: 480px;
    opacity: 0;
    animation: heroFadeUp 0.8s ease-out 0.5s forwards;
}
.breadcrumbs {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    opacity: 0;
    animation: heroFadeUp 0.8s ease-out 0.6s forwards;
    align-self: flex-end;
    padding-bottom: 0.25rem;
}
.breadcrumbs a {
    font-size: 0.78rem;
    color: var(--text-3);
    text-decoration: none;
    transition: color var(--transition);
    display: flex;
    align-items: center;
    gap: 5px;
}
.breadcrumbs a:hover { color: var(--gold); }
.breadcrumbs a + a::before {
    content: '';
    display: inline-block;
    width: 4px; height: 4px;
    background: var(--text-3);
    transform: rotate(45deg);
    opacity: 0.4;
    margin-right: 5px;
}
.breadcrumbs a:last-child { color: var(--gold); }

@keyframes heroFadeUp {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
}

.body-content {
    padding: 2.5rem 2.5rem 3rem 2rem;
}

.payment-grid {
    display: grid;
    grid-template-columns: 1fr 1.35fr;
    gap: 1.75rem;
    align-items: start;
}

.section-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 22px;
    padding: 2rem;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    position: relative;
    overflow: hidden;
}
.section-card::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
    opacity: 0.4;
}
.section-card::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(201,168,76,0.05) 0%, transparent 70%);
    pointer-events: none;
}
.card-header {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    margin-bottom: 1.75rem;
    padding-bottom: 1.25rem;
    border-bottom: 1px solid var(--card-border);
}
.card-header-icon {
    width: 42px; height: 42px;
    border-radius: var(--radius-md);
    background: var(--gold-dim);
    border: 1px solid rgba(201,168,76,0.22);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.card-header-icon svg { stroke: var(--gold) !important; width: 20px !important; height: 20px !important; }
.card-header-texts {}
.card-header-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.35rem;
    font-weight: 600;
    color: var(--text-1);
    margin: 0 0 0.15rem;
}
.card-header-sub { font-size: 0.8rem; color: var(--text-3); margin: 0; }

.sewa-list { display: flex; flex-direction: column; gap: 0; }
.sewa-item {
    padding: 1.35rem 0;
    border-bottom: 1px solid var(--card-border);
}
.sewa-item:last-child { border-bottom: none; padding-bottom: 0; }
.sewa-item:first-child { padding-top: 0; }
.sewa-item-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 0.85rem;
}
.sewa-item-left { display: flex; align-items: flex-start; gap: 0.8rem; }
.sewa-num-badge {
    width: 40px; height: 40px;
    border-radius: var(--radius-sm);
    background: var(--gold-dim);
    border: 1px solid rgba(201,168,76,0.22);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--gold);
    flex-shrink: 0;
}
.sewa-item-title { 
    font-size: 1rem; 
    font-weight: 600; 
    color: var(--text-1); 
    margin: 0 0 0.2rem; 
}
.sewa-item-meta { 
    font-size: 0.78rem; 
    color: var(--text-3); 
    margin: 0; 
}
.sewa-status-chip {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.72rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 100px;
    white-space: nowrap;
    flex-shrink: 0;
}
.sewa-status-chip.lunas { 
    background: rgba(34,197,94,0.12); 
    color: #86efac; 
    border: 1px solid rgba(34,197,94,0.2); }
.sewa-status-chip.belum { 
    background: rgba(239,68,68,0.1); 
    color: #fca5a5; 
    border: 1px solid rgba(239,68,68,0.2); 
}
.sewa-status-chip svg { 
    width: 10px !important; 
    height: 10px !important; 
}
.sewa-status-chip.lunas svg { 
    stroke: #86efac !important; 
}
.sewa-status-chip.belum svg {
    stroke: #fca5a5 !important; 
}
.sewa-tagihan-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.85rem 1rem;
    background: rgba(201,168,76,0.04);
    border-radius: var(--radius-md);
    border-left: 3px solid var(--gold);
    margin-bottom: 0.85rem;
}
.sewa-tagihan-label { 
    font-size: 0.72rem; 
    color: rgba(201,168,76,0.6); 
    text-transform: uppercase; 
    letter-spacing: 0.09em; 
    font-weight: 600; 
    margin-bottom: 3px; 
}
.sewa-tagihan-val { 
    font-size: 1.05rem; 
    font-weight: 700; 
}
.sewa-tagihan-val.danger { 
    color: #fca5a5; 
}
.sewa-tagihan-val.success { 
    color: #86efac; 
}
.btn-pay {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.82rem 1.5rem;
    background: linear-gradient(135deg, var(--gold), #a07828);
    color: #120d00;
    border: none;
    border-radius: var(--radius-md);
    font-weight: 700;
    font-size: 0.87rem;
    font-family: 'DM Sans', sans-serif;
    text-decoration: none;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 14px rgba(201,168,76,0.25);
}
.btn-pay:hover { 
    transform: translateY(-3px); 
    box-shadow: 0 12px 28px rgba(201,168,76,0.38); 
    background: linear-gradient(135deg, var(--gold-lt), var(--gold)); 
}
.btn-pay svg { 
    stroke: #120d00 !important; 
    width: 15px !important; 
    height: 15px !important; 
}
.lunas-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 0.72rem 1.25rem;
    background: rgba(34,197,94,0.08);
    color: #a7f3d0;
    border: 1px solid rgba(34,197,94,0.18);
    border-radius: var(--radius-md);
    font-size: 0.84rem;
    font-weight: 500;
}
.lunas-badge svg { 
    stroke: #86efac !important;
     width: 14px !important; 
     height: 14px !important;
    }
.empty-sewa {
    text-align: center;
    padding: 2rem 1rem;
}
.empty-sewa-icon {
    width: 52px; height: 52px;
    border-radius: 13px;
    background: var(--gold-dim);
    border: 1px solid rgba(201,168,76,0.15);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1rem;
}
.empty-sewa-icon svg { 
    stroke: var(--gold) !important; 
    width: 22px !important; 
    height: 22px !important; 
}
.empty-sewa p { 
    color: var(--text-3); 
    font-size: 0.88rem; 
    line-height: 1.65; 
    max-width: 280px; 
    margin: 0 auto; 
}

.payment-history { 
    display: flex; 
    flex-direction: column; 
    gap: 1rem; 
}
.payment-item {
    background: rgba(255,255,255,0.02);
    border: 1px solid var(--card-border);
    border-radius: var(--radius-lg);
    padding: 1.25rem;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}
.payment-item::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 3px;
    background: var(--gold);
    opacity: 0;
    transition: opacity var(--transition);
    border-radius: 0 2px 2px 0;
}
.payment-item:hover {
    border-color: rgba(201,168,76,0.2);
    background: rgba(201,168,76,0.03);
    transform: translateX(4px);
}
.payment-item:hover::before { opacity: 0.6; }
.payment-item-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 0.85rem;
}
.payment-item-left { 
    display: flex; 
    align-items: flex-start;
     gap: 0.75rem;
     }
.payment-icon {
    width: 38px; 
    height: 38px;
    border-radius: var(--radius-sm);
    background: var(--gold-dim);
    border: 1px solid rgba(201,168,76,0.15);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.payment-icon svg { 
    stroke: var(--gold) !important; 
    width: 16px !important; 
    height: 16px !important; 
}
.payment-id { 
    font-size: 0.95rem; 
    font-weight: 600; 
    color: var(--text-1);
    margin: 0 0 0.2rem; 
}
.payment-meta { 
    font-size: 0.76rem; 
    color: var(--text-3); 
    margin: 0; 
}
.payment-amount {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--gold-lt);
    white-space: nowrap;
}
.payment-item-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 0.75rem;
}
.payment-status-chip {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.7rem;
    font-weight: 600;
    padding: 3px 11px;
    border-radius: 100px;
    background: rgba(234,179,8,0.12);
    color: #fde68a;
    border: 1px solid rgba(234,179,8,0.2);
}
.payment-status-chip svg { width: 9px !important; height: 9px !important; }
.btn-lihat-bukti {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.55rem 1.1rem;
    background: rgba(255,255,255,0.04);
    color: var(--text-2);
    border: 1px solid rgba(255,255,255,0.09);
    border-radius: var(--radius-sm);
    font-size: 0.78rem;
    font-weight: 500;
    cursor: pointer;
    font-family: 'DM Sans', sans-serif;
    transition: var(--transition);
}
.btn-lihat-bukti:hover { 
    background: rgba(201,168,76,0.09); 
    border-color: rgba(201,168,76,0.22); 
    color: var(--gold); 
}
.btn-lihat-bukti svg { 
    stroke: currentColor !important; 
    width: 13px !important; 
    height: 13px !important; 
}
.empty-payment {
    text-align: center;
    padding: 2.5rem 1rem;
}
.empty-payment-icon {
    width: 52px; 
    height: 52px;
    border-radius: 13px;
    background: var(--gold-dim);
    border: 1px solid rgba(201,168,76,0.15);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1rem;
}
.empty-payment-icon svg { 
    stroke: var(--gold) !important; 
    width: 22px !important; 
    height: 22px !important; 
}
.empty-payment p { 
    color: var(--text-3); 
    font-size: 0.88rem; 
    line-height: 1.65; 
    max-width: 320px; 
    margin: 0 auto; 
}

#buktiModal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.75);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    z-index: 999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
}
.modal-inner {
    max-width: 860px;
    width: 100%;
    background: rgba(10, 18, 34, 0.97);
    border: 1px solid rgba(201,168,76,0.18);
    border-radius: 22px;
    padding: 1.75rem;
    box-shadow: 0 30px 70px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,255,255,0.03);
    position: relative;
}
.modal-inner::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
    border-radius: 22px 22px 0 0;
    opacity: 0.5;
}
.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1.25rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--card-border);
}
.modal-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}
.modal-title-icon {
    width: 38px; height: 38px;
    border-radius: var(--radius-sm);
    background: var(--gold-dim);
    border: 1px solid rgba(201,168,76,0.22);
    display: flex; align-items: center; justify-content: center;
}
.modal-title-icon svg { stroke: var(--gold) !important; width: 17px !important; height: 17px !important; }
.modal-title h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; color: var(--text-1); margin: 0; font-weight: 600; }
.btn-close-modal {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.6rem 1.1rem;
    background: rgba(255,255,255,0.04);
    color: var(--text-2);
    border: 1px solid rgba(255,255,255,0.09);
    border-radius: var(--radius-sm);
    font-size: 0.82rem;
    font-weight: 500;
    cursor: pointer;
    font-family: 'DM Sans', sans-serif;
    transition: var(--transition);
}
.btn-close-modal:hover { background: rgba(239,68,68,0.09); border-color: rgba(239,68,68,0.2); color: #fca5a5; }
.btn-close-modal svg { stroke: currentColor !important; width: 14px !important; height: 14px !important; }
.modal-img-wrap {
    text-align: center;
    background: rgba(255,255,255,0.01);
    border-radius: var(--radius-md);
    border: 1px solid var(--card-border);
    padding: 1rem;
}
.modal-img-wrap img {
    max-width: 100%;
    max-height: 68vh;
    object-fit: contain;
    border-radius: var(--radius-sm);
}

.swal2-container { z-index: 99999 !important; }

@media (max-width: 1280px) {
    .payment-grid { grid-template-columns: 1fr 1.2fr; }
}
@media (max-width: 1024px) {
    .sidebar { width: 70px; padding: 0 0 1.5rem; }
    .sidebar-brand-wrap { padding: 1.25rem 0.5rem; display: flex; justify-content: center; }
    .sidebar-brand { justify-content: center; }
    .brand-texts, .brand-est, .brand-rule { display: none; }
    .sidebar-scroll { padding: 0.5rem 0.4rem 0; }
    .sidebar-item a { justify-content: center; padding: 0.75rem; }
    .sidebar-item a span:not(.nav-icon), .nav-label { display: none; }
    .nav-icon { width: 34px; height: 34px; }
    .sidebar-item.active a::after { display: none; }
    .sidebar-footer { padding: 0 0.4rem; }
    .sidebar-profile-card { padding: 0.5rem; justify-content: center; }
    .profile-info, .gear-wrap { display: none; }
    .profile-popover { left: calc(100% + 0.5rem); bottom: 0; right: auto; width: 200px; }
    .main-content { margin-left: 70px; width: calc(100% - 70px); }
    .payment-grid { grid-template-columns: 1fr; }
    .page-hero { padding: 2.5rem 2rem 2rem; }
}
@media (max-width: 768px) {
    .dashboard-container { flex-direction: column; }
    .sidebar { position: static; width: 100%; height: auto; padding: 1rem 1.25rem; border-right: none; border-bottom: 1px solid rgba(201,168,76,0.1); flex-direction: row; align-items: center; justify-content: space-between; overflow: visible; }
    .sidebar::before, .sidebar::after { display: none; }
    .sidebar-brand-wrap { padding: 0; border: none; margin: 0; }
    .brand-rule { display: none; }
    .sidebar-scroll { display: none; }
    .sidebar-footer { padding: 0; margin: 0; flex-direction: row; align-items: center; }
    .sidebar-footer-divider { display: none; }
    .profile-popover { bottom: calc(100% + 0.75rem); left: auto; right: 0; width: 220px; }
    .main-content { margin-left: 0; width: 100%; }
    .page-hero { padding: 2rem 1.5rem; }
    .page-hero-inner { flex-direction: column; gap: 1rem; }
    .body-content { padding: 1.5rem 1.25rem; }
    .payment-grid { grid-template-columns: 1fr; }
}
</style>

<div class="dashboard-container">

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

        @if(session('info'))
            <div class="alert alert-info" style="margin:0 0 1rem 0;padding:0.85rem 1rem;border-radius:8px;background:rgba(59,130,246,0.06);color:var(--text-1);">
                {{ session('info') }}
            </div>
        @endif

        <div class="sidebar-scroll">
            <div class="nav-label">Menu Utama</div>
            <ul class="sidebar-menu">
                <li class="sidebar-item">
                    <a href="{{ url('/user') }}">
                        <span class="nav-icon"><i data-feather="grid"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/user/kamar') }}">
                        <span class="nav-icon"><i data-feather="layers"></i></span>
                        <span>Kamar Kos</span>
                    </a>
                </li>
                <li class="sidebar-item active">
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
                <span class="nav-icon gear-wrap">
                    <i data-feather="settings" class="icon-spin"></i>
                </span>
            </div>
        </div>
    </aside>

    <main class="main-content">

        <div class="page-hero">
            <div class="page-hero-inner">
                <div class="page-hero-left">
                    <div class="page-hero-ornament">
                        <div class="page-hero-ornament-line"></div>
                        <span class="page-hero-ornament-text">Arterra Living — Keuangan</span>
                        <div class="page-hero-ornament-diamond"></div>
                    </div>
                    <h1 class="page-hero-title">
                        <span class="title-light">Tagihan &</span>
                        <span class="title-gold">Pembayaran</span>
                    </h1>
                    <p class="page-hero-sub">Lihat tagihan aktif dan kelola riwayat pembayaran sewa Anda dengan mudah.</p>
                </div>
                <div class="breadcrumbs">
                    <a href="{{ url('/user') }}">
                        <i data-feather="home"></i>
                        Dashboard
                    </a>
                    <a href="{{ url('/user/pembayaran/next') }}">Bayar Sekarang</a>
                </div>
            </div>
        </div>

        <div class="body-content">
            <div class="payment-grid">

                <div class="section-card reveal reveal-left">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <i data-feather="home"></i>
                        </div>
                        <div class="card-header-texts">
                            <h2 class="card-header-title">Sewa Aktif</h2>
                            <p class="card-header-sub">Tagihan sewa yang perlu diselesaikan</p>
                        </div>
                    </div>

                    @if($sewa->isEmpty())
                        <div class="empty-sewa">
                            <div class="empty-sewa-icon"><i data-feather="inbox"></i></div>
                            <p>Belum ada sewa aktif. Kunjungi halaman kamar untuk memulai sewa.</p>
                        </div>
                    @else
                        <div class="sewa-list">
                            @foreach($sewa as $item)
                                @php
                                    $total = $item->kamar->tipeKamar->harga * $item->jumlah_bulan;
                                    $paid  = $item->pembayaran->sum('jumlah');
                                    $due   = max(0, $total - $paid);
                                @endphp
                                <div class="sewa-item">
                                    <div class="sewa-item-header">
                                        <div class="sewa-item-left">
                                            <div class="sewa-num-badge">{{ $item->no_kamar }}</div>
                                            <div>
                                                <p class="sewa-item-title">Kamar {{ $item->no_kamar }}</p>
                                                <p class="sewa-item-meta">Tipe {{ $item->kamar->tipeKamar->tipe_kamar }} &bull; {{ $item->jumlah_bulan }} bulan</p>
                                            </div>
                                        </div>
                                        @if($due > 0)
                                            <span class="sewa-status-chip belum">
                                                <i data-feather="alert-circle"></i>
                                                Belum Lunas
                                            </span>
                                        @else
                                            <span class="sewa-status-chip lunas">
                                                <i data-feather="check-circle"></i>
                                                Lunas
                                            </span>
                                        @endif
                                    </div>
                                    <div class="sewa-tagihan-row">
                                        <div>
                                            <div class="sewa-tagihan-label">Tagihan Tersisa</div>
                                            <div class="sewa-tagihan-val {{ $due > 0 ? 'danger' : 'success' }}">
                                                {{ $due > 0 ? 'Rp '.number_format($due, 0, ',', '.') : 'Lunas' }}
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <div class="sewa-tagihan-label">Total Sewa</div>
                                            <div style="font-size:0.88rem;color:var(--text-2);font-weight:500;">Rp {{ number_format($total, 0, ',', '.') }}</div>
                                        </div>
                                    </div>
                                    @if($due > 0)
                                        <a href="{{ url('/user/pembayaran/'.$item->id_sewa) }}" class="btn-pay">
                                            <i data-feather="credit-card"></i>
                                            Bayar Sekarang
                                        </a>
                                    @else
                                        <div class="lunas-badge">
                                            <i data-feather="check-circle"></i>
                                            Sudah Lunas
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="section-card reveal reveal-right">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <i data-feather="file-text"></i>
                        </div>
                        <div class="card-header-texts">
                            <h2 class="card-header-title">Riwayat Pembayaran</h2>
                            <p class="card-header-sub">Semua transaksi pembayaran Anda</p>
                        </div>
                    </div>

                    @if($payments->isEmpty())
                        <div class="empty-payment">
                            <div class="empty-payment-icon"><i data-feather="clock"></i></div>
                            <p>Belum ada pembayaran. Setelah melakukan pembayaran, riwayat akan muncul di sini.</p>
                        </div>
                    @else
                        <div class="payment-history">
                            @foreach($payments as $payment)
                                <div class="payment-item reveal reveal-scale" style="transition-delay: {{ $loop->index * 0.06 }}s">
                                    <div class="payment-item-top">
                                        <div class="payment-item-left">
                                            <div class="payment-icon">
                                                <i data-feather="credit-card"></i>
                                            </div>
                                            <div>
                                                <p class="payment-id">Pembayaran #{{ $payment->id_pembayaran }}</p>
                                                <p class="payment-meta">Kamar {{ $payment->sewa->no_kamar }} &bull; {{ $payment->tgl_bayar }}</p>
                                            </div>
                                        </div>
                                        <div class="payment-amount">Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</div>
                                    </div>
                                    <div class="payment-item-bottom">
                                        <span class="payment-status-chip">
                                            <i data-feather="clock"></i>
                                            Terkirim
                                        </span>
                                        <button type="button" class="btn-lihat-bukti"
                                                onclick="openBuktiModal('{{ asset('storage/' . $payment->bukti) }}')">
                                            <i data-feather="image"></i>
                                            Lihat Bukti
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </main>
</div>

<div id="buktiModal">
    <div class="modal-inner">
        <div class="modal-header">
            <div class="modal-title">
                <div class="modal-title-icon"><i data-feather="image"></i></div>
                <h3>Bukti Pembayaran</h3>
            </div>
            <button type="button" class="btn-close-modal" onclick="closeBuktiModal()">
                <i data-feather="x"></i>
                Tutup
            </button>
        </div>
        <div class="modal-img-wrap">
            <img id="buktiModalImg" src="" alt="Bukti Pembayaran" />
        </div>
    </div>
</div>

<form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display:none;">@csrf</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
const __flashSuccess = @json(session('success'));
const __flashInfo = @json(session('info'));
const __flashError = @json(session('error'));

function showSwalLikeLogout({ title, text, icon }) {
    Swal.fire({
        title: title || 'Perhatian',
        text: text || '',
        icon: icon || 'info',
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

@php
    $allLunas = true;
    if (!$sewa->isEmpty()) {
        foreach ($sewa as $item) {
            $total = $item->kamar->tipeKamar->harga * $item->jumlah_bulan;
            $paid  = $item->pembayaran->sum('jumlah');
            $due   = max(0, $total - $paid);
            if ($due > 0) { $allLunas = false; break; }
        }
    }
@endphp
const __allLunas = @json($allLunas);

document.addEventListener('DOMContentLoaded', () => {
    let modalData = null;

    if (__flashError) {
        modalData = { title: 'Gagal', text: __flashError, icon: 'error' };
    } else if (__flashSuccess) {
        modalData = { title: 'Berhasil', text: __flashSuccess, icon: 'success' };
    } else if (__flashInfo) {
        modalData = { title: 'Info', text: __flashInfo, icon: 'info' };
    } else if (__allLunas) {
        modalData = { title: 'Sukses', text: 'Sewa Anda sudah lunas.', icon: 'success' };
    }

    if (!modalData) return;

    Swal.fire({
        title: modalData.title,
        text: modalData.text,
        icon: modalData.icon,
        background: 'rgba(8,15,28,0.97)',
        color: '#f0ece2',
        allowOutsideClick: false,
        confirmButtonText: 'OK',
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
});

function fixIcons() {
    if (window.feather) feather.replace();
    document.querySelectorAll('aside .nav-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:#7a7568!important;fill:none!important;width:15px!important;height:15px!important;';
    });
    document.querySelectorAll('aside .sidebar-item.active .nav-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;';
    });
    document.querySelectorAll('aside .brand-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;fill:none!important;';
    });
    document.querySelectorAll('.card-header-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;width:20px!important;height:20px!important;';
    });
    document.querySelectorAll('.sewa-num-badge').forEach(el => {});
    document.querySelectorAll('.sewa-status-chip.lunas svg').forEach(svg => {
        svg.style.cssText += ';stroke:#86efac!important;width:10px!important;height:10px!important;';
    });
    document.querySelectorAll('.sewa-status-chip.belum svg').forEach(svg => {
        svg.style.cssText += ';stroke:#fca5a5!important;width:10px!important;height:10px!important;';
    });
    document.querySelectorAll('.btn-pay svg').forEach(svg => {
        svg.style.cssText += ';stroke:#120d00!important;width:15px!important;height:15px!important;';
    });
    document.querySelectorAll('.lunas-badge svg').forEach(svg => {
        svg.style.cssText += ';stroke:#86efac!important;width:14px!important;height:14px!important;';
    });
    document.querySelectorAll('.payment-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;width:16px!important;height:16px!important;';
    });
    document.querySelectorAll('.payment-status-chip svg').forEach(svg => {
        svg.style.cssText += ';width:9px!important;height:9px!important;';
    });
    document.querySelectorAll('.btn-lihat-bukti svg').forEach(svg => {
        svg.style.cssText += ';width:13px!important;height:13px!important;';
    });
    document.querySelectorAll('.empty-sewa-icon svg, .empty-payment-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;width:22px!important;height:22px!important;';
    });
    document.querySelectorAll('.modal-title-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;width:17px!important;height:17px!important;';
    });
    document.querySelectorAll('.btn-close-modal svg').forEach(svg => {
        svg.style.cssText += ';width:14px!important;height:14px!important;';
    });
    document.querySelectorAll('.popover-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:#7a7568!important;fill:none!important;width:14px!important;height:14px!important;';
    });
    document.querySelectorAll('.popover-item.danger-item .popover-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:#fca5a5!important;';
    });
    document.querySelectorAll('.breadcrumbs svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--text-3)!important;width:12px!important;height:12px!important;';
    });
}
document.addEventListener('DOMContentLoaded', () => { feather.replace(); setTimeout(fixIcons, 80); });

function initScrollReveal() {
    const els = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });
    els.forEach(el => observer.observe(el));
}
document.addEventListener('DOMContentLoaded', initScrollReveal);

function toggleProfilePopover(event) {
    event.preventDefault();
    event.stopPropagation();
    document.getElementById('profilePopover').classList.toggle('active');
}
function closeProfilePopover() {
    const p = document.getElementById('profilePopover');
    if (p) p.classList.remove('active');
}
document.addEventListener('click', function(e) {
    const popover = document.getElementById('profilePopover');
    const footer  = document.querySelector('.sidebar-footer');
    if (popover && popover.classList.contains('active') && footer && !footer.contains(e.target)) closeProfilePopover();
});

function openBuktiModal(url) {
    const modal = document.getElementById('buktiModal');
    const img   = document.getElementById('buktiModalImg');
    img.src = url;
    modal.style.display = 'flex';
}
function closeBuktiModal() {
    const modal = document.getElementById('buktiModal');
    const img   = document.getElementById('buktiModalImg');
    modal.style.display = 'none';
    img.src = '';
}
(function () {
    const modal = document.getElementById('buktiModal');
    if (!modal) return;
    modal.addEventListener('click', function(e) {
        if (e.target === modal) closeBuktiModal();
    });
})();

function confirmLogout(event) {
    if (event) { event.preventDefault(); event.stopPropagation(); }
    closeProfilePopover();
    setTimeout(() => {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan keluar dari sistem kos.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4a8a4e',
            cancelButtonColor: '#ef4444',
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Batal',
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
        }).then(result => {
            if (result.isConfirmed) document.getElementById('logoutForm').submit();
        });
    }, 100);
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</x-user-layout>