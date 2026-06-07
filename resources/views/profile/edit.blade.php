<x-app-layout>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>

<style>
:root{
    --gold:#c9a96e;
    --gold-light:#e2c98f;
    --gold-dim:rgba(201,169,110,.15);

    --bg-deep:#080c14;
    --bg-card:rgba(12,18,30,.92);
    --bg-input:rgba(255,255,255,.04);

    --border:rgba(201,169,110,.2);
    --border-focus:rgba(201,169,110,.6);

    --text-primary:#f0eadf;
    --text-muted:rgba(240,234,223,.55);

    --success-color:#6dcb8b;
    --error:#e05c5c;
}

body{
    background:var(--bg-deep)!important;
    font-family:'DM Sans',sans-serif;
}

.profile-page{
    min-height:100vh;
    padding:40px 24px 80px;
    background:var(--bg-deep);
    position:relative;
    overflow:hidden;
}

.profile-page::before{
    content:'';
    position:fixed;
    inset:0;
    background:
        radial-gradient(circle at 80% 20%, rgba(79,110,247,.06), transparent 35%),
        radial-gradient(circle at 20% 80%, rgba(201,169,110,.05), transparent 35%);
    pointer-events:none;
}

.profile-page::after{
    content:'';
    position:fixed;
    inset:0;
    background-image:
        linear-gradient(rgba(201,169,110,.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,169,110,.025) 1px, transparent 1px);
    background-size:60px 60px;
    pointer-events:none;
}

.profile-container{
    max-width:820px;
    margin:auto;
    position:relative;
    z-index:2;
}

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:20px;
    flex-wrap:wrap;
}

.page-header h1{
    font-family:'Cormorant Garamond',serif;
    font-size:2rem;
    font-weight:500;
    color:var(--text-primary);
    margin:0 0 6px;
    letter-spacing:.03em;
}

.page-header p{
    margin:0;
    color:var(--text-muted);
    font-size:.9rem;
}

.dashboard-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:12px 18px;
    border:1px solid var(--border);
    border-radius:12px;
    background:rgba(255,255,255,.03);
    color:var(--text-primary);
    text-decoration:none;
    transition:.3s ease;
    backdrop-filter:blur(10px);
}

.dashboard-btn:hover{
    border-color:var(--gold);
    color:var(--gold-light);
    background:var(--gold-dim);
    transform:translateY(-2px);
}

.dashboard-btn svg{
    width:18px;
    height:18px;
}

.divider{
    display:flex;
    align-items:center;
    gap:12px;
    margin:28px 0 36px;
}

.divider-line{
    flex:1;
    height:1px;
    background:linear-gradient(
        90deg,
        transparent,
        rgba(201,169,110,.35),
        transparent
    );
}

.divider-diamond{
    width:8px;
    height:8px;
    background:var(--gold);
    transform:rotate(45deg);
    opacity:.8;
}
</style>

<div class="profile-page">
    <div class="profile-container">

        <div class="page-header">
            <div>
                <h1>Pengaturan Profil</h1>
                <p>Kelola informasi akun dan keamanan Anda</p>
            </div>

            <a href="{{ url('/user') }}" class="dashboard-btn">
                <i data-feather="grid"></i>
                <span>Dashboard</span>
            </a>
        </div>

        <div class="divider">
            <div class="divider-line"></div>
            <div class="divider-diamond"></div>
            <div class="divider-line"></div>
        </div>

        @include('profile.partials.update-profile-information-form')

        <div style="height:20px"></div>

        @include('profile.partials.update-password-form')

        <div style="height:20px"></div>

        @include('profile.partials.delete-user-form')

    </div>
</div>

<script>
    feather.replace();
</script>
</x-app-layout>