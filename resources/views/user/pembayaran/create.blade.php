<x-user-layout>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=DM+Sans:wght@300;400;500;600;700&display=swap');

:root{
    --navy-900:#080f1c;
    --card-bg:rgba(13,24,41,.72);
    --card-border:rgba(255,255,255,.06);
    --gold:#c9a84c;
    --gold-lt:#e0c47a;
    --gold-dim:rgba(201,168,76,.14);
    --text-1:#f0ece2;
    --text-2:#c4bfb0;
    --text-3:#7a7568;
    --radius-lg:22px;
    --radius-md:14px;
    --transition:.3s cubic-bezier(.4,0,.2,1);
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'DM Sans',sans-serif;
    background:var(--navy-900);
    color:var(--text-1);
}

.page-hero{
    position:relative;
    padding:3rem;
    border-bottom:1px solid rgba(201,168,76,.08);
}

.page-hero::before{
    content:'';
    position:absolute;
    top:-100px;
    left:-100px;
    width:350px;
    height:350px;
    background:radial-gradient(circle, rgba(201,168,76,.08) 0%, transparent 70%);
}

.page-hero-inner{
    display:flex;
    justify-content:space-between;
    align-items:flex-end;
    gap:2rem;
    flex-wrap:wrap;
    position:relative;
    z-index:2;
}

.page-hero-title{
    font-family:'Cormorant Garamond',serif;
    font-size:3rem;
    line-height:1.1;
    margin-bottom:.5rem;
}

.title-light{
    background:linear-gradient(135deg,#f5ead5,#ffffff);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.title-gold{
    background:linear-gradient(135deg,var(--gold),var(--gold-lt));
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    font-style:italic;
}

.page-hero-sub{
    color:var(--text-3);
    line-height:1.7;
    max-width:540px;
}

.breadcrumbs{
    display:flex;
    align-items:center;
    gap:1rem;
    flex-wrap:wrap;
}

.breadcrumbs a{
    display:flex;
    align-items:center;
    gap:.5rem;
    color:var(--text-3);
    text-decoration:none;
    transition:var(--transition);
    font-size:.85rem;
}

.breadcrumbs a:hover{
    color:var(--gold);
}

.body-content{
    padding:2.5rem 3rem 3rem;
}

.payment-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:1.8rem;
}

.section-card{
    background:var(--card-bg);
    border:1px solid var(--card-border);
    border-radius:var(--radius-lg);
    padding:2rem;
    backdrop-filter:blur(18px);
    position:relative;
    overflow:hidden;
}

.section-card::after{
    content:'';
    position:absolute;
    top:0;
    left:0;
    right:0;
    height:2px;
    background:linear-gradient(90deg,transparent,var(--gold),transparent);
    opacity:.4;
}

.card-header{
    display:flex;
    align-items:center;
    gap:1rem;
    margin-bottom:1.7rem;
    padding-bottom:1.2rem;
    border-bottom:1px solid var(--card-border);
}

.card-icon{
    width:45px;
    height:45px;
    border-radius:14px;
    background:var(--gold-dim);
    border:1px solid rgba(201,168,76,.2);
    display:flex;
    align-items:center;
    justify-content:center;
}

.card-icon svg{
    width:19px;
    height:19px;
    stroke:var(--gold);
}

.card-title{
    font-family:'Cormorant Garamond',serif;
    font-size:1.5rem;
    font-weight:600;
}

.card-sub{
    color:var(--text-3);
    font-size:.82rem;
    margin-top:.15rem;
}

.info-list{
    display:grid;
    gap:1rem;
}

.info-item{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:1rem;
    padding:1rem 1.1rem;
    border-radius:16px;
    background:rgba(255,255,255,.02);
    border:1px solid rgba(255,255,255,.05);
}

.info-left{
    display:flex;
    align-items:center;
    gap:.8rem;
}

.info-left svg{
    width:17px;
    height:17px;
    stroke:var(--gold);
}

.info-left strong{
    color:var(--text-2);
    font-size:.85rem;
}

