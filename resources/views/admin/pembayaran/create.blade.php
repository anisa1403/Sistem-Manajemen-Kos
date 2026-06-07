@extends('layouts.admin')

@section('title', 'Admin - Tambah Pembayaran')

@push('styles')
<style>:root{
            --bg:#080b10;
            --surface:#0d1117;
            --glass:rgba(10,12,18,.82);
            --border:rgba(180,148,72,.18);
            --gold:#c9a84c;
            --gold-light:#e2c97e;
            --gold-dim:rgba(201,168,76,.12);
            --text:#e8e0d0;
            --muted:#8a8070;
            --white:#f5f0e8;
            --danger:#ef4444;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Jost',sans-serif;
            background:var(--bg);
            color:var(--text);
            overflow-x:hidden;
        }
        body::before{
            content:'';
            position:fixed;
            inset:0;
            background:
                radial-gradient(circle at top left, rgba(201,168,76,.08), transparent 25%),
                radial-gradient(circle at bottom right, rgba(201,168,76,.05), transparent 30%);
            pointer-events:none;
            z-index:-1;
        }
        a{
            text-decoration:none;
            color:inherit;
        }
        .main{
            padding:48px;
            display:flex;
            flex-direction:column;
            gap:32px;
        }
        .hero{
            position:relative;
            overflow:hidden;
            border:1px solid var(--border);
            border-radius:30px;
            min-height:280px;
            background:
                linear-gradient(
                    to right,
                    rgba(8,11,16,.95),
                    rgba(8,11,16,.75)
                ),
                url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1600&q=80')
                center/cover no-repeat;
            display:flex;
            align-items:center;
            padding:60px;
        }
        .hero::before{
            content:'';
            position:absolute;
            inset:0;
            background:
                radial-gradient(
                    ellipse at right,
                    rgba(201,168,76,.12),
                    transparent 60%
                );
        }
        .hero-content{
            position:relative;
            z-index:2;
            max-width:620px;
            animation:fadeUp 1s ease;
        }
        .hero-eyebrow{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:24px;
        }
        .hero-eyebrow span{
            font-size:.7rem;
            letter-spacing:.24em;
            color:var(--gold);
            text-transform:uppercase;
        }
        .line{
            width:42px;
            height:1px;
            background:var(--gold);
        }
        .hero-title{
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.8rem,5vw,4.2rem);
            line-height:1.08;
            color:var(--white);
            margin-bottom:18px;
        }
        .hero-title em{
            color:var(--gold-light);
            font-style:italic;
        }
        .hero-desc{
            color:var(--muted);
            line-height:1.9;
            font-size:.96rem;
            max-width:520px;
        }

        .form-card{
            background:rgba(13,17,23,.82);
            border:1px solid var(--border);
            border-radius:28px;
            padding:40px;
            backdrop-filter:blur(16px);
            position:relative;
            overflow:hidden;
        }
        .form-card::before{
            content:'';
            position:absolute;
            top:0;
            left:0;
            right:0;
            height:1px;
            background:linear-gradient(
                to right,
                transparent,
                var(--gold),
                transparent
            );
        }
        .section-header{
            margin-bottom:34px;
        }
        .section-eyebrow{
            font-size:.65rem;
            letter-spacing:.24em;
            text-transform:uppercase;
            color:var(--gold);
            margin-bottom:10px;
        }
        .section-title{
            font-family:'Cormorant Garamond',serif;
            font-size:2.3rem;
            color:var(--white);
        }
        .section-title em{
            color:var(--gold-light);
            font-style:italic;
        }
        .alert{
            margin-bottom:24px;
            padding:18px 20px;
            border-radius:18px;
            background:rgba(239,68,68,.08);
            border:1px solid rgba(239,68,68,.18);
            color:#fecaca;
        }
        .alert ul{
            padding-left:18px;
            line-height:1.9;
        }
        .form-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
            gap:22px;
        }
        .input-group{
            display:flex;
            flex-direction:column;
            gap:10px;
        }
        .input-group.full{
            grid-column:1/-1;
        }
        label{
            font-size:.82rem;
            letter-spacing:.08em;
            text-transform:uppercase;
            color:var(--gold-light);
        }

        select{
            background: rgba(255,255,255,.03);
            color: var(--white);
            border: 1px solid rgba(255,255,255,.08);
        }

        select option{
            background: #0d1117;
            color: #f5f0e8;
        }

        select option:hover,
        select option:checked{
            background: linear-gradient(
                135deg,
                var(--gold),
                var(--gold-light)
            );
            color: #111;
            font-weight: 600;
        }
        input,
        select{
            width:100%;
            padding:16px 18px;
            border-radius:18px;
            border:1px solid rgba(255,255,255,.08);
            background:rgba(255,255,255,.03);
            color:var(--white);
            font-family:'Jost',sans-serif;
            transition:.3s;
            outline:none;
        }
        input::placeholder{
            color:#7d7468;
        }
        input:focus,
        select:focus{
            border-color:rgba(201,168,76,.45);
            background:rgba(201,168,76,.05);
            box-shadow:0 0 0 4px rgba(201,168,76,.08);
            transform:translateY(-1px);
        }
        .form-actions{
            display:flex;
            gap:14px;
            margin-top:34px;
            flex-wrap:wrap;
        }
        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            padding:15px 26px;
            border-radius:14px;
            font-size:.8rem;
            letter-spacing:.12em;
            text-transform:uppercase;
            font-weight:600;
            cursor:pointer;
            transition:.3s ease;
            border:none;
        }
        .btn-primary{
            background:var(--gold);
            color:#111;
        }
        .btn-primary:hover{
            background:var(--gold-light);
            transform:translateY(-3px);
            box-shadow:0 16px 30px rgba(201,168,76,.18);
        }
        .btn-secondary{
            background:transparent;
            color:var(--white);
            border:1px solid var(--border);
        }
        .btn-secondary:hover{
            border-color:var(--gold);
            color:var(--gold-light);
            transform:translateY(-3px);
        }
        .note{
            font-size:.9rem;
            color:var(--muted);
            margin-top:10px;
        }
        .empty-state{
            padding:28px;
            border-radius:22px;
            background:rgba(255,255,255,.04);
            border:1px dashed rgba(201,168,76,.35);
            color:var(--muted);
            text-align:center;
        }
        .reveal{
            opacity:0;
            transform:translateY(30px);
            transition:.9s ease;
        }
        .reveal.visible{
            opacity:1;
            transform:translateY(0);
        }

        @keyframes fadeUp{
            from{
                opacity:0;
                transform:translateY(24px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        @media(max-width:980px){
            .main{
                padding:24px;
            }
            .hero{
                padding:40px 28px;
                min-height:auto;
            }
            .form-card{
                padding:28px;
            }
        }
</style>
@endpush

@section('content')
        <section class="hero reveal">

            <div class="hero-content">

                <div class="hero-eyebrow">
                    <div class="line"></div>
                    <span>Administrator Panel</span>
                    <div class="line"></div>
                </div>

                <h1 class="hero-title">
                    Tambah <em>Pembayaran</em>
                </h1>

                <p class="hero-desc">
                    Buat data pembayaran baru untuk penghuni dengan cepat. Isi semua detail dengan lengkap supaya transaksi tercatat rapi.
                </p>

            </div>

        </section>

        <section class="form-card reveal">

            <div class="section-header">
                <div class="section-eyebrow">
                    Formulir Pembayaran
                </div>

                <div class="section-title">
                    Input <em>Transaksi</em>
                </div>
            </div>

            @if(session('error'))
                <div class="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($sewas->isEmpty())
                <div class="empty-state">
                    Tidak ada sewa yang tersedia untuk ditambahkan pembayaran. Pastikan penghuni memiliki sewa tanpa transaksi pembayaran.
                </div>
            @else
                <form method="POST" action="/admin/pembayaran" enctype="multipart/form-data" autocomplete="off">

                    @csrf

                    <div class="form-grid">
                        <div class="input-group full">
                            <label for="id_sewa">Sewa Penghuni</label>
                            <select id="id_sewa" name="id_sewa" required>
                                <option value="" data-due="0">Pilih sewa</option>
                                @foreach($sewas as $sewa)
                                    <option
                                        value="{{ $sewa->id_sewa }}"
                                        data-due="{{ $sewa->kamar->tipeKamar ? $sewa->kamar->tipeKamar->harga * $sewa->jumlah_bulan : 0 }}"
                                        {{ old('id_sewa') == $sewa->id_sewa ? 'selected' : '' }}
                                    >
                                        {{ $sewa->user->nama }} — Kamar {{ $sewa->no_kamar }} ({{ $sewa->kamar->tipeKamar->tipe_kamar ?? 'Tipe belum tersedia' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group full">
                            <label>Sisa Tagihan</label>
                            <div id="dueDisplay" class="note" style="font-weight:700;">
                                Pilih sewa untuk melihat jumlah tagihan.
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="tgl_bayar">Tanggal Pembayaran</label>
                            <input
                                id="tgl_bayar"
                                name="tgl_bayar"
                                type="date"
                                value="{{ old('tgl_bayar') }}"
                                required
                            >
                        </div>

                        <div class="input-group">
                            <label for="jumlah">Jumlah Pembayaran</label>
                            <input
                                id="jumlah"
                                name="jumlah"
                                type="number"
                                min="1"
                                step="1000"
                                placeholder="Masukkan jumlah pembayaran"
                                value="{{ old('jumlah') }}"
                                required
                            >
                            <p class="form-hint note" id="amountHint">
                                Masukkan nominal sesuai tagihan.
                            </p>
                        </div>

                        <div class="input-group full">
                            <label for="bukti">Bukti Pembayaran</label>
                            <input
                                id="bukti"
                                name="bukti"
                                type="file"
                                accept="image/*"
                                required
                            >
                            <p class="note">Unggah bukti transfer dalam format gambar (JPEG/PNG). Pastikan bukti pembayaran jelas.</p>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i data-feather="save"></i>
                            Simpan Pembayaran
                        </button>
                        <a href="/admin/pembayaran" class="btn btn-secondary">
                            <i data-feather="arrow-left"></i>
                            Kembali
                        </a>
                    </div>

                </form>
            @endif

        </section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectSewa = document.getElementById('id_sewa');
        const dueDisplay = document.getElementById('dueDisplay');
        const jumlahInput = document.getElementById('jumlah');
        const amountHint = document.getElementById('amountHint');

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID').format(value);
        }

        function updateDue() {
            if (!selectSewa || !dueDisplay || !jumlahInput || !amountHint) return;

            const selected = selectSewa.options[selectSewa.selectedIndex];
            const dueValue = Number(selected.dataset.due || 0);

            if (dueValue > 0) {
                dueDisplay.textContent = 'Rp ' + formatRupiah(dueValue);
                jumlahInput.min = dueValue;
                jumlahInput.max = dueValue;
                amountHint.textContent = 'Masukkan nominal sesuai tagihan: Rp ' + formatRupiah(dueValue);
                jumlahInput.value = dueValue;
            } else {
                dueDisplay.textContent = 'Pilih sewa untuk melihat jumlah tagihan.';
                jumlahInput.removeAttribute('min');
                jumlahInput.removeAttribute('max');
                amountHint.textContent = 'Masukkan nominal sesuai tagihan.';
            }
        }

        selectSewa.addEventListener('change', updateDue);

        if (selectSewa.value) {
            updateDue();
        }
    });
</script>
@endpush
@endsection
