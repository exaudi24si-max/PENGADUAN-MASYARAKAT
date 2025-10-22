<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('pengaduan_id');
            $table->string('nomor_tiket')->unique();
            $table->unsignedBigInteger('kategori_id');
            $table->string('judul', 255);
            $table->text('deskripsi');
            $table->string('status', 50)->default('baru');
            $table->string('lokasi_text')->nullable();
            $table->string('rt', 10)->nullable();
            $table->string('rw', 10)->nullable();
            $table->timestamps();

            // Relasi ke kategori_pengaduan
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori_pengaduan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
