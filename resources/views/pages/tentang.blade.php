@extends('layouts.guest.app')

@section('content')

        {{-- tentang kami --}}
        <div class="site-section" id="about-section">
            <div class="container">
                <div class="row mb-5 align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                        <img src="{{ asset('pengaduan-masyarakat/images/about1.jpg') }}" alt="Tentang Kami"
                            class="img-fluid rounded">
                    </div>
                    <div class="col-lg-6 ml-auto" data-aos="fade-left">
                        <h2 class="section-title mb-4">Tentang Kami</h2>
                        <p>Aplikasi Pengaduan dan Aspirasi Masyarakat adalah platform digital yang dirancang untuk
                            menampung keluhan, masukan, dan aspirasi masyarakat terhadap pelayanan publik di berbagai
                            bidang.</p>
                        <p>Melalui sistem ini, warga dapat menyampaikan laporan dengan cepat, mudah, dan transparan,
                            serta memantau tindak lanjut dari laporan tersebut.</p>
                    </div>
                </div>
            </div>
        </div>

@endsection
