<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'pengaduan_id';
    public $timestamps = true;

    protected $fillable = [
        'nomor_tiket',
        'nama_pelapor',      // BARU
        'email_pelapor',     // BARU
        'no_telepon',        // BARU
        'kategori_id',
        'judul',
        'deskripsi',
        'foto', //ini untuk model foto
        'status',
        'lokasi_text',
        'rt',
        'rw'
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id', 'kategori_id');
    }
}

