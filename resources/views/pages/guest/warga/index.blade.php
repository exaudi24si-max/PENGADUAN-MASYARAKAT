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

            <div class="row">
                {{-- Data dari database --}}
                @php
                    // Ambil data warga terbaru dari database
                    $wargaTerkini = DB::table('warga')->orderBy('created_at', 'desc')->take(6)->get();
                @endphp

                @foreach ($wargaTerkini as $warga)
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                {{-- Avatar/Icon berdasarkan jenis kelamin --}}
                                <div class="mb-3">
                                    <div
                                        class="avatar-circle {{ $warga->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-pink' }} mx-auto">
                                        <i
                                            class="fas {{ $warga->jenis_kelamin == 'L' ? 'fa-male' : 'fa-female' }} text-white"></i>
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
                                            class="fas {{ $warga->jenis_kelamin == 'L' ? 'fa-mars text-primary' : 'fa-venus text-pink' }} me-2"></i>
                                        <span class="text-muted">
                                            {{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
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
                                    <button class="btn btn-sm btn-outline-primary"
                                        onclick="editWarga({{ $warga->warga_id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        onclick="deleteWarga({{ $warga->warga_id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Fallback jika tidak ada data --}}
                @if ($wargaTerkini->count() == 0)
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">Belum Ada Data Warga</h4>
                            <p class="text-muted">Silakan tambahkan data warga pertama</p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Form tambah warga --}}
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="text-center mb-4">
                        <h3 class="section-title">Tambah Data Warga Baru</h3>
                        <p class="text-muted">Isi form berikut untuk menambahkan data warga baru</p>
                    </div>

                    <form action="{{ route('warga.store') }}" method="POST" class="p-5 bg-white shadow-sm rounded">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fas fa-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                Terdapat kesalahan dalam pengisian form. Silakan cek kembali.
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap *</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin *</label>
                                    <select name="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select name="agama" class="form-control @error('agama') is-invalid @enderror">
                                        <option value="">-- Pilih Agama --</option>
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik
                                        </option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha
                                        </option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>
                                            Konghucu</option>
                                    </select>
                                    @error('agama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan"
                                        class="form-control @error('pekerjaan') is-invalid @enderror"
                                        value="{{ old('pekerjaan') }}" placeholder="Contoh: Pegawai Swasta, Wiraswasta">
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="alamat@email.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="No_Hp" class="form-label">No. Handphone</label>
                                    <input type="tel" name="No_Hp"
                                        class="form-control @error('No_Hp') is-invalid @enderror"
                                        value="{{ old('No_Hp') }}" placeholder="08xxxxxxxxxx">
                                    @error('No_Hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-user-plus me-2"></i>Tambah Warga
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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

        .btn-group .btn {
            border-radius: 0;
        }

        .btn-group .btn:first-child {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }

        .btn-group .btn:last-child {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function editWarga(id) {
            // Redirect ke halaman edit
            window.location.href = '/warga/' + id + '/edit';
        }

        function deleteWarga(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data warga ini?')) {
                // Submit form delete
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/warga/' + id;

                const csrf = document.createElement('input');
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                form.appendChild(csrf);

                const method = document.createElement('input');
                method.name = '_method';
                method.value = 'DELETE';
                form.appendChild(method);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endpush
