   {{-- ============================================= --}}
{{-- ▼ MULAI BAGIAN PARTIALS/HEAD.BLADE.PHP ▼ --}}
{{-- ============================================= --}}
<title>Pengaduan & Aspirasi Masyarakat</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- FONT AWESOME (YANG INI HARUS DITAMBAHKIN) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/fonts/icomoon/style.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/fonts/flaticon/font/flaticon.css') }}">

<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/bootstrap/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('pengaduan-masyarakat/css/style.css') }}">

{{-- ini link dari navbar --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
{{-- =========================================== --}}
{{-- ▲ SELESAI BAGIAN PARTIALS/HEAD.BLADE.PHP ▲ --}}
{{-- =========================================== --}}
    {{-- TAMBAHKIN CSS FLOATING WHATSAPP --}}
    <style>
        /* Floating WhatsApp Button */
        .floating-whatsapp {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 1000;
        }

        .whatsapp-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
            cursor: pointer;
            animation: pulse 2s infinite;
        }

        .whatsapp-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-btn i {
            font-size: 28px;
            color: white;
        }

        /* Pulse Animation */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        /* WhatsApp Tooltip */
        .whatsapp-tooltip {
            position: absolute;
            right: 70px;
            top: 50%;
            transform: translateY(-50%);
            background: #333;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .whatsapp-tooltip::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -5px;
            transform: translateY(-50%);
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent transparent #333;
        }

        .whatsapp-btn:hover + .whatsapp-tooltip {
            opacity: 1;
            visibility: visible;
        }

        /*  */
        <style>
    /* ===== MOBILE RESPONSIVE FIX ===== */
    /* Pastikan container tidak overflow di mobile */
    @media (max-width: 768px) {
        .container, .container-fluid {
            max-width: 100% !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
            overflow-x: hidden !important;
        }

        /* Force responsive behavior */
        html, body {
            width: 100% !important;
            max-width: 100% !important;
            overflow-x: hidden !important;
            position: relative;
        }

        /* Fix untuk row dan column */
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .row > * {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        /* Pastikan images responsive */
        img {
            max-width: 100% !important;
            height: auto !important;
        }

        /* Text size untuk mobile */
        h1 { font-size: 1.8rem !important; }
        h2 { font-size: 1.5rem !important; }
        h3 { font-size: 1.3rem !important; }
        .display-1 { font-size: 2.5rem !important; }
        .display-2 { font-size: 2.2rem !important; }
        .display-3 { font-size: 1.9rem !important; }
        .display-4 { font-size: 1.6rem !important; }
    }

    /* ===== FIX UNTUK FLOATING WHATSAPP DI MOBILE ===== */
    @media (max-width: 768px) {
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

        .whatsapp-tooltip {
            display: none; /* Sembunyikan tooltip di mobile */
        }
    }
</style>
    </style>
