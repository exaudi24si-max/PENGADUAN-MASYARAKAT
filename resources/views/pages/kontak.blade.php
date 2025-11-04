@extends('layouts.guest.app')

@section('content')
        {{-- hubungi kami --}}
        <div class="site-section bg-light" id="contact-section">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-8">
                        <h2 class="section-title">Hubungi Kami</h2>
                        <p>Sampaikan pertanyaan, saran, atau kendala Anda melalui form di bawah ini.</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="#" method="post" class="p-5 bg-white shadow-sm rounded">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Alamat Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" cols="30" rows="5" placeholder="Isi Laporan / Pesan Anda"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary btn-lg" value="Kirim Laporan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
