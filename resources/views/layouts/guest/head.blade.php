{{-- =============================================
| PARTIALS / HEAD.BLADE.PHP
| CSS & META ONLY
============================================= --}}

<title>Pengaduan & Aspirasi Masyarakat</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

{{-- Google Font --}}
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700;900&display=swap" rel="stylesheet">

{{-- Font Awesome --}}
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
      rel="stylesheet">

{{-- Vendor CSS --}}
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/bootstrap/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/aos.css') }}">

{{-- Main Style --}}
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/style.css') }}">

{{-- Floating WhatsApp + Mobile Fix --}}
<style>
/* ===== FLOATING WHATSAPP ===== */
.floating-whatsapp {
    position: fixed;
    bottom: 25px;
    right: 25px;
    z-index: 1000;
}

.whatsapp-btn {
    width: 60px;
    height: 60px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(37,211,102,.4);
    animation: pulse 2s infinite;
    transition: .3s;
}

.whatsapp-btn:hover {
    transform: scale(1.1);
}

.whatsapp-btn i {
    color: #fff;
    font-size: 28px;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(37,211,102,.7); }
    70% { box-shadow: 0 0 0 15px rgba(37,211,102,0); }
    100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); }
}

/* ===== MOBILE RESPONSIVE FIX ===== */
@media (max-width: 768px) {
    html, body {
        overflow-x: hidden;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .floating-whatsapp {
        bottom: 20px;
        right: 20px;
    }

    .whatsapp-btn {
        width: 50px;
        height: 50px;
    }

    .whatsapp-btn i {
        font-size: 24px;
    }
}
</style>