.info-item span{
    font-weight:600;
}

.highlight-box{
    background:rgba(201,168,76,.08);
    border:1px solid rgba(201,168,76,.2);
}

.highlight-box span{
    color:var(--gold-lt);
    font-size:1.2rem;
}

.form-group{
    margin-bottom:1.4rem;
}

.form-label{
    display:flex;
    align-items:center;
    gap:.6rem;
    margin-bottom:.65rem;
    color:var(--text-2);
    font-size:.85rem;
    font-weight:600;
}

.form-label svg{
    width:16px;
    height:16px;
    stroke:var(--gold);
}

.form-control{
    width:100%;
    background:rgba(255,255,255,.03);
    border:1px solid rgba(255,255,255,.08);
    border-radius:16px;
    padding:1rem 1.1rem;
    color:var(--text-1);
    font-family:'DM Sans',sans-serif;
    transition:var(--transition);
}

.form-control:focus{
    outline:none;
    border-color:rgba(201,168,76,.35);
    box-shadow:0 0 0 4px rgba(201,168,76,.08);
}

.form-hint{
    margin-top:.6rem;
    color:var(--text-3);
    font-size:.77rem;
    line-height:1.6;
}

.preview-wrap{
    margin-top:1rem;
}

.preview-wrap img{
    width:100%;
    max-height:280px;
    object-fit:cover;
    border-radius:16px;
    border:1px solid rgba(255,255,255,.08);
    display:none;
}

.btn-submit{
    width:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:.7rem;
    border:none;
    padding:1rem 1.4rem;
    border-radius:16px;
    background:linear-gradient(135deg,var(--gold),#9c7727);
    color:#120d00;
    font-weight:700;
    font-size:.92rem;
    cursor:pointer;
    transition:var(--transition);
    margin-top:.6rem;
    font-family:'DM Sans',sans-serif;
    box-shadow:0 10px 30px rgba(201,168,76,.2);
}

.btn-submit svg{
    width:18px;
    height:18px;
    stroke:#120d00;
}

.btn-submit:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 35px rgba(201,168,76,.3);
}

/* RESPONSIVE */
@media(max-width:900px){

    .payment-grid{
        grid-template-columns:1fr;
    }

    .page-hero{
        padding:2rem 1.5rem;
    }

    .body-content{
        padding:1.5rem;
    }

    .page-hero-title{
        font-size:2.2rem;
    }
}
</style>

<div class="dashboard-container">
    <main class="main-content">

    <div class="page-hero">
        <div class="page-hero-inner">

            <div>
                <h1 class="page-hero-title">
                    <span class="title-light">Bayar</span>
                    <span class="title-gold">Sewa</span>
                </h1>

                <p class="page-hero-sub">
                    Masukkan jumlah pembayaran sesuai tagihan dan unggah bukti transfer untuk proses verifikasi pembayaran.
                </p>
            </div>

            <div class="breadcrumbs">
                <a href="/user">
                    <i data-feather="home"></i>
                    Dashboard
                </a>

                <a href="/user/pembayaran">
                    <i data-feather="credit-card"></i>
                    Pembayaran
                </a>
            </div>

        </div>
    </div>

