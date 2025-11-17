<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User; // ✅ PERBAIKAN: Import model User yang benar

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    // Cek dulu apakah user sudah ada
    if (!DB::table('users')->where('email', 'gatot@pcr.ac.id')->exists()) {
        User::create([
            'name' => 'Admin',
            'email' => 'gatot@pcr.ac.id',
            'password' => Hash::make('gatotkaca'),
            'role' => 'admin'
        ]);
        echo "User admin berhasil dibuat!\n";
    } else {
        echo "User admin sudah ada, skip...\n";
    }
}
}
