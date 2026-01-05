@extends('layouts.guest.app')

@section('content')
    <div class="site-section" id="laporan-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-7 text-center mb-5">
                    <h2 class="section-title">Data Laporan Pengaduan</h2>
                    <p>Daftar semua laporan dan pengaduan masyarakat</p>
                </div>
            </div>

            {{-- Tombol Tambah Data --}}
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <a href="{{ route('laporans.create') }}" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-plus me-2"></i>Buat Laporan Baru
                    </a>
                </div>
            </div>

            {{-- ✅ SEARCH & FILTER FORM --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('laporans.index') }}" method="GET" class="row g-3">
                                {{-- Search Input --}}
                                <div class="col-md-4">
                                    <label for="search" class="form-label">Pencarian</label>
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Cari judul, deskripsi, nomor tiket..." value="{{ request('search') }}">
                                </div>

                                {{-- Status Filter --}}
                                <div class="col-md-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Semua Status</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}"
                                                {{ request('status') == $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Kategori Filter --}}
                                <div class="col-md-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        <option value="">Semua Kategori</option>
                                        @foreach ($kategories as $kategori)
                                            <option value="{{ $kategori->kategori_id }}"
                                                {{ request('kategori') == $kategori->kategori_id ? 'selected' : '' }}>
                                                {{ $kategori->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Action Buttons --}}
                                <div class="col-md-2 d-flex align-items-end">
                                    <div class="d-grid gap-2 w-100">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search me-1"></i> Terapkan
                                        </button>
                                        <a href="{{ route('laporans.index') }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-refresh me-1"></i> Reset
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ✅ SORTING OPTIONS --}}
            @if ($laporans->count() > 0)
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Menampilkan {{ $laporans->firstItem() }} - {{ $laporans->lastItem() }} dari
                                {{ $laporans->total() }} laporan
                            </small>
                            <div class="d-flex align-items-center gap-2">
                                <small class="text-muted">Urutkan:</small>
                                <select class="form-select form-select-sm" style="width: auto;"
                                    onchange="window.location.href = this.value">
                                    <option
                                        value="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'sort_order' => 'desc']) }}"
                                        {{ request('sort_by', 'created_at') == 'created_at' && request('sort_order', 'desc') == 'desc' ? 'selected' : '' }}>
                                        Terbaru
                                    </option>
                                    <option
                                        value="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'sort_order' => 'asc']) }}"
                                        {{ request('sort_by') == 'created_at' && request('sort_order') == 'asc' ? 'selected' : '' }}>
                                        Terlama
                                    </option>
                                    <option
                                        value="{{ request()->fullUrlWithQuery(['sort_by' => 'judul', 'sort_order' => 'asc']) }}"
                                        {{ request('sort_by') == 'judul' ? 'selected' : '' }}>
                                        Judul A-Z
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                @foreach ($laporans as $laporan)
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                {{-- Header dengan Judul dan Status --}}
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title text-primary">{{ Str::limit($laporan->judul, 40) }}</h5>
                                    <span
                                        class="badge
                                        @if ($laporan->status == 'selesai') bg-success
                                        @elseif($laporan->status == 'proses') bg-warning
                                        @elseif($laporan->status == 'ditolak') bg-danger
                                        @else bg-secondary @endif">
                                        {{ ucfirst($laporan->status) }}
                                    </span>
                                </div>

                                {{-- Nomor Tiket --}}
                                <p class="card-text text-muted mb-2">
                                    <small>
                                        <i class="fas fa-ticket-alt me-1"></i>
                                        <strong>{{ $laporan->nomor_tiket }}</strong>
                                    </small>
                                </p>

                                {{-- Kategori --}}
                                <p class="card-text text-muted mb-2">
                                    <small>
                                        <i class="fas fa-tag me-1"></i>
                                        {{ $laporan->kategori_nama }}
                                    </small>
                                </p>

                                <!-- ✅ MODIFIKASI: Tambah foto di card -->
                                {{-- Foto --}}
                                @php
                                    $fotos = $laporan->foto ? json_decode($laporan->foto, true) : [];
                                @endphp

                                @if (!empty($fotos))
                                    <div class="mb-3">
                                        <div class="foto-card position-relative">
                                            <img src="{{ asset('storage/' . $fotos[0]) }}" alt="Foto Laporan"
                                                class="img-fluid w-100 h-100">

                                            @if (count($fotos) > 1)
                                                <span class="badge bg-dark position-absolute top-0 end-0 m-2">
                                                    +{{ count($fotos) - 1 }} foto
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                {{-- Deskripsi --}}
                                <p class="card-text">{{ Str::limit($laporan->deskripsi, 120) }}</p>

                                {{-- Informasi Pelapor --}}
                                <div class="border-top pt-3 mt-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted">
                                            <i class="fas fa-user me-1"></i>
                                            {{ Str::limit($laporan->nama_pelapor, 20) }}
                                        </small>
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            {{ \Carbon\Carbon::parse($laporan->created_at)->format('d M Y') }}
                                        </small>
                                    </div>

                                    {{-- Kontak dan Lokasi --}}
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-phone me-1"></i>
                                            {{ $laporan->no_telepon ?: '-' }}
                                        </small>
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $laporan->rt ? 'RT ' . $laporan->rt : '' }}
                                            {{ $laporan->rw ? 'RW ' . $laporan->rw : '' }}
                                        </small>
                                    </div>

                                    {{-- Email --}}
                                    @if ($laporan->email_pelapor)
                                        <div class="mt-2">
                                            <small class="text-muted">
                                                <i class="fas fa-envelope me-1"></i>
                                                {{ Str::limit($laporan->email_pelapor, 25) }}
                                            </small>
                                        </div>
                                    @endif

                                    {{-- Lokasi Text --}}
                                    @if ($laporan->lokasi_text)
                                        <div class="mt-2">
                                            <small class="text-muted">
                                                <i class="fas fa-location-arrow me-1"></i>
                                                {{ Str::limit($laporan->lokasi_text, 30) }}
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="card-footer bg-transparent border-top-0 pt-0">
                                <div class="btn-group w-100" role="group">
                                    {{-- Button View --}}
                                    <a href="{{ route('laporans.show', $laporan->pengaduan_id) }}"
                                        class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>

                                    {{-- Button Edit --}}
                                    <a href="{{ route('laporans.edit', $laporan->pengaduan_id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- Button Delete --}}
                                    <form action="{{ route('laporans.destroy', $laporan->pengaduan_id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Fallback jika tidak ada data --}}
                @if ($laporans->count() == 0)
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">
                                @if (request()->has('search') || request()->has('status') || request()->has('kategori'))
                                    Tidak ada laporan yang sesuai dengan filter
                                @else
                                    Belum Ada Laporan
                                @endif
                            </h4>
                            <p class="text-muted">
                                @if (request()->has('search') || request()->has('status') || request()->has('kategori'))
                                    Coba ubah kriteria pencarian atau filter
                                @else
                                    Klik tombol "Buat Laporan Baru" untuk membuat laporan pertama
                                @endif
                            </p>
                            @if (request()->has('search') || request()->has('status') || request()->has('kategori'))
                                <a href="{{ route('laporans.index') }}" class="btn btn-primary">
                                    <i class="fas fa-refresh me-1"></i> Tampilkan Semua Laporan
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            {{-- ✅ PAGINATION --}}
            @if ($laporans->hasPages())
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-center">
                            {{ $laporans->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            @endif

            {{-- Info jumlah data --}}
            @if ($laporans->count() > 0)
                <div class="row justify-content-center mt-3">
                    <div class="col-md-8">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>
                            Menampilkan <strong>{{ $laporans->count() }}</strong> dari
                            <strong>{{ $laporans->total() }}</strong> laporan pengaduan
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

{{-- Keep your existing styles --}}
@push('styles')
<style>
    /* ====== GENERAL ====== */
    .section-title {
        position: relative;
        padding-bottom: 12px;
        margin-bottom: 25px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    /* ====== CARD DETAIL ====== */
    .detail-card {
        border-radius: 12px;
        border: 1px solid #e9ecef;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    .detail-card .card-header {
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        font-weight: 600;
    }

    /* ====== STATUS BADGE ====== */
    .badge-status {
        font-size: 0.75rem;
        padding: 6px 10px;
        border-radius: 20px;
    }

    /* ====== GALERI FOTO ====== */
    .gallery-wrapper {
        margin-top: 15px;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 12px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        border: 1px solid #dee2e6;
        background: #f1f3f5;
        height: 140px;
        cursor: pointer;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.08);
    }

    .gallery-item::after {
        content: '🔍 Lihat';
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
        color: #fff;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover::after {
        opacity: 1;
    }

    /* ====== INFO LIST ====== */
    .info-list small {
        display: block;
        margin-bottom: 8px;
        color: #6c757d;
    }

    .info-list i {
        width: 18px;
    }
</style>
@endpush

