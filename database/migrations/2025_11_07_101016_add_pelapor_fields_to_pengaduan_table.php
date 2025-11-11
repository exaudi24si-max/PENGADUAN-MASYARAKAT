<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->string('nama_pelapor', 100)->after('nomor_tiket');
            $table->string('email_pelapor', 100)->nullable()->after('nama_pelapor');
            $table->string('no_telepon', 15)->nullable()->after('email_pelapor');
        });
    }

    public function down()
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropColumn(['nama_pelapor', 'email_pelapor', 'no_telepon']);
        });
    }
};
