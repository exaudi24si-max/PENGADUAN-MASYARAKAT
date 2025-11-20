<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // 1. Buat Admin (dari CreateFirstUser)
        User::firstOrCreate(
            ['email' => 'admin@pengaduan.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. Buat 5 Petugas
        for ($i = 1; $i <= 5; $i++) {
            User::firstOrCreate(
                ['email' => 'petugas' . $i . '@pengaduan.com'],
                [
                    'name' => 'Petugas ' . $i,
                    'password' => Hash::make('password123'),
                    'role' => 'petugas',
                ]
            );
        }

        // 3. Buat 94 Warga (ganti CreateWargaDummy)
        for ($i = 0; $i < 94; $i++) {
            $email = $faker->unique()->safeEmail;

            User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $faker->name,
                    'password' => Hash::make('password123'),
                    'role' => 'warga',
                ]
            );
        }

        echo "✅ UserSeeder completed!\n";
    }
}
