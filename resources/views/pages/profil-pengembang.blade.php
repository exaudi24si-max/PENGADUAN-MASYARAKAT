@extends('layouts.guest.app')

@section('title', 'Profil Pengembang - Aplikasi Pengaduan Masyarakat')

@section('content')
    <section class="profile-section py-5" id="profile-section">
        <div class="container">

            <!-- Header Profil -->
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <span class="badge bg-primary-subtle text-primary mb-3">Profil Pengembang</span>
                    <h2 class="fw-bold mb-3">Identitas Pengembang</h2>
                    <p class="text-muted">
                        Informasi lengkap tentang pengembang aplikasi Pengaduan Masyarakat
                    </p>
                </div>
            </div>

            <!-- Card Profil -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="profile-card shadow-lg">

                        <!-- Header dengan foto -->
                        <div class="profile-header text-center py-5 px-4">
                            <div class="profile-photo-container mb-4">
                                <div class="profile-photo">
                                    <!-- GANTI DENGAN FOTO ANDA -->
                                    <img src="{{ asset('pengaduan-masyarakat/images/ganteng.png') }}" alt="Foto Pengembang"
                                        class="img-fluid rounded-circle">
                                </div>
                            </div>
                            <h3 class="fw-bold text-white mb-2">EXAUDI BANJARNAHO</h3>
                            <p class="text-light mb-0">Full Stack Developer</p>
                            <p class="text-light opacity-75">Pengembang Aplikasi Pengaduan Masyarakat</p>
                        </div>

                        <!-- Body Profil -->
                        <div class="profile-body p-4 p-md-5">

                            <!-- Informasi Pribadi -->
                            <div class="row mb-5">
                                <div class="col-md-6 mb-4">
                                    <div class="info-card">
                                        <div class="info-icon bg-primary-subtle">
                                            <i class="fas fa-user-graduate text-primary"></i>
                                        </div>
                                        <h5 class="fw-bold mb-3">Data Akademik</h5>
                                        <div class="info-list">
                                            <div class="info-item">
                                                <i class="fas fa-user text-primary me-2"></i>
                                                <div>
                                                    <small class="text-muted">Nama Lengkap</small>
                                                    <p class="mb-0 fw-semibold">EXAUDI BANJARNAHOR</p>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-id-card text-primary me-2"></i>
                                                <div>
                                                    <small class="text-muted">Nomor Induk Mahasiswa</small>
                                                    <p class="mb-0 fw-semibold">2457301042</p>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-university text-primary me-2"></i>
                                                <div>
                                                    <small class="text-muted">Program Studi</small>
                                                    <p class="mb-0 fw-semibold">Sistem Informasi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="info-card">
                                        <div class="info-icon bg-success-subtle">
                                            <i class="fas fa-school text-success"></i>
                                        </div>
                                        <h5 class="fw-bold mb-3">Institusi Pendidikan</h5>
                                        <div class="info-list">
                                            <div class="info-item">
                                                <i class="fas fa-graduation-cap text-success me-2"></i>
                                                <div>
                                                    <small class="text-muted">Universitas</small>
                                                    <p class="mb-0 fw-semibold">Politeknik Caltex Riau</p>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-building text-success me-2"></i>
                                                <div>
                                                    <small class="text-muted">Fakultas</small>
                                                    <p class="mb-0 fw-semibold">JTI</p>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-envelope text-success me-2"></i>
                                                <div>
                                                    <small class="text-muted">Email</small>
                                                    <p class="mb-0 fw-semibold">EMAIL@ANDA.COM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Media Sosial -->
                            <div class="social-section text-center mb-5">
                                <h4 class="fw-bold mb-4">Media Sosial & Portfolio</h4>
                                <div class="d-flex flex-wrap justify-content-center gap-3">
                                    <a href="https://www.linkedin.com/in/exaudi-bn-03a803364?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                        target="_blank" class="social-btn linkedin-btn">
                                        <i class="fab fa-linkedin me-2"></i>LinkedIn
                                    </a>
                                    <a href="https://github.com/exaudi24si-max/PENGADUAN-MASYARAKAT.git" target="_blank"
                                        class="social-btn github-btn">
                                        <i class="fab fa-github me-2"></i>GitHub
                                    </a>
                                    <a href="https://instagram.com/username" target="_blank"
                                        class="social-btn instagram-btn">
                                        <i class="fab fa-instagram me-2"></i>Instagram
                                    </a>
                                </div>
                            </div>

                            <!-- Skills & Teknologi -->
                            <div class="skills-section mb-5">
                                <h4 class="fw-bold mb-4">Skills & Teknologi yang Dikuasai</h4>
                                <div class="row g-3">
                                    <div class="col-6 col-md-3">
                                        <div class="skill-item text-center">
                                            <i class="fab fa-laravel fa-2x text-danger mb-2"></i>
                                            <p class="mb-0 fw-semibold">Laravel</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="skill-item text-center">
                                            <i class="fab fa-php fa-2x text-primary mb-2"></i>
                                            <p class="mb-0 fw-semibold">PHP</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="skill-item text-center">
                                            <i class="fab fa-js fa-2x text-warning mb-2"></i>
                                            <p class="mb-0 fw-semibold">JavaScript</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="skill-item text-center">
                                            <i class="fab fa-bootstrap fa-2x text-purple mb-2"></i>
                                            <p class="mb-0 fw-semibold">Bootstrap</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="skill-item text-center">
                                            <i class="fas fa-database fa-2x text-info mb-2"></i>
                                            <p class="mb-0 fw-semibold">MySQL</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="skill-item text-center">
                                            <i class="fab fa-html5 fa-2x text-orange mb-2"></i>
                                            <p class="mb-0 fw-semibold">HTML5</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="skill-item text-center">
                                            <i class="fab fa-css3-alt fa-2x text-blue mb-2"></i>
                                            <p class="mb-0 fw-semibold">CSS3</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="skill-item text-center">
                                            <i class="fab fa-git-alt fa-2x text-dark mb-2"></i>
                                            <p class="mb-0 fw-semibold">Git</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tentang Pengembang -->
                            <div class="about-section">
                                <h4 class="fw-bold mb-4">Tentang Pengembang</h4>
                                <div class="about-card">
                                    <p class="mb-3">Halo! Saya adalah pengembang aplikasi <strong>Pengaduan
                                            Masyarakat</strong>. Aplikasi ini dikembangkan sebagai solusi digital untuk
                                        mempermudah masyarakat dalam menyampaikan pengaduan dan aspirasi secara online.</p>
                                    <p class="mb-0">Dengan pengalaman dalam pengembangan web menggunakan teknologi modern
                                        seperti Laravel, Bootstrap, dan MySQL, saya berusaha menciptakan aplikasi yang
                                        user-friendly, efisien, dan dapat diandalkan untuk melayani kebutuhan masyarakat
                                        dalam menyampaikan pengaduan secara transparan dan terstruktur.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <style>
        .profile-section {
            background: #f4f6f9;
            padding-top: 100px;
            min-height: 100vh;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            position: relative;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: #ffd700;
        }

        .profile-photo-container {
            position: relative;
        }

        .profile-photo {
            width: 180px;
            height: 180px;
            margin: 0 auto;
            border: 5px solid white;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            height: 100%;
            border-left: 4px solid #0d6efd;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            background: white;
            border-radius: 10px;
            margin-bottom: 0.75rem;
            border: 1px solid #e5e7eb;
        }

        .info-item i {
            font-size: 1.2rem;
            width: 30px;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            color: white;
            border: none;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .linkedin-btn {
            background: #0077b5;
        }

        .github-btn {
            background: #333;
        }

        .instagram-btn {
            background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
        }

        .skill-item {
            background: white;
            padding: 1.5rem 1rem;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .skill-item:hover {
            transform: translateY(-5px);
            border-color: #0d6efd;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.1);
        }

        .about-card {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 15px;
            border-left: 4px solid #28a745;
        }

        .text-orange {
            color: #e34f26;
        }

        .text-blue {
            color: #1572b6;
        }

        .text-purple {
            color: #7952b3;
        }

        @media (max-width: 768px) {
            .profile-photo {
                width: 150px;
                height: 150px;
            }

            .profile-section {
                padding-top: 80px;
            }

            .social-btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }
        }
    </style>
@endsection
