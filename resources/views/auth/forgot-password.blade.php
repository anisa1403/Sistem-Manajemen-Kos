<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password – Arterra Living</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --gold: #c9a96e;
            --gold-light: #e2c98f;
            --gold-dim: rgba(201,169,110,0.15);
            --bg-deep: #080c14;
            --bg-card: rgba(12,18,30,0.92);
            --bg-input: rgba(255,255,255,0.04);
            --border: rgba(201,169,110,0.2);
            --border-focus: rgba(201,169,110,0.6);
            --text-primary: #f0eadf;
            --text-muted: rgba(240,234,223,0.55);
            --success: #8fa8ff;
            --error: #e05c5c;
        }
        body {
            min-height: 100vh;
            background-color: var(--bg-deep);
            color: var(--text-primary);
            font-family: 'DM Sans', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(circle at 80% 20%, rgba(79,110,247,0.06), transparent 35%),
                radial-gradient(circle at 20% 80%, rgba(201,169,110,0.05), transparent 35%);
            pointer-events: none;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(201,169,110,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(201,169,110,0.025) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
        }
        .page-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 520px;
            padding: 24px;
        }
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 42px 36px;
            backdrop-filter: blur(24px);
            position: relative;
            overflow: hidden;
        }
        .brand {
            text-align: center;
            margin-bottom: 34px;
        }
        .brand-icon {
            width: 44px;
            height: 44px;
            margin: 0 auto 12px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--gold-dim), rgba(201,169,110,0.08));
            border: 1px solid var(--border);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .brand-icon i { color: var(--gold); width: 20px; height: 20px; }
        .brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 30px;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 6px;
        }
        .brand-sub {
            color: var(--text-muted);
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }
        .card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            margin-bottom: 8px;
            color: var(--text-primary);
        }
        .card-sub {
            color: var(--text-muted);
            font-size: 13px;
            margin-bottom: 28px;
            line-height: 1.7;
        }
        .session-status {
            background: rgba(79,110,247,0.12);
            border: 1px solid rgba(79,110,247,0.25);
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 20px;
            color: var(--success);
            font-size: 13px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--text-muted);
            margin-bottom: 8px;
        }
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }
        .input-icon i { color: var(--gold); width: 16px; height: 16px; }
        .field input {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px 14px 14px 42px;
            color: var(--text-primary);
            font-size: 14px;
            outline: none;
            transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
        }
        .field input::placeholder { color: rgba(240,234,223,0.25); }
        .field input:focus {
            border-color: var(--border-focus);
            background: rgba(255,255,255,0.08);
            box-shadow: 0 0 0 3px rgba(201,169,110,0.08);
        }
        .field-error {
            color: var(--error);
            font-size: 12px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .btn-login {
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid transparent;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 50%, var(--gold) 100%);
            color: #1a1206;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .btn-login:hover {
            transform: translateY(-1px);
            background: var(--bg-deep);
            color: var(--gold-light);
            border-color: var(--gold);
            box-shadow: 0 6px 22px rgba(201,169,110,0.14);
        }
        .help-row {
            margin-top: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }
        .help-row a {
            color: var(--gold);
            text-decoration: none;
            font-size: 13px;
            opacity: 0.9;
        }
        .help-row a:hover { opacity: 1; }
        .footer-note {
            text-align: center;
            margin-top: 28px;
            color: var(--text-muted);
            font-size: 12px;
        }
        .orb { position: fixed; border-radius: 50%; filter: blur(80px); pointer-events: none; z-index: 0; }
        .orb-1 { width: 280px; height: 280px; top: -110px; right: -90px; background: radial-gradient(circle, rgba(201,169,110,0.06), transparent 70%); }
        .orb-2 { width: 260px; height: 260px; bottom: -80px; left: -60px; background: radial-gradient(circle, rgba(79,110,247,0.07), transparent 70%); }
        @media (max-width: 520px) { .card { padding: 32px 24px; } }
    </style>
</head>
<body>
<div class="orb orb-1"></div>
<div class="orb orb-2"></div>
<div class="page-wrapper">
    <div class="brand">
        <div class="brand-icon"><i data-feather="shield"></i></div>
        <div class="brand-name">Arterra Living</div>
        <div class="brand-sub">Reset Password</div>
    </div>
    <div class="card">
        <div class="card-title">Lupa Password</div>
        <div class="card-sub">Masukkan email akun Anda. Kami akan mengirimkan tautan untuk mengganti password.</div>

        @if (session('status'))
            <div class="session-status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <div class="input-wrap">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@contoh.com" required autofocus>
                    <span class="input-icon"><i data-feather="mail"></i></span>
                </div>
                @error('email')
                    <div class="field-error"><i data-feather="alert-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">Kirim Link Reset</button>
        </form>

        <div class="help-row">
            <a href="{{ url('login') }}">Kembali ke Login</a>
        </div>
    </div>

    <div class="footer-note">© 2026 Arterra Living · Premium Residence</div>
</div>

<script>feather.replace();</script>
</body>
</html>