<div class="body-content">

    <div class="payment-grid">

        <div class="section-card">
            <div class="card-header">
                <div class="card-icon">
                    <i data-feather="home"></i>
                </div>

                <div>
                    <h2 class="card-title">Ringkasan Sewa</h2>
                    <p class="card-sub">Detail tagihan kamar Anda</p>
                </div>
            </div>

            <div class="info-list">

                <div class="info-item">
                    <div class="info-left">
                        <i data-feather="hash"></i>
                        <strong>No Kamar</strong>
                    </div>

                    <span>{{ $sewa->no_kamar }}</span>
                </div>

                <div class="info-item">
                    <div class="info-left">
                        <i data-feather="layers"></i>
                        <strong>Tipe Kamar</strong>
                    </div>

                    <span>{{ $sewa->kamar->tipeKamar->tipe_kamar }}</span>
                </div>

                <div class="info-item">
                    <div class="info-left">
                        <i data-feather="dollar-sign"></i>
                        <strong>Harga per bulan</strong>
                    </div>

                    <span>
                        Rp {{ number_format($sewa->kamar->tipeKamar->harga,0,',','.') }}
                    </span>
                </div>

                <div class="info-item">
                    <div class="info-left">
                        <i data-feather="calendar"></i>
                        <strong>Durasi Sewa</strong>
                    </div>

                    <span>{{ $sewa->jumlah_bulan }} bulan</span>
                </div>

                <div class="info-item highlight-box">
                    <div class="info-left">
                        <i data-feather="alert-circle"></i>
                        <strong>Sisa Pembayaran</strong>
                    </div>

                    <span>
                        Rp {{ number_format($due,0,',','.') }}
                    </span>
                </div>

            </div>

        </div>

        <div class="section-card">

            <div class="card-header">
                <div class="card-icon">
                    <i data-feather="credit-card"></i>
                </div>

                <div>
                    <h2 class="card-title">Pembayaran</h2>
                    <p class="card-sub">Lengkapi form pembayaran</p>
                </div>
            </div>

            <form method="POST"
                  action="/user/pembayaran"
                  enctype="multipart/form-data">

                @csrf

                <input type="hidden"
                       name="id_sewa"
                       value="{{ $sewa->id_sewa }}">

                <div class="form-group">
                    <label class="form-label">
                        <i data-feather="calendar"></i>
                        Tanggal Pembayaran
                    </label>

                    <input type="date"
                           name="tgl_bayar"
                           class="form-control"
                           required>
                </div>

                <div class="form-group">

                    <label class="form-label">
                        <i data-feather="wallet"></i>
                        Jumlah Pembayaran
                    </label>

                    <input type="number"
                           name="jumlah"
                           min="{{ $due }}"
                           max="{{ $due }}"
                           class="form-control"
                           placeholder="Masukkan jumlah pembayaran"
                           required>

                    <p class="form-hint">
                        Masukkan nominal sesuai tagihan:
                        Rp {{ number_format($due,0,',','.') }}
                    </p>

                </div>

                <div class="form-group">

                    <label class="form-label">
                        <i data-feather="image"></i>
                        Bukti Transfer
                    </label>

                    <input type="file"
                           name="bukti"
                           accept="image/*"
                           class="form-control"
                           required
                           onchange="previewImage(event)">

                    <p class="form-hint">
                        Upload bukti transfer format JPG, JPEG, atau PNG.
                    </p>

                    <div class="preview-wrap">
                        <img id="preview">
                    </div>

                </div>

                <button type="submit" class="btn-submit">
                    <i data-feather="send"></i>
                    Kirim Pembayaran
                </button>

            </form>

        </div>

    </div>

    </main>
</div>

<script>
feather.replace();

function previewImage(event){

    const file = event.target.files[0];
    const preview = document.getElementById('preview');

    if(!file){
        preview.style.display = 'none';
        return;
    }

    const reader = new FileReader();

    reader.onload = function(e){
        preview.src = e.target.result;
        preview.style.display = 'block';
    }

    reader.readAsDataURL(file);
}

function toggleProfilePopover(event) {
    event.stopPropagation();
    const popover = document.getElementById('profilePopover');
    if (popover) popover.classList.toggle('open');
}

function closeProfilePopover() {
    const popover = document.getElementById('profilePopover');
    if (popover && popover.classList.contains('open')) {
        popover.classList.remove('open');
    }
}

function confirmLogout(event) {
    event.preventDefault();
    closeProfilePopover();
    if (confirm('Apakah Anda yakin ingin keluar?')) {
        document.getElementById('logoutForm').submit();
    }
}

document.addEventListener('click', function(event) {
    const popover = document.getElementById('profilePopover');
    if (!popover) return;
    const profileCard = document.querySelector('.sidebar-profile-card');
    if (profileCard && !profileCard.contains(event.target)) {
        popover.classList.remove('open');
    }
});
</script>
</x-user-layout>