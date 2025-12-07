@extends('layouts.guest.app')

@section('content')
    <div class="site-section" id="laporan-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="text-center mb-4">
                        <h2 class="section-title">Detail Laporan Pengaduan</h2>
                        <p class="text-muted">Informasi lengkap laporan pengaduan</p>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">
                                <i class="fas fa-file-alt me-2"></i>
                                {{ $laporan->judul }}
                            </h4>
                        </div>

                        <div class="card-body">
                            {{-- Info Nomor Tiket --}}
                            <div class="alert alert-info mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <i class="fas fa-ticket-alt me-2"></i>
                                        <strong>Nomor Tiket:</strong> {{ $laporan->nomor_tiket }}
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <span
                                            class="badge
                                            @if ($laporan->status == 'selesai') bg-success
                                            @elseif($laporan->status == 'proses') bg-warning
                                            @elseif($laporan->status == 'ditolak') bg-danger
                                            @else bg-secondary @endif fs-6">
                                            Status: {{ ucfirst($laporan->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- Kolom Kiri: Data Utama --}}
                                <div class="col-md-7">
                                    {{-- Kategori --}}
                                    <div class="mb-4">
                                        <h6 class="text-primary">
                                            <i class="fas fa-tag me-2"></i>Kategori
                                        </h6>
                                        <p class="ps-4">
                                            {{ $laporan->kategori_nama ?? ($laporan->Kategori_nama ?? 'Tidak ada kategori') }}
                                        </p>
                                    </div>

                                    {{-- Deskripsi --}}
                                    <div class="mb-4">
                                        <h6 class="text-primary">
                                            <i class="fas fa-align-left me-2"></i>Deskripsi
                                        </h6>
                                        <div class="ps-4">
                                            <p style="white-space: pre-line;">{{ $laporan->deskripsi }}</p>
                                        </div>
                                    </div>

                                    {{-- Data Pelapor --}}
                                    <div class="mb-4">
                                        <h6 class="text-primary">
                                            <i class="fas fa-user me-2"></i>Data Pelapor
                                        </h6>
                                        <div class="row ps-4">
                                            <div class="col-md-6">
                                                <p><strong>Nama:</strong><br>{{ $laporan->nama_pelapor }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Email:</strong><br>{{ $laporan->email_pelapor ?: '-' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Telepon:</strong><br>{{ $laporan->no_telepon ?: '-' }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Lokasi --}}
                                    <div class="mb-4">
                                        <h6 class="text-primary">
                                            <i class="fas fa-map-marker-alt me-2"></i>Lokasi Kejadian
                                        </h6>
                                        <div class="row ps-4">
                                            <div class="col-md-6">
                                                <p><strong>Alamat:</strong><br>{{ $laporan->lokasi_text ?: '-' }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong>RT:</strong><br>{{ $laporan->rt ?: '-' }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong>RW:</strong><br>{{ $laporan->rw ?: '-' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Kolom Kanan: Foto dan Info Tambahan --}}
                                <div class="col-md-5">
                                    {{-- Foto --}}
                                    <div class="mb-4">
                                        <h6 class="text-primary">
                                            <i class="fas fa-camera me-2"></i>Foto Pendukung
                                        </h6>
                                        <div class="ps-4">
                                            @if ($laporan->foto)
                                                <div class="text-center">
                                                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Laporan"
                                                        class="img-fluid rounded shadow" style="max-height: 300px;">
                                                    <div class="mt-2">
                                                        <a href="{{ asset('storage/' . $laporan->foto) }}" target="_blank"
                                                            class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-external-link-alt me-1"></i> Lihat Full Size
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="alert alert-light text-center">
                                                    <i class="fas fa-image fa-2x text-muted mb-2"></i>
                                                    <p class="mb-0">Tidak ada foto yang diunggah</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Info Tambahan --}}
                                    <div class="card border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="text-primary">
                                                <i class="fas fa-info-circle me-2"></i>Informasi Tambahan
                                            </h6>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2">
                                                    <i class="fas fa-calendar me-2 text-muted"></i>
                                                    <strong>Dibuat:</strong>
                                                    {{ \Carbon\Carbon::parse($laporan->created_at)->format('d F Y H:i') }}
                                                </li>
                                                <li>
                                                    <i class="fas fa-history me-2 text-muted"></i>
                                                    <strong>Terakhir Diupdate:</strong>
                                                    {{ \Carbon\Carbon::parse($laporan->updated_at)->format('d F Y H:i') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Footer dengan Tombol Action --}}
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('laporans.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('laporans.edit', $laporan->pengaduan_id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit me-2"></i>Edit Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .section-title {
            position: relative;
            padding-bottom: 15px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            border-radius: 10px 10px 0 0 !important;
        }

        h6.text-primary {
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }

        .alert-light {
            background-color: #f8f9fa;
            border: 1px dashed #dee2e6;
        }
    </style>
@endpush
