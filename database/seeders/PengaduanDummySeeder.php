<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PengaduanDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // ✅ FIX: Pastikan ada data kategori, jika kosong buat default
        $kategories = DB::table('kategori_pengaduan')->pluck('kategori_id');

        if ($kategories->isEmpty()) {
            echo "⚠️  Tabel kategori_pengaduan kosong, membuat kategori default...\n";

            DB::table('kategori_pengaduan')->insert([
                ['nama' => 'Infrastruktur', 'created_at' => now(), 'updated_at' => now()],
                ['nama' => 'Lingkungan', 'created_at' => now(), 'updated_at' => now()],
                ['nama' => 'Kesehatan', 'created_at' => now(), 'updated_at' => now()],
                ['nama' => 'Keamanan', 'created_at' => now(), 'updated_at' => now()],
                ['nama' => 'Layanan Publik', 'created_at' => now(), 'updated_at' => now()],
            ]);

            $kategories = DB::table('kategori_pengaduan')->pluck('kategori_id');
            echo "✅ 5 kategori default berhasil dibuat!\n";
        }

        // Data status yang mungkin
        $statuses = ['baru', 'proses', 'selesai', 'ditolak'];

        // Data nama pelapor random Indonesia
        $namaPelapor = [
            'Ahmad Santoso', 'Budi Wijaya', 'Citra Lestari', 'Dewi Kartika', 'Eko Prasetyo',
            'Fajar Nugroho', 'Gita Maharani', 'Hadi Purnama', 'Indra Setiawan', 'Joko Susilo',
            'Kartika Sari', 'Lina Wati', 'Maya Indah', 'Nina Permata', 'Oki Fernando',
            'Putri Ayu', 'Rina Marlina', 'Sari Dewi', 'Tono Gunawan', 'Wati Handayani'
        ];

        // Data lokasi di Indonesia
        $lokasiText = [
            'Jl. Merdeka No. 123', 'Jl. Sudirman No. 45', 'Jl. Gatot Subroto No. 67',
            'Jl. Thamrin No. 89', 'Jl. Hayam Wuruk No. 12', 'Jl. Gajah Mada No. 34',
            'Jl. Pemuda No. 56', 'Jl. Veteran No. 78', 'Jl. A. Yani No. 90',
            'Jl. Pahlawan No. 11', 'Jl. Diponegoro No. 22', 'Jl. Imam Bonjol No. 33',
            'Jl. Teuku Umar No. 44', 'Jl. Cut Nyak Dien No. 55', 'Jl. Kartini No. 66',
            'Komplek Permata Indah', 'Perumahan Griya Asri', 'Cluster Taman Melati'
        ];

        // Data judul pengaduan yang realistik
        $judulPengaduan = [
            'Jalan Berlubang di', 'Lampu Jalan Mati di', 'Sampah Menumpuk di',
            'Banjir di Area', 'Air PDAM Tidak Mengalir di', 'Listrik Padam di',
            'Lingkungan Kumuh di', 'Trotoar Rusak di', 'Drainase Tersumbat di',
            'Fasilitas Umum Rusak di', 'PKL Berjualan Sembarangan di',
            'Kendaraan Parkir Sembarangan di', 'Gangguan Keamanan di',
            'Kebisingan di', 'Pencemaran Lingkungan di', 'Jembatan Rusak di',
            'Fasilitas Anak Rusak di', 'Taman Tidak Terawat di', 'MCK Umum Kotor di',
            'Penerangan Jalan Kurang di'
        ];

        echo "Memulai membuat 100 data pengaduan dummy...\n";

        for ($i = 0; $i < 100; $i++) {
            $nomorTiket = 'TKT-' . strtoupper(Str::random(8)) . '-' . date('Ymd');
            $nama = $faker->randomElement($namaPelapor);

            // ✅ FIX: Generate email yang valid
            $emailName = strtolower(str_replace(' ', '.', $nama));
            $email = $emailName . $faker->randomElement(['', '.', rand(1, 99)]) . '@' . $faker->freeEmailDomain;
            $email = str_replace(' ', '', $email); // Hapus spasi

            $judul = $faker->randomElement($judulPengaduan) . ' ' . $faker->randomElement($lokasiText);

            // ✅ FIX: Generate nomor telepon yang sesuai (max 15 karakter)
            $noTelepon = '08' . $faker->numberBetween(12, 99) . $faker->numberBetween(1000, 9999) . $faker->numberBetween(1000, 9999);

            // ✅ FIX: Pastikan kategori_id valid
            $kategoriId = $faker->randomElement($kategories->toArray());

            // Probabilitas status: 30% baru, 40% proses, 25% selesai, 5% ditolak
            $statusProbability = $faker->numberBetween(1, 100);
            if ($statusProbability <= 30) {
                $status = 'baru';
            } elseif ($statusProbability <= 70) {
                $status = 'proses';
            } elseif ($statusProbability <= 95) {
                $status = 'selesai';
            } else {
                $status = 'ditolak';
            }

            // Tanggal created_at random dalam 6 bulan terakhir
            $createdAt = $faker->dateTimeBetween('-6 months', 'now');

            DB::table('pengaduan')->insert([
                'nomor_tiket' => $nomorTiket,
                'nama_pelapor' => $nama,
                'email_pelapor' => $email,
                'no_telepon' => $noTelepon,
                'kategori_id' => $kategoriId, // ✅ FIXED: pasti ada nilai
                'judul' => $judul,
                'deskripsi' => $this->generateDeskripsi($faker, $judul),
                'status' => $status,
                'lokasi_text' => $faker->randomElement($lokasiText),
                'rt' => $faker->numberBetween(1, 10),
                'rw' => $faker->numberBetween(1, 5),
                'created_at' => $createdAt,
                'updated_at' => $status === 'baru' ? $createdAt : $faker->dateTimeBetween($createdAt, 'now'),
            ]);

            // Progress indicator
            if (($i + 1) % 10 === 0) {
                echo "Created " . ($i + 1) . " records...\n";
            }
        }

        echo "✅ 100 data pengaduan dummy berhasil dibuat!\n";
        echo "📊 Distribusi Status:\n";
        $statusCount = DB::table('pengaduan')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        foreach ($statusCount as $stat) {
            echo "   - {$stat->status}: {$stat->total} laporan\n";
        }
    }

    /**
     * Generate deskripsi pengaduan yang realistik
     */
    private function generateDeskripsi($faker, $judul)
    {
        $deskripsiTemplates = [
            "Saya ingin melaporkan masalah {$judul}. Kejadian ini sudah berlangsung selama {$faker->numberBetween(1, 30)} hari dan sangat mengganggu aktivitas warga sekitar.",
            "Dengan hormat, saya laporkan adanya {$judul}. Kondisi ini menyebabkan ketidaknyamanan bagi masyarakat dan perlu segera ditindaklanjuti.",
            "Melalui pengaduan ini, saya ingin menyampaikan keluhan mengenai {$judul}. Sudah beberapa kali dilaporkan namun belum ada penanganan serius.",
            "Terjadi {$judul} yang memerlukan perhatian segera. Dampaknya sudah dirasakan oleh {$faker->numberBetween(5, 50)} kepala keluarga di lingkungan ini.",
            "Saya warga setempat ingin mengadukan {$judul}. Mohon perhatian dan penanganan dari pihak berwenang untuk menyelesaikan masalah ini.",
        ];

        return $faker->randomElement($deskripsiTemplates);
    }
}
