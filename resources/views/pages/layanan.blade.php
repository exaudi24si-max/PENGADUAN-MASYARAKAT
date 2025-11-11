@extends('layouts.guest.app')

@section('content')
<!-- Layanan Kami Section -->
<section class="services-section py-5" id="services-section">
    <div class="container">
        <!-- Header Section -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-primary-subtle text-primary fs-6 mb-3">Fitur Unggulan</span>
                <h2 class="display-5 fw-bold text-dark mb-3">Layanan Kami</h2>
                <p class="lead text-muted">Platform lengkap untuk menyampaikan aspirasi dan pengaduan dengan proses yang transparan dan efisien</p>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="service-card text-center h-100">
                    <div class="card-icon-wrapper mb-4">
                        <div class="icon-bg bg-primary bg-opacity-10 rounded-3">
                            <i class="fas fa-exclamation-triangle text-primary fs-2"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Pengaduan Masyarakat</h5>
                    <p class="text-muted mb-4">Sampaikan keluhan terkait pelayanan publik secara langsung dan terjamin kerahasiaannya</p>
                    <div class="service-features">
                        <span class="badge bg-light text-dark border">Aman</span>
                        <span class="badge bg-light text-dark border">Cepat</span>
                    </div>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card text-center h-100">
                    <div class="card-icon-wrapper mb-4">
                        <div class="icon-bg bg-success bg-opacity-10 rounded-3">
                            <i class="fas fa-lightbulb text-success fs-2"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Aspirasi Warga</h5>
                    <p class="text-muted mb-4">Berikan ide dan saran konstruktif untuk kemajuan lingkungan dan pelayanan publik</p>
                    <div class="service-features">
                        <span class="badge bg-light text-dark border">Konstruktif</span>
                        <span class="badge bg-light text-dark border">Inovatif</span>
                    </div>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card text-center h-100">
                    <div class="card-icon-wrapper mb-4">
                        <div class="icon-bg bg-warning bg-opacity-10 rounded-3">
                            <i class="fas fa-bolt text-warning fs-2"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Tindak Lanjut Cepat</h5>
                    <p class="text-muted mb-4">Proses responsif dengan timeline jelas dari penerimaan hingga penyelesaian laporan</p>
                    <div class="service-features">
                        <span class="badge bg-light text-dark border">Responsif</span>
                        <span class="badge bg-light text-dark border">Terpantau</span>
                    </div>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card text-center h-100">
                    <div class="card-icon-wrapper mb-4">
                        <div class="icon-bg bg-info bg-opacity-10 rounded-3">
                            <i class="fas fa-chart-line text-info fs-2"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Monitoring Real-time</h5>
                    <p class="text-muted mb-4">Pantau perkembangan laporan Anda secara real-time dengan update status berkala</p>
                    <div class="service-features">
                        <span class="badge bg-light text-dark border">Real-time</span>
                        <span class="badge bg-light text-dark border">Transparan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Bottom -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="cta-box bg-primary text-white rounded-3 p-5">
                    <h4 class="fw-bold mb-3">Siap Menyampaikan Laporan?</h4>
                    <p class="mb-4 opacity-75">Bergabung dengan masyarakat lainnya dalam menciptakan pelayanan publik yang lebih baik</p>
                    <a href="{{ route('laporans.create') }}" class="btn btn-light btn-lg fw-bold px-4">
                        <i class="fas fa-plus-circle me-2"></i>Buat Laporan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.services-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.service-card {
    background: white;
    padding: 2.5rem 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(255,255,255,0.8);
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.15);
}

.card-icon-wrapper {
    position: relative;
}

.icon-bg {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    transition: all 0.3s ease;
}

.service-card:hover .icon-bg {
    transform: scale(1.1);
}

.service-features {
    margin-top: auto;
}

.cta-box {
    background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    box-shadow: 0 10px 30px rgba(13, 110, 253, 0.3);
}

.badge {
    font-size: 0.7rem;
    padding: 0.4rem 0.8rem;
    margin: 0.2rem;
}
</style>
@endsection
