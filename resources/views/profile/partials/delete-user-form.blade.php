<style>
.btn-danger {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 13px 24px;
    background: transparent;
    border: 1px solid rgba(224, 92, 92, 0.4);
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 11px; font-weight: 500;
    letter-spacing: 0.15em; text-transform: uppercase;
    color: #e05c5c; cursor: pointer;
    transition: all 0.3s;
}

.btn-danger:hover {
    background: rgba(224,92,92,0.1);
    border-color: #e05c5c;
    transform: translateY(-1px);
}

.btn-danger svg { width: 14px; height: 14px; }

/* Modal overlay */
.modal-overlay {
    position: fixed; inset: 0;
    background: rgba(8,12,20,0.85);
    backdrop-filter: blur(8px);
    z-index: 50;
    display: flex; align-items: center; justify-content: center;
    opacity: 0; pointer-events: none;
    transition: opacity 0.25s;
}

.modal-overlay.open {
    opacity: 1; pointer-events: all;
}

.modal-box {
    background: rgba(12,18,30,0.98);
    border: 1px solid rgba(224,92,92,0.3);
    border-radius: 20px;
    padding: 36px 36px;
    max-width: 420px; width: 90%;
    position: relative;
    transform: translateY(20px);
    transition: transform 0.25s;
}

.modal-overlay.open .modal-box {
    transform: translateY(0);
}

.modal-box::before {
    content: '';
    position: absolute; top: 0; left: 10%; right: 10%;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(224,92,92,0.5), transparent);
}

.modal-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 20px; font-weight: 400;
    color: var(--text-primary);
    margin-bottom: 10px;
}

.modal-desc {
    font-size: 13px; color: var(--text-muted);
    font-weight: 300; line-height: 1.6;
    margin-bottom: 24px;
}

.modal-actions {
    display: flex; gap: 12px; justify-content: flex-end;
}

.btn-cancel {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 11px 20px;
    background: transparent;
    border: 1px solid var(--border);
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 11px; font-weight: 500;
    letter-spacing: 0.12em; text-transform: uppercase;
    color: var(--text-muted); cursor: pointer;
    transition: all 0.2s;
}

.btn-cancel:hover { border-color: var(--border-focus); color: var(--text-primary); }
</style>

<div class="section-card" style="animation-delay: 0.2s; border-color: rgba(224,92,92,0.2);">

    <div class="section-header">
        <div class="section-icon" style="background: rgba(224,92,92,0.1); border-color: rgba(224,92,92,0.3);">
            <svg fill="none" stroke="#e05c5c" stroke-width="1.8" viewBox="0 0 24 24" width="17" height="17">
                <polyline points="3 6 5 6 21 6"/>
                <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                <path d="M10 11v6M14 11v6"/>
                <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
            </svg>
        </div>
        <div class="section-title" style="color: #e05c5c;">Hapus Akun</div>
    </div>
    <p class="section-sub">Setelah akun dihapus, semua data akan dihapus permanen dan tidak dapat dipulihkan.</p>

    <div class="btn-row">
        <button type="button" class="btn-danger" onclick="openDeleteModal()">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="3 6 5 6 21 6"/>
                <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
            </svg>
            Hapus Akun Saya
        </button>
    </div>
</div>

{{-- Modal Konfirmasi --}}
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <p class="modal-title">Konfirmasi Hapus Akun</p>
        <p class="modal-desc">
            Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak dapat dibatalkan.
            Masukkan password Anda untuk mengonfirmasi.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <div class="art-field" style="margin-bottom: 20px;">
                <label for="password_delete">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                    </span>
                    <input id="password_delete" type="password"
                        name="password" placeholder="••••••••" />
                </div>
                @error('password', 'userDeletion')
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

            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
                <button type="submit" class="btn-danger">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="3 6 5 6 21 6"/>
                        <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                    </svg>
                    Ya, Hapus Akun
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.add('open');
}
function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('open');
}
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
</script>