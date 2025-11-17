@extends('layouts.guest.app')
@section('content')

    {{-- HERO SECTION --}}
<section class="hero-section" id="home-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="badge bg-primary bg-opacity-20 text-primary fs-6 mb-3">Platform Resmi</span>
                <h1 class="display-4 fw-bold text-white mb-4">
                    Suara Anda
                    <span class="text-warning">Membuat</span>
                    Perubahan
                </h1>
                <p class="lead text-white mb-5 opacity-75">
                    Sampaikan laporan, keluhan, dan aspirasi secara langsung.
                    Bersama kita wujudkan pelayanan publik yang lebih transparan dan responsif.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="{{ route('laporans.create') }}" class="btn btn-warning btn-lg fw-bold px-4 py-3">
                        <i class="fas fa-plus-circle me-2"></i>Buat Laporan Sekarang
                    </a>
                    <a href="#services-section" class="btn btn-outline-light btn-lg px-4 py-3">
                        <i class="fas fa-play-circle me-2"></i>Lihat Layanan
                    </a>
                </div>

                {{-- Quick Stats --}}
                <div class="row text-white">
                    <div class="col-4">
                        <div class="text-center">
                            <h3 class="fw-bold text-warning mb-1" data-count="2500">0</h3>
                            <small>Laporan Tersampaikan</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center">
                            <h3 class="fw-bold text-warning mb-1" data-count="95">0</h3>
                            <small>% Respons Cepat</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center">
                            <h3 class="fw-bold text-warning mb-1" data-count="24">0</h3>
                            <small>Jam Monitoring</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-visual">
                    <div class="floating-card card-1">
                        <i class="fas fa-check-circle text-success"></i>
                        <span>Laporan Diproses</span>
                    </div>
                    <div class="floating-card card-2">
                        <i class="fas fa-chart-line text-info"></i>
                        <span>Progress Real-time</span>
                    </div>
                    <div class="floating-card card-3">
                        <i class="fas fa-users text-primary"></i>
                        <span>Komunitas Aktif</span>
                    </div>
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="scroll-indicator">
        <a href="#services-section" class="scroll-link">
            <span class="scroll-text">Explore More</span>
            <div class="scroll-arrow"></div>
        </a>
    </div>
</section>

<style>
.hero-section {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 50%, #084298 100%);
    position: relative;
    overflow: hidden;
    padding: 120px 0 80px;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
}

.hero-visual {
    position: relative;
    text-align: center;
}

.floating-card {
    position: absolute;
    background: white;
    padding: 12px 20px;
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    font-size: 0.9rem;
    animation: float 3s ease-in-out infinite;
}

.floating-card.card-1 {
    top: 20%;
    left: 0;
    animation-delay: 0s;
}

.floating-card.card-2 {
    top: 50%;
    right: 0;
    animation-delay: 1s;
}

.floating-card.card-3 {
    bottom: 20%;
    left: 10%;
    animation-delay: 2s;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
}

.scroll-link {
    color: white;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.scroll-arrow {
    width: 2px;
    height: 20px;
    background: white;
    position: relative;
}

.scroll-arrow::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: -4px;
    width: 10px;
    height: 10px;
    border-right: 2px solid white;
    border-bottom: 2px solid white;
    transform: rotate(45deg);
}

.hero-btn {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    border: none;
    transition: all 0.3s ease;
}

.hero-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 193, 7, 0.4);
}

/* Number Counting Animation */
[data-count] {
    font-variant-numeric: tabular-nums;
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

        // Start animation when element is in viewport
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
