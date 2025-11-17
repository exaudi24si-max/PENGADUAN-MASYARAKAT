<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Halaman Beranda
     */
    public function beranda()
    {
        return view('pages.beranda');

    }

    /**
     * Halaman Tentang
     */
    public function tentang()
    {
        return view('pages.tentang');
    }

    /**
     * Halaman Layanan
     */
    public function layanan()
    {
        return view('pages.layanan');
    }

    /**
     * Halaman Dashboard (Protected - butuh login)
     */
    public function index()
    {
        return view('pages.beranda');
    }

    /**
     * Halaman Main (Protected - butuh login)
     */
    public function main()
    {
        return view('pages.main');
    }
}
