    {{-- ============================================= --}}
    {{-- ▼ MULAI BAGIAN PARTIALS/HEAD.BLADE.PHP ▼ --}}
    {{-- ============================================= --}}
    <title>Pengaduan & Aspirasi Masyarakat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    </style>
