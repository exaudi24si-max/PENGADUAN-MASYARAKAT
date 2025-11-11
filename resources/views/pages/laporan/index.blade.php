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
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <a href="{{ route('laporans.create') }}" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-plus me-2"></i>Buat Laporan Baru
                    </a>
                </div>
            </div>

            <div class="row">
                @foreach ($laporans as $laporan)
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                {{-- Header dengan Judul dan Status --}}
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title text-primary">{{ Str::limit($laporan->judul, 40) }}</h5>
                                    <span class="badge
                                        @if($laporan->status == 'selesai') bg-success
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
                                            {{ $laporan->rt ? 'RT ' . $laporan->rt : '' }} {{ $laporan->rw ? 'RW ' . $laporan->rw : '' }}
                                        </small>
                                    </div>

                                    {{-- Email --}}
                                    @if($laporan->email_pelapor)
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="fas fa-envelope me-1"></i>
                                            {{ Str::limit($laporan->email_pelapor, 25) }}
                                        </small>
                                    </div>
                                    @endif

                                    {{-- Lokasi Text --}}
                                    @if($laporan->lokasi_text)
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
                                    {{-- Button Edit --}}
                                    <a href="{{ route('laporans.edit', $laporan->pengaduan_id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- Button Delete --}}
                                    <form action="{{ route('laporans.destroy', $laporan->pengaduan_id) }}" method="POST" class="d-inline">
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
                            <h4 class="text-muted">Belum Ada Laporan</h4>
                            <p class="text-muted">Klik tombol "Buat Laporan Baru" untuk membuat laporan pertama</p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Info jumlah data --}}
            @if ($laporans->count() > 0)
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>
                            Menampilkan <strong>{{ $laporans->count() }}</strong> laporan pengaduan
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

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

        .badge {
            font-size: 0.7rem;
            padding: 0.3em 0.6em;
        }

        .btn-group {
            display: flex;
            gap: 1px;
        }

        .btn-group .btn,
        .btn-group form {
            flex: 1;
        }

        .btn-group .btn {
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            font-size: 0.8rem;
        }

        .btn-group .btn:first-child {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }

        .btn-group .btn:last-child {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

        .btn-group form button {
            width: 100%;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            font-size: 0.8rem;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .border-top {
            border-color: #e9ecef !important;
        }
    </style>
@endpush
