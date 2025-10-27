<!-- 🐛 DEBUG: Tambahkan ini di bagian paling atas untuk cek status login -->
<div style="position: fixed; top: 10px; left: 10px; background: #dc3545; color: white; padding: 10px; z-index: 9999; border-radius: 5px; font-size: 12px; font-weight: bold;">
    🔍 DEBUG STATUS:<br>
    Login: {{ Auth::check() ? 'YES' : 'NO' }}<br>
    User: {{ Auth::user()->name ?? 'TIDAK ADA' }}
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
    <div class="container">
        {{-- Brand Logo --}}
        <a class="navbar-brand fw-bold text-white" href="{{ route('home') }}">
            <i class="bi bi-megaphone-fill me-2"></i> Pengaduan Masyarakat
        </a>

        {{-- Mobile Toggle Button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar Menu --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                {{-- Menu Navigasi --}}
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}#home-section">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}#about-section">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}#services-section">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}#report-section">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}#contact-section">Kontak</a>
                </li>

                {{-- Conditional Auth Menu --}}
                @auth
                    <!-- ✅ TAMBAHAN: Nama user di desktop -->
                    <li class="nav-item d-none d-lg-block">
                        <span class="navbar-text text-white me-3">
                            <i class="bi bi-person me-1"></i>{{ Auth::user()->name }}
                        </span>
                    </li>

                    <!-- ✅ TAMBAHAN: Tombol Logout (desktop) -->
                    <li class="nav-item ms-2 d-none d-lg-block">
                        <a href="{{ route('logout.get') }}" class="btn btn-outline-light btn-sm"
                            onclick="return confirm('Yakin ingin logout?')">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </a>
                    </li>

                    {{-- Dropdown User Info --}}
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>
                            <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <div class="dropdown-item-text">
                                    <div class="fw-bold">{{ Auth::user()->name }}</div>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil Saya</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-list-check me-2"></i>Laporan Saya</a></li>
                            <li><a class="dropdown-item" href="{{ route('main') }}"><i class="bi bi-plus-circle me-2"></i>Buat Laporan Baru</a></li>
                            <li><hr class="dropdown-divider"></li>

                            <!-- ✅ TAMBAHAN: Logout di dropdown (mobile) -->
                            <li class="d-lg-none">
                                <a href="{{ route('logout.get') }}" class="dropdown-item text-danger"
                                    onclick="return confirm('Yakin ingin logout?')">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- Jika belum login --}}
                    <li class="nav-item ms-2">
                        <a href="{{ route('login') }}" class="btn btn-light btn-sm fw-bold">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-person-plus me-1"></i>Daftar
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

{{-- Style tambahan --}}
<style>
    .navbar-nav .nav-link {
        transition: color 0.3s ease;
    }
    .navbar-nav .nav-link:hover {
        color: #ffd700 !important;
    }
    .dropdown-item:hover {
        background-color: #f8f9fa;
    }
</style>
