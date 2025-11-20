<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CreateWargaDummy extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Data warga dummy sesuai struktur tabel - UBAH 20 MENJADI 100
        foreach (range(1, 100) as $i) {
            DB::table('warga')->insert([
                'nama' => $faker->name,
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pekerjaan' => $faker->randomElement(['PNS', 'Karyawan Swasta', 'Wiraswasta', 'Petani', 'Nelayan', 'Ibu Rumah Tangga', 'Pelajar/Mahasiswa', 'Tidak Bekerja', 'Dokter', 'Guru', 'Sopir', 'Pedagang']),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'email' => $faker->email,
                'No_Hp' => $faker->phoneNumber, // ✅ Perhatikan huruf besar 'H'
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        echo "100 data warga dummy berhasil dibuat!\n";
    }
}
