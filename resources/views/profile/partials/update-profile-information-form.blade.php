<style>
.section-card {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 32px;
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    position: relative; overflow: hidden;
    margin-bottom: 20px;
    animation: fadeUp 0.7s cubic-bezier(0.16,1,0.3,1) both;
}

.section-card::before {
    content: '';
    position: absolute; top: 0; left: 10%; right: 10%;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold-light), transparent);
    opacity: 0.4;
}

.section-header {
    display: flex; align-items: center;
    gap: 12px; margin-bottom: 6px;
}

.section-icon {
    width: 36px; height: 36px;
    background: var(--gold-dim);
    border: 1px solid var(--border);
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}

.section-icon svg { color: var(--gold); width: 17px; height: 17px; }

.section-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 20px; font-weight: 400;
    color: var(--text-primary); letter-spacing: 0.03em;
}

.section-sub {
    font-size: 12px; color: var(--text-muted);
    font-weight: 300; margin-bottom: 24px;
    padding-left: 48px;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.art-field { display: flex; flex-direction: column; gap: 7px; }

.art-field label {
    font-size: 10px; font-weight: 500;
    letter-spacing: 0.14em; text-transform: uppercase;
    color: var(--text-muted);
}

.input-wrap { position: relative; }

.input-wrap .input-icon {
    position: absolute; left: 13px; top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    display: flex; align-items: center;
}

.input-wrap .input-icon svg {
    width: 15px; height: 15px;
    color: var(--gold); opacity: 0.8;
}

.art-field input, .art-field select {
    width: 100%;
    background: var(--bg-input);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 12px 14px 12px 40px;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px; color: var(--text-primary);
    outline: none;
    transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
}

.art-field input::placeholder { color: rgba(240,234,223,0.2); }

.art-field input:focus, .art-field select:focus {
    border-color: var(--border-focus);
    background: rgba(255,255,255,0.06);
    box-shadow: 0 0 0 3px rgba(201,169,110,0.08);
}

.art-field input:-webkit-autofill,
.art-field input:-webkit-autofill:focus {
    -webkit-text-fill-color: var(--text-primary) !important;
    transition: background-color 5000s ease-in-out 0s;
}

.field-error {
    font-size: 12px; color: var(--error);
    display: flex; align-items: center;
    gap: 5px; margin-top: 2px;
}

.field-error svg { width: 12px; height: 12px; }

.alert-success {
    background: rgba(109,203,139,0.1);
    border: 1px solid rgba(109,203,139,0.25);
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 13px; color: var(--success-color);
    margin-bottom: 20px;
    display: flex; align-items: center; gap: 8px;
}

.btn-row { margin-top: 24px; }

.btn-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 13px 24px;
    background: linear-gradient(135deg, #c9a96e 0%, #e2c98f 50%, #c9a96e 100%);
    border: 1px solid transparent;
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 11px; font-weight: 500;
    letter-spacing: 0.15em; text-transform: uppercase;
    color: #1a1206; cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 4px 20px rgba(201,169,110,0.15);
}

.btn-primary:hover {
    background: var(--bg-deep) !important;
    color: var(--gold-light) !important;
    border-color: var(--gold) !important;
    transform: translateY(-1px);
}

.btn-primary:active { transform: translateY(0); }
.btn-primary svg { width: 14px; height: 14px; }

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

@media (max-width: 600px) {
    .form-grid { grid-template-columns: 1fr; }
    .section-card { padding: 24px 20px; }
}
</style>

<div class="section-card">

    <div class="section-header">
        <div class="section-icon">
            <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </div>
        <div class="section-title">Informasi Profil</div>
    </div>
    <p class="section-sub">Perbarui nama, email, dan nomor HP akun Anda</p>

    @if (session('status') === 'profile-updated')
        <div class="alert-success">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="16" height="16">
                <polyline points="20 6 9 17 4 12"/>
            </svg>
            Profil berhasil diperbarui.
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="form-grid">

            {{-- Nama --}}
            <div class="art-field">
                <label for="name">Nama Lengkap</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </span>
                    <input id="name" type="text" name="name"
                        value="{{ old('name', $user->name) }}"
                        placeholder="Nama lengkap Anda"
                        required autofocus autocomplete="name" />
                </div>
                @error('name')
                    <div class="field-error">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="art-field">
                <label for="email">Email</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <polyline points="22,4 12,13 2,4"/>
                        </svg>
                    </span>
                    <input id="email" type="email" name="email"
                        value="{{ old('email', $user->email) }}"
                        placeholder="email@contoh.com"
                        required autocomplete="username" />
                </div>
                @error('email')
                    <div class="field-error">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- No HP --}}
            <div class="art-field">
                <label for="no_hp">Nomor HP</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.02 2.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/>
                        </svg>
                    </span>
                    <input id="no_hp" type="text" name="no_hp"
                        value="{{ old('no_hp', $user->no_hp ?? '') }}"
                        placeholder="08xxxxxxxxxx" />
                </div>
                @error('no_hp')
                    <div class="field-error">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>

        <div class="btn-row">
            <button type="submit" class="btn-primary">
                <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>