<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kwitansi #{{ str_pad($item->id_pembayaran, 4, '0', STR_PAD_LEFT) }} — Arterra Living</title>
<script src="https://unpkg.com/feather-icons"></script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Jost:wght@300;400;500;600&display=swap');

  :root {
    --gold: #b8922a;
    --gold-light: #d4a843;
    --gold-bg: #fdf9f0;
    --text: #1a1a1a;
    --muted: #6b6b6b;
    --border: #d4b878;
    --dark: #0b0d12;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'Jost', sans-serif;
    background: #f0ebe0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
  }

  .receipt {
    width: 100%;
    max-width: 680px;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,.15);
    position: relative;
  }

  .receipt::after {
    content: '';
    position: absolute;
    left: 0; right: 0;
    top: 300px;
    border-top: 2px dashed rgba(180,146,42,.25);
    pointer-events: none;
  }

  .receipt-header {
    background: var(--dark);
    padding: 44px 52px 40px;
    position: relative;
    overflow: hidden;
  }
  .receipt-header::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse at 0% 0%, rgba(180,146,42,.18), transparent 50%),
      radial-gradient(ellipse at 100% 100%, rgba(180,146,42,.10), transparent 50%);
  }
  .receipt-header-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    position: relative;
    z-index: 1;
    margin-bottom: 32px;
  }
  .brand-name {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.8rem;
    color: #f5f0e8;
    font-style: italic;
  }
  .brand-tagline {
    font-size: .58rem;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: rgba(245,240,232,.4);
    margin-top: 4px;
  }
  .receipt-badge {
    text-align: right;
  }
  .receipt-badge-label {
    font-size: .58rem;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: rgba(245,240,232,.4);
    margin-bottom: 6px;
  }
  .receipt-badge-id {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2rem;
    color: var(--gold-light);
  }

  .receipt-header-bottom {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    position: relative;
    z-index: 1;
  }
  .receipt-kwitansi {
    font-size: .62rem;
    letter-spacing: .26em;
    text-transform: uppercase;
    color: rgba(245,240,232,.4);
    margin-bottom: 8px;
  }
  .receipt-amount {
    font-family: 'Cormorant Garamond', serif;
    font-size: 3rem;
    color: var(--gold-light);
    line-height: 1;
  }
  .receipt-amount-label {
    font-size: .68rem;
    color: rgba(245,240,232,.45);
    letter-spacing: .12em;
    margin-top: 6px;
    text-transform: capitalize;
  }
  .receipt-date {
    text-align: right;
    color: rgba(245,240,232,.5);
    font-size: .78rem;
    letter-spacing: .06em;
  }
  .receipt-date strong {
    display: block;
    color: #f5f0e8;
    font-size: .9rem;
    font-weight: 500;
  }

  .receipt-body {
    padding: 44px 52px;
  }

  .info-section {
    margin-bottom: 32px;
  }
  .info-section-label {
    font-size: .58rem;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .info-section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: linear-gradient(to right, var(--border), transparent);
  }

  .info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px 32px;
  }
  .info-item-key {
    font-size: .62rem;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 4px;
  }
  .info-item-value {
    font-size: .96rem;
    color: var(--text);
    font-weight: 500;
  }

  .amount-highlight {
    background: var(--gold-bg);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 24px 28px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 36px;
  }
  .amount-hl-label {
    font-size: .62rem;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 6px;
  }
  .amount-hl-value {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    color: var(--gold);
  }
  .amount-hl-status {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #dcfce7;
    color: #15803d;
    border-radius: 100px;
    padding: 8px 18px;
    font-size: .7rem;
    letter-spacing: .12em;
    text-transform: uppercase;
    font-weight: 600;
  }
  .amount-hl-status::before {
    content: '';
    width: 6px; height: 6px;
    border-radius: 50%;
    background: #22c55e;
    display: inline-block;
  }

  .receipt-footer {
    padding: 28px 52px 40px;
    border-top: 1px dashed var(--border);
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
  }
  .footer-note {
    font-size: .68rem;
    color: var(--muted);
    line-height: 1.7;
    max-width: 300px;
  }
  .footer-note strong { color: var(--text); }
  .signature-area { text-align: center; }
  .signature-box {
    width: 160px;
    height: 50px;
    border-bottom: 1px solid var(--text);
    margin-bottom: 8px;
  }
  .signature-label {
    font-size: .62rem;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--muted);
  }

  .print-action {
    position: fixed;
    bottom: 30px;
    right: 30px;
    display: flex;
    gap: 10px;
    z-index: 999;
  }

  @media print {
    body { background: white; padding: 0; color: #000000 !important; }
    .print-action { display: none !important; }
    
    .receipt { 
      box-shadow: none !important; 
      max-width: 100% !important; 
      border: 1px solid #000000 !important; 
      border-radius: 0 !important; 
    }
    .receipt::after {
      border-top: 1px dashed #000000 !important;
    }
    
    .receipt-header { 
      background: #f2f2f2 !important; 
      color: #000000 !important; 
      border-bottom: 2px solid #000000 !important;
      padding: 30px !important;
    }
    .receipt-header::before { display: none !important; }
    
    .brand-name, .receipt-badge-id, .receipt-amount { 
      color: #000000 !important; 
      font-family: inherit !important;
      font-weight: bold !important;
    }
    .brand-tagline, .receipt-badge-label, .receipt-kwitansi, .receipt-amount-label, .receipt-date { 
      color: #333333 !important; 
    }
    .receipt-date strong { color: #000000 !important; }
    
    .info-section-label { color: #000000 !important; font-weight: bold !important; }
    .info-section-label::after { background: #000000 !important; }
    .info-item-key { color: #333333 !important; }
    .info-item-value { color: #000000 !important; }
    
    .amount-highlight { 
      background: #f9f9f9 !important; 
      border: 1px solid #000000 !important; 
      border-radius: 4px !important;
      padding: 15px !important;
    }
    .amount-hl-label, .amount-hl-value { color: #000000 !important; }
    .amount-hl-value { font-family: inherit !important; font-weight: bold !important; font-size: 1.8rem !important; }
    .amount-hl-status { 
      background: transparent !important; 
      color: #000000 !important; 
      border: 1px solid #000000 !important; 
      border-radius: 0 !important;
      font-weight: bold !important;
    }
    .amount-hl-status::before { display: none !important; }
    
    .receipt-footer { border-top: 1px dashed #000000 !important; }
    .footer-note, .signature-label { color: #000000 !important; }
    .signature-box { border-bottom: 1px solid #000000 !important; }
  }
</style>
</head>
<body>

@php
    // Helper function lokal untuk mengubah nominal angka menjadi format terbilang teks Indonesia
    if (!function_exists('terbilang')) {
        function terbilang($angka) {
            $angka = abs($angka);
            $baca = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $terbilang = "";
            
            if ($angka < 12) {
                $terbilang = " " . $baca[$angka];
            } else if ($angka < 20) {
                $terbilang = terbilang($angka - 10) . " belas";
            } else if ($angka < 100) {
                $terbilang = terbilang(floor($angka / 10)) . " puluh" . terbilang($angka % 10);
            } else if ($angka < 200) {
                $terbilang = " seratus" . terbilang($angka - 100);
            } else if ($angka < 1000) {
                $terbilang = terbilang(floor($angka / 100)) . " ratus" . terbilang($angka % 100);
            } else if ($angka < 2000) {
                $terbilang = " seribu" . terbilang($angka - 1000);
            } else if ($angka < 1000000) {
                $terbilang = terbilang(floor($angka / 1000)) . " ribu" . terbilang($angka % 1000);
            } else if ($angka < 1000000000) {
                $terbilang = terbilang(floor($angka / 1000000)) . " juta" . terbilang($angka % 1000000);
            }
            
            return trim($terbilang);
        }
    }
@endphp

<div class="receipt">

    <div class="receipt-header">
        <div class="receipt-header-top">
            <div>
                <div class="brand-name">Arterra Living</div>
                <div class="brand-tagline">Premium Residence Management</div>
            </div>
            <div class="receipt-badge">
                <div class="receipt-badge-label">No. Kwitansi</div>
                <div class="receipt-badge-id">#{{ str_pad($item->id_pembayaran, 4, '0', STR_PAD_LEFT) }}</div>
            </div>
        </div>
        <div class="receipt-header-bottom">
            <div>
                <div class="receipt-kwitansi">Kwitansi Pembayaran</div>
                <div class="receipt-amount">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</div>
                <div class="receipt-amount-label">Terbilang: {{ terbilang($item->jumlah) }} Rupiah</div>
            </div>
            <div class="receipt-date">
                <div>Tanggal Bayar</div>
                <strong>{{ \Carbon\Carbon::parse($item->tgl_bayar)->translatedFormat('d F Y') }}</strong>
            </div>
        </div>
    </div>

    <div class="receipt-body">

        <div class="amount-highlight">
            <div>
                <div class="amount-hl-label">Total Pembayaran</div>
                <div class="amount-hl-value">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</div>
            </div>
            <div class="amount-hl-status">Lunas</div>
        </div>

        <div class="info-section">
            <div class="info-section-label">Data Penghuni</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-item-key">Nama Penghuni</div>
                    <div class="info-item-value">{{ $item->sewa->user->nama }}</div>
                </div>
                <div class="info-item">
                    <div class="info-item-key">No. Kamar</div>
                    <div class="info-item-value">{{ $item->sewa->no_kamar }}</div>
                </div>
                @if(isset($item->sewa->user->email))
                <div class="info-item">
                    <div class="info-item-key">Email</div>
                    <div class="info-item-value">{{ $item->sewa->user->email }}</div>
                </div>
                @endif
                @if(isset($item->sewa->user->no_hp))
                <div class="info-item">
                    <div class="info-item-key">No. Telepon</div>
                    <div class="info-item-value">{{ $item->sewa->user->no_hp }}</div>
                </div>
                @endif
            </div>
        </div>

        <div class="info-section">
            <div class="info-section-label">Detail Transaksi</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-item-key">ID Pembayaran</div>
                    <div class="info-item-value">#{{ str_pad($item->id_pembayaran, 4, '0', STR_PAD_LEFT) }}</div>
                </div>
                <div class="info-item">
                    <div class="info-item-key">Tanggal Bayar</div>
                    <div class="info-item-value">{{ \Carbon\Carbon::parse($item->tgl_bayar)->translatedFormat('d F Y') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-item-key">Dicetak</div>
                    <div class="info-item-value">{{ now()->setTimezone('Asia/Jakarta')->translatedFormat('d F Y, H:i') }} WIB</div>
                </div>
                <div class="info-item">
                    <div class="info-item-key">Status</div>
                    <div class="info-item-value" style="color:#15803d;font-weight:600">✓ Lunas</div>
                </div>
            </div>
        </div>

    </div>

    <div class="receipt-footer">
        <div class="footer-note">
            <strong>Arterra Living</strong><br>
            Dokumen ini merupakan bukti pembayaran resmi.<br>
            Harap disimpan sebagai arsip transaksi Anda.
        </div>
        <div class="signature-area">
            <div class="signature-box"></div>
            <div class="signature-label">Tanda Tangan Admin</div>
        </div>
    </div>

</div>

<div class="print-action">

    <button onclick="window.print()"
        style="
            padding:14px 28px;
            background:#0b0d12;
            color:#d4a843;
            border:1px solid #b8922a;
            border-radius:10px;
            font-family:'Jost',sans-serif;
            font-size:.78rem;
            letter-spacing:.14em;
            text-transform:uppercase;
            cursor:pointer;
            font-weight:600;
            display:flex;
            align-items:center;
            gap:8px;
        ">
        <i data-feather="printer"></i>
        Cetak / Simpan PDF
    </button>

    <button onclick="window.close()"
        style="
            padding:14px 22px;
            background:#fff;
            color:#6b6b6b;
            border:1px solid #d4d4d4;
            border-radius:10px;
            font-family:'Jost',sans-serif;
            font-size:.78rem;
            letter-spacing:.14em;
            text-transform:uppercase;
            cursor:pointer;
            display:flex;
            align-items:center;
            gap:8px;
        ">
        <i data-feather="x"></i>
        Tutup
    </button>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    feather.replace({
        width: 16,
        height: 16,
        strokeWidth: 2
    });
});
</script>
</body>
</html>