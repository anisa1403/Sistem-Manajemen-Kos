<x-user-layout>
    <script src="https://unpkg.com/feather-icons"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=DM+Sans:wght@300;400;500;600;700&display=swap');

:root{
    --navy-900:#080f1c;
    --navy-800:#0d1829;
    --card-bg:rgba(13,24,41,.75);
    --card-border:rgba(255,255,255,.06);
    --gold:#c9a84c;
    --gold-light:#e7cd87;
    --gold-dim:rgba(201,168,76,.14);
    --text-1:#f0ece2;
    --text-2:#c8c1b3;
    --text-3:#7d7669;
    --danger:#ef4444;
    --success:#22c55e;
    --radius-lg:22px;
    --radius-md:14px;
    --transition:.35s cubic-bezier(.4,0,.2,1);
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'DM Sans',sans-serif;
    background:
        linear-gradient(rgba(8,15,28,.88),rgba(8,15,28,.95)),
        url("{{ asset('storage/image/bg.png') }}");
    background-size:cover;
    background-position:center;
    color:var(--text-1);
}

.sewa-page{
    padding:2.5rem;
}

.page-hero{
    position:relative;
    overflow:hidden;
    margin-bottom:2rem;
    padding:2.8rem;
    border-radius:30px;
    background:rgba(8,15,28,.75);
    border:1px solid rgba(201,168,76,.12);
    backdrop-filter:blur(18px);
}

.page-hero::before{
    content:'';
    position:absolute;
    width:320px;
    height:320px;
    border-radius:50%;
    top:-120px;
    right:-100px;
    background:radial-gradient(circle, rgba(201,168,76,.12), transparent 70%);
}

.page-hero-inner{
    position:relative;
    z-index:2;
    display:flex;
    justify-content:space-between;
    gap:2rem;
    flex-wrap:wrap;
}

.hero-badge{
    display:inline-flex;
    align-items:center;
    gap:.5rem;
    padding:.55rem 1rem;
    border-radius:999px;
    background:rgba(201,168,76,.08);
    border:1px solid rgba(201,168,76,.18);
    color:var(--gold);
    font-size:.78rem;
    letter-spacing:.12em;
    text-transform:uppercase;
    margin-bottom:1rem;
}

.hero-badge svg{
    width:14px;
    height:14px;
    stroke:var(--gold)!important;
}

.page-title{
    font-family:'Cormorant Garamond',serif;
    font-size:clamp(2.2rem,4vw,3.2rem);
    line-height:1.05;
    margin-bottom:.8rem;
}

.page-title span{
    color:var(--gold);
    font-style:italic;
}

.page-subtitle{
    color:var(--text-3);
    max-width:650px;
    line-height:1.8;
    font-size:.94rem;
}

.breadcrumbs{
    display:flex;
    align-items:center;
    gap:.8rem;
    flex-wrap:wrap;
    align-self:flex-end;
}

.breadcrumbs a{
    display:flex;
    align-items:center;
    gap:.45rem;
    text-decoration:none;
    color:var(--text-3);
    font-size:.82rem;
    transition:var(--transition);
}

.breadcrumbs a:hover{
    color:var(--gold);
}

.breadcrumbs svg{
    width:14px;
    height:14px;
    stroke:currentColor!important;
}

.sewa-grid{
    display:grid;
    grid-template-columns:1.2fr .9fr;
    gap:1.6rem;
}

.card{
    position:relative;
    overflow:hidden;
    background:var(--card-bg);
    border:1px solid var(--card-border);
    border-radius:var(--radius-lg);
    padding:2rem;
    backdrop-filter:blur(14px);
}

.card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    right:0;
    height:2px;
    background:linear-gradient(90deg, transparent, var(--gold), transparent);
    opacity:.5;
}

.card-header{
    display:flex;
    align-items:center;
    gap:.9rem;
    margin-bottom:1.7rem;
    padding-bottom:1.2rem;
    border-bottom:1px solid rgba(255,255,255,.06);
}

.card-icon{
    width:46px;
    height:46px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:var(--gold-dim);
    border:1px solid rgba(201,168,76,.18);
    flex-shrink:0;
}

.card-icon svg{
    width:20px;
    height:20px;
    stroke:var(--gold)!important;
}

