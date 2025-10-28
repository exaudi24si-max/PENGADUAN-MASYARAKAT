<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function beranda()  // ✅ METHOD NAME: beranda
    {
        return view('pages.beranda'); // ✅ VIEW NAME: 'beranda' (bukan Deranda)
    }

    public function index()
    {
        return view('index');
    }

    public function main()
    {
        return view('main');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'kategori_id' => 'required|integer',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $nomor_tiket = 'PENG-' . now()->format('YmdHis');

        DB::table('pengaduan')->insert([
            'nomor_tiket' => $nomor_tiket,
            'nama_pelapor' => $request->nama,
            'email_pelapor' => $request->email,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'baru',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('beranda')->with('success', 'Laporan berhasil dikirim! Nomor Tiket: ' . $nomor_tiket);
    }
}
