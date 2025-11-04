<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function beranda() // ✅ METHOD NAME: beranda
    {
        return view('pages.beranda'); // ✅ VIEW NAME: 'beranda' (bukan Deranda)
    }

    public function tentang() // ✅ METHOD NAME: beranda
    {
        return view('pages.tentang');
    }
    public function laporan()
    {
        return view('pages.laporan');
    }
    public function layanan()
    {
        return view('pages.layanan');
    }
    public function kontak()
    {
        return view('pages.kontak');
    }
     public function pengaduan()
    {
        return view('pages.pengaduan');
    }
    // public function index()
    // {
    //     return view('index');
    // }

    // public function main()
    // {
    //     return view('main');
    // }


}
