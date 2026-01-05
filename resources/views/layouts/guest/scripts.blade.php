{{-- =============================================
| PARTIALS / FOOTER-SCRIPTS
| JAVASCRIPT ONLY
============================================= --}}

{{-- Bootstrap JS (WAJIB UNTUK DROPDOWN, MODAL, COLLAPSE) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

{{-- Vendor JS --}}
<script src="{{ asset('pengaduan-masyarakat/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/jquery-ui.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('pengaduan-masyarakat/js/aos.js') }}"></script>

{{-- Main JS --}}
<script src="{{ asset('pengaduan-masyarakat/js/main.js') }}"></script>


<script>
    function openWhatsAppModal() {
        const modal = new bootstrap.Modal(document.getElementById('whatsappModal'));
        modal.show();
    }

    function redirectToWhatsApp() {
        const phoneNumber = document.getElementById('whatsappOption').value;
        const message = document.getElementById('whatsappMessage').value;
        const encodedMessage = encodeURIComponent(message);
        const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

        window.open(whatsappUrl, '_blank');

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('whatsappModal'));
        modal.hide();
    }
</script>
