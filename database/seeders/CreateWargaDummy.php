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

        // Data warga dummy sesuai struktur tabel
        foreach (range(1, 20) as $i) {
            DB::table('warga')->insert([
                'nama' => $faker->name,
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pekerjaan' => $faker->jobTitle,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'email' => $faker->email,
                'No_Hp' => $faker->phoneNumber, // ✅ Perhatikan huruf besar 'H'
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        echo "Data warga dummy berhasil dibuat!\n";
    }
}
