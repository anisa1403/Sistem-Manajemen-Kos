<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Semua Transaksi — Arterra Living</title>

<script src="https://unpkg.com/feather-icons"></script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Jost:wght@300;400;500;600&display=swap');

  :root {
    --gold: #b8922a;
    --gold-light: #d4a843;
    --text: #1a1a1a;
    --muted: #6b6b6b;
    --border: #d4b878;
    --bg: #fdf9f2;
    --surface: #fff;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'Jost', sans-serif;
    background: var(--bg);
    color: var(--text);
    padding: 0;
  }

  .cover {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #0b0d12;
    color: #f5f0e8;
    page-break-after: always;
    position: relative;
    overflow: hidden;
  }
  .cover::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse at 20% 30%, rgba(180,146,42,.15), transparent 50%),
      radial-gradient(ellipse at 80% 70%, rgba(180,146,42,.10), transparent 50%);
  }
  .cover-ornament {
    width: 1px;
    height: 80px;
    background: linear-gradient(to bottom, transparent, var(--gold), transparent);
    margin-bottom: 40px;
    position: relative;
    z-index: 1;
  }
  .cover-eyebrow {
    font-size: .62rem;
    letter-spacing: .32em;
    text-transform: uppercase;
    color: var(--gold-light);
    margin-bottom: 20px;
    position: relative;
    z-index: 1;
  }
  .cover-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 4rem;
    font-weight: 400;
    text-align: center;
    line-height: 1.1;
    color: #f5f0e8;
    position: relative;
    z-index: 1;
    margin-bottom: 10px;
  }
  .cover-title em { color: var(--gold-light); font-style: italic; }
  .cover-sub {
    font-size: .85rem;
    color: rgba(245,240,232,.5);
    letter-spacing: .12em;
    text-transform: uppercase;
    position: relative;
    z-index: 1;
    margin-bottom: 60px;
  }
  .cover-meta {
    display: flex;
    gap: 48px;
    position: relative;
    z-index: 1;
    border-top: 1px solid rgba(180,146,42,.2);
    padding-top: 40px;
  }
  .cover-meta-item { text-align: center; }
  .cover-meta-value {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.4rem;
    color: var(--gold-light);
  }
  .cover-meta-label {
    font-size: .6rem;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: rgba(245,240,232,.45);
    margin-top: 6px;
  }
  .cover-ornament-bottom {
    width: 1px;
    height: 80px;
    background: linear-gradient(to bottom, transparent, var(--gold), transparent);
    margin-top: 40px;
    position: relative;
    z-index: 1;
  }

  .content-page {
    padding: 60px 72px;
    max-width: 1100px;
    margin: 0 auto;
  }

  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 2px solid var(--border);
  }
  .page-header-eyebrow {
    font-size: .6rem;
    letter-spacing: .26em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 10px;
  }
  .page-header-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.4rem;
    color: var(--text);
    line-height: 1.1;
  }
  .page-header-title em { color: var(--gold); font-style: italic; }
  .page-header-right { text-align: right; }
  .page-header-date {
    font-size: .75rem;
    color: var(--muted);
    letter-spacing: .08em;
  }
  .page-header-brand {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.1rem;
    color: var(--gold);
    font-style: italic;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 40px;
    font-size: .84rem;
  }
  thead { background: #0b0d12; color: #f5f0e8; }
  thead th {
    padding: 14px 18px;
    text-align: left;
    font-size: .62rem;
    letter-spacing: .18em;
    text-transform: uppercase;
    font-weight: 600;
    color: var(--gold-light);
  }
  tbody tr { border-bottom: 1px solid #ede8dc; }
  tbody tr:nth-child(even) { background: #faf6ee; }
  tbody tr:hover { background: #f5eedc; }
  tbody td { padding: 14px 18px; color: var(--text); vertical-align: middle; }
  tfoot { background: #0b0d12; }
  tfoot td {
    padding: 16px 18px;
    color: var(--gold-light);
    font-weight: 600;
    font-size: .84rem;
  }
  .total-label {
    font-size: .62rem;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: rgba(245,240,232,.5);
  }
  .total-value {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.4rem;
    color: var(--gold-light);
  }

  .print-footer {
    margin-top: 60px;
    padding-top: 24px;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
  }
  .print-footer-left .brand {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.3rem;
    color: var(--gold);
    font-style: italic;
  }
  .print-footer-left .tagline {
    font-size: .68rem;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: var(--muted);
    margin-top: 4px;
  }
  .print-footer-right { text-align: right; }
  .signature-line {
    width: 180px;
    border-bottom: 1px solid var(--text);
    margin-bottom: 8px;
    height: 40px;
  }
  .signature-label {
    font-size: .66rem;
    letter-spacing: .1em;
    color: var(--muted);
    text-align: center;
  }

  .no-print button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  .no-print button svg {
    width: 14px;
    height: 14px;
    stroke-width: 2.5;
  }

  @media print {
    body { 
      background: #ffffff !important; 
      color: #000000 !important;
    }
    
    .cover, .no-print { 
      display: none !important; 
    }
    
    .content-page {
      padding: 20px 0 0 0 !important;
      max-width: 100% !important;
    }

    .page-header {
      border-bottom: 2px solid #000000 !important;
    }
    .page-header-title {
      font-family: inherit !important;
      font-size: 2rem !important;
      font-weight: bold !important;
    }
    .page-header-title em {
      font-style: normal !important;
      color: #000000 !important;
    }
    .page-header-eyebrow, .page-header-brand {
      color: #000000 !important;
    }

    table { 
      width: 100% !important;
      margin-top: 20px !important;
      border: 1px solid #000000 !important;
    }
    
    thead { 
      background: #eaeded !important; 
      border-bottom: 2px solid #000000 !important;
    }
    thead th { 
      color: #000000 !important; 
      font-weight: bold !important;
      font-size: 0.75rem !important;
      border: 1px solid #000000 !important;
      padding: 10px !important;
    }

    tbody tr { 
      border-bottom: 1px solid #000000 !important; 
      background: transparent !important; 
    }
    tbody tr:nth-child(even) { 
      background: #f9f9f9 !important;
    }
    tbody td { 
      color: #000000 !important; 
      border: 1px solid #bcbcbc !important;
      padding: 10px !important;
      font-size: 0.8rem !important;
    }
    tbody td[style*="color:#9a9a9a"] {
      color: #000000 !important;
    }

    tfoot { 
      background: #ffffff !important; 
      border-top: 2px solid #000000 !important;
    }
    tfoot td { 
      color: #000000 !important; 
      border: 1px solid #000000 !important;
      padding: 12px 10px !important;
    }
    .total-label { 
      color: #000000 !important; 
      font-weight: bold !important;
      font-size: 0.75rem !important;
    }
    .total-value { 
      color: #000000 !important; 
      font-weight: bold !important; 
      font-family: inherit !important; 
      font-size: 1.1rem !important;
      text-decoration: underline double;
    }

    .print-footer {
      border-top: 1px solid #000000 !important;
    }
    .print-footer-left .brand {
      color: #000000 !important;
      font-style: normal !important;
      font-weight: bold !important;
    }
    .signature-line {
      border-bottom: 1px solid #000000 !important;
    }
  }
</style>
</head>
<body>

<div class="cover">
    <div class="cover-ornament"></div>
    <div class="cover-eyebrow">Arterra Living &mdash; Dokumen Resmi</div>
    <h1 class="cover-title">Laporan<br><em>Transaksi</em></h1>
    <p class="cover-sub">Rekapitulasi Pembayaran Penghuni</p>
    <div class="cover-meta">
        <div class="cover-meta-item">
            <div class="cover-meta-value">{{ $pembayaran->count() }}</div>
            <div class="cover-meta-label">Total Transaksi</div>
        </div>
        <div class="cover-meta-item">
            <div class="cover-meta-value">Rp {{ number_format($pembayaran->sum('jumlah'), 0, ',', '.') }}</div>
            <div class="cover-meta-label">Total Nilai</div>
        </div>
        <div class="cover-meta-item">
            <div class="cover-meta-value">{{ now()->format('Y') }}</div>
            <div class="cover-meta-label">Tahun</div>
        </div>
    </div>
    <div class="cover-ornament-bottom"></div>
</div>

<div class="content-page">

    <div class="page-header">
        <div class="page-header-left">
            <div class="page-header-eyebrow">Rekapitulasi Data</div>
            <div class="page-header-title">Daftar <em>Transaksi</em></div>
        </div>
        <div class="page-header-right">
            <div class="page-header-brand">Arterra Living</div>
            <div class="info-item-value">{{ now()->setTimezone('Asia/Jakarta')->translatedFormat('d F Y, H:i') }} WIB</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ID Bayar</th>
                <th>Penghuni</th>
                <th>No. Kamar</th>
                <th>Tgl Bayar</th>
                <th style="text-align:right">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; $no = 1; @endphp
            @foreach($pembayaran as $item)
            @php $total += $item->jumlah; @endphp
            <tr>
                <td style="color:#9a9a9a;font-size:.78rem">{{ $no++ }}</td>
                <td style="font-weight:600">#{{ str_pad($item->id_pembayaran, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $item->sewa->user->nama }}</td>
                <td>{{ $item->sewa->no_kamar }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_bayar)->translatedFormat('d M Y') }}</td>
                <td style="text-align:right;font-weight:600">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="total-label">Total Keseluruhan</td>
                <td colspan="2" style="text-align:right" class="total-value">Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="print-footer">
        <div class="print-footer-left">
            <div class="brand">Arterra Living</div>
            <div class="tagline">Premium Residence Management</div>
        </div>
        <div class="print-footer-right">
            <div class="signature-line"></div>
            <div class="signature-label">Tanda Tangan Admin</div>
        </div>
    </div>

</div>

<div class="no-print" style="position:fixed;bottom:30px;right:30px;display:flex;gap:12px;z-index:999">
    <button onclick="window.print()"
        style="padding:14px 28px;background:#0b0d12;color:#d4a843;border:1px solid #b8922a;border-radius:10px;font-family:'Jost',sans-serif;font-size:.78rem;letter-spacing:.14em;text-transform:uppercase;cursor:pointer;font-weight:600">
        <i data-feather="printer"></i> Cetak / Simpan PDF
    </button>
    <button onclick="window.close()"
        style="padding:14px 22px;background:transparent;color:#6b6b6b;border:1px solid #d4d4d4;border-radius:10px;font-family:'Jost',sans-serif;font-size:.78rem;letter-spacing:.14em;text-transform:uppercase;cursor:pointer">
        <i data-feather="x"></i> Tutup
    </button>
</div>

<script>
  feather.replace();
</script>

</body>
</html>