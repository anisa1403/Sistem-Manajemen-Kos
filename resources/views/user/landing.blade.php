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

html { scroll-behavior: smooth; }
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

/* ── Reveal ── */
.reveal {
    opacity: 0;
    transform: translateY(32px);
    transition: opacity 0.7s cubic-bezier(.4,0,.2,1), transform 0.7s cubic-bezier(.4,0,.2,1);
}
.reveal.reveal-left  { transform: translateX(-32px); }
.reveal.reveal-right { transform: translateX(32px); }
.reveal.reveal-scale { transform: scale(0.94) translateY(16px); }
.reveal.visible { opacity: 1; transform: none; }
.reveal-delay-1 { transition-delay: 0.1s; }
.reveal-delay-2 { transition-delay: 0.2s; }
.reveal-delay-3 { transition-delay: 0.3s; }
.reveal-delay-4 { transition-delay: 0.4s; }
.reveal-delay-5 { transition-delay: 0.5s; }

/* ── Layout ── */
.dashboard-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
    position: relative;
    z-index: 1;
}

/* ── Sidebar ── */
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
.nav-label::after { content: ''; flex: 1; height: 1px; background: rgba(255,255,255,0.04); }
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
.sidebar-item a:hover { color: var(--text-1); background: rgba(201,168,76,0.05); border-color: rgba(201,168,76,0.08); transform: translateX(3px); }
.sidebar-item a:hover .nav-icon { background: rgba(201,168,76,0.12); border-color: rgba(201,168,76,0.25); }
.sidebar-item a:hover .nav-icon svg { stroke: var(--gold) !important; }
.sidebar-item.active a { background: linear-gradient(90deg, rgba(201,168,76,0.11) 0%, rgba(201,168,76,0.02) 100%); color: #f0e6c8; border-color: rgba(201,168,76,0.22); box-shadow: inset 3px 0 0 0 var(--gold); }
.sidebar-item.active a .nav-icon { background: rgba(201,168,76,0.16); border-color: rgba(201,168,76,0.32); }
.sidebar-item.active a .nav-icon svg { stroke: var(--gold) !important; }
.sidebar-item.active a::after { content: ''; position: absolute; right: 14px; width: 5px; height: 5px; background: var(--gold); border-radius: 50%; box-shadow: 0 0 8px var(--gold); opacity: 0.75; }
.sidebar-divider { display: flex; align-items: center; gap: 8px; padding: 0.2rem 0.5rem; margin: 0.4rem 0; }
.sidebar-divider span { flex: 1; height: 1px; background: rgba(255,255,255,0.04); }
.sidebar-divider-dot { width: 3px; height: 3px; border-radius: 50%; background: rgba(255,255,255,0.08); }
.sidebar-footer { padding: 0 1.25rem; display: flex; flex-direction: column; gap: 0.6rem; position: relative; flex-shrink: 0; }
.sidebar-footer-divider { height: 1px; background: linear-gradient(90deg, rgba(201,168,76,0.18), transparent); margin-bottom: 0.5rem; }
.sidebar-profile-card { display: flex; align-items: center; gap: 0.7rem; padding: 0.85rem; background: rgba(201,168,76,0.04); border: 1px solid rgba(201,168,76,0.1); border-radius: var(--radius-md); cursor: pointer; transition: var(--transition); }
.sidebar-profile-card:hover { background: rgba(201,168,76,0.09); border-color: rgba(201,168,76,0.28); box-shadow: 0 4px 18px rgba(0,0,0,0.25), inset 0 0 12px rgba(201,168,76,0.05); transform: translateY(-2px); }
.avatar { width: 36px; height: 36px; border-radius: 9px; background: linear-gradient(135deg, var(--gold), #9b7820); color: #1a1200; font-weight: 700; font-size: 0.9rem; font-family: 'Cormorant Garamond', serif; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: transform var(--transition); }
.sidebar-profile-card:hover .avatar { transform: scale(1.06); }
.profile-info { display: flex; flex-direction: column; flex-grow: 1; overflow: hidden; }
.profile-name { font-size: 0.84rem; font-weight: 500; color: #f0e6c8; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.profile-role { font-size: 0.66rem; color: rgba(201,168,76,0.5); display: flex; align-items: center; gap: 4px; margin-top: 2px; letter-spacing: 0.06em; }
.role-dot { width: 5px; height: 5px; border-radius: 50%; background: var(--success); display: inline-block; }
.gear-wrap { display: flex; align-items: center; justify-content: center; color: rgba(201,168,76,0.4); transition: color var(--transition); }
.sidebar-profile-card:hover .gear-wrap { color: var(--gold); }
.icon-spin { display: inline-block; transition: transform var(--transition); }
.sidebar-profile-card:hover .icon-spin { animation: spin 2s linear infinite; }
@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
.profile-popover { position: absolute; bottom: calc(100% + 0.6rem); left: 0; right: 0; background: rgba(10, 18, 34, 0.97); border: 1px solid rgba(201,168,76,0.18); border-radius: var(--radius-md); padding: 0.45rem; box-shadow: 0 -12px 40px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.03); z-index: 110; display: flex; flex-direction: column; gap: 0.2rem; opacity: 0; visibility: hidden; transform: translateY(8px); transition: all var(--transition); }
.profile-popover.active { opacity: 1; visibility: visible; transform: translateY(0); }
.popover-item { display: flex; align-items: center; gap: 0.7rem; padding: 0.7rem 0.95rem; color: var(--text-2); text-decoration: none; font-size: 0.84rem; border-radius: var(--radius-sm); transition: var(--transition); }
.popover-item:hover { background: rgba(255,255,255,0.04); color: var(--text-1); }
.popover-icon { width: 28px; height: 28px; border-radius: 7px; background: rgba(255,255,255,0.04); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.popover-icon svg { stroke: #7a7568 !important; fill: none !important; width: 14px !important; height: 14px !important; }
.popover-item.danger-item { color: #fca5a5; }
.popover-item.danger-item:hover { background: rgba(239,68,68,0.08); }
.popover-item.danger-item .popover-icon { background: rgba(239,68,68,0.09); }
.popover-item.danger-item .popover-icon svg { stroke: #fca5a5 !important; }
.popover-sep { height: 1px; background: rgba(201,168,76,0.08); margin: 2px 0; }

/* ── Main ── */
.main-content {
    margin-left: var(--sidebar-w);
    width: calc(100% - var(--sidebar-w));
    min-height: 100vh;
    padding: 0;
}

/* ── Hero ── */
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding: 0 3rem;
}
.hero-bg {
    position: absolute;
    inset: 0;
    background-image: url("{{ asset('storage/image/bg.png') }}");
    background-size: cover;
    background-position: center;
    z-index: 0;
    transform: scale(1.04);
    animation: heroZoom 18s ease-in-out infinite alternate;
}
@keyframes heroZoom {
    from { transform: scale(1.04); }
    to   { transform: scale(1.1); }
}
.hero-overlay-1 { position: absolute; inset: 0; background: linear-gradient(110deg, rgba(8,15,28,0.92) 0%, rgba(8,15,28,0.65) 50%, rgba(8,15,28,0.35) 100%); z-index: 1; }
.hero-overlay-2 { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(8,15,28,0) 60%, rgba(8,15,28,1) 100%); z-index: 2; }
.hero-overlay-3 { position: absolute; top: -200px; left: -200px; width: 600px; height: 600px; background: radial-gradient(circle, rgba(201,168,76,0.07) 0%, transparent 65%); z-index: 3; pointer-events: none; }
.hero-content { position: relative; z-index: 4; max-width: 700px; }
.hero-ornament { display: flex; align-items: center; gap: 12px; margin-bottom: 1.75rem; opacity: 0; animation: heroFadeUp 1s ease-out 0.3s forwards; }
.hero-ornament-line { width: 42px; height: 1px; background: linear-gradient(90deg, transparent, var(--gold)); }
.hero-ornament-text { font-size: 0.65rem; font-weight: 600; letter-spacing: 0.28em; text-transform: uppercase; color: var(--gold); opacity: 0.85; }
.hero-ornament-diamond { width: 5px; height: 5px; background: var(--gold); transform: rotate(45deg); opacity: 0.6; }
.hero-ornament-line-r { width: 24px; height: 1px; background: linear-gradient(90deg, var(--gold), transparent); }
@keyframes heroFadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
.hero-greeting { font-size: 1.05rem; font-weight: 300; color: rgba(201,168,76,0.75); letter-spacing: 0.08em; margin-bottom: 0.75rem; font-style: italic; font-family: 'Cormorant Garamond', serif; opacity: 0; animation: heroFadeUp 1s ease-out 0.5s forwards; }
.hero-title { font-family: 'Cormorant Garamond', serif; font-size: clamp(2.8rem, 5vw, 4.5rem); font-weight: 600; line-height: 1.08; margin-bottom: 1.5rem; opacity: 0; animation: heroFadeUp 1s ease-out 0.65s forwards; }
.hero-title .title-light { background: linear-gradient(135deg, #f5ead5 0%, #e8d5a0 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; display: block; }
.hero-title .title-gold { background: linear-gradient(135deg, var(--gold) 0%, var(--gold-lt) 60%, #d4aa55 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; display: block; font-style: italic; }
.hero-subtitle { color: var(--text-2); font-size: 1rem; line-height: 1.75; max-width: 500px; margin-bottom: 2.5rem; opacity: 0; animation: heroFadeUp 1s ease-out 0.8s forwards; }
.hero-cta { display: flex; gap: 1rem; flex-wrap: wrap; opacity: 0; animation: heroFadeUp 1s ease-out 0.95s forwards; }
.btn-hero-primary { display: inline-flex; align-items: center; gap: 0.6rem; padding: 1rem 2rem; background: linear-gradient(135deg, var(--gold), #a07828); color: #120d00; border: none; border-radius: var(--radius-md); font-weight: 700; font-size: 0.9rem; font-family: 'DM Sans', sans-serif; text-decoration: none; cursor: pointer; transition: var(--transition); box-shadow: 0 6px 22px rgba(201,168,76,0.3); letter-spacing: 0.03em; }
.btn-hero-primary:hover { transform: translateY(-3px); box-shadow: 0 14px 34px rgba(201,168,76,0.42); background: linear-gradient(135deg, var(--gold-lt), var(--gold)); }
.btn-hero-primary svg { stroke: #120d00 !important; width: 16px !important; height: 16px !important; }
.btn-hero-secondary { display: inline-flex; align-items: center; gap: 0.6rem; padding: 1rem 2rem; background: rgba(255,255,255,0.07); color: var(--text-1); border: 1px solid rgba(255,255,255,0.15); border-radius: var(--radius-md); font-weight: 400; font-size: 0.9rem; text-decoration: none; cursor: pointer; transition: var(--transition); backdrop-filter: blur(8px); }
.btn-hero-secondary:hover { background: rgba(255,255,255,0.12); border-color: rgba(201,168,76,0.3); transform: translateY(-2px); }
.btn-hero-secondary svg { stroke: var(--text-1) !important; width: 16px !important; height: 16px !important; }

/* Float Stats */
.hero-float-stats { position: absolute; right: 4rem; top: 50%; transform: translateY(-50%); display: flex; flex-direction: column; gap: 1.2rem; z-index: 5; opacity: 0; animation: heroFadeUp 1s ease-out 1.1s forwards; }
.float-stat-chip { background: rgba(13, 24, 41, 0.82); border: 1px solid rgba(201,168,76,0.18); border-radius: var(--radius-md); padding: 1.1rem 1.4rem; backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); display: flex; align-items: center; gap: 0.85rem; min-width: 185px; transition: var(--transition); position: relative; overflow: hidden; }
.float-stat-chip::before { content: ''; position: absolute; left: 0; top: 12px; bottom: 12px; width: 3px; border-radius: 0 2px 2px 0; background: var(--gold); opacity: 0.65; }
.float-stat-chip:hover { border-color: rgba(201,168,76,0.35); transform: translateX(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.3); }
.float-chip-icon { width: 38px; height: 38px; border-radius: 9px; background: var(--gold-dim); border: 1px solid rgba(201,168,76,0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.float-chip-icon svg { stroke: var(--gold) !important; width: 17px !important; height: 17px !important; }
.float-chip-val { font-family: 'Cormorant Garamond', serif; font-size: 1.65rem; font-weight: 600; color: var(--text-1); line-height: 1; }
.float-chip-val.success { color: var(--success); }
.float-chip-val.danger  { color: var(--danger); }
.float-chip-label { font-size: 0.68rem; color: var(--text-3); text-transform: uppercase; letter-spacing: 0.09em; font-weight: 500; margin-top: 3px; }

/* Scroll hint */
.hero-scroll-hint { position: absolute; bottom: 2.5rem; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column; align-items: center; gap: 8px; z-index: 5; opacity: 0; animation: heroFadeUp 1s ease-out 1.4s forwards; }
.hero-scroll-label { font-size: 0.6rem; letter-spacing: 0.25em; text-transform: uppercase; color: rgba(201,168,76,0.5); }
.hero-scroll-line { width: 1px; height: 48px; background: linear-gradient(180deg, rgba(201,168,76,0.5), transparent); animation: scrollPulse 2.2s ease-in-out infinite; }
@keyframes scrollPulse { 0%, 100% { opacity: 0.3; transform: scaleY(0.7) translateY(-4px); } 50% { opacity: 1; transform: scaleY(1) translateY(4px); } }

/* ── Body Content ── */
.body-content { padding: 3rem 2.5rem 3rem 2rem; }

/* ── Sewa Aktif Card ── */
.current-sewa-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 22px;
    padding: 2.25rem;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}
.current-sewa-card::after { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, var(--gold), transparent); opacity: 0.5; }
.current-sewa-card::before { content: ''; position: absolute; top: -60px; right: -60px; width: 240px; height: 240px; background: radial-gradient(circle, rgba(201,168,76,0.06) 0%, transparent 70%); pointer-events: none; }
.current-sewa-card.no-sewa { text-align: center; background: rgba(13,24,41,0.5); border: 1px dashed rgba(255,255,255,0.07); padding: 3rem 2rem; }
.sewa-header { display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 1.75rem; padding-bottom: 1.75rem; border-bottom: 1px solid var(--card-border); }
.sewa-header-left { display: flex; align-items: flex-start; gap: 1rem; }
.sewa-header-icon { width: 50px; height: 50px; border-radius: var(--radius-md); background: var(--gold-dim); border: 1px solid rgba(201,168,76,0.25); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.sewa-header-icon svg { stroke: var(--gold) !important; width: 22px !important; height: 22px !important; }
.sewa-header h2 { font-family: 'Cormorant Garamond', serif; font-size: 1.55rem; color: var(--text-1); margin: 0 0 0.3rem; font-weight: 600; }
.sewa-header p  { color: var(--text-3); font-size: 0.88rem; line-height: 1.55; margin: 0; }
.sewa-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; }
.sewa-details { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; }
.info-item { padding: 1.1rem; background: rgba(201,168,76,0.04); border-radius: var(--radius-md); border-left: 3px solid var(--gold); display: flex; align-items: flex-start; gap: 0.75rem; transition: var(--transition); }
.info-item:hover { background: rgba(201,168,76,0.09); transform: translateX(4px); }
.info-icon { flex-shrink: 0; margin-top: 2px; }
.info-icon svg { stroke: var(--gold) !important; width: 15px !important; height: 15px !important; }
.info-item strong { display: block; color: rgba(201,168,76,0.6); font-size: 0.67rem; text-transform: uppercase; letter-spacing: 0.09em; margin-bottom: 0.3rem; font-weight: 600; }
.info-item span { display: block; color: var(--text-1); font-size: 0.97rem; font-weight: 500; }

/* ── Quick Nav Cards ── */
.quick-nav {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 1.25rem;
    margin-bottom: 2rem;
}
.quick-nav-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 22px;
    padding: 1.75rem;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 1.1rem;
    position: relative;
    overflow: hidden;
    transition: var(--transition);
}
.quick-nav-card::after { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, var(--gold), transparent); opacity: 0; transition: opacity var(--transition); }
.quick-nav-card:hover { border-color: rgba(201,168,76,0.22); transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.28); }
.quick-nav-card:hover::after { opacity: 0.5; }
.qn-icon { width: 50px; height: 50px; border-radius: var(--radius-md); background: var(--gold-dim); border: 1px solid rgba(201,168,76,0.22); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.qn-icon svg { stroke: var(--gold) !important; width: 22px !important; height: 22px !important; }
.qn-body {}
.qn-title { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; font-weight: 600; color: var(--text-1); margin-bottom: 0.25rem; }
.qn-sub { font-size: 0.8rem; color: var(--text-3); line-height: 1.5; }
.qn-arrow { margin-left: auto; flex-shrink: 0; }
.qn-arrow svg { stroke: rgba(201,168,76,0.4) !important; width: 16px !important; height: 16px !important; transition: transform var(--transition); }
.quick-nav-card:hover .qn-arrow svg { stroke: var(--gold) !important; transform: translateX(4px); }

/* Buttons */
.btn-primary { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.82rem 1.5rem; background: linear-gradient(135deg, var(--gold), #a07828); color: #120d00; border: none; border-radius: var(--radius-md); font-weight: 600; font-size: 0.87rem; font-family: 'DM Sans', sans-serif; text-decoration: none; cursor: pointer; transition: var(--transition); box-shadow: 0 4px 14px rgba(201,168,76,0.25); }
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(201,168,76,0.35); background: linear-gradient(135deg, var(--gold-lt), var(--gold)); }
.btn-primary svg { stroke: #120d00 !important; width: 15px !important; height: 15px !important; }
.btn-secondary { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.82rem 1.5rem; background: rgba(255,255,255,0.05); color: var(--text-2); border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-md); font-weight: 400; font-size: 0.87rem; text-decoration: none; cursor: pointer; transition: var(--transition); }
.btn-secondary:hover { background: rgba(255,255,255,0.09); border-color: rgba(255,255,255,0.18); transform: translateY(-2px); color: var(--text-1); }
.btn-secondary svg { stroke: currentColor !important; width: 15px !important; height: 15px !important; }

.swal2-container { z-index: 99999 !important; }

/* ── Responsive ── */
@media (max-width: 1280px) { .hero-float-stats { right: 2rem; } }
@media (max-width: 1100px) { .hero-float-stats { display: none; } .hero-section { padding: 0 2rem; } }
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
    .hero-section { padding: 2rem 1.5rem; min-height: 90vh; }
    .hero-float-stats { display: none; }
    .hero-title { font-size: 2.4rem; }
    .body-content { padding: 1.5rem 1.25rem; }
    .sewa-header { flex-direction: column; }
    .sewa-actions { width: 100%; }
    .sewa-actions a { flex: 1; justify-content: center; }
    .sewa-details { grid-template-columns: 1fr; }
    .quick-nav { grid-template-columns: 1fr; }
}
</style>

<div class="dashboard-container">

    <aside class="sidebar">
        <div class="sidebar-brand-wrap">
            <div class="brand-est">Est. 2026</div>
            <a href="{{ url('/user') }}" class="sidebar-brand">
                <div class="brand-icon"><i data-feather="home"></i></div>
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
                <li class="sidebar-item active">
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
                <li class="sidebar-item">
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
                    <span class="profile-role"><span class="role-dot"></span>Penyewa Kos</span>
                </div>
                <span class="nav-icon gear-wrap">
                    <i data-feather="settings" class="icon-spin"></i>
                </span>
            </div>
        </div>
    </aside>

    <main class="main-content">

        {{-- ── HERO SECTION ── --}}
        <section class="hero-section">
            <div class="hero-bg"></div>
            <div class="hero-overlay-1"></div>
            <div class="hero-overlay-2"></div>
            <div class="hero-overlay-3"></div>

            <div class="hero-content">
                <div class="hero-ornament">
                    <div class="hero-ornament-line"></div>
                    <span class="hero-ornament-text">Arterra Living — Comfy Residence</span>
                    <div class="hero-ornament-diamond"></div>
                    <div class="hero-ornament-line-r"></div>
                </div>

                <p class="hero-greeting">Selamat datang kembali,</p>

                <h1 class="hero-title">
                    <span class="title-light">{{ auth()->user()->nama }}</span>
                    <span class="title-gold">Hunian Terbaik</span>
                    <span class="title-light" style="font-style:normal;font-size:0.72em;font-weight:300;">menanti Anda</span>
                </h1>

                <p class="hero-subtitle">
                    Nikmati kemudahan mengelola sewa, melihat ketersediaan kamar, dan melakukan pembayaran — semuanya dari satu dashboard.
                </p>

                <div class="hero-cta">
                    <a href="{{ url('/user/kamar') }}" class="btn-hero-primary">
                        <i data-feather="layers"></i>
                        Lihat Kamar
                    </a>
                    <a href="{{ url('/user/pembayaran') }}" class="btn-hero-secondary">
                        <i data-feather="file-text"></i>
                        Riwayat Pembayaran
                    </a>
                </div>
            </div>

            <div class="hero-float-stats">
                <div class="float-stat-chip">
                    <div class="float-chip-icon"><i data-feather="home"></i></div>
                    <div class="float-chip-body">
                        <div class="float-chip-val">{{ $kamar->count() }}</div>
                        <div class="float-chip-label">Total Kamar</div>
                    </div>
                </div>
                <div class="float-stat-chip">
                    <div class="float-chip-icon">
                        <i data-feather="{{ $currentSewa ? 'check-circle' : 'x-circle' }}"
                           style="stroke:{{ $currentSewa ? 'var(--success)' : 'var(--text-3)' }} !important;"></i>
                    </div>
                    <div class="float-chip-body">
                        <div class="float-chip-val {{ $currentSewa ? 'success' : '' }}" style="font-size:1.25rem;">
                            {{ $currentSewa ? 'Aktif' : 'Tidak Ada' }}
                        </div>
                        <div class="float-chip-label">Status Sewa</div>
                    </div>
                </div>
                <div class="float-stat-chip">
                    <div class="float-chip-icon">
                        <i data-feather="{{ ($currentDue ?? 0) > 0 ? 'alert-circle' : 'check-circle' }}"
                           style="stroke:{{ ($currentDue ?? 0) > 0 ? 'var(--danger)' : 'var(--success)' }} !important;"></i>
                    </div>
                    <div class="float-chip-body">
                        <div class="float-chip-val {{ ($currentDue ?? 0) > 0 ? 'danger' : 'success' }}" style="font-size:1.05rem;">
                            {{ ($currentDue ?? 0) > 0 ? 'Rp '.number_format($currentDue, 0, ',', '.') : 'Lunas' }}
                        </div>
                        <div class="float-chip-label">Tagihan</div>
                    </div>
                </div>
            </div>

            <div class="hero-scroll-hint">
                <span class="hero-scroll-label">Scroll</span>
                <div class="hero-scroll-line"></div>
            </div>
        </section>

        {{-- ── BODY CONTENT ── --}}
        <div class="body-content">

            {{-- Status Sewa Aktif --}}
            @if($currentSewa)
                <div class="current-sewa-card reveal reveal-scale">
                    <div class="sewa-header">
                        <div class="sewa-header-left">
                            <div class="sewa-header-icon"><i data-feather="home"></i></div>
                            <div>
                                <h2>Sewa Anda Saat Ini</h2>
                                <p>Kamar {{ $currentSewa->no_kamar }} sedang aktif. Lihat detail atau lanjutkan pembayaran.</p>
                            </div>
                        </div>
                        <div class="sewa-actions">
                            <a href="{{ url('/user/pembayaran/'.$currentSewa->id_sewa) }}" class="btn-primary">
                                <i data-feather="credit-card"></i>
                                Bayar Sekarang
                            </a>
                            <a href="{{ url('/user/sewa/'.$currentSewa->no_kamar) }}" class="btn-secondary">
                                <i data-feather="refresh-cw"></i>
                                Perpanjang Sewa
                            </a>
                        </div>
                    </div>
                    <div class="sewa-details">
                        <div class="info-item">
                            <span class="info-icon"><i data-feather="hash"></i></span>
                            <div><strong>No Kamar</strong><span>{{ $currentSewa->no_kamar }}</span></div>
                        </div>
                        <div class="info-item">
                            <span class="info-icon"><i data-feather="layers"></i></span>
                            <div><strong>Tipe Kamar</strong><span>{{ $currentSewa->kamar->tipeKamar->tipe_kamar }}</span></div>
                        </div>
                        <div class="info-item">
                            <span class="info-icon"><i data-feather="star"></i></span>
                            <div><strong>Fasilitas</strong><span>{{ Str::limit($currentSewa->kamar->fasilitas, 60) }}</span></div>
                        </div>
                        <div class="info-item">
                            <span class="info-icon"><i data-feather="calendar"></i></span>
                            <div><strong>Durasi</strong><span>{{ $currentSewa->jumlah_bulan }} bulan</span></div>
                        </div>
                        <div class="info-item">
                            <span class="info-icon"><i data-feather="file-text"></i></span>
                            <div><strong>Keterangan</strong><span>{{ $currentSewa->keterangan }}</span></div>
                        </div>
                    </div>
                </div>
            @else
                <div class="current-sewa-card no-sewa reveal reveal-scale">
                    <div style="width:56px;height:56px;border-radius:14px;background:var(--gold-dim);border:1px solid rgba(201,168,76,0.15);display:flex;align-items:center;justify-content:center;margin:0 auto 1.25rem;">
                        <i data-feather="search" style="stroke:var(--gold) !important;width:24px !important;height:24px !important;"></i>
                    </div>
                    <h2 style="font-family:'Cormorant Garamond',serif;font-size:1.4rem;color:var(--text-1);margin-bottom:0.5rem;font-weight:600;">Belum ada sewa aktif</h2>
                    <p style="color:var(--text-3);font-size:0.9rem;max-width:440px;margin:0 auto 1.5rem;">Pilih kamar yang Anda suka, tentukan tanggal masuk dan lama sewa, lalu bayar langsung.</p>
                    <a href="{{ url('/user/kamar') }}" class="btn-primary" style="display:inline-flex;">
                        <i data-feather="layers"></i>
                        Pilih Kamar Sekarang
                    </a>
                </div>
            @endif

            {{-- Quick Navigation Cards --}}
            <div class="quick-nav reveal reveal-scale reveal-delay-2">
                <a href="{{ url('/user/kamar') }}" class="quick-nav-card">
                    <div class="qn-icon"><i data-feather="layers"></i></div>
                    <div class="qn-body">
                        <div class="qn-title">Kamar Kos</div>
                        <div class="qn-sub">Jelajahi semua unit yang tersedia dan temukan yang sesuai kebutuhan Anda.</div>
                    </div>
                    <div class="qn-arrow"><i data-feather="arrow-right"></i></div>
                </a>
                <a href="{{ url('/user/pembayaran') }}" class="quick-nav-card">
                    <div class="qn-icon"><i data-feather="credit-card"></i></div>
                    <div class="qn-body">
                        <div class="qn-title">Pembayaran</div>
                        <div class="qn-sub">Cek tagihan aktif dan lihat riwayat seluruh transaksi pembayaran sewa Anda.</div>
                    </div>
                    <div class="qn-arrow"><i data-feather="arrow-right"></i></div>
                </a>
                <a href="{{ route('profile.edit') }}" class="quick-nav-card">
                    <div class="qn-icon"><i data-feather="user"></i></div>
                    <div class="qn-body">
                        <div class="qn-title">Profil Saya</div>
                        <div class="qn-sub">Perbarui data diri, ubah kata sandi, dan kelola informasi akun Anda.</div>
                    </div>
                    <div class="qn-arrow"><i data-feather="arrow-right"></i></div>
                </a>
            </div>

        </div>
    </main>
</div>

<form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display:none;">@csrf</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
    document.querySelectorAll('.sewa-header-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;width:22px!important;height:22px!important;';
    });
    document.querySelectorAll('.info-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;width:15px!important;height:15px!important;';
    });
    document.querySelectorAll('.float-chip-icon svg').forEach(svg => {
        svg.style.cssText += ';width:17px!important;height:17px!important;';
    });
    document.querySelectorAll('.btn-primary svg').forEach(svg => {
        svg.style.cssText += ';stroke:#120d00!important;width:15px!important;height:15px!important;';
    });
    document.querySelectorAll('.btn-hero-primary svg').forEach(svg => {
        svg.style.cssText += ';stroke:#120d00!important;width:16px!important;height:16px!important;';
    });
    document.querySelectorAll('.btn-hero-secondary svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--text-1)!important;width:16px!important;height:16px!important;';
    });
    document.querySelectorAll('.qn-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:var(--gold)!important;width:22px!important;height:22px!important;';
    });
    document.querySelectorAll('.qn-arrow svg').forEach(svg => {
        svg.style.cssText += ';width:16px!important;height:16px!important;';
    });
    document.querySelectorAll('.popover-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:#7a7568!important;fill:none!important;width:14px!important;height:14px!important;';
    });
    document.querySelectorAll('.popover-item.danger-item .popover-icon svg').forEach(svg => {
        svg.style.cssText += ';stroke:#fca5a5!important;';
    });
}

function initScrollReveal() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
}

document.addEventListener('DOMContentLoaded', () => {
    feather.replace();
    setTimeout(fixIcons, 80);
    initScrollReveal();
});

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