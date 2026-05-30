<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Sistem Kos' }} - Arterra Living</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            color-scheme: dark;
            color: #eef2ff;
            background: #030614;
            --font-main: 'Poppins', sans-serif;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        
        body {
            margin: 0;
            min-height: 100vh;
            background: radial-gradient(circle at top right, rgba(99, 102, 241, .16), transparent 20%),
                        radial-gradient(circle at bottom left, rgba(124, 58, 237, .18), transparent 20%),
                        linear-gradient(180deg, #020617 0%, #030614 100%);
                        font-family: var(--font-main);
        }

        * {
        font-family: 'Poppins', sans-serif;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at 15% 10%, rgba(124, 58, 237, .2), transparent 20%),
                        radial-gradient(circle at 85% 20%, rgba(99, 102, 241, .18), transparent 17%);
            pointer-events: none;
            opacity: .85;
            z-index: -1;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .container-user {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem 3rem;
        }

        .header-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .header-section h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 2.8rem);
            letter-spacing: -0.05em;
            font-weight: 700;
        }

        .header-section p {
            margin: 0.5rem 0 0;
            color: rgba(226, 232, 240, .75);
        }

        .breadcrumbs {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .breadcrumbs a {
            color: #dbeafe;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 999px;
            padding: 0.6rem 1rem;
            transition: transform 0.2s ease, border-color 0.2s ease, background 0.2s ease;
            font-size: 0.9rem;
        }

        .breadcrumbs a:hover {
            transform: translateY(-1px);
            border-color: rgba(99, 102, 241, .65);
            background: rgba(99, 102, 241, .1);
        }

        .card {
            background: rgba(255, 255, 255, .03);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 24px 54px rgba(15, 23, 42, .16);
            transition: transform 0.25s ease, border-color 0.25s ease;
        }

        .card:hover {
            border-color: rgba(99, 102, 241, .35);
            transform: translateY(-2px);
        }

        .card h2, .card h3 {
            margin: 0 0 1rem;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        .grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .info-item {
            display: grid;
            gap: 0.4rem;
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 16px;
            padding: 1rem;
        }

        .info-item strong {
            color: #c7d2fe;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .info-item span {
            color: rgba(226, 232, 240, .8);
        }

        form {
            display: grid;
            gap: 1rem;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        input, textarea, select {
            width: 100%;
            padding: 0.9rem 1rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, .15);
            background: rgba(255, 255, 255, .05);
            color: #eef2ff;
            font-size: 1rem;
            font-family: inherit;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: rgba(99, 102, 241, .85);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }

        button {
            padding: 0.9rem 1.2rem;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 40px rgba(99, 102, 241, .3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, .1);
            color: #dbeafe;
            border: 1px solid rgba(255, 255, 255, .15);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, .15);
            border-color: rgba(255, 255, 255, .25);
        }

        .alert {
            padding: 1rem 1.2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
        }

        .alert-error {
            background: rgba(220, 38, 38, .12);
            border: 1px solid rgba(248, 113, 113, .24);
            color: #fee2e2;
        }

        .alert-success {
            background: rgba(34, 197, 94, .12);
            border: 1px solid rgba(86, 180, 137, .24);
            color: #dcfce7;
        }

        .alert-info {
            background: rgba(59, 130, 246, .12);
            border: 1px solid rgba(96, 165, 250, .24);
            color: #dbeafe;
        }

        .text-muted {
            color: rgba(226, 232, 240, .72);
            font-size: 0.9rem;
        }

        .text-small {
            font-size: 0.85rem;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .icon-spin {
            display: inline-block !important;
            animation: spin 5s linear infinite;
        }

        .sidebar-profile-card:hover .icon-spin {
            animation: spin 2s linear infinite;
        }

        @media (max-width: 768px) {
            .container-user {
                padding: 1.5rem 1rem 2rem;
            }

            .header-section {
                flex-direction: column;
            }

            .grid-2, .grid-3 {
                grid-template-columns: 1fr;
            }
        }

    .btn-primary {
        display: inline-flex !important; 
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        
        background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%) !important;
        color: #ffffff !important;
        
        padding: 0.6rem 1.2rem !important; 
        border-radius: 8px !important;  
        
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none !important;
        border: none;
        transition: all 0.2s ease;
        margin-top: 0.5rem;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%) !important;
        transform: translateY(-1px);
    }
</style>


        html, body, * {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
    {{ $styles ?? '' }}
<body class="min-h-screen">
    {{-- @include('layouts.navigation') --}}

    <div class="container-user">
        @if(session('success'))
            <div class="alert alert-success" style="position: fixed; top: 14px; left: 90px; right: 24px; z-index: 9999; max-width: 820px; margin: 0; padding: 12px 16px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin: 0.5rem 0 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </div>

    <script>
        feather.replace() 
    </script>
</body>
</html>