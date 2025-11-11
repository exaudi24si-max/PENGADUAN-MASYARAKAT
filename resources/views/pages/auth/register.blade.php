<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #0d6efd;
            --primary-dark: #0a58ca;
            --warning: #ffc107;
            --success: #198754;
            --danger: #dc3545;
        }

        body {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 50%, #084298 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .register-container {
            animation: fadeInUp 0.8s ease-out;
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

        .register-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            border: none;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .register-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: block;
        }

        .register-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.4);
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .form-control {
            border-radius: 12px;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
            transform: translateY(-1px);
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 12px 0 0 12px;
        }

        .form-control.with-icon {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .login-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .login-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .login-link:hover {
            color: var(--primary-dark);
        }

        .login-link:hover::after {
            width: 100%;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            z-index: 5;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .strength-meter {
            height: 6px;
            border-radius: 3px;
            margin-top: 8px;
            background-color: #e9ecef;
            overflow: hidden;
            position: relative;
        }

        .strength-meter-fill {
            height: 100%;
            width: 0;
            border-radius: 3px;
            transition: all 0.4s ease;
            position: relative;
        }

        .strength-text {
            font-size: 0.8rem;
            margin-top: 5px;
            text-align: right;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .requirements {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            margin-bottom: 3px;
            transition: color 0.3s ease;
        }

        .requirement-item i {
            font-size: 0.7rem;
            margin-right: 5px;
            width: 12px;
        }

        .requirement-item.valid {
            color: var(--success);
        }

        .requirement-item.invalid {
            color: var(--danger);
        }

        .floating-benefits {
            position: absolute;
            left: -300px;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            width: 280px;
            animation: slideInLeft 1s ease-out 0.5s both;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px) translateY(-50%);
            }
            to {
                opacity: 1;
                transform: translateX(0) translateY(-50%);
            }
        }

        .benefit-item {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .benefit-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .benefit-content {
            flex: 1;
        }

        .benefit-title {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 2px;
            font-size: 0.9rem;
        }

        .benefit-desc {
            font-size: 0.8rem;
            color: #6c757d;
            margin: 0;
        }

        /* Responsive Design */
        @media (min-width: 1200px) {
            .floating-benefits {
                left: -320px;
            }
        }

        @media (max-width: 1199px) {
            .floating-benefits {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .register-card {
                margin: 0;
            }

            .card-header {
                padding: 2rem 1.5rem;
            }

            .card-body {
                padding: 2rem 1.5rem;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 15px;
            }

            .register-card {
                border-radius: 15px;
            }

            .card-header h4 {
                font-size: 1.4rem;
            }

            .register-icon {
                font-size: 3rem;
            }
        }

        /* Checkbox custom */
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* Alert styling */
        .alert {
            border-radius: 12px;
            border: none;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        /* Terms link styling */
        .terms-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .terms-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="register-container">
                <div class="card register-card">
                    <div class="card-header text-white text-center position-relative">
                        <i class="fas fa-user-plus register-icon"></i>
                        <h3 class="fw-bold mb-2 position-relative">Daftar Akun Baru</h3>
                        <p class="mb-0 opacity-85 position-relative">Sistem Pengaduan & Aspirasi Masyarakat</p>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" id="registerForm">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user text-muted"></i>
                                    </span>
                                    <input type="text" class="form-control with-icon @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name') }}"
                                           placeholder="Masukkan nama lengkap" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" class="form-control with-icon @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}"
                                           placeholder="Masukkan email Anda" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control with-icon @error('password') is-invalid @enderror"
                                           id="password" name="password"
                                           placeholder="Masukkan password" required>
                                    <button type="button" class="password-toggle" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Password Strength Meter -->
                                <div class="strength-meter">
                                    <div class="strength-meter-fill" id="passwordStrength"></div>
                                </div>
                                <div class="strength-text" id="passwordText">Kekuatan password</div>

                                <!-- Password Requirements -->
                                <div class="requirements">
                                    <div class="requirement-item invalid" id="reqLength">
                                        <i class="fas fa-times"></i>
                                        <span>Minimal 8 karakter</span>
                                    </div>
                                    <div class="requirement-item invalid" id="reqLowercase">
                                        <i class="fas fa-times"></i>
                                        <span>Huruf kecil (a-z)</span>
                                    </div>
                                    <div class="requirement-item invalid" id="reqUppercase">
                                        <i class="fas fa-times"></i>
                                        <span>Huruf besar (A-Z)</span>
                                    </div>
                                    <div class="requirement-item invalid" id="reqNumber">
                                        <i class="fas fa-times"></i>
                                        <span>Angka (0-9)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" class="form-control with-icon"
                                           id="password_confirmation" name="password_confirmation"
                                           placeholder="Masukkan ulang password" required>
                                    <button type="button" class="password-toggle" id="togglePasswordConfirmation">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="requirements">
                                    <div class="requirement-item invalid" id="reqMatch">
                                        <i class="fas fa-times"></i>
                                        <span>Password harus cocok</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">
                                    Saya menyetujui <a href="#" class="terms-link">Syarat & Ketentuan</a> dan
                                    <a href="#" class="terms-link">Kebijakan Privasi</a>
                                </label>
                            </div>

                            <button type="submit" class="btn register-btn w-100 py-3 fw-bold text-white" id="registerButton">
                                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3 bg-transparent border-top-0">
                        <small class="text-muted">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="login-link">Login di sini</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Benefits Section (Visible on Desktop) -->
<div class="floating-benefits d-none d-xl-block">
    <div class="benefit-item d-flex align-items-start">
        <div class="benefit-icon bg-primary bg-opacity-10">
            <i class="fas fa-bullhorn text-primary"></i>
        </div>
        <div class="benefit-content">
            <div class="benefit-title">Sampaikan Pengaduan</div>
            <p class="benefit-desc">Laporkan masalah pelayanan publik dengan mudah</p>
        </div>
    </div>
    <div class="benefit-item d-flex align-items-start">
        <div class="benefit-icon bg-success bg-opacity-10">
            <i class="fas fa-chart-line text-success"></i>
        </div>
        <div class="benefit-content">
            <div class="benefit-title">Pantau Progress</div>
            <p class="benefit-desc">Lihat perkembangan laporan secara real-time</p>
        </div>
    </div>
    <div class="benefit-item d-flex align-items-start">
        <div class="benefit-icon bg-warning bg-opacity-10">
            <i class="fas fa-shield-alt text-warning"></i>
        </div>
        <div class="benefit-content">
            <div class="benefit-title">Aman & Terjamin</div>
            <p class="benefit-desc">Data Anda terlindungi dan terjaga kerahasiaannya</p>
        </div>
    </div>
    <div class="benefit-item d-flex align-items-start">
        <div class="benefit-icon bg-info bg-opacity-10">
            <i class="fas fa-clock text-info"></i>
        </div>
        <div class="benefit-content">
            <div class="benefit-title">Respon Cepat</div>
            <p class="benefit-desc">Tim kami siap merespon dalam 24 jam</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
            const passwordInput = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Password strength meter dengan requirements
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthMeter = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('passwordText');
            const confirmPassword = document.getElementById('password_confirmation').value;

            // Check requirements
            const hasLength = password.length >= 8;
            const hasLowercase = /[a-z]/.test(password);
            const hasUppercase = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasMatch = password === confirmPassword && password.length > 0;

            // Update requirement indicators
            updateRequirement('reqLength', hasLength);
            updateRequirement('reqLowercase', hasLowercase);
            updateRequirement('reqUppercase', hasUppercase);
            updateRequirement('reqNumber', hasNumber);
            updateRequirement('reqMatch', hasMatch);

            // Calculate strength
            let strength = 0;
            let text = 'Kekuatan password';
            let color = '#dc3545';

            if (hasLength) strength += 25;
            if (hasLowercase) strength += 25;
            if (hasUppercase) strength += 25;
            if (hasNumber) strength += 25;

            // Update strength meter and text
            strengthMeter.style.width = strength + '%';

            if (strength < 50) {
                color = '#dc3545';
                text = 'Lemah';
            } else if (strength < 75) {
                color = '#ffc107';
                text = 'Cukup';
            } else {
                color = '#198754';
                text = 'Kuat';
            }

            strengthMeter.style.backgroundColor = color;
            strengthText.textContent = text;
            strengthText.style.color = color;
        });

        // Check password match on confirmation input
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            const hasMatch = password === confirmPassword && password.length > 0;
            updateRequirement('reqMatch', hasMatch);
        });

        function updateRequirement(elementId, isValid) {
            const element = document.getElementById(elementId);
            const icon = element.querySelector('i');

            if (isValid) {
                element.classList.remove('invalid');
                element.classList.add('valid');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-check');
            } else {
                element.classList.remove('valid');
                element.classList.add('invalid');
                icon.classList.remove('fa-check');
                icon.classList.add('fa-times');
            }
        }

        // Form validation enhancement
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const termsCheck = document.getElementById('termsCheck');

            if (password !== confirmPassword) {
                e.preventDefault();
                showAlert('Password dan konfirmasi password tidak cocok!', 'danger');
                return;
            }

            if (!termsCheck.checked) {
                e.preventDefault();
                showAlert('Anda harus menyetujui Syarat & Ketentuan untuk melanjutkan!', 'warning');
                return;
            }

            // Loading animation
            const button = document.getElementById('registerButton');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mendaftarkan...';
            button.disabled = true;

            setTimeout(() => {
                button.innerHTML = originalText;
                button.disabled = false;
            }, 3000);
        });

        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show mt-3`;
            alertDiv.innerHTML = `
                <i class="fas fa-${type === 'danger' ? 'exclamation-triangle' : 'exclamation-circle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            document.querySelector('.card-body').insertBefore(alertDiv, document.querySelector('#registerForm'));
        }

        // Input focus effects
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.parentElement.classList.remove('focused');
                }
            });

            // Check initial value
            if (input.value !== '') {
                input.parentElement.parentElement.classList.add('focused');
            }
        });
    });
</script>
</body>
</html>
