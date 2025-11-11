@extends('layouts.guest.app')

@section('content')
    <div class="site-section" id="warga-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center mb-4">
                        <h2 class="section-title">Edit Data Warga</h2>
                        <p class="text-muted">Update data warga yang sudah ada</p>
                    </div>

                    <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST"
                        class="p-5 bg-white shadow-sm rounded">
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
                                Terdapat kesalahan dalam pengisian form. Silakan cek kembali.
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap *</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $warga->nama) }}" placeholder="Masukkan nama lengkap"
                                        required>
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
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
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
                                        <option value="Islam"
                                            {{ old('agama', $warga->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen"
                                            {{ old('agama', $warga->agama) == 'Kristen' ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="Katolik"
                                            {{ old('agama', $warga->agama) == 'Katolik' ? 'selected' : '' }}>Katolik
                                        </option>
                                        <option value="Hindu"
                                            {{ old('agama', $warga->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha"
                                            {{ old('agama', $warga->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu"
                                            {{ old('agama', $warga->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                        </option>
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
                                        value="{{ old('pekerjaan', $warga->pekerjaan) }}"
                                        placeholder="Contoh: Pegawai Swasta, Wiraswasta">
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
                                        value="{{ old('email', $warga->email) }}" placeholder="alamat@email.com">
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
                                        value="{{ old('No_Hp', $warga->No_Hp) }}" placeholder="08xxxxxxxxxx">
                                    @error('No_Hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Update Data
                            </button>
                            <a href="{{ route('warga.index') }}" class="btn btn-secondary btn-lg px-5">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
