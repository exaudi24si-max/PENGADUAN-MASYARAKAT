<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wargas = Warga::orderBy('created_at', 'desc')->get();
        return view('pages.warga.index', compact('wargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi data
        $request->validate([
            'nama'          => 'required|string|max:255',
            'agama'         => 'nullable|string|max:50',
            'pekerjaan'     => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan', // Langsung validasi L/P
            'email'         => 'nullable|email|max:255',
            'No_Hp'         => 'nullable|string|max:15',
        ]);

        $data = [
            'nama'          => $request->nama,
            'agama'         => $request->agama,
            'pekerjaan'     => $request->pekerjaan,
            'jenis_kelamin' => $request->jenis_kelamin, // Langsung ambil dari request
            'email'         => $request->email,
            'No_Hp'         => $request->No_Hp,
        ];

        Warga::create($data);

        return redirect()->route('warga.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'nama'          => 'required|string|max:255',
            'agama'         => 'nullable|string|max:50',
            'pekerjaan'     => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan', // Langsung validasi L/P
            'email'         => 'nullable|email|max:255',
            'No_Hp'         => 'nullable|string|max:15',
        ]);

        $warga = Warga::findOrFail($id);

        $data = [
            'nama'          => $request->nama,
            'agama'         => $request->agama,
            'pekerjaan'     => $request->pekerjaan,
            'jenis_kelamin' => $request->jenis_kelamin, // Langsung ambil dari request
            'email'         => $request->email,
            'No_Hp'         => $request->No_Hp,
        ];

        $warga->update($data);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
