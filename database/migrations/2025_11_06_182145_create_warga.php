<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('warga')) {
            Schema::create('warga', function (Blueprint $table) {
                $table->increments('warga_id');
                $table->string('nama', 100);
                $table->string('agama', 100)->nullable();
                $table->string('pekerjaan', 100)->nullable();
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
                $table->string('email')->nullable();
                $table->string('No_Hp', 20)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Jangan drop table - biarkan aman
    }
};
