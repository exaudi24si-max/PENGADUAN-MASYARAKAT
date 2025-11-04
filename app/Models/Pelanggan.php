<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nomor_tiket',
        'nama_pelapor',  // TAMBAH INI
        'email_pelapor', // TAMBAH INI
        'no_telepon',    // TAMBAH INI
        'kategori_id',
        'judul',
        'deskripsi',
        'status',
        'lokasi_text',
        'rt',
        'rw',
    ];
}
