@extends('layouts.guest.scripts')
@section('content')

{{-- ================================================= --}}
{{-- ▼ MULAI BAGIAN PARTIALS/SCRIPTS.BLADE.PHP ▼ --}}
{{-- ================================================= --}}
<script src="{{ asset('pengaduan-masyarakat/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/jquery-ui.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/popper.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/aos.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/main.js') }}"></script>

<script src="{{ asset('pengaduan-masyarakat/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#28a745',
            timer: 3000,
            timerProgressBar: true
        });
    </script>
@endif

{{-- end script js --}}
{{-- =============================================== --}}
{{-- ▲ SELESAI BAGIAN PARTIALS/SCRIPTS.BLADE.PHP ▲ --}}
{{-- =============================================== --}}

@endsection
