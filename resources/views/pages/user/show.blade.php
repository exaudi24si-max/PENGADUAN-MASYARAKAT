@extends('layouts.guest.app')

@section('title', 'Detail User - ' . $user->name)

@section('content')
    <div class="site-section" id="users-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center mb-4">
                        <h2 class="section-title">Detail User</h2>
                        <p class="text-muted">Informasi lengkap tentang user</p>

                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar User
                        </a>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                {{-- Foto Profil --}}
                                <div class="col-md-4 text-center mb-4 mb-md-0">
                                    <div class="mb-3">
                                        <img src="{{ $user->profile_picture_url }}"
                                             class="img-thumbnail rounded-circle border"
                                             style="width: 200px; height: 200px; object-fit: cover;"
                                             alt="Foto Profil {{ $user->name }}"
                                             onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background={{ $user->role == 'admin' ? 'DC2626' : ($user->role == 'staff' ? 'F59E0B' : '3B82F6') }}&color=fff&size=200'">
                                    </div>

                                    @if($user->profile_picture)
                                        <div class="alert alert-info small">
                                            <i class="fas fa-info-circle me-1"></i>
                                            User memiliki foto profil
                                        </div>
                                    @else
                                        <div class="alert alert-warning small">
                                            <i class="fas fa-exclamation-triangle me-1"></i>
                                            User belum upload foto profil
                                        </div>
                                    @endif
                                </div>

                                {{-- Informasi User --}}
                                <div class="col-md-8">
                                    <h4 class="text-primary mb-4">{{ $user->name }}</h4>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="info-box">
                                                <div class="info-label">
                                                    <i class="fas fa-envelope text-primary me-2"></i>
                                                    <strong>Email:</strong>
                                                </div>
                                                <div class="info-value">{{ $user->email }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="info-box">
                                                <div class="info-label">
                                                    <i class="fas fa-user-tag text-primary me-2"></i>
                                                    <strong>Role:</strong>
                                                </div>
                                                <div class="info-value">
                                                    <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'staff' ? 'warning' : 'primary') }}">
                                                        {{ ucfirst($user->role) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="info-box">
                                                <div class="info-label">
                                                    <i class="fas fa-calendar text-primary me-2"></i>
                                                    <strong>Bergabung:</strong>
                                                </div>
                                                <div class="info-value">
                                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d F Y') }}
                                                    <small class="text-muted">({{ $user->created_at->diffForHumans() }})</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="info-box">
                                                <div class="info-label">
                                                    <i class="fas fa-sync-alt text-primary me-2"></i>
                                                    <strong>Terakhir Update:</strong>
                                                </div>
                                                <div class="info-value">
                                                    {{ \Carbon\Carbon::parse($user->updated_at)->format('d F Y') }}
                                                    <small class="text-muted">({{ $user->updated_at->diffForHumans() }})</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="info-box">
                                                <div class="info-label">
                                                    <i class="fas fa-id-badge text-primary me-2"></i>
                                                    <strong>ID User:</strong>
                                                </div>
                                                <div class="info-value">{{ $user->id }}</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="info-box">
                                                <div class="info-label">
                                                    <i class="fas fa-image text-primary me-2"></i>
                                                    <strong>Status Foto:</strong>
                                                </div>
                                                <div class="info-value">
                                                    @if($user->profile_picture)
                                                        <span class="badge bg-success">
                                                            <i class="fas fa-check me-1"></i>Ada
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary">
                                                            <i class="fas fa-times me-1"></i>Tidak Ada
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Statistik (bisa ditambahkan nanti) --}}
                                    <div class="mt-4 pt-3 border-top">
                                        <h5 class="mb-3">Statistik</h5>
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <div class="stat-box">
                                                    <div class="stat-number text-primary">0</div>
                                                    <div class="stat-label">Laporan</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="stat-box">
                                                    <div class="stat-number text-success">Aktif</div>
                                                    <div class="stat-label">Status</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="stat-box">
                                                    <div class="stat-number text-info">-</div>
                                                    <div class="stat-label">Aktivitas</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit me-1"></i> Edit User
                                        </a>

                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                    <i class="fas fa-trash me-1"></i> Hapus User
                                                </button>
                                            </form>
                                        @endif

                                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-list me-1"></i> Semua User
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-muted text-center small">
                            <i class="fas fa-clock me-1"></i>
                            Data diambil pada: {{ now()->format('d F Y H:i:s') }}
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

        .info-box {
            padding: 10px;
            border-radius: 8px;
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
        }

        .info-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .stat-box {
            padding: 15px;
            border-radius: 10px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 1px solid #dee2e6;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .btn {
            min-width: 120px;
        }
    </style>
@endpush
