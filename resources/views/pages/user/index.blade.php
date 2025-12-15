@extends('layouts.guest.app')

@section('content')
    {{-- Data Users --}}
    <div class="site-section" id="users-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-7 text-center mb-5">
                    <h2 class="section-title">Data Users</h2>
                    <p>Daftar user yang terdaftar dalam sistem.</p>
                </div>
            </div>

            {{-- Tombol Tambah Data --}}
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-user-plus me-2"></i>Tambah User Baru
                    </a>
                </div>
            </div>

            {{-- SEARCH & FILTER FORM --}}
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="GET" action="{{ route('users.index') }}">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="search" class="form-label">Pencarian</label>
                                        <input type="text" name="search" id="search" class="form-control"
                                            value="{{ request('search') }}" placeholder="Cari nama atau email...">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="">Semua Role</option>
                                            @foreach ($roleList as $role)
                                                <option value="{{ $role }}"
                                                    {{ request('role') == $role ? 'selected' : '' }}>
                                                    {{ ucfirst($role) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">&nbsp;</label>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search me-1"></i> Filter
                                            </button>
                                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
                @foreach ($users as $user)
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                {{-- Avatar/Foto Profil --}}
                                <div class="mb-3">
                                    <div class="mx-auto" style="width: 100px; height: 100px;">
                                        <img src="{{ $user->profile_picture
                                            ? asset('storage/' . $user->profile_picture)
                                            : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                            class="rounded-circle border"
                                            style="width: 100%; height: 100%; object-fit: cover; border-width: 3px !important;"
                                            alt="{{ $user->name }}"
                                            onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background={{ $user->role == 'admin' ? 'DC2626' : ($user->role == 'staff' ? 'F59E0B' : '3B82F6') }}&color=fff&size=100'">
                                    </div>
                                </div>

                                <h5 class="card-title text-primary mb-2">{{ $user->name }}</h5>

                                <div class="user-info">
                                    <div class="info-item mb-2">
                                        <i class="fas fa-envelope text-muted me-2"></i>
                                        <span class="text-muted">{{ $user->email }}</span>
                                    </div>

                                    <div class="info-item mb-2">
                                        <i class="fas fa-user-tag text-muted me-2"></i>
                                        <span
                                            class="badge bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'staff' ? 'warning' : 'primary') }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </div>

                                    <div class="info-item mb-2">
                                        <i class="fas fa-calendar text-muted me-2"></i>
                                        <span class="text-muted">
                                            Bergabung: {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                                        </span>
                                    </div>

                                    @if ($user->profile_picture)
                                        <div class="info-item mb-2">
                                            <i class="fas fa-image text-muted me-2"></i>
                                            <span class="text-muted small">Memiliki foto profil</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-top-0 pt-0">
                                {{-- Action Buttons --}}
                                <div class="btn-group w-100 mt-3" role="group">
                                    {{-- Button Detail --}}
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>

                                    {{-- Button Edit --}}
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- Button Delete --}}
                                    @if ($user->id !== auth()->id())
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm btn-outline-secondary" disabled>
                                            <i class="fas fa-ban"></i> Diri Sendiri
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Fallback jika tidak ada data --}}
                @if ($users->count() == 0)
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">Belum Ada Data User</h4>
                            <p class="text-muted">Klik tombol "Tambah User Baru" di atas untuk menambahkan user pertama</p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- =============================== --}}
            {{-- PAGINATION BOOTSTRAP 5 --}}
            {{-- =============================== --}}
            @if ($users->count() > 0)
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-center">
                            <div class="mt-3">
                                {{ $users->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Info jumlah data --}}
            @if ($users->count() > 0)
                <div class="row justify-content-center mt-3">
                    <div class="col-md-8">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>
                            Menampilkan <strong>{{ $users->firstItem() }} - {{ $users->lastItem() }}</strong>
                            dari <strong>{{ $users->total() }}</strong> user
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

        /* Style untuk foto profil */
        .border {
            border-color: #dee2e6 !important;
        }

        .border:hover {
            border-color: #007bff !important;
        }
    </style>
@endpush
