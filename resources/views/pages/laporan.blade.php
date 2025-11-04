@extends('layouts.guest.app')

@section('content')

{{-- laporan terkini --}}
<div class="site-section" id="report-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <h2 class="section-title">Laporan Terkini</h2>
                <p>Beberapa contoh laporan masyarakat yang telah ditindaklanjuti.</p>
            </div>
        </div>

        <div class="row">
            {{-- Data dari database --}}
            @php
                // Ambil data pengaduan terbaru dari database
                $laporanTerkini = DB::table('pengaduan')
                    ->join('kategori_pengaduan', 'pengaduan.kategori_id', '=', 'kategori_pengaduan.kategori_id')
                    ->select('pengaduan.*', 'kategori_pengaduan.nama as kategori_nama')
                    ->orderBy('pengaduan.created_at', 'desc')
                    ->take(3)
                    ->get();
            @endphp

            @foreach($laporanTerkini as $laporan)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">{{ Str::limit($laporan->judul, 35) }}</h5>
                            <span class="badge
                                @if($laporan->status == 'selesai') badge-success
                                @elseif($laporan->status == 'proses') badge-warning
                                @else badge-secondary @endif">
                                {{ ucfirst($laporan->status) }}
                            </span>
                        </div>
                        <p class="card-text">{{ Str::limit($laporan->deskripsi, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-user"></i> {{ Str::limit($laporan->nama_pelapor, 15) }}
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-clock"></i>
                                {{ \Carbon\Carbon::parse($laporan->created_at)->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- Fallback jika tidak ada data --}}
            @if($laporanTerkini->count() == 0)
            <div class="col-md-4" data-aos="fade-up">
                <div class="card border-0 shadow-sm mb-4">
                    <img src="{{ asset('pengaduan-masyarakat/images/lampu1.jpg') }}" class="card-img-top" alt="Laporan 1">
                    <div class="card-body">
                        <h5 class="card-title">Lampu Jalan Mati</h5>
                        <p class="card-text">Laporan warga mengenai lampu jalan yang tidak menyala di area perumahan telah ditangani.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm mb-4">
                    <img src="{{ asset('pengaduan-masyarakat/images/sampah1.jpg') }}" class="card-img-top" alt="Laporan 2">
                    <div class="card-body">
                        <h5 class="card-title">Sampah Menumpuk</h5>
                        <p class="card-text">Petugas kebersihan telah melakukan pembersihan di wilayah yang dilaporkan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm mb-4">
                    <img src="{{ asset('pengaduan-masyarakat/images/pelayanan1.jpg') }}" class="card-img-top" alt="Laporan 3">
                    <div class="card-body">
                        <h5 class="card-title">Pelayanan Lambat</h5>
                        <p class="card-text">Pihak terkait telah melakukan evaluasi terhadap proses pelayanan publik.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- Form laporan (tetap sama) --}}
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form action="{{ route('laporan.store') }}" method="POST" class="p-5 bg-white shadow-sm rounded">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Alamat Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <select name="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="1">Pengaduan Warga</option>
                            <option value="2">Kebersihan</option>
                            <option value="3">Pelayanan Publik</option>
                            <option value="4">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="judul" class="form-control" placeholder="Judul Laporan" required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="deskripsi" class="form-control" cols="30" rows="5" placeholder="Tuliskan laporan atau aspirasi Anda..." required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Kirim Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
.card-img-top {
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.badge {
    font-size: 0.7rem;
    padding: 0.25em 0.6em;
}
</style>
@endpush
