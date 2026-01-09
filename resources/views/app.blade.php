<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- JUDUL WEBSITE --}}
    <title>{{ $title ?? 'Corporate Website' }}</title>

    {{-- === 1. IMPLEMENTASI FAVICON (IKON TAB) === --}}
    {{-- Ikon utama untuk browser modern --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">

    {{-- Ikon untuk Apple/iOS home screen --}}
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}">

    {{-- Fallback untuk browser lama (opsional) --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- CSS Kustom untuk Menu Aktif --}}
    <style>
        /* Mengubah warna dan menebalkan font saat menu aktif */
        .navbar-nav .nav-link.active {
            color: #0d6efd !important; /* Warna Biru Primary */
            font-weight: 700;          /* Bold */
            border-bottom: 2px solid #0d6efd; /* Garis bawah biru */
        }

        /* Efek hover agar user tahu bisa diklik */
        .navbar-nav .nav-link:hover {
            color: #0a58ca;
        }

        /* Agar dropdown item juga terlihat aktif jika dipilih */
        .dropdown-item.active, .dropdown-item:active {
            background-color: #0d6efd;
            color: white !important;
        }
    </style>
</head>
<body>

    {{-- Include Navbar --}}
    @include('layouts.navbar')

    {{-- Konten Utama --}}
    <main>
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
