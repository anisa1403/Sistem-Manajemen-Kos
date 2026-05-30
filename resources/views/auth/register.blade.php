{{-- Arterra Living - Premium Residence Register --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar – Arterra Living</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --gold: #c9a96e;
            --gold-light: #e2c98f;
            --gold-dim: rgba(201,169,110,0.15);
            --bg-deep: #080c14;
            --bg-card: rgba(12,18,30,0.85);
            --bg-input: rgba(255,255,255,0.04);
            --border: rgba(201,169,110,0.2);
            --border-focus: rgba(201,169,110,0.6);
            --text-primary: #f0eadf;
            --text-muted: rgba(240,234,223,0.45);
            --error: #e05c5c;
        }

        body {
            min-height: 100vh;
            background-color: var(--bg-deep);
            font-family: 'DM Sans', sans-serif;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            overflow-y: auto;
            position: relative;
            padding: 40px 16px;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 70% 20%, rgba(79,110,247,0.08) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 20% 80%, rgba(201,169,110,0.07) 0%, transparent 55%),
                radial-gradient(ellipse 40% 40% at 50% 50%, rgba(201,169,110,0.03) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(201,169,110,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(201,169,110,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
        }

        .register-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 480px;
            animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .brand {
            text-align: center;
            margin-bottom: 32px;
            animation: fadeUp 0.8s 0.1s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .brand-est {
            font-size: 10px;
            font-weight: 300;
            letter-spacing: 0.35em;
            color: var(--gold);
            text-transform: uppercase;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--gold-dim), rgba(201,169,110,0.08));
            border: 1px solid var(--border);
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .brand-icon svg.feather {
            color: var(--gold) !important;
            stroke: var(--gold) !important;
            width: 22px;
            height: 22px;
        }

        .brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 500;
            color: var(--text-primary);
            letter-spacing: 0.05em;
            line-height: 1;
            margin-bottom: 4px;
        }

        .brand-sub {
            font-size: 10px;
            font-weight: 300;
            letter-spacing: 0.3em;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 28px;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border), transparent);
        }

        .divider-diamond {
            width: 6px;
            height: 6px;
            background: var(--gold);
            transform: rotate(45deg);
            opacity: 0.6;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 40px 36px;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            position: relative;
            overflow: hidden;
            animation: fadeUp 0.8s 0.15s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 10%; right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold-light), transparent);
            opacity: 0.5;
        }

        .card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: var(--text-primary);
            margin-bottom: 6px;
            letter-spacing: 0.03em;
        }

        .card-sub {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 28px;
            font-weight: 300;
        }

        .field { margin-bottom: 18px; }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
        }

        .input-wrap { position: relative; }

        .input-wrap svg.feather {
            color: var(--gold) !important;
            stroke: var(--gold) !important;
            width: 16px;
            height: 16px;
        }

        .toggle-pass svg.feather {
            color: var(--gold) !important;
            stroke: var(--gold) !important;
            width: 16px;
            height: 16px;
            transition: stroke 0.2s, color 0.2s;
        }

        .toggle-pass:hover svg.feather {
            color: var(--gold-light) !important;
            stroke: var(--gold-light) !important;
        }

        .input-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            z-index: 2;
            display: flex;
            align-items: center;
        }

        .input-icon i { width: 16px; height: 16px; color: var(--gold); }

        .field input {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 13px 14px 13px 42px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--text-primary);
            outline: none;
            transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
            position: relative;
            z-index: 1;
        }

        .field input:-webkit-autofill,
        .field input:-webkit-autofill:hover,
        .field input:-webkit-autofill:focus {
            -webkit-text-fill-color: var(--text-primary) !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .field input::placeholder { color: rgba(240,234,223,0.2); }

        .field input:focus {
            border-color: var(--border-focus);
            background: rgba(255,255,255,0.06);
            box-shadow: 0 0 0 3px rgba(201,169,110,0.08), inset 0 1px 0 rgba(255,255,255,0.04);
        }

        .field-error {
            font-size: 12px;
            color: var(--error);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .field-error i { width: 12px; height: 12px; }

        .toggle-pass {
            position: absolute;
            right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            cursor: pointer; padding: 2px; z-index: 2;
            display: flex; align-items: center;
        }

        .toggle-pass i { width: 16px; height: 16px; color: var(--gold); transition: color 0.2s; }
        .toggle-pass:hover i { color: var(--gold-light); }

        .row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #c9a96e 0%, #e2c98f 50%, #c9a96e 100%);
            background-size: 200% 100%;
            border: 1px solid transparent;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #1a1206;
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, transform 0.15s;
            box-shadow: 0 4px 20px rgba(201,169,110,0.2);
            position: relative;
            overflow: hidden;
            margin-top: 8px;
        }

        .btn-login::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.12) 0%, transparent 50%);
            border-radius: inherit;
            transition: opacity 0.3s;
        }

        .btn-login:hover {
            background: var(--bg-deep) !important;
            color: var(--gold-light) !important;
            border-color: var(--gold) !important;
            box-shadow: 0 6px 28px rgba(201,169,110,0.15), inset 0 0 10px rgba(201,169,110,0.1);
            transform: translateY(-1px);
        }

        .btn-login:hover::before { opacity: 0; }
        .btn-login:active { transform: translateY(0); box-shadow: 0 2px 12px rgba(201,169,110,0.1); }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 300;
        }

        .login-link a {
            color: var(--gold);
            text-decoration: none;
            opacity: 0.85;
            transition: opacity 0.2s;
        }

        .login-link a:hover { opacity: 1; }

        .footer-note {
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 300;
            animation: fadeUp 0.8s 0.25s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
            animation: drift 12s ease-in-out infinite alternate;
        }

        .orb-1 { width: 300px; height: 300px; background: radial-gradient(circle, rgba(201,169,110,0.06) 0%, transparent 70%); top: -100px; right: -80px; }
        .orb-2 { width: 250px; height: 250px; background: radial-gradient(circle, rgba(79,110,247,0.07) 0%, transparent 70%); bottom: -80px; left: -60px; animation-delay: -6s; }

        @keyframes drift {
            from { transform: translate(0, 0) scale(1); }
            to   { transform: translate(20px, 20px) scale(1.08); }
        }

        @media (max-width: 520px) {
            .card { padding: 32px 20px; }
            .row-2 { grid-template-columns: 1fr; gap: 0; }
        }
    </style>
