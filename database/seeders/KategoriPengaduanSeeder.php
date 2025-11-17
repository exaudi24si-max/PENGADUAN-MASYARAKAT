<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PengaduanDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Ambil semua ID yang ada
        $kategoriIds = DB::table('kategori_pengaduan')->pluck('kategori_id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Hapus data pengaduan lama (optional)
        DB::table('pengaduan')->delete();

        // Buat 20 data pengaduan random
        foreach (range(1, 20) as $i) {
            $status = $faker->randomElement(['baru', 'diproses', 'selesai']);
            $createdDate = $faker->dateTimeBetween('-30 days', 'now');

            DB::table('pengaduan')->insert([
                'nomor_tiket' => 'TKT-' . date('Ymd') . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_pelapor' => $faker->name,
                'email_pelapor' => $faker->email,
                'no_telepon' => $faker->phoneNumber,
                'kategori_id' => $faker->randomElement($kategoriIds),
                'user_id' => $faker->randomElement($userIds),
                'judul' => $faker->sentence(6),
                'deskripsi' => $faker->paragraph(3),
                'status' => $status,
                'lokasi_text' => $faker->address,
                'rt' => $faker->numerify('##'),
                'rw' => $faker->numerify('##'),
                'created_at' => $createdDate,
                'updated_at' => $status == 'baru' ? $createdDate : now(),
            ]);
        }

        echo "20 data pengaduan random berhasil dibuat!\n";
    }
}
