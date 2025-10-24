<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
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
            'kategori_id' => 'required|integer',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $nomor_tiket = 'PENG-' . now()->format('YmdHis');

        DB::table('pengaduan')->insert([
            'nomor_tiket' => $nomor_tiket,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'baru',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('home')->with('success', 'Laporan Anda berhasil dikirim!');
    }
}
