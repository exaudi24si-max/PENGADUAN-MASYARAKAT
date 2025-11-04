{{-- =============================================== --}}
{{-- ▼ MULAI BAGIAN PARTIALS/FOOTER.BLADE.PHP ▼ --}}
{{-- =============================================== --}}


    {{-- FLOATING WHATSAPP --}}
    <div class="floating-whatsapp">
        <button class="whatsapp-btn" onclick="openWhatsAppModal()">
            <i class="bi bi-whatsapp"></i>
        </button>
        <div class="whatsapp-tooltip">Hubungi via WhatsApp</div>
    </div>

    <!-- WhatsApp Modal -->
    <div class="modal fade" id="whatsappModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-whatsapp me-2"></i>Hubungi via WhatsApp
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih Tujuan:</label>
                        <select class="form-select" id="whatsappOption">
                            {{-- GANTI NOMOR DI SINI --}}
                            <option value="6281234567890">Customer Service</option>
                            <option value="6289876543210">Teknisi</option>
                            <option value="6281122334455">Admin Pengaduan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan Default:</label>
                        <textarea class="form-control" id="whatsappMessage" rows="3">Halo, saya ingin melaporkan sesuatu melalui sistem pengaduan masyarakat.</textarea>
                    </div>
                    <div class="form-text">
                        Klik tombol di bawah akan membuka WhatsApp dengan pesan yang telah disiapkan.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" onclick="redirectToWhatsApp()">
                        <i class="bi bi-whatsapp me-2"></i>Buka WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </div>

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
<footer class="site-footer bg-dark text-white py-5">
    <div class="container text-center">
        <h3 class="footer-title">Pengaduan & Aspirasi Masyarakat</h3>
        <p class="mb-3">Platform resmi untuk menyampaikan keluhan dan aspirasi masyarakat demi pelayanan
            publik yang lebih baik.</p>
        <p class="small mb-0">&copy; 2u025 Pengaduan Masyarakat. Semua Hak Dilindungi.</p>
    </div>
</footer>


{{-- end footer --}}
{{-- ============================================= --}}
{{-- ▲ SELESAI BAGIAN PARTIALS/FOOTER.BLADE.PHP ▲ --}}
{{-- ============================================= --}}
