<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    /* ===========================
     * INDEX
     * =========================== */
    public function index(Request $request)
    {
        $query = DB::table('pengaduan')
            ->join('kategori_pengaduan', 'pengaduan.kategori_id', '=', 'kategori_pengaduan.kategori_id')
            ->select('pengaduan.*', 'kategori_pengaduan.nama as kategori_nama');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('pengaduan.judul', 'LIKE', "%{$search}%")
                  ->orWhere('pengaduan.deskripsi', 'LIKE', "%{$search}%")
                  ->orWhere('pengaduan.nomor_tiket', 'LIKE', "%{$search}%")
                  ->orWhere('pengaduan.nama_pelapor', 'LIKE', "%{$search}%")
                  ->orWhere('kategori_pengaduan.nama', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('pengaduan.status', $request->status);
        }

        if ($request->filled('kategori')) {
            $query->where('pengaduan.kategori_id', $request->kategori);
        }

        $query->orderBy(
            $request->get('sort_by', 'created_at'),
            $request->get('sort_order', 'desc')
        );

        $laporans  = $query->paginate(12)->withQueryString();
        $kategories = DB::table('kategori_pengaduan')->get();
        $statuses  = ['baru', 'proses', 'selesai', 'ditolak'];

        return view('pages.laporan.index', compact('laporans', 'kategories', 'statuses'));
    }

    /* ===========================
     * CREATE
     * =========================== */
    public function create()
    {
        $kategories = DB::table('kategori_pengaduan')->get();
        return view('pages.laporan.create', compact('kategories'));
    }

    /* ===========================
     * STORE (MULTI FOTO)
     * =========================== */
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
            'rw' => 'nullable|string|max:10',

            // ✅ MULTI FOTO
            'foto' => 'nullable|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        /* === Upload Foto === */
        $fotoPaths = [];

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                if ($file->isValid()) {
                    $fileName = 'foto_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('uploads/pengaduan', $fileName, 'public');
                    $fotoPaths[] = $path;
                }
            }
        }

        $nomorTiket = 'TKT-' . strtoupper(Str::random(8)) . '-' . date('Ymd');

        DB::table('pengaduan')->insert([
            'nomor_tiket' => $nomorTiket,
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'no_telepon' => $request->no_telepon,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => json_encode($fotoPaths), // ✅ JSON
            'status' => 'baru',
            'lokasi_text' => $request->lokasi_text,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('laporans.index')
            ->with('success', "Laporan berhasil dikirim! Nomor Tiket: {$nomorTiket}");
    }

    /* ===========================
     * SHOW
     * =========================== */
    public function show(string $id)
    {
        $laporan = DB::table('pengaduan')
            ->join('kategori_pengaduan', 'pengaduan.kategori_id', '=', 'kategori_pengaduan.kategori_id')
            ->where('pengaduan.pengaduan_id', $id)
            ->first();

        return view('pages.laporan.show', compact('laporan'));
    }

    /* ===========================
     * EDIT
     * =========================== */
    public function edit(string $id)
    {
        $laporan = DB::table('pengaduan')->where('pengaduan_id', $id)->first();
        $kategories = DB::table('kategori_pengaduan')->get();

        return view('pages.laporan.edit', compact('laporan', 'kategories'));
    }

    /* ===========================
     * UPDATE (TAMBAH FOTO)
     * =========================== */
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
            'rw' => 'nullable|string|max:10',

            'foto' => 'nullable|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $laporan = DB::table('pengaduan')->where('pengaduan_id', $id)->first();
        $fotoLama = json_decode($laporan->foto, true) ?? [];

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                if ($file->isValid()) {
                    $fileName = 'foto_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('uploads/pengaduan', $fileName, 'public');
                    $fotoLama[] = $path;
                }
            }
        }

        DB::table('pengaduan')->where('pengaduan_id', $id)->update([
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'no_telepon' => $request->no_telepon,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => json_encode($fotoLama),
            'status' => $request->status,
            'lokasi_text' => $request->lokasi_text,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'updated_at' => now(),
        ]);

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil diupdate!');
    }

    /* ===========================
     * DESTROY
     * =========================== */
    public function destroy(string $id)
    {
        $laporan = DB::table('pengaduan')->where('pengaduan_id', $id)->first();
        $fotos = json_decode($laporan->foto, true) ?? [];

        foreach ($fotos as $foto) {
            if (Storage::disk('public')->exists($foto)) {
                Storage::disk('public')->delete($foto);
            }
        }

        DB::table('pengaduan')->where('pengaduan_id', $id)->delete();

        return redirect()->route('laporans.index')
            ->with('success', 'Laporan berhasil dihapus!');
    }
}
