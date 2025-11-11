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

            <div class="row">
                {{-- Data dari database --}}
                @foreach ($users as $user)
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                {{-- Avatar/Icon --}}
                                <div class="mb-3">
                                    <div class="avatar-circle {{ $user->role == 'admin' ? 'bg-danger' : ($user->role == 'staff' ? 'bg-warning' : 'bg-primary') }} mx-auto">
                                        <i class="fas fa-user text-white"></i>
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
                                        <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'staff' ? 'warning' : 'primary') }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </div>

                                    <div class="info-item mb-2">
                                        <i class="fas fa-calendar text-muted me-2"></i>
                                        <span class="text-muted">
                                            Bergabung: {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-top-0 pt-0">
                                {{-- Action Buttons --}}
                                <div class="btn-group w-100 mt-3" role="group">
                                    {{-- Button Edit --}}
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- Button Delete --}}
                                    @if ($user->id !== auth()->id())
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
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

            {{-- Info jumlah data --}}
            @if ($users->count() > 0)
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>
                            Menampilkan <strong>{{ $users->count() }}</strong> user
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
    </style>
@endpush
