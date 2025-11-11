<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
    <div class="container">
        {{-- Brand Logo --}}
        <a class="navbar-brand fw-bold text-white d-flex align-items-center" href="{{ route('beranda') }}">
            <i class="fas fa-bullhorn me-2" style="font-size: 1.5rem;"></i>
            Pengaduan Masyarakat
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
                    <a class="nav-link text-white" href="{{ route('beranda') }}#home-section">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('tentang') }}#about-section">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('layanan') }}#services-section">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('laporans.index') }}#report-section">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('warga.index') }}#contact-section">Warga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('users.index') }}#contact-section">User</a>
                </li>

                {{-- Conditional Auth Menu --}}
                @auth
                    <!-- Nama user di desktop -->
                    <li class="nav-item d-none d-lg-block">
                        <span class="navbar-text text-white me-3">
                            <i class="fas fa-user me-1"></i>{{ Auth::user()->name }}
                        </span>
                    </li>

                    <!-- Tombol Logout (desktop) -->
                    <li class="nav-item ms-2 d-none d-lg-block">
                        <form action="{{ route('login') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm"
                                onclick="return confirm('Yakin ingin logout?')">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    </li>

                    {{-- Dropdown User Info --}}
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-2"></i>
                            <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <div class="dropdown-item-text">
                                    <div class="fw-bold">{{ Auth::user()->name }}</div>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil Saya</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-list-check me-2"></i>Laporan
                                    Saya</a></li>
                            <li><a class="dropdown-item" href="{{ route('laporans.create') }}"><i
                                        class="fas fa-plus-circle me-2"></i>Buat Laporan Baru</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <!-- Logout di dropdown (mobile) -->
                            <li class="d-lg-none">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item text-danger border-0 bg-transparent w-100 text-start"
                                        onclick="return confirm('Yakin ingin logout?')">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- Jika belum login --}}
                    <li class="nav-item ms-2">
                        <a href="{{ route('login') }}" class="btn btn-light btn-sm fw-bold">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-user-plus me-1"></i>Daftar
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
