@extends('layouts.admin')

@section('title', 'Admin — Edit Kamar')

@push('styles')
<style>
:root{
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
    box-sizing:border-box
}
html{
    scroll-behavior:smooth
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
    background:radial-gradient(circle at top left,rgba(201,168,76,.08),transparent 28%);
    pointer-events:none;
    z-index:-1;
}
a{text-decoration:none;color:inherit}

.main{padding:42px;display:flex;flex-direction:column;gap:28px}

.hero{
    position:relative;
    overflow:hidden;
    border:1px solid var(--border);
    border-radius:30px;
    padding:54px;
    background:
        linear-gradient(to right,rgba(8,11,16,.96),rgba(8,11,16,.72)),
        url('https://images.unsplash.com/photo-1505691938895-1758d7feb511?w=1400&q=80')
        center/cover no-repeat;
}
.hero::after{
    content:'';
    position:absolute;
    inset:0;
    background:radial-gradient(circle at right,rgba(201,168,76,.1),transparent 40%);
}
.hero-content{position:relative;z-index:2;max-width:680px}
.hero-eyebrow{
    font-size:.65rem;
    letter-spacing:.28em;
    color:var(--gold);
    text-transform:uppercase;
    margin-bottom:18px;
    animation:fadeUp .8s ease;
}
.hero-title{
    font-family:'Cormorant Garamond',serif;
    font-size:clamp(2.4rem,5vw,3.8rem);
    line-height:1.08;
    color:var(--white);
    margin-bottom:18px;
    animation:fadeUp 1s ease;
}
.hero-title em{color:var(--gold-light);font-style:italic}
.hero-subtitle{
    color:var(--muted);
    line-height:1.9;
    max-width:520px;
    animation:fadeUp 1.2s ease;
}

.form-card{
    background:rgba(13,17,23,.78);
    border:1px solid var(--border);
    border-radius:28px;
    overflow:hidden;
    backdrop-filter:blur(18px);
    transition:transform .45s ease,border-color .45s ease,box-shadow .45s ease;
}
.form-card:hover{
    transform:translateY(-3px);
    border-color:rgba(201,168,76,.28);
    box-shadow:0 24px 60px rgba(0,0,0,.45),0 0 40px rgba(201,168,76,.06);
}
.form-header{
    padding:30px;
    border-bottom:1px solid var(--border);
}
.form-header small{
    font-size:.65rem;
    letter-spacing:.24em;
    color:var(--gold);
    text-transform:uppercase;
}
.form-title{
    font-family:'Cormorant Garamond',serif;
    font-size:2rem;
    color:var(--white);
    margin-top:8px;
}
.form-subtitle{
    margin-top:10px;
    color:var(--muted);
    line-height:1.8;
    font-size:.92rem;
}
.form-body{
    padding:30px;
    display:flex;
    flex-direction:column;
    gap:22px;
}

.alert{
    padding:14px 18px;
    border-radius:14px;
    background:rgba(239,68,68,.1);
    border:1px solid rgba(239,68,68,.22);
    color:#fecaca;
    font-size:.88rem;
    line-height:1.7;
}
.alert ul{margin:0;padding-left:18px}

.input-group{display:flex;flex-direction:column;gap:10px}
.input-group label{
    font-size:.72rem;
    letter-spacing:.18em;
    text-transform:uppercase;
    color:var(--gold-light);
    font-weight:500;
}
.input-group input,
.input-group select,
.input-group textarea{
    width:100%;
    padding:14px 18px;
    border-radius:14px;
    border:1px solid var(--border);
    background:rgba(255,255,255,.04);
    color:var(--text);
    font-family:'Jost',sans-serif;
    font-size:.92rem;
    transition:border-color .3s,background .3s;
    outline:none;
    appearance:none;
    -webkit-appearance:none;
}
.input-group input:focus,
.input-group select:focus,
.input-group textarea:focus{
    border-color:rgba(201,168,76,.45);
    background:rgba(201,168,76,.04);
}
.input-group textarea{
    min-height:140px;
    resize:vertical
}
.input-group select option{
    background:#0d1117;
    color:var(--text)
}

.form-actions{
    display:flex;
    gap:14px;
    flex-wrap:wrap;
    padding-top:8px
}
.btn-submit{
    position:relative;
    overflow:hidden;
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:14px 28px;
    border-radius:10px;
    background:var(--gold);
    color:#111;
    font-size:.76rem;
    letter-spacing:.16em;
    text-transform:uppercase;
    font-weight:600;
    border:none;
    cursor:pointer;
    transition:.3s;
}
.btn-submit:hover{
    background:var(--gold-light);
    transform:translateY(-2px)
}
.btn-submit::before{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(120deg,transparent,rgba(255,255,255,.24),transparent);
    transform:translateX(-120%);
    transition:.8s;
}
.btn-submit:hover::before{
    transform:translateX(120%)
}
.btn-cancel{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:14px 28px;
    border-radius:10px;
    border:1px solid var(--border);
    color:var(--white);
    font-size:.76rem;
    letter-spacing:.16em;
    text-transform:uppercase;
    font-weight:500;
    cursor:pointer;
    background:transparent;
    transition:.3s;
}
.btn-cancel:hover{
    border-color:var(--gold);
    color:var(--gold-light);
    transform:translateY(-2px);
}

.reveal{
    opacity:0;
    transform:translateY(40px);
    transition:opacity .9s ease,transform .9s ease
}
.reveal.visible{
    opacity:1;
    transform:translateY(0)
}

@keyframes fadeUp{
    from{opacity:0;
    transform:translateY(24px)}to{opacity:1;
    transform:translateY(0)}
}

@media(max-width:980px){
    .main{padding:24px}
    .hero{padding:38px 28px}
    .form-header,.form-body{padding:24px}
}
</style>
@endpush

@section('content')

<section class="hero reveal">
    <div class="hero-content">
        <div class="hero-eyebrow">Modul Kamar</div>
        <h1 class="hero-title">Edit <em>Kamar</em></h1>
        <p class="hero-subtitle">
            Perbarui tipe, fasilitas, atau detail kamar dengan cepat dan mudah.
        </p>
    </div>
</section>

<section class="form-card reveal">

    <div class="form-header">
        <small>Form Perubahan</small>
        <div class="form-title">Detail Kamar</div>
        <div class="form-subtitle">
            Isi data di bawah untuk memperbarui informasi kamar dalam sistem Arterra Living.
        </div>
    </div>

    <div class="form-body">

        @if($errors->any())
            <div class="alert">
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

          <form method="POST" action="/admin/kamar/{{ $data->no_kamar }}"
              style="display:flex;flex-direction:column;gap:22px;">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label for="id_tipe">Tipe Kamar</label>
                <select id="id_tipe" name="id_tipe" required>
                    @foreach($tipe as $t)
                        <option value="{{ $t->id_tipe }}"
                            {{ old('id_tipe', $data->id_tipe) == $t->id_tipe ? 'selected' : '' }}>
                            {{ $t->tipe_kamar }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <label for="fasilitas">Fasilitas</label>
                <textarea id="fasilitas" name="fasilitas" required>{{ old('fasilitas', $data->fasilitas) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <i data-feather="check"></i>
                    Simpan Perubahan
                </button>
                <a href="/admin/kamar" class="btn-cancel">
                    <i data-feather="x"></i>
                    Batal
                </a>
            </div>

        </form>

    </div>

</section>

@push('scripts')
<script>
const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible') });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>
@endpush

@endsection