@extends('layouts.guest.app')

@section('content')
    <div class="site-section" id="laporan-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center mb-4">
                        <h2 class="section-title">Edit Laporan</h2>
                        <p class="text-muted">Update data laporan pengaduan</p>
                    </div>

                    <!-- ✅ MODIFIKASI: Tambah enctype untuk upload file -->
                    <form action="{{ route('laporans.update', $laporan->pengaduan_id) }}" method="POST"
                        class="p-5 bg-white shadow-sm rounded" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fas fa-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Info Nomor Tiket --}}
                        <div class="alert alert-info">
                            <i class="fas fa-ticket-alt me-2"></i>
                            <strong>Nomor Tiket:</strong> {{ $laporan->nomor_tiket }}
                        </div>

                        {{-- Data Pelapor --}}
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-user me-2"></i>Data Pelapor
                                </h5>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nama_pelapor" class="form-label">Nama Pelapor *</label>
                                    <input type="text" name="nama_pelapor"
                                        class="form-control @error('nama_pelapor') is-invalid @enderror"
                                        value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}" required>
                                    @error('nama_pelapor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="email_pelapor" class="form-label">Email</label>
                                    <input type="email" name="email_pelapor"
                                        class="form-control @error('email_pelapor') is-invalid @enderror"
                                        value="{{ old('email_pelapor', $laporan->email_pelapor) }}">
                                    @error('email_pelapor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="no_telepon" class="form-label">No. Telepon</label>
                                    <input type="text" name="no_telepon"
                                        class="form-control @error('no_telepon') is-invalid @enderror"
                                        value="{{ old('no_telepon', $laporan->no_telepon) }}">
                                    @error('no_telepon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Data Laporan --}}
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-file-alt me-2"></i>Data Laporan
                                </h5>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kategori_id" class="form-label">Kategori *</label>
                                    <select name="kategori_id"
                                        class="form-control @error('kategori_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategories as $kategori)
                                            <option value="{{ $kategori->kategori_id }}"
                                                {{ old('kategori_id', $laporan->kategori_id) == $kategori->kategori_id ? 'selected' : '' }}>
                                                {{ $kategori->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Status *</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror"
                                        required>
                                        <option value="baru"
                                            {{ old('status', $laporan->status) == 'baru' ? 'selected' : '' }}>Baru</option>
                                        <option value="proses"
                                            {{ old('status', $laporan->status) == 'proses' ? 'selected' : '' }}>Proses
                                        </option>
                                        <option value="selesai"
                                            {{ old('status', $laporan->status) == 'selesai' ? 'selected' : '' }}>Selesai
                                        </option>
                                        <option value="ditolak"
                                            {{ old('status', $laporan->status) == 'ditolak' ? 'selected' : '' }}>Ditolak
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-map-marker-alt me-2"></i>Lokasi Kejadian
                                </h5>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lokasi_text" class="form-label">Alamat/Lokasi</label>
                                    <input type="text" name="lokasi_text"
                                        class="form-control @error('lokasi_text') is-invalid @enderror"
                                        value="{{ old('lokasi_text', $laporan->lokasi_text) }}">
                                    @error('lokasi_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <input type="text" name="rt"
                                        class="form-control @error('rt') is-invalid @enderror"
                                        value="{{ old('rt', $laporan->rt) }}">
                                    @error('rt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="rw" class="form-label">RW</label>
                                    <input type="text" name="rw"
                                        class="form-control @error('rw') is-invalid @enderror"
                                        value="{{ old('rw', $laporan->rw) }}">
                                    @error('rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group mb-4">
                            <label for="judul" class="form-label">Judul Laporan *</label>
                            <input type="text" name="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $laporan->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="deskripsi" class="form-label">Deskripsi Lengkap *</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30"
                                rows="5" required>{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- ✅ MODIFIKASI: Tambah section untuk foto -->
                        {{-- Foto --}}
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-camera me-2"></i>Foto Pendukung
                                </h5>
                            </div>

                            <div class="col-12">
                                {{-- Foto Saat Ini --}}
                                @if ($laporan->foto)
                                    <div class="mb-3">
                                        <label class="form-label d-block">Foto Saat Ini:</label>
                                        <div class="d-flex align-items-start gap-3 flex-wrap">
                                            <div class="position-relative">
                                                <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Laporan"
                                                    class="img-thumbnail" style="max-width: 250px; max-height: 250px;">
                                            </div>
                                            <div class="mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="hapus_foto_existing" id="hapus_foto_existing">
                                                    <label class="form-check-label text-danger" for="hapus_foto_existing">
                                                        <i class="fas fa-trash me-1"></i> Hapus foto ini
                                                    </label>
                                                </div>
                                                <small class="text-muted d-block mt-2">
                                                    <i class="fas fa-info-circle"></i>
                                                    {{ pathinfo($laporan->foto, PATHINFO_BASENAME) }}
                                                </small>
                                                <a href="{{ asset('storage/' . $laporan->foto) }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary mt-2">
                                                    <i class="fas fa-external-link-alt"></i> Lihat Full Size
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-light mb-3">
                                        <i class="fas fa-info-circle"></i> Tidak ada foto yang diunggah
                                    </div>
                                @endif

                                {{-- Input Unggah Foto Baru --}}
                                <div class="form-group mb-3">
                                    <label for="foto" class="form-label">Ubah/Ganti Foto (Opsional)</label>
                                    <input type="file" name="foto"
                                        class="form-control @error('foto') is-invalid @enderror" id="foto"
                                        accept="image/*">
                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengubah foto. Format: JPEG, PNG, JPG, GIF, WEBP | Maksimal: 5MB
                                    </small>
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Preview Foto Baru --}}
                                <div id="preview-container" class="mt-2" style="display: none;">
                                    <label class="form-label d-block">Preview Foto Baru:</label>
                                    <img id="preview" src="#" alt="Preview Foto Baru" class="img-thumbnail"
                                        style="max-width: 200px;">
                                    <button type="button" id="remove-preview" class="btn btn-sm btn-danger mt-2">
                                        <i class="fas fa-times"></i> Hapus Preview
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Update Laporan
                            </button>
                            <a href="{{ route('laporans.index') }}" class="btn btn-secondary btn-lg px-5">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- ✅ MODIFIKASI: Tambah script untuk preview foto -->
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fotoInput = document.getElementById('foto');
            const previewContainer = document.getElementById('preview-container');
            const preview = document.getElementById('preview');
            const removePreviewBtn = document.getElementById('remove-preview');

            if (fotoInput) {
                fotoInput.addEventListener('change', function(e) {
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            previewContainer.style.display = 'block';
                        }

                        reader.readAsDataURL(this.files[0]);
                    } else {
                        previewContainer.style.display = 'none';
                    }
                });
            }

            if (removePreviewBtn) {
                removePreviewBtn.addEventListener('click', function() {
                    if (fotoInput) {
                        fotoInput.value = '';
                    }
                    preview.src = '#';
                    previewContainer.style.display = 'none';
                });
            }
        });
    </script>
@endpush