.card-title{
    font-family:'Cormorant Garamond',serif;
    font-size:1.55rem;
    font-weight:600;
    margin-bottom:.2rem;
}

.card-subtitle{
    color:var(--text-3);
    font-size:.82rem;
}

.info-list{
    display:grid;
    gap:1rem;
}

.info-item{
    display:flex;
    justify-content:space-between;
    gap:1rem;
    align-items:flex-start;
    padding:1rem 1.1rem;
    border-radius:16px;
    background:rgba(255,255,255,.025);
    border:1px solid rgba(255,255,255,.06);
}

.info-item-left{
    display:flex;
    align-items:flex-start;
    gap:.85rem;
}

.info-icon{
    width:38px;
    height:38px;
    border-radius:12px;
    background:rgba(201,168,76,.08);
    border:1px solid rgba(201,168,76,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.info-icon svg{
    width:16px;
    height:16px;
    stroke:var(--gold)!important;
}

.info-label{
    font-size:.76rem;
    text-transform:uppercase;
    letter-spacing:.08em;
    color:var(--text-3);
    margin-bottom:.3rem;
}

.info-value{
    font-size:.94rem;
    font-weight:500;
    color:var(--text-1);
    line-height:1.6;
    max-width:420px;
    text-align:right;
}

.highlight-blue{
    background:rgba(59,130,246,.08);
    border-color:rgba(59,130,246,.18);
}

.highlight-red{
    background:rgba(239,68,68,.08);
    border-color:rgba(239,68,68,.18);
}

.highlight-neutral{
    background:rgba(255,255,255,.03);
}

.form-group{
    margin-bottom:1.2rem;
}

.form-label{
    display:flex;
    align-items:center;
    gap:.55rem;
    margin-bottom:.7rem;
    font-size:.9rem;
    font-weight:600;
    color:var(--text-2);
}

.form-label svg{
    width:15px;
    height:15px;
    stroke:var(--gold)!important;
}

.form-input{
    width:100%;
    padding:1rem 1.1rem;
    border-radius:14px;
    border:1px solid rgba(255,255,255,.08);
    background:rgba(255,255,255,.03);
    color:var(--text-1);
    font-family:'DM Sans',sans-serif;
    outline:none;
    transition:var(--transition);
}

.form-input:focus{
    border-color:rgba(201,168,76,.35);
    box-shadow:0 0 0 4px rgba(201,168,76,.08);
}

.form-input::placeholder{
    color:var(--text-3);
}

.form-note{
    display:flex;
    align-items:flex-start;
    gap:.55rem;
    margin-top:.7rem;
    color:var(--text-3);
    font-size:.8rem;
    line-height:1.6;
}

.form-note svg{
    width:14px;
    height:14px;
    stroke:var(--gold)!important;
    flex-shrink:0;
    margin-top:2px;
}

.alert-error{
    display:flex;
    align-items:flex-start;
    gap:.8rem;
    padding:1rem 1.1rem;
    border-radius:16px;
    margin-bottom:1.2rem;
    background:rgba(239,68,68,.08);
    border:1px solid rgba(239,68,68,.18);
    color:#fecaca;
    line-height:1.7;
    font-size:.9rem;
}

.alert-error svg{
    width:18px;
    height:18px;
    stroke:#fca5a5!important;
    flex-shrink:0;
    margin-top:2px;
}

.btn-primary{
    width:100%;
    display:inline-flex;
    justify-content:center;
    align-items:center;
    gap:.7rem;
    padding:1rem 1.2rem;
    border:none;
    border-radius:16px;
    background:linear-gradient(135deg,var(--gold),#a47c26);
    color:#140d00;
    font-weight:700;
    font-size:.92rem;
    cursor:pointer;
    text-decoration:none;
    transition:var(--transition);
    margin-top:.6rem;
    box-shadow:0 10px 30px rgba(201,168,76,.2);
}

.btn-primary:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 40px rgba(201,168,76,.3);
}

.btn-primary svg{
    width:16px;
    height:16px;
    stroke:#140d00!important;
}

@media(max-width:980px){
    .sewa-grid{
        grid-template-columns:1fr;
    }
}

@media(max-width:768px){
    .sewa-page{
        padding:1.2rem;
    }

    .page-hero{
        padding:2rem 1.5rem;
    }

    .page-hero-inner{
        flex-direction:column;
    }

    .breadcrumbs{
        align-self:flex-start;
    }

    .card{
        padding:1.4rem;
    }

    .info-item{
        flex-direction:column;
    }

    .info-value{
        text-align:left;
    }
}
</style>

<div class="sewa-page">

    <div class="page-hero">
        <div class="page-hero-inner">

            <div>
                <div class="hero-badge">
                    <i data-feather="home"></i>
                    Arterra Living
                </div>

                <h1 class="page-title">
                    Form <span>Sewa Kamar</span>
                </h1>

                <p class="page-subtitle">
                    Lengkapi detail penyewaan kamar pilihan Anda dan lanjutkan langsung ke proses pembayaran.
                </p>
            </div>

            <div class="breadcrumbs">
                <a href="/user">
                    <i data-feather="grid"></i>
                    Dashboard
                </a>

                <a href="/user/kamar">
                    <i data-feather="layers"></i>
                    Daftar Kamar
                </a>
            </div>
        </div>
    </div>

    <div class="sewa-grid">

        <div class="card">

            <div class="card-header">
                <div class="card-icon">
                    <i data-feather="home"></i>
                </div>

                <div>
                    <h2 class="card-title">Detail Kamar {{ $kamar->no_kamar }}</h2>
                    <p class="card-subtitle">Informasi lengkap kamar pilihan Anda</p>
                </div>
            </div>

            <div class="info-list">

                <div class="info-item">
                    <div class="info-item-left">
                        <div class="info-icon">
                            <i data-feather="check-square"></i>
                        </div>

                        <div>
                            <div class="info-label">Fasilitas</div>
                        </div>
                    </div>

                    <div class="info-value">
                        {{ $kamar->fasilitas }}
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-item-left">
                        <div class="info-icon">
                            <i data-feather="layout"></i>
                        </div>

                        <div>
                            <div class="info-label">Tipe Kamar</div>
                        </div>
                    </div>

                    <div class="info-value">
                        {{ $kamar->tipeKamar->tipe_kamar }}
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-item-left">
                        <div class="info-icon">
                            <i data-feather="credit-card"></i>
                        </div>

                        <div>
                            <div class="info-label">Harga per Bulan</div>
                        </div>
                    </div>

                    <div class="info-value">
                        Rp {{ number_format($kamar->tipeKamar->harga, 0, ',', '.') }}
                    </div>
                </div>

                @if($currentSewa)

                    <div class="info-item highlight-blue">
                        <div class="info-item-left">
                            <div class="info-icon">
                                <i data-feather="refresh-cw"></i>
                            </div>

                            <div>
                                <div class="info-label">Perpanjangan Sewa</div>
                            </div>
                        </div>

                        <div class="info-value">
                            Perpanjang mulai dari
                            <strong>{{ $currentEnd ? $currentEnd->format('Y-m-d') : '-' }}</strong>
                            setelah masa sewa selesai.
                        </div>
                    </div>

                    @if($due > 0)
                        <div class="info-item highlight-red">
                            <div class="info-item-left">
                                <div class="info-icon">
                                    <i data-feather="alert-triangle"></i>
                                </div>

                                <div>
                                    <div class="info-label">Tagihan Sebelumnya</div>
                                </div>
                            </div>

                            <div class="info-value">
                                Bayar terlebih dahulu tagihan lama sebelum melakukan perpanjangan.
                            </div>
                        </div>
                    @endif

                @else

                    <div class="info-item highlight-neutral">
                        <div class="info-item-left">
                            <div class="info-icon">
                                <i data-feather="calendar"></i>
                            </div>

                            <div>
                                <div class="info-label">Mulai Sewa Baru</div>
                            </div>
                        </div>

                        <div class="info-value">
                            Pilih tanggal masuk dan lama sewa lalu lanjutkan pembayaran secara langsung.
                        </div>
                    </div>

                @endif

            </div>
        </div>

        <div class="card">

            <div class="card-header">
                <div class="card-icon">
                    <i data-feather="edit-3"></i>
                </div>

                <div>
                    <h2 class="card-title">Mulai Sewa</h2>
                    <p class="card-subtitle">Lengkapi form penyewaan kamar</p>
                </div>
            </div>

        @if(isset($blockedRoom) && $blockedRoom)

            <div class="alert-error">
                <i data-feather="alert-circle"></i>
                <div>{{ $popupError }}</div>
            </div>

        @elseif($currentSewa && $due > 0)

                <div class="alert-error">
                    <i data-feather="alert-circle"></i>

                    <div>
                        Anda masih memiliki tagihan sebelumnya sebesar
                        <strong>Rp {{ number_format($due, 0, ',', '.') }}</strong>.
                        Silakan lakukan pembayaran terlebih dahulu.
                    </div>
                </div>

                <a href="/user/pembayaran/next" class="btn-primary">
                    <i data-feather="credit-card"></i>
                    Bayar Sekarang
                </a>

            @else

                <form method="POST" action="/user/sewa">
                    @csrf

                    <input type="hidden" name="no_kamar" value="{{ $kamar->no_kamar }}">

                    @if(! $currentSewa && !($isPerpanjangan ?? false))

                        <div class="form-group">
                            <label for="tgl_masuk" class="form-label">
                                <i data-feather="calendar"></i>
                                Tanggal Masuk
                            </label>

                            <input
                                id="tgl_masuk"
                                type="date"
                                name="tgl_masuk"
                                class="form-input"
                                required
                            >
                        </div>

                    @else

                        <div class="info-item highlight-neutral" style="margin-bottom:1.2rem;">
                            <div class="info-item-left">
                                <div class="info-icon">
                                    <i data-feather="clock"></i>
                                </div>

                                <div>
                                    <div class="info-label">Tanggal Mulai Perpanjangan</div>
                                </div>
                            </div>

                            <div class="info-value">
                                {{ $currentEnd ? $currentEnd->format('Y-m-d') : '-' }}
                            </div>
                        </div>

                        {{-- Perpanjangan: tgl_masuk otomatis dari akhir sewa sebelumnya, tidak perlu input --}}
                        <input type="hidden" name="tgl_masuk" value="{{ $currentEnd ? $currentEnd->format('Y-m-d') : '' }}">

                    @endif

                    <div class="form-group">
                        <label for="jumlah_bulan" class="form-label">
                            <i data-feather="calendar-days"></i>
                            Jumlah Bulan
                        </label>

                        <input
                            id="jumlah_bulan"
                            type="number"
                            name="jumlah_bulan"
                            min="1"
                            placeholder="1"
                            class="form-input"
                            required
                        >

                        <div class="form-note">
                            <i data-feather="info"></i>
                            Sistem akan menghitung total dan membuat keterangan bulan otomatis.
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">
                        <i data-feather="arrow-right-circle"></i>
                        Sewa Sekarang
                    </button>

                </form>

            @endif

        </div>

    </div>

</div>

<script>
feather.replace();

function refreshIcons(){
    feather.replace();

    document.querySelectorAll('.card-icon svg, .info-icon svg').forEach(svg=>{
        svg.style.cssText += ';stroke:var(--gold)!important;';
    });

    document.querySelectorAll('.btn-primary svg').forEach(svg=>{
        svg.style.cssText += ';stroke:#140d00!important;';
    });

    document.querySelectorAll('.breadcrumbs svg').forEach(svg=>{
        svg.style.cssText += ';stroke:currentColor!important;';
    });
}

document.addEventListener('DOMContentLoaded', refreshIcons);
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const __flashError = @json(session('error'));
    const __flashSuccess = @json(session('success'));
    const __popupError = @json($popupError ?? null);

    function showSewaPopup({ title, text, icon }) {
        Swal.fire({
            title: title || 'Perhatian',
            text: text || '',
            icon: icon || 'info',
            confirmButtonText: 'OK',
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

    document.addEventListener('DOMContentLoaded', () => {
        if (__popupError) {
            showSewaPopup({ title: 'Perhatian', text: __popupError, icon: 'error' });
            return;
        }

        if (__flashError) {
            showSewaPopup({ title: 'Gagal', text: __flashError, icon: 'error' });
            return;
        }

        if (__flashSuccess) {
            showSewaPopup({ title: 'Berhasil', text: __flashSuccess, icon: 'success' });
        }
    });
</script>
</x-user-layout>