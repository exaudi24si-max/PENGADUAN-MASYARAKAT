@extends('layouts.guest.app')

@section('content')
    {{-- Data Warga --}}
    <div class="site-section" id="warga-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-7 text-center mb-5">
                    <h2 class="section-title">Data Warga</h2>
                    <p>Daftar warga yang terdaftar dalam sistem.</p>
                </div>
            </div>

            {{-- Tombol Tambah Data --}}
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <a href="{{ route('warga.create') }}" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-user-plus me-2"></i>Tambah Data Warga
                    </a>
                </div>
            </div>

            {{-- SEARCH & FILTER FORM --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="GET" action="{{ route('warga.index') }}">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="search" class="form-label">Pencarian</label>
                                        <input type="text" name="search" id="search" class="form-control"
                                               value="{{ request('search') }}" placeholder="Cari nama, email, No HP, pekerjaan...">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="">Semua Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="agama" class="form-label">Agama</label>
                                        <select name="agama" id="agama" class="form-control">
                                            <option value="">Semua Agama</option>
                                            @foreach($agamaList as $agama)
                                                <option value="{{ $agama }}"
                                                    {{ request('agama') == $agama ? 'selected' : '' }}>
                                                    {{ $agama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">&nbsp;</label>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search me-1"></i> Filter
                                            </button>
                                            <a href="{{ route('warga.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-refresh me-1"></i> Reset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Data dari database menggunakan pagination --}}
                @foreach ($wargas as $warga)
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                {{-- Avatar/Icon berdasarkan jenis kelamin --}}
                                <div class="mb-3">
                                    <div
                                        class="avatar-circle {{ $warga->jenis_kelamin == 'Laki-laki' ? 'bg-primary' : 'bg-pink' }} mx-auto">
                                        <i
                                            class="fas {{ $warga->jenis_kelamin == 'Laki-laki' ? 'fa-male' : 'fa-female' }} text-white"></i>
                                    </div>
                                </div>

                                <h5 class="card-title text-primary mb-2">{{ $warga->nama }}</h5>

                                <div class="warga-info">
                                    <div class="info-item mb-2">
                                        <i class="fas fa-briefcase text-muted me-2"></i>
                                        <span class="text-muted">{{ $warga->pekerjaan ?? 'Belum diisi' }}</span>
                                    </div>

                                    <div class="info-item mb-2">
                                        <i class="fas fa-pray text-muted me-2"></i>
                                        <span class="text-muted">{{ $warga->agama ?? 'Belum diisi' }}</span>
                                    </div>

                                    <div class="info-item mb-2">
                                        <i
                                            class="fas {{ $warga->jenis_kelamin == 'Laki-laki' ? 'fa-mars text-primary' : 'fa-venus text-pink' }} me-2"></i>
                                        <span class="text-muted">
                                            {{ $warga->jenis_kelamin }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-top-0 pt-0">
                                <div class="contact-info text-center">
                                    @if ($warga->email)
                                        <div class="mb-1">
                                            <small class="text-muted">
                                                <i class="fas fa-envelope me-1"></i>
                                                {{ Str::limit($warga->email, 20) }}
                                            </small>
                                        </div>
                                    @endif

                                    @if ($warga->No_Hp)
                                        <div>
                                            <small class="text-muted">
                                                <i class="fas fa-phone me-1"></i>
                                                {{ $warga->No_Hp }}
                                            </small>
                                        </div>
                                    @endif
                                </div>

                                {{-- Action Buttons --}}
                                <div class="btn-group w-100 mt-3" role="group">
                                    {{-- Button Edit dengan route Laravel --}}
                                    <a href="{{ route('warga.edit', $warga->warga_id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- Button Delete dengan form --}}
                                    <form action="{{ route('warga.destroy', $warga->warga_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data warga ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Fallback jika tidak ada data --}}
                @if ($wargas->count() == 0)
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">Belum Ada Data Warga</h4>
                            <p class="text-muted">Klik tombol "Tambah Data Warga" di atas untuk menambahkan data pertama</p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- =============================== --}}
            {{-- PAGINATION BOOTSTRAP 5 --}}
            {{-- =============================== --}}
            @if ($wargas->count() > 0)
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-center">
                            <div class="mt-3">
                                {{ $wargas->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Info jumlah data --}}
            @if ($wargas->count() > 0)
                <div class="row justify-content-center mt-3">
                    <div class="col-md-8">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>
                            Menampilkan <strong>{{ $wargas->firstItem() }} - {{ $wargas->lastItem() }}</strong>
                            dari <strong>{{ $wargas->total() }}</strong> data warga
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .avatar-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .bg-pink {
            background: linear-gradient(135deg, #ec407a 0%, #d81b60 100%);
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
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

        .info-item {
            display: flex;
            align-items: center;
            justify-content: center;
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
        }

        /* Style untuk pagination Bootstrap 5 */
        .pagination {
            margin-bottom: 0;
        }
    </style>
@endpush
