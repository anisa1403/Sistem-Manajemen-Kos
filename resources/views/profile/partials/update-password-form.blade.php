<div class="section-card" style="animation-delay: 0.1s;">

    <div class="section-header">
        <div class="section-icon">
            <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0110 0v4"/>
            </svg>
        </div>
        <div class="section-title">Ubah Password</div>
    </div>
    <p class="section-sub">Gunakan password acak yang panjang agar akun tetap aman</p>

    @if (session('status') === 'password-updated')
        <div class="alert-success">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="16" height="16">
                <polyline points="20 6 9 17 4 12"/>
            </svg>
            Password berhasil diperbarui.
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="form-grid">

            {{-- Current Password --}}
            <div class="art-field" style="grid-column: 1 / -1;">
                <label for="current_password">Password Saat Ini</label>
                <div class="input-wrap" style="max-width: 360px;">
                    <span class="input-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                    </span>
                    <input id="current_password" type="password"
                        name="current_password" placeholder="••••••••"
                        autocomplete="current-password" />
                </div>
                @error('current_password', 'updatePassword')
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

            {{-- New Password --}}
            <div class="art-field">
                <label for="password">Password Baru</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                    </span>
                    <input id="password" type="password"
                        name="password" placeholder="••••••••"
                        autocomplete="new-password" />
                </div>
                @error('password', 'updatePassword')
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

            {{-- Confirm Password --}}
            <div class="art-field">
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                    </span>
                    <input id="password_confirmation" type="password"
                        name="password_confirmation" placeholder="••••••••"
                        autocomplete="new-password" />
                </div>
                @error('password_confirmation', 'updatePassword')
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
                Update Password
            </button>
        </div>
    </form>
</div>