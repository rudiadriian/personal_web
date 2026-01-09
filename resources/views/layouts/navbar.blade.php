<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        {{-- LOGO BRAND --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            {{-- Pastikan logo juga ada di folder public --}}
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="40" class="d-inline-block align-text-top me-2">
            NAMA PERUSAHAAN
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                {{-- 1. HOME --}}
                {{-- Cek apakah URL adalah root '/' --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>

                {{-- 2. TENTANG KAMI (Dropdown) --}}
                {{-- Cek apakah URL diawali dengan 'about' (pake bintang *) --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('about*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Tentang Kami
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ Request::is('about/history') ? 'active' : '' }}" href="{{ url('about/history') }}">Sejarah</a></li>
                        <li><a class="dropdown-item {{ Request::is('about/vision') ? 'active' : '' }}" href="{{ url('about/vision') }}">Visi Misi</a></li>
                        <li><a class="dropdown-item {{ Request::is('about/structure') ? 'active' : '' }}" href="{{ url('about/structure') }}">Struktur Organisasi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{ Request::is('about/ceo-message') ? 'active' : '' }}" href="{{ url('about/ceo-message') }}">Sambutan Pimpinan</a></li>
                    </ul>
                </li>

                {{-- 3. LAYANAN / BISNIS (Dropdown) --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('services*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Layanan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ Request::is('services/products') ? 'active' : '' }}" href="{{ url('services/products') }}">Produk & Jasa</a></li>
                        <li><a class="dropdown-item {{ Request::is('services/portfolio') ? 'active' : '' }}" href="{{ url('services/portfolio') }}">Portofolio</a></li>
                        <li><a class="dropdown-item {{ Request::is('services/clients') ? 'active' : '' }}" href="{{ url('services/clients') }}">Klien Kami</a></li>
                    </ul>
                </li>

                {{-- 4. MEDIA CENTER --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('media*') ? 'active' : '' }}" href="{{ url('media') }}">Media Center</a>
                </li>

                {{-- 5. KARIR --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('careers*') ? 'active' : '' }}" href="{{ url('careers') }}">Karir</a>
                </li>

                {{-- 6. HUBUNGI KAMI --}}
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary rounded-pill px-4 text-white {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('contact') }}">
                        Hubungi Kami
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