</head>
<body>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="register-wrapper">

    {{-- Brand --}}
    <div class="brand">
        <div class="brand-est">Est. 2026</div>
        <div class="brand-icon">
            <i data-feather="home"></i>
        </div>
        <div class="brand-name">Arterra Living</div>
        <div class="brand-sub">Comfy Residence</div>
    </div>

    <div class="divider">
        <div class="divider-line"></div>
        <div class="divider-diamond"></div>
        <div class="divider-line"></div>
    </div>

    {{-- Card --}}
    <div class="card">

        <div class="card-title">Buat Akun Baru</div>
        <div class="card-sub">Daftarkan diri untuk mengakses layanan eksklusif</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Username & Nama (2 kolom) --}}
            <div class="row-2">
                <div class="field">
                    <label for="username">Username</label>
                    <div class="input-wrap">
                        <input
                            id="username"
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Masukkan username"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <span class="input-icon"><i data-feather="at-sign"></i></span>
                    </div>
                    @error('username')
                        <div class="field-error">
                            <i data-feather="alert-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="name">Nama Lengkap</label>
                    <div class="input-wrap">
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Nama lengkap Anda"
                            required
                            autocomplete="name"
                        />
                        <span class="input-icon"><i data-feather="user"></i></span>
                    </div>
                    @error('name')
                        <div class="field-error">
                            <i data-feather="alert-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- Email --}}
            <div class="field">
                <label for="email">Alamat Email</label>
                <div class="input-wrap">
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="email@domain.com"
                        required
                        autocomplete="email"
                    />
                    <span class="input-icon"><i data-feather="mail"></i></span>
                </div>
                @error('email')
                    <div class="field-error">
                        <i data-feather="alert-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- No HP --}}
            <div class="field">
                <label for="no_hp">Nomor HP</label>
                <div class="input-wrap">
                    <input
                        id="no_hp"
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="081234567890"
                        required
                        autocomplete="tel"
                    />
                    <span class="input-icon"><i data-feather="phone"></i></span>
                </div>
                @error('no_hp')
                    <div class="field-error">
                        <i data-feather="alert-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Password & Konfirmasi (2 kolom) --}}
            <div class="row-2">
                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                        />
                        <span class="input-icon"><i data-feather="lock"></i></span>
                        <button type="button" class="toggle-pass" onclick="togglePass('password', 'eye-icon-1')" aria-label="Toggle password visibility">
                            <i id="eye-icon-1" data-feather="eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="field-error">
                            <i data-feather="alert-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-wrap">
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                        />
                        <span class="input-icon"><i data-feather="lock"></i></span>
                        <button type="button" class="toggle-pass" onclick="togglePass('password_confirmation', 'eye-icon-2')" aria-label="Toggle confirm password visibility">
                            <i id="eye-icon-2" data-feather="eye"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <div class="field-error">
                            <i data-feather="alert-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-login">
                Daftar Sekarang
            </button>

        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk di sini</a>
        </div>

    </div>

    <div class="footer-note">
        © 2026 Arterra Living · Comfy Residence
    </div>

</div>

<script>
    feather.replace();

    function togglePass(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon  = document.getElementById(iconId);

        if (input.type === 'password') {
            input.type = 'text';
            icon.setAttribute('data-feather', 'eye-off');
        } else {
            input.type = 'password';
            icon.setAttribute('data-feather', 'eye');
        }

        feather.replace();
    }
</script>

</body>
</html>