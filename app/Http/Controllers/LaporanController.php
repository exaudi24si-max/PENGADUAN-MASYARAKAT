<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporans = DB::table('pengaduan')
            ->join('kategori_pengaduan', 'pengaduan.kategori_id', '=', 'kategori_pengaduan.kategori_id')
            ->select('pengaduan.*', 'kategori_pengaduan.nama as kategori_nama')
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();

        return view('pages.laporan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategories = DB::table('kategori_pengaduan')->get();
        return view('pages.laporan.create', compact('kategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'email_pelapor' => 'nullable|email|max:100',
            'no_telepon' => 'nullable|string|max:15',
            'kategori_id' => 'required|exists:kategori_pengaduan,kategori_id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi_text' => 'nullable|string',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10'
        ]);

        // Generate nomor tiket unik
        $nomorTiket = 'TKT-' . strtoupper(Str::random(8)) . '-' . date('Ymd');

        DB::table('pengaduan')->insert([
            'nomor_tiket' => $nomorTiket,
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'no_telepon' => $request->no_telepon,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'baru',
            'lokasi_text' => $request->lokasi_text,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil dikirim! Nomor Tiket: ' . $nomorTiket);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laporan = DB::table('pengaduan')
            ->join('kategori_pengaduan', 'pengaduan.kategori_id', '=', 'kategori_pengaduan.kategori_id')
            ->where('pengaduan.pengaduan_id', $id)
            ->first();

        return view('pages.laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporan = DB::table('pengaduan')->where('pengaduan_id', $id)->first();
        $kategories = DB::table('kategori_pengaduan')->get();

        return view('pages.laporan.edit', compact('laporan', 'kategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'email_pelapor' => 'nullable|email|max:100',
            'no_telepon' => 'nullable|string|max:15',
            'kategori_id' => 'required|exists:kategori_pengaduan,kategori_id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:baru,proses,selesai,ditolak',
            'lokasi_text' => 'nullable|string',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10'
        ]);

        DB::table('pengaduan')
            ->where('pengaduan_id', $id)
            ->update([
                'nama_pelapor' => $request->nama_pelapor,
                'email_pelapor' => $request->email_pelapor,
                'no_telepon' => $request->no_telepon,
                'kategori_id' => $request->kategori_id,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
                'lokasi_text' => $request->lokasi_text,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'updated_at' => now()
            ]);

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pengaduan')->where('pengaduan_id', $id)->delete();

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil dihapus!');
    }
}
