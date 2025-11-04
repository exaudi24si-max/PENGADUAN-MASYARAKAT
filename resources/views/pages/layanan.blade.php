@extends('layouts.guest.app')

@section('content')
        {{-- layanan kami --}}
        <div class="site-section bg-light" id="services-section">
            <div class="container">
                <div class="row mb-5 justify-content-center text-center">
                    <div class="col-7 text-center mb-5">
                        <h2 class="section-title">Layanan Kami</h2>
                        <p>Kami menyediakan berbagai fitur untuk memudahkan masyarakat menyampaikan aspirasi dan
                            pengaduan.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3 text-center" data-aos="fade-up">
                        <div class="service-box">
                            <span class="flaticon-idea display-4 text-primary mb-4"></span>
                            <h4>Pengaduan Masyarakat</h4>
                            <p>Sampaikan keluhan Anda terkait pelayanan publik secara langsung.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-box">
                            <span class="flaticon-feedback display-4 text-primary mb-4"></span>
                            <h4>Aspirasi Warga</h4>
                            <p>Berikan ide atau saran untuk kemajuan lingkungan dan pelayanan publik.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box">
                            <span class="flaticon-analysis display-4 text-primary mb-4"></span>
                            <h4>Tindak Lanjut Cepat</h4>
                            <p>Setiap laporan akan diteruskan dan dipantau hingga selesai.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box">
                            <span class="flaticon-report display-4 text-primary mb-4"></span>
                            <h4>Monitoring Laporan</h4>
                            <p>Pantau status laporan Anda secara real-time.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
