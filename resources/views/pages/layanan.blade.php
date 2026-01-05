@extends('layouts.guest.app')

@section('content')
<section class="services-section py-5" id="services-section">
    <div class="container">

        <!-- Header -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-primary-subtle text-primary mb-3">Fitur Unggulan</span>
                <h2 class="fw-bold mb-3">Layanan Kami</h2>
                <p class="text-muted">
                    Platform lengkap untuk menyampaikan aspirasi dan pengaduan dengan proses yang transparan dan efisien
                </p>
            </div>
        </div>

        <!-- Services -->
        <div class="row g-4">
            <!-- Pengaduan -->
            <div class="col-md-6 col-lg-3">
                <div class="service-card text-center">
                    <div class="image-container bg-primary-subtle">
                        <img src="{{ asset('pengaduan-masyarakat/images/pengaduan.png') }}"
                             class="service-img"
                             loading="lazy"
                             alt="Pengaduan Masyarakat">
                    </div>
                    <small class="text-muted d-block mt-2">Pengaduan Masyarakat</small>

                    <div class="icon-bg bg-primary-subtle mt-3">
                        <i class="fas fa-exclamation-triangle text-primary"></i>
                    </div>

                    <h5>Pengaduan Masyarakat</h5>
                    <p>Sampaikan keluhan terkait pelayanan publik secara aman dan terpercaya.</p>

                    <div class="service-features">
                        <span class="badge">Aman</span>
                        <span class="badge">Cepat</span>
                    </div>
                </div>
            </div>
            <!-- Aspirasi -->
            <div class="col-md-6 col-lg-3">
                <div class="service-card text-center">
                    <div class="image-container bg-success-subtle">
                        <img src="{{ asset('pengaduan-masyarakat/images/aspirasi.png') }}"
                             class="service-img"
                             loading="lazy"
                             alt="Aspirasi Warga">
                    </div>
                    <small class="text-muted d-block mt-2">Aspirasi Warga</small>

                    <div class="icon-bg bg-success-subtle mt-3">
                        <i class="fas fa-lightbulb text-success"></i>
                    </div>

                    <h5>Aspirasi Warga</h5>
                    <p>Berikan ide dan saran konstruktif untuk kemajuan pelayanan publik.</p>

                    <div class="service-features">
                        <span class="badge">Inovatif</span>
                        <span class="badge">Konstruktif</span>
                    </div>
                </div>
            </div>
            <!-- Tindak Lanjut -->
            <div class="col-md-6 col-lg-3">
                <div class="service-card text-center">
                    <div class="image-container bg-warning-subtle">
                        <img src="{{ asset('pengaduan-masyarakat/images/tindak_lanjut.png') }}"
                             class="service-img"
                             loading="lazy"
                             alt="Tindak Lanjut Cepat">
                    </div>
                    <small class="text-muted d-block mt-2">Tindak Lanjut Cepat</small>

                    <div class="icon-bg bg-warning-subtle mt-3">
                        <i class="fas fa-bolt text-warning"></i>
                    </div>

                    <h5>Tindak Lanjut Cepat</h5>
                    <p>Respons cepat dengan alur tindak lanjut yang jelas dan terpantau.</p>

                    <div class="service-features">
                        <span class="badge">Responsif</span>
                        <span class="badge">Terpantau</span>
                    </div>
                </div>
            </div>
            <!-- Monitoring -->
            <div class="col-md-6 col-lg-3">
                <div class="service-card text-center">
                    <div class="image-container bg-info-subtle">
                        <img src="{{ asset('pengaduan-masyarakat/images/monitoring.png') }}"
                             class="service-img"
                             loading="lazy"
                             alt="Monitoring Real-time">
                    </div>
                    <small class="text-muted d-block mt-2">Monitoring Real-time</small>

                    <div class="icon-bg bg-info-subtle mt-3">
                        <i class="fas fa-chart-line text-info"></i>
                    </div>

                    <h5>Monitoring Real-time</h5>
                    <p>Pantau perkembangan laporan secara real-time dan transparan.</p>

                    <div class="service-features">
                        <span class="badge">Real-time</span>
                        <span class="badge">Transparan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="row mt-5">
            <div class="col text-center">
                <div class="cta-box">
                    <h4>Siap Menyampaikan Laporan?</h4>
                    <p>Bersama kita wujudkan pelayanan publik yang lebih baik.</p>
                    <a href="{{ route('laporans.create') }}" class="btn btn-light fw-bold">
                        <i class="fas fa-plus-circle me-2"></i>Buat Laporan
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
<style>
    .services-section {
    background: #f4f6f9;
}

.service-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 1.6rem;
    border: 1px solid #e5e7eb;
    transition: 0.25s ease;
    height: 100%;
}

.service-card:hover {
    transform: translateY(-6px);
    border-color: #0d6efd;
}

.image-container {
    height: 160px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.icon-bg {
    width: 56px;
    height: 56px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 1.4rem;
}

.service-card h5 {
    font-size: 1rem;
    font-weight: 600;
    margin-top: 1rem;
}

.service-card p {
    font-size: 0.88rem;
    color: #6c757d;
}

.service-features {
    margin-top: 1rem;
}

.service-features .badge {
    background: #f1f5f9;
    color: #374151;
    font-size: 0.7rem;
    border-radius: 20px;
    padding: 0.35rem 0.7rem;
}

.cta-box {
    background: linear-gradient(135deg, #0d6efd, #0a58ca);
    color: white;
    padding: 3rem 2rem;
    border-radius: 16px;
}

@media (max-width: 768px) {
    .image-container {
        height: 140px;
    }
}

</style>
@endsection
