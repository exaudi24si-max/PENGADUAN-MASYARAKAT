<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CreatePengaduanDummy extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Ambil ID kategori yang ada
        $kategoriIds = DB::table('kategori_pengaduan')->pluck('kategori_id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        foreach (range(1, 20) as $i) {
            DB::table('pengaduan')->insert([
                'nomor_tiket' => 'TKT-' . date('Ymd') . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_pelapor' => $faker->name,
                'email_pelapor' => $faker->email,
                'no_telepon' => $faker->phoneNumber,
                'kategori_id' => $faker->randomElement($kategoriIds),
                'user_id' => $faker->randomElement($userIds),
                'judul' => $faker->sentence(6),
                'deskripsi' => $faker->paragraph(4),
                'status' => $faker->randomElement(['baru', 'diproses', 'selesai']),
                'lokasi_text' => $faker->address,
                'rt' => $faker->numerify('##'),
                'rw' => $faker->numerify('##'),
                'created_at' => $faker->dateTimeBetween('-30 days', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
