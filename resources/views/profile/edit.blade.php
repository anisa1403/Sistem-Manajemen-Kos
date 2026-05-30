<x-app-layout>
<style>
    :root {
        --gold: #c9a96e; --gold-light: #e2c98f;
        --gold-dim: rgba(201,169,110,0.15);
        --bg-deep: #080c14;
        --bg-card: rgba(12,18,30,0.92);
        --bg-input: rgba(255,255,255,0.04);
        --border: rgba(201,169,110,0.2);
        --border-focus: rgba(201,169,110,0.6);
        --text-primary: #f0eadf;
        --text-muted: rgba(240,234,223,0.45);
        --error: #e05c5c;
        --success-color: #6dcb8b;
    }

    body { background: var(--bg-deep) !important; }

    .profile-page {
    background-color: var(--bg-deep);
    min-height: 100vh;
    padding: 40px 24px;
    position: relative;
    }

    .profile-page::before {
        content: '';
        position: fixed; inset: 0;
        background:
            radial-gradient(ellipse 80% 60% at 70% 20%, rgba(79,110,247,0.06) 0%, transparent 60%),
            radial-gradient(ellipse 60% 50% at 20% 80%, rgba(201,169,110,0.05) 0%, transparent 55%);
        pointer-events: none; z-index: 0;
    }

    .profile-page::after {
        content: '';
        position: fixed; inset: 0;
        background-image:
            linear-gradient(rgba(201,169,110,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(201,169,110,0.03) 1px, transparent 1px);
        background-size: 60px 60px;
        pointer-events: none; z-index: 0;
    }

    .profile-container {
        max-width: 780px;
        margin: 0 auto;
        position: relative; z-index: 1;
    }

    .page-header { margin-bottom: 10px; }

    .page-header h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 28px; font-weight: 400;
        color: var(--text-primary);
        letter-spacing: 0.04em; margin-bottom: 4px;
    }

    .page-header p {
        font-size: 13px; color: var(--text-muted); font-weight: 300;
    }

    .divider {
        display: flex; align-items: center;
        gap: 12px; margin: 20px 0 28px;
    }

    .divider-line {
        flex: 1; height: 1px;
        background: linear-gradient(90deg, transparent, var(--border), transparent);
    }

    .divider-diamond {
        width: 6px; height: 6px;
        background: var(--gold);
        transform: rotate(45deg); opacity: 0.5;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

<div class="profile-page">
    <div class="profile-container">

        <div class="page-header">
            <h1>Pengaturan Profil</h1>
            <p>Kelola informasi akun dan keamanan Anda</p>
        </div>

        <div class="divider">
            <div class="divider-line"></div>
            <div class="divider-diamond"></div>
            <div class="divider-line"></div>
        </div>

        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')

    </div>
</div>
</x-app-layout>