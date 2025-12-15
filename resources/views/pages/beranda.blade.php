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
                    <span class="text-warning">Membawa</span>
                    Perubahan
                </h1>
                <p class="lead text-white mb-5 opacity-75">
                    Sampaikan laporan, keluhan, dan aspirasi secara langsung.
                    Bersama kita wujudkan pelayanan publik yang lebih transparan dan responsif.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="{{ route('laporans.create') }}" class="btn btn-warning btn-lg fw-bold px-4 py-3 hero-btn">
                        <i class="fas fa-plus-circle me-2"></i>Buat Laporan Sekarang
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

                {{-- SLIDESHOW GAMBAR INDONESIA --}}
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="slideshow-container" id="indonesiaSlideshow">
                        <!-- Slide 1 -->
                        <div class="slideshow-slide active">
                            <img
                                src="{{ asset('pengaduan-masyarakat/images/slide1.png')}}"
                                alt="Masyarakat Indonesia berpartisipasi dalam pelayanan publik"
                                class="slideshow-image"
                            >
                            <div class="slide-overlay">
                                <div class="slide-content">
                                    <h5><i class="fas fa-users me-2"></i>Komunitas Aktif</h5>
                                    <p>Warga Indonesia aktif menyampaikan aspirasi</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="slideshow-slide">
                            <img
                                src="{{ asset('pengaduan-masyarakat/images/slide2.png') }}"
                                alt="Laporan masyarakat sedang diproses oleh petugas"
                                class="slideshow-image"
                            >
                            <div class="slide-overlay">
                                <div class="slide-content">
                                    <h5><i class="fas fa-check-circle me-2"></i>Laporan Diproses</h5>
                                    <p>Tim kami menindaklanjuti setiap laporan dengan cepat</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="slideshow-slide">
                            <img
                                src="{{ asset('pengaduan-masyarakat/images/slide3.png')}}"
                                alt="Progress real-time monitoring pelaporan"
                                class="slideshow-image"
                            >
                            <div class="slide-overlay">
                                <div class="slide-content">
                                    <h5><i class="fas fa-chart-line me-2"></i>Progress Real-time</h5>
                                    <p>Pantau perkembangan laporan secara langsung</p>
                                </div>
                            </div>
                        </div>

                    <!-- Navigation dots -->
                    <div class="slideshow-indicators">
                        <span class="indicator active" data-slide="0"></span>
                        <span class="indicator" data-slide="1"></span>
                        <span class="indicator" data-slide="2"></span>
                    </div>

                    <!-- Navigation arrows -->
                    <button class="slideshow-nav prev-nav">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slideshow-nav next-nav">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Floating cards info -->
                <div class="floating-info-cards mt-4">
                    <div class="info-card">
                        <i class="fas fa-users text-primary"></i>
                        <div>
                            <h6 class="mb-1">Komunitas Aktif</h6>
                            <small>Ribuan warga telah bergabung</small>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="fas fa-check-circle text-success"></i>
                        <div>
                            <h6 class="mb-1">Laporan Diproses</h6>
                            <small>Tim responsif 24/7</small>
                        </div>
                    </div>
                    <div class="info-card">
                        <i class="fas fa-chart-line text-info"></i>
                        <div>
                            <h6 class="mb-1">Progress Real-time</h6>
                            <small>Monitoring langsung</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="scroll-indicator">
        <a href="#services-section" class="scroll-link">
            <span class="scroll-text">Jelajahi Lebih Lanjut</span>
            <div class="scroll-arrow"></div>
        </a>
    </div>
</section>

<style>
/* HERO SECTION STYLE */
.hero-section {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 50%, #084298 100%);
    position: relative;
    overflow: hidden;
    padding: 100px 0 60px;
    min-height: 100vh;
    display: flex;
    align-items: center;
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

.hero-btn {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    border: none;
    transition: all 0.3s ease;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
}

.hero-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(255, 193, 7, 0.5);
}

.hero-btn::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: 0.5s;
}

.hero-btn:hover::after {
    left: 100%;
}

/* SLIDESHOW STYLES */
.slideshow-container {
    position: relative;
    width: 100%;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
}

.slideshow-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.35);
}

.slideshow-slide {
    display: none;
    position: relative;
    height: 400px;
}

.slideshow-slide.active {
    display: block;
    animation: fadeIn 0.8s ease;
}

@keyframes fadeIn {
    from { opacity: 0.7; }
    to { opacity: 1; }
}

.slideshow-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 5s ease;
}

.slideshow-slide.active .slideshow-image {
    transform: scale(1.05);
}

.slide-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(13, 110, 253, 0.9));
    padding: 25px;
    color: white;
}

.slide-content h5 {
    font-weight: 700;
    margin-bottom: 5px;
    font-size: 1.3rem;
}

.slide-content p {
    font-size: 0.95rem;
    opacity: 0.95;
    margin: 0;
}

.slideshow-indicators {
    position: absolute;
    bottom: 100px;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 10;
}

.indicator {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin: 0 6px;
    background-color: rgba(255,255,255,0.4);
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s;
    border: 2px solid transparent;
}

.indicator.active {
    background-color: #ffc107;
    transform: scale(1.2);
    border-color: white;
}

.indicator:hover {
    background-color: rgba(255,255,255,0.7);
}

.slideshow-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(255,255,255,0.9);
    color: #0d6efd;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
}

.slideshow-nav:hover {
    background-color: white;
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.prev-nav {
    left: 20px;
}

.next-nav {
    right: 20px;
}

/* FLOATING INFO CARDS */
.floating-info-cards {
    display: flex;
    justify-content: space-between;
    margin-top: 25px;
    gap: 15px;
}

.info-card {
    background: rgba(255, 255, 255, 0.95);
    padding: 15px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid rgba(255,255,255,0.2);
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    background: white;
}

.info-card i {
    font-size: 1.5rem;
    flex-shrink: 0;
}

.info-card h6 {
    font-weight: 700;
    margin-bottom: 3px;
    color: #333;
}

.info-card small {
    color: #666;
    font-size: 0.8rem;
}

/* SCROLL INDICATOR */
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
    opacity: 0.8;
    transition: opacity 0.3s;
}

.scroll-link:hover {
    opacity: 1;
}

.scroll-text {
    font-size: 0.9rem;
    font-weight: 600;
}

.scroll-arrow {
    width: 2px;
    height: 20px;
    background: white;
    position: relative;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
    40% {transform: translateY(-10px);}
    60% {transform: translateY(-5px);}
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

/* Number Counting Animation */
[data-count] {
    font-variant-numeric: tabular-nums;
}

/* RESPONSIVE STYLES */
@media (max-width: 992px) {
    .hero-section {
        padding: 80px 0 40px;
        min-height: auto;
    }

    .slideshow-slide {
        height: 350px;
    }

    .floating-info-cards {
        flex-wrap: wrap;
    }

    .info-card {
        flex: 0 0 calc(50% - 10px);
    }
}

@media (max-width: 768px) {
    .slideshow-slide {
        height: 300px;
    }

    .slide-overlay {
        padding: 15px;
    }

    .slide-content h5 {
        font-size: 1.1rem;
    }

    .info-card {
        flex: 0 0 100%;
    }

    .slideshow-nav {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== SLIDESHOW FUNCTIONALITY =====
    const slideshowContainer = document.getElementById('indonesiaSlideshow');
    const slides = slideshowContainer.querySelectorAll('.slideshow-slide');
    const indicators = slideshowContainer.querySelectorAll('.indicator');
    const prevBtn = slideshowContainer.querySelector('.prev-nav');
    const nextBtn = slideshowContainer.querySelector('.next-nav');

    let currentSlide = 0;
    let slideInterval;
    const slideDuration = 4000; // 4 detik

    // Fungsi untuk menampilkan slide
    function showSlide(index) {
        // Sembunyikan semua slide
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));

        // Update currentSlide dengan wrap-around
        currentSlide = (index + slides.length) % slides.length;

        // Tampilkan slide aktif
        slides[currentSlide].classList.add('active');
        indicators[currentSlide].classList.add('active');
    }

    // Slide berikutnya
    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    // Slide sebelumnya
    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    // Mulai autoplay
    function startSlideshow() {
        slideInterval = setInterval(nextSlide, slideDuration);
    }

    // Hentikan autoplay
    function stopSlideshow() {
        clearInterval(slideInterval);
    }

    // Event Listeners untuk navigasi
    prevBtn.addEventListener('click', function() {
        prevSlide();
        resetSlideshow();
    });

    nextBtn.addEventListener('click', function() {
        nextSlide();
        resetSlideshow();
    });

    // Event Listeners untuk indicators
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            showSlide(index);
            resetSlideshow();
        });
    });

    // Reset slideshow timer
    function resetSlideshow() {
        stopSlideshow();
        startSlideshow();
    }

    // Hentikan slideshow saat hover
    slideshowContainer.addEventListener('mouseenter', stopSlideshow);
    slideshowContainer.addEventListener('mouseleave', startSlideshow);

    // ===== ANIMATED COUNTER =====
    const counters = document.querySelectorAll('[data-count]');

    function animateCounter(counter) {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000; // 2 detik
        const stepTime = 16; // ~60fps
        const totalSteps = duration / stepTime;
        const increment = target / totalSteps;
        let current = 0;
        let steps = 0;

        const timer = setInterval(() => {
            current += increment;
            steps++;

            if (steps >= totalSteps) {
                current = target;
                clearInterval(timer);
            }

            counter.textContent = Math.floor(current);
        }, stepTime);
    }

    // Observer untuk counter animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                animateCounter(counter);
                observer.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));

    // ===== INITIALIZE =====
    showSlide(currentSlide);
    startSlideshow();

    // ===== SMOOTH SCROLL =====
    const scrollLink = document.querySelector('.scroll-link');
    if (scrollLink) {
        scrollLink.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    }
});
</script>
@endsection
