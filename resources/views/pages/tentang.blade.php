@extends('layouts.guest.app')

@section('content')

<!-- About Hero Section -->
<section class="about-hero py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-warning text-dark fs-6 mb-3">Tentang Platform Kami</span>
                <h1 class="display-4 fw-bold mb-4">Mendengar Setiap Suara, Menjawab Setiap Aspirasi</h1>
                <p class="lead mb-0">Platform digital inovatif yang menghubungkan masyarakat dengan pelayanan publik secara transparan dan efisien</p>
            </div>
        </div>
    </div>
</section>

<!-- Main About Section -->
<section class="about-main py-5" id="about-section">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <div class="position-relative">
                    <img src="{{ asset('pengaduan-masyarakat/images/about1.jpg') }}" alt="Tentang Kami" class="img-fluid rounded-3 shadow-lg">
                    <div class="floating-badge bg-warning text-dark rounded-pill p-3 shadow position-absolute top-0 start-0 m-3">
                        <i class="fas fa-bullhorn me-2"></i>Sejak 2025
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="text-primary fw-bold fs-6">TENTANG KAMI</span>
                <h2 class="display-5 fw-bold text-dark mb-4">Menghubungkan Masyarakat dengan Pelayanan Publik</h2>
                <p class="fs-5 text-muted mb-4">
                    Aplikasi Pengaduan dan Aspirasi Masyarakat adalah platform digital revolusioner yang dirancang untuk
                    <span class="text-primary fw-bold">memperkuat partisipasi masyarakat</span> dalam meningkatkan kualitas pelayanan publik.
                </p>
                <div class="about-features mb-4">
                    <div class="feature-item d-flex align-items-center mb-3">
                        <div class="feature-icon bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="fas fa-bolt text-primary fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Proses Cepat & Efisien</h6>
                            <p class="text-muted mb-0">Laporan diproses dalam waktu singkat dengan sistem yang terintegrasi</p>
                        </div>
                    </div>
                    <div class="feature-item d-flex align-items-center mb-3">
                        <div class="feature-icon bg-success bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="fas fa-shield-alt text-success fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Transparan & Akuntabel</h6>
                            <p class="text-muted mb-0">Setiap laporan dapat dipantau perkembangan dan tindak lanjutnya</p>
                        </div>
                    </div>
                    <div class="feature-item d-flex align-items-center">
                        <div class="feature-icon bg-info bg-opacity-10 rounded-circle p-3 me-3">
                            <i class="fas fa-chart-line text-info fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Monitoring Real-time</h6>
                            <p class="text-muted mb-0">Pantau status laporan secara langsung kapan saja dan di mana saja</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('laporans.create') }}" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-edit me-2"></i>Buat Laporan
                    </a>
                    <a href="#services-section" class="btn btn-outline-primary btn-lg px-4">
                        <i class="fas fa-play-circle me-2"></i>Lihat Layanan
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="row mt-5 pt-5">
            <div class="col-12 text-center mb-5">
                <h3 class="display-6 fw-bold text-dark">Dalam Angka</h3>
                <p class="text-muted">Bukti nyata kontribusi kami untuk masyarakat</p>
            </div>
            <div class="col-md-3 col-6 text-center" data-aos="fade-up">
                <div class="stat-card p-4">
                    <div class="stat-icon bg-primary bg-opacity-10 rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-file-alt text-primary fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-primary" data-count="2500">0</h3>
                    <p class="text-muted mb-0">Laporan Disampaikan</p>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card p-4">
                    <div class="stat-icon bg-success bg-opacity-10 rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-check-circle text-success fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-success" data-count="89">0</h3>
                    <p class="text-muted mb-0">% Laporan Terselesaikan</p>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card p-4">
                    <div class="stat-icon bg-warning bg-opacity-10 rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-users text-warning fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-warning" data-count="15000">0</h3>
                    <p class="text-muted mb-0">Pengguna Terdaftar</p>
                </div>
            </div>
            <div class="col-md-3 col-6 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card p-4">
                    <div class="stat-icon bg-info bg-opacity-10 rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-clock text-info fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-info" data-count="24">0</h3>
                    <p class="text-muted mb-0">Jam Respon Cepat</p>
                </div>
            </div>
        </div>

        <!-- Mission Vision Section -->
        <div class="row mt-5 pt-5">
            <div class="col-lg-6 mb-5" data-aos="fade-right">
                <div class="mission-card bg-primary text-white rounded-3 p-5 h-100">
                    <div class="icon-wrapper bg-white bg-opacity-20 rounded-circle p-3 mb-4" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-bullseye fs-2"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Misi Kami</h3>
                    <p class="fs-5 mb-4">Mewujudkan pelayanan publik yang responsif, transparan, dan akuntabel melalui partisipasi aktif masyarakat.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle me-2"></i>Mempermudah akses pengaduan</li>
                        <li class="mb-2"><i class="fas fa-check-circle me-2"></i>Mempercepat proses tindak lanjut</li>
                        <li><i class="fas fa-check-circle me-2"></i>Meningkatkan transparansi pelayanan</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="vision-card bg-dark text-white rounded-3 p-5 h-100">
                    <div class="icon-wrapper bg-white bg-opacity-20 rounded-circle p-3 mb-4" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-eye fs-2"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Visi Kami</h3>
                    <p class="fs-5 mb-4">Menjadi platform terdepan dalam menghubungkan masyarakat dengan pemerintah untuk menciptakan pelayanan publik yang optimal.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-star me-2"></i>Inovasi teknologi terdepan</li>
                        <li class="mb-2"><i class="fas fa-star me-2"></i>Layanan yang mudah diakses</li>
                        <li><i class="fas fa-star me-2"></i>Komunitas yang berdaya</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.about-hero {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    position: relative;
    overflow: hidden;
}

.about-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.min-vh-50 {
    min-height: 50vh;
}

.about-main {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.floating-badge {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.feature-icon {
    transition: all 0.3s ease;
}

.feature-item:hover .feature-icon {
    transform: scale(1.1);
}

.stat-card {
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.mission-card, .vision-card {
    transition: all 0.3s ease;
}

.mission-card:hover, .vision-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.badge {
    font-size: 0.8rem;
    padding: 0.5rem 1rem;
}
</style>

<script>
// Animated counter
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('[data-count]');

    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const updateCount = () => {
            current += step;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCount);
            } else {
                counter.textContent = target;
            }
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCount();
                    observer.unobserve(entry.target);
                }
            });
        });

        observer.observe(counter);
    });
});
</script>
@endsection
