@include('layouts.guest.content')
@section('content')

{{-- ▼ MULAI BAGIAN KONTEN UTAMA (YANG AKAN MASUK KE @yield('content')) ▼ --}}
{{-- beranda --}}
<div class="site-blocks-cover" style="background-image: url('{{ asset('pengaduan-masyarakat/images/hero_bg_1.jpg') }}');"
    data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up" data-aos-delay="200">
                <h1 class="text-white mb-4">Sistem Pengaduan & Aspirasi Masyarakat</h1>
                <p class="lead text-white mb-5">Sampaikan laporan, keluhan, dan aspirasi Anda demi pelayanan
                    publik yang lebih baik.</p>
                <a href="#report-section" class="btn btn-primary btn-lg smoothscroll">Buat Laporan Sekarang</a>
            </div>
        </div>
    </div>
</div>
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
{{-- laporan terkini --}}
<div class="site-section" id="report-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <h2 class="section-title">Laporan Terkini</h2>
                <p>Beberapa contoh laporan masyarakat yang telah ditindaklanjuti.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" data-aos="fade-up">
                <div class="card border-0 shadow-sm mb-4">
                    <img src="{{ asset('pengaduan-masyarakat/images/lampu1.jpg') }}" class="card-img-top"
                        alt="Laporan 1">
                    <div class="card-body">
                        <h5 class="card-title">Lampu Jalan Mati</h5>
                        <p class="card-text">Laporan warga mengenai lampu jalan yang tidak menyala di area
                            perumahan telah ditangani.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm mb-4">
                    <img src="{{ asset('pengaduan-masyarakat/images/sampah1.jpg') }}" class="card-img-top"
                        alt="Laporan 2">
                    <div class="card-body">
                        <h5 class="card-title">Sampah Menumpuk</h5>
                        <p class="card-text">Petugas kebersihan telah melakukan pembersihan di wilayah yang
                            dilaporkan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm mb-4">
                    <img src="{{ asset('pengaduan-masyarakat/images/pelayanan1.jpg') }}" class="card-img-top"
                        alt="Laporan 3">
                    <div class="card-body">
                        <h5 class="card-title">Pelayanan Lambat</h5>
                        <p class="card-text">Pihak terkait telah melakukan evaluasi terhadap proses pelayanan
                            publik.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form action="{{ route('laporan.store') }}" method="POST" class="p-5 bg-white shadow-sm rounded">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Alamat Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <select name="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="1">Fasilitas Umum</option>
                            <option value="2">Kebersihan</option>
                            <option value="3">Pelayanan Publik</option>
                            <option value="4">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="judul" class="form-control" placeholder="Judul Laporan"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="deskripsi" class="form-control" cols="30" rows="5"
                            placeholder="Tuliskan laporan atau aspirasi Anda..." required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Kirim Laporan</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
{{-- hubungi kami --}}
<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="section-title">Hubungi Kami</h2>
                <p>Sampaikan pertanyaan, saran, atau kendala Anda melalui form di bawah ini.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="#" method="post" class="p-5 bg-white shadow-sm rounded">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Alamat Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" cols="30" rows="5" placeholder="Isi Laporan / Pesan Anda"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary btn-lg" value="Kirim Laporan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end kontak --}}
{{-- ▲ SELESAI BAGIAN KONTEN UTAMA (YANG AKAN MASUK KE @yield('content')) --}}


@endsection


