@extends('layouts.guest.app')

@section('title', 'Profil Pengembang - Aplikasi Pengaduan Masyarakat')

@section('content')
    <section class="profile-section py-5" id="profile-section">
        <div class="container">

            <!-- Header Profil -->
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="badge-container mb-4">
                        <span class="badge bg-primary-subtle text-primary badge-glow">Profil Pengembang</span>
                    </div>
                    <h2 class="fw-bold mb-3 display-5">Identitas Pengembang</h2>
                    <p class="text-muted lead">
                        Informasi lengkap tentang pengembang aplikasi Pengaduan Masyarakat
                    </p>
                </div>
            </div>

            <!-- Card Profil -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="profile-card shadow-lg" data-aos="fade-up" data-aos-delay="200">

                        <!-- Header dengan foto -->
                        <div class="profile-header text-center py-5 px-4 position-relative">
                            <div class="floating-elements">
                                <div class="floating-element el-1"></div>
                                <div class="floating-element el-2"></div>
                                <div class="floating-element el-3"></div>
                            </div>

                           

                            <h3 class="fw-bold text-white mb-2 display-6">EXAUDI BANJARNAHOR</h3>
                            <p class="text-light mb-1 fs-5">Full Stack Developer</p>
                            <p class="text-light opacity-75">Pengembang Aplikasi Pengaduan Masyarakat</p>

                            <div class="profile-rating mt-3">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-light ms-2">4.5/5.0</span>
                            </div>
                        </div>

                        <!-- Body Profil -->
                        <div class="profile-body p-4 p-md-5">

                            <!-- Informasi Pribadi -->
                            <div class="row mb-5 g-4">
                                <div class="col-md-6" data-aos="fade-right">
                                    <div class="info-card h-100">
                                        <div class="info-card-header">
                                            <div class="info-icon bg-primary bg-opacity-10">
                                                <i class="fas fa-user-graduate text-primary"></i>
                                            </div>
                                            <h5 class="fw-bold mb-0">Data Akademik</h5>
                                        </div>
                                        <div class="info-list mt-4">
                                            <div class="info-item" data-aos="fade-up" data-aos-delay="100">
                                                <div class="info-item-icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="info-item-content">
                                                    <small class="text-muted d-block">Nama Lengkap</small>
                                                    <p class="mb-0 fw-bold">EXAUDI BANJARNAHOR</p>
                                                </div>
                                            </div>
                                            <div class="info-item" data-aos="fade-up" data-aos-delay="150">
                                                <div class="info-item-icon">
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div class="info-item-content">
                                                    <small class="text-muted d-block">Nomor Induk Mahasiswa</small>
                                                    <p class="mb-0 fw-bold">2457301042</p>
                                                </div>
                                            </div>
                                            <div class="info-item" data-aos="fade-up" data-aos-delay="200">
                                                <div class="info-item-icon">
                                                    <i class="fas fa-university"></i>
                                                </div>
                                                <div class="info-item-content">
                                                    <small class="text-muted d-block">Program Studi</small>
                                                    <p class="mb-0 fw-bold">Sistem Informasi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" data-aos="fade-left">
                                    <div class="info-card h-100">
                                        <div class="info-card-header">
                                            <div class="info-icon bg-success bg-opacity-10">
                                                <i class="fas fa-school text-success"></i>
                                            </div>
                                            <h5 class="fw-bold mb-0">Institusi Pendidikan</h5>
                                        </div>
                                        <div class="info-list mt-4">
                                            <div class="info-item" data-aos="fade-up" data-aos-delay="250">
                                                <div class="info-item-icon">
                                                    <i class="fas fa-graduation-cap"></i>
                                                </div>
                                                <div class="info-item-content">
                                                    <small class="text-muted d-block">Universitas</small>
                                                    <p class="mb-0 fw-bold">Politeknik Caltex Riau</p>
                                                </div>
                                            </div>
                                            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                                                <div class="info-item-icon">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                                <div class="info-item-content">
                                                    <small class="text-muted d-block">Fakultas</small>
                                                    <p class="mb-0 fw-bold">JTI</p>
                                                </div>
                                            </div>
                                            <div class="info-item" data-aos="fade-up" data-aos-delay="350">
                                                <div class="info-item-icon">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="info-item-content">
                                                    <small class="text-muted d-block">Email</small>
                                                    <p class="mb-0 fw-bold">EMAIL@ANDA.COM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Media Sosial -->
                            <div class="social-section text-center mb-5" data-aos="fade-up">
                                <h4 class="fw-bold mb-4">Media Sosial & Portfolio</h4>
                                <div class="social-buttons d-flex flex-wrap justify-content-center gap-3">
                                    <a href="https://www.linkedin.com/in/exaudi-bn-03a803364?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                       target="_blank"
                                       class="social-btn linkedin-btn">
                                        <i class="fab fa-linkedin"></i>
                                        <span>LinkedIn</span>
                                    </a>
                                    <a href="https://github.com/exaudi24si-max/PENGADUAN-MASYARAKAT.git"
                                       target="_blank"
                                       class="social-btn github-btn">
                                        <i class="fab fa-github"></i>
                                        <span>GitHub</span>
                                    </a>
                                    <a href="https://instagram.com/username"
                                       target="_blank"
                                       class="social-btn instagram-btn">
                                        <i class="fab fa-instagram"></i>
                                        <span>Instagram</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Skills & Teknologi -->
                            <div class="skills-section mb-5" data-aos="fade-up">
                                <h4 class="fw-bold mb-4">Skills & Teknologi yang Dikuasai</h4>
                                <div class="row g-3">
                                    @php
                                        $skills = [
                                            ['icon' => 'fab fa-laravel', 'color' => '#ff2d20', 'name' => 'Laravel'],
                                            ['icon' => 'fab fa-php', 'color' => '#777bb4', 'name' => 'PHP'],
                                            ['icon' => 'fab fa-js', 'color' => '#f7df1e', 'name' => 'JavaScript'],
                                            ['icon' => 'fab fa-bootstrap', 'color' => '#7952b3', 'name' => 'Bootstrap'],
                                            ['icon' => 'fas fa-database', 'color' => '#4479a1', 'name' => 'MySQL'],
                                            ['icon' => 'fab fa-html5', 'color' => '#e34f26', 'name' => 'HTML5'],
                                            ['icon' => 'fab fa-css3-alt', 'color' => '#1572b6', 'name' => 'CSS3'],
                                            ['icon' => 'fab fa-git-alt', 'color' => '#f05032', 'name' => 'Git'],
                                        ];
                                    @endphp

                                    @foreach($skills as $index => $skill)
                                        <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="{{ $index * 50 }}">
                                            <div class="skill-item text-center">
                                                <div class="skill-icon-wrapper">
                                                    <i class="{{ $skill['icon'] }} fa-3x" style="color: {{ $skill['color'] }}"></i>
                                                </div>
                                                <p class="mb-0 fw-semibold mt-3">{{ $skill['name'] }}</p>
                                                <div class="skill-level mt-2">
                                                    <div class="skill-level-bar" data-level="90"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tentang Pengembang -->
                            <div class="about-section" data-aos="fade-up">
                                <h4 class="fw-bold mb-4">Tentang Pengembang</h4>
                                <div class="about-card">
                                    <div class="quote-icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <p class="mb-3">Halo! Saya adalah pengembang aplikasi <strong>Pengaduan Masyarakat</strong>. Aplikasi ini dikembangkan sebagai solusi digital untuk mempermudah masyarakat dalam menyampaikan pengaduan dan aspirasi secara online.</p>
                                    <p class="mb-4">Dengan pengalaman dalam pengembangan web menggunakan teknologi modern seperti Laravel, Bootstrap, dan MySQL, saya berusaha menciptakan aplikasi yang user-friendly, efisien, dan dapat diandalkan untuk melayani kebutuhan masyarakat dalam menyampaikan pengaduan secara transparan dan terstruktur.</p>
                                    <div class="signature">
                                        <p class="mb-0 text-end fw-bold">— Exaudi Banjarnahor</p>
                                        <small class="text-muted text-end d-block">Full Stack Developer</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --card-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .profile-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 120px 0 80px;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .profile-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23667eea' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .badge-container {
            display: inline-block;
            position: relative;
        }

        .badge-glow {
            animation: glow 2s ease-in-out infinite alternate;
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--card-shadow);
            transition: var(--transition-smooth);
        }

        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
        }

        .profile-header {
            background: var(--primary-gradient);
            position: relative;
            padding: 60px 20px;
            overflow: hidden;
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element.el-1 {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element.el-2 {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-element.el-3 {
            width: 40px;
            height: 40px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        .profile-photo-wrapper {
            position: relative;
            display: inline-block;
        }

        .profile-photo {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            position: relative;
            transition: var(--transition-smooth);
        }

        .profile-photo:hover {
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.6);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-smooth);
        }

        .photo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(102, 126, 234, 0.3), rgba(118, 75, 162, 0.3));
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .profile-photo:hover .photo-overlay {
            opacity: 1;
        }

        .online-status {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 25px;
            height: 25px;
            background: #4cd964;
            border-radius: 50%;
            border: 3px solid white;
            animation: pulse 2s infinite;
        }

        .profile-rating {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 25px;
            backdrop-filter: blur(5px);
        }

        .profile-rating .stars {
            color: #ffd700;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .info-card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem;
            background: #f8fafc;
            border-radius: 15px;
            margin-bottom: 1rem;
            border-left: 4px solid transparent;
            transition: var(--transition-smooth);
        }

        .info-item:hover {
            background: white;
            border-left-color: #667eea;
            transform: translateX(5px);
        }

        .info-item-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            font-size: 1.3rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .social-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .social-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 1rem 2rem;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 600;
            color: white;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            min-width: 180px;
            justify-content: center;
            border: none;
        }

        .social-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .social-btn:hover::before {
            left: 100%;
        }

        .social-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .linkedin-btn {
            background: linear-gradient(135deg, #0077b5, #00a0dc);
        }

        .github-btn {
            background: linear-gradient(135deg, #333, #555);
        }

        .instagram-btn {
            background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
            background-size: 400% 400%;
            animation: gradient 3s ease infinite;
        }

        .skill-item {
            background: white;
            padding: 2rem 1rem;
            border-radius: 20px;
            border: 2px solid transparent;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .skill-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--secondary-gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .skill-item:hover::before {
            transform: scaleX(1);
        }

        .skill-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: #e2e8f0;
        }

        .skill-icon-wrapper {
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .skill-level {
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 15px;
        }

        .skill-level-bar {
            height: 100%;
            background: var(--primary-gradient);
            width: 0;
            transition: width 1.5s ease-out;
            border-radius: 3px;
        }

        .about-card {
            background: white;
            padding: 3rem;
            border-radius: 25px;
            position: relative;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .quote-icon {
            position: absolute;
            top: 30px;
            left: 30px;
            font-size: 4rem;
            color: #667eea;
            opacity: 0.1;
        }

        .about-card p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4a5568;
            position: relative;
            z-index: 1;
        }

        .signature {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px dashed #e2e8f0;
        }

        /* Animations */
        @keyframes glow {
            from {
                box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
            }
            to {
                box-shadow: 0 0 20px rgba(102, 126, 234, 0.8), 0 0 30px rgba(102, 126, 234, 0.6);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(76, 217, 100, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(76, 217, 100, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(76, 217, 100, 0);
            }
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-section {
                padding: 100px 0 40px;
            }

            .profile-photo {
                width: 150px;
                height: 150px;
            }

            .social-btn {
                min-width: 140px;
                padding: 0.8rem 1.5rem;
            }

            .info-card {
                padding: 1.5rem;
            }

            .about-card {
                padding: 2rem;
            }

            .display-5, .display-6 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .social-btn {
                min-width: 100%;
            }

            .profile-header {
                padding: 40px 15px;
            }

            .skill-item {
                padding: 1.5rem 0.5rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS animations
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 100,
                    delay: 100
                });
            }

            // Animate skill level bars
            const skillBars = document.querySelectorAll('.skill-level-bar');

            const animateSkillBars = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        const level = bar.getAttribute('data-level') || '85';
                        bar.style.width = level + '%';
                        observer.unobserve(bar);
                    }
                });
            };

            const skillObserver = new IntersectionObserver(animateSkillBars, {
                threshold: 0.5,
                rootMargin: '0px 0px -50px 0px'
            });

            skillBars.forEach(bar => {
                skillObserver.observe(bar);
            });

            // Interactive hover effects for cards
            const infoCards = document.querySelectorAll('.info-card');
            const skillItems = document.querySelectorAll('.skill-item');

            infoCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-5px)';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });

            skillItems.forEach(item => {
                item.addEventListener('mouseenter', (e) => {
                    const icon = item.querySelector('i');
                    if (icon) {
                        icon.style.transform = 'scale(1.2) rotate(5deg)';
                    }
                });

                item.addEventListener('mouseleave', (e) => {
                    const icon = item.querySelector('i');
                    if (icon) {
                        icon.style.transform = 'scale(1) rotate(0deg)';
                    }
                });
            });

            // Social button ripple effect
            const socialBtns = document.querySelectorAll('.social-btn');

            socialBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const x = e.clientX - e.target.getBoundingClientRect().left;
                    const y = e.clientY - e.target.getBoundingClientRect().top;

                    const ripple = document.createElement('span');
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');

                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Parallax effect for profile header
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const profileHeader = document.querySelector('.profile-header');
                if (profileHeader) {
                    const rate = scrolled * -0.3;
                    profileHeader.style.transform = `translate3d(0, ${rate}px, 0)`;
                }
            });

            // Typing effect for developer name (optional)
            const devName = document.querySelector('.profile-header h3');
            if (devName) {
                const originalText = devName.textContent;
                devName.textContent = '';
                let i = 0;

                function typeWriter() {
                    if (i < originalText.length) {
                        devName.textContent += originalText.charAt(i);
                        i++;
                        setTimeout(typeWriter, 50);
                    }
                }

                // Start typing effect when section is visible
                const nameObserver = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        typeWriter();
                        nameObserver.unobserve(devName);
                    }
                }, { threshold: 0.5 });

                nameObserver.observe(devName);
            }

            // Add CSS for ripple effect
            const style = document.createElement('style');
            style.textContent = `
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.7);
                    transform: scale(0);
                    animation: ripple-animation 0.6s linear;
                    pointer-events: none;
                }

                @keyframes ripple-animation {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        });

        // Fallback image handler
        window.addEventListener('error', function(e) {
            if (e.target.tagName === 'IMG') {
                e.target.src = 'https://ui-avatars.com/api/?name=EXAUDI&background=0D6EFD&color=fff&size=200';
            }
        }, true);
    </script>
@endsection
