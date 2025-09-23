<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kependudukan;
use App\Models\Pendidikan;
use App\Models\Kesehatan;
use App\Models\Anggaran;
use App\Models\Sarana;
use App\Models\Blog;
use App\Models\Pengaturan;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeding Kependudukan
        Kependudukan::insert([
            ['nama_kecamatan' => 'Larantuka', 'jumlah_penduduk' => 40551, 'pria' => 20100, 'wanita' => 20451, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Ile Mandiri', 'jumlah_penduduk' => 15332, 'pria' => 7600, 'wanita' => 7732, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Tanjung Bunga', 'jumlah_penduduk' => 12543, 'pria' => 6200, 'wanita' => 6343, 'created_at' => now(), 'updated_at' => now()],
            ['nama_kecamatan' => 'Solor Barat', 'jumlah_penduduk' => 10224, 'pria' => 5100, 'wanita' => 5124, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seeding Pendidikan
        Pendidikan::insert([
            ['nama_sekolah' => 'SMAK Frateran Podor', 'jenjang' => 'SMA', 'jumlah_siswa' => 600, 'jumlah_guru' => 45, 'created_at' => now(), 'updated_at' => now()],
            ['nama_sekolah' => 'SMPN 1 Larantuka', 'jenjang' => 'SMP', 'jumlah_siswa' => 850, 'jumlah_guru' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['nama_sekolah' => 'SDK Larantuka 1', 'jenjang' => 'SD', 'jumlah_siswa' => 400, 'jumlah_guru' => 25, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seeding Kesehatan
        Kesehatan::insert([
            ['nama_faskes' => 'RSUD dr. Hendrikus Fernandez Larantuka', 'jenis' => 'Rumah Sakit', 'alamat' => 'Jl. Jend. Sudirman, Larantuka', 'jumlah_tenaga_medis' => 150, 'created_at' => now(), 'updated_at' => now()],
            ['nama_faskes' => 'Puskesmas Nagi', 'jenis' => 'Puskesmas', 'alamat' => 'Kelurahan Nagi, Larantuka', 'jumlah_tenaga_medis' => 25, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seeding Anggaran
        Anggaran::insert([
            ['nama_program' => 'Pembangunan Jalan Desa', 'sumber_dana' => 'APBD', 'jumlah_anggaran' => 500000000, 'realisasi' => 450000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_program' => 'Bantuan Siswa Miskin', 'sumber_dana' => 'APBN', 'jumlah_anggaran' => 750000000, 'realisasi' => 700000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_program' => 'Perbaikan Fasilitas Kesehatan', 'sumber_dana' => 'DAK', 'jumlah_anggaran' => 300000000, 'realisasi' => 250000000, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seeding Sarana & Prasarana
        Sarana::insert([
            ['nama_sarana' => 'Pasar Inpres Larantuka', 'kategori' => 'Pasar', 'kondisi' => 'Baik', 'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_sarana' => 'Stadion Ile Mandiri', 'kategori' => 'Olahraga', 'kondisi' => 'Cukup Baik', 'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_sarana' => 'Jembatan Palmerah', 'kategori' => 'Transportasi', 'kondisi' => 'Baik', 'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seeding Blog (Posts)
        Blog::insert([
            ['judul' => 'Festival Bale Nagi 2025 Kembali Digelar', 'kategori' => 'Pariwisata', 'konten' => 'Festival tahunan Bale Nagi akan kembali menyapa masyarakat Flores Timur dengan berbagai acara budaya dan seni yang menarik.', 'tanggal_publikasi' => Carbon::now()->subDays(2), 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Pemkab Flotim Salurkan Bantuan untuk Korban Banjir', 'kategori' => 'Sosial', 'konten' => 'Pemerintah Kabupaten Flores Timur bergerak cepat menyalurkan bantuan logistik kepada warga yang terdampak bencana banjir di wilayah utara.', 'tanggal_publikasi' => Carbon::now()->subDays(1), 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Peningkatan Kualitas Jalan Menuju Obyek Wisata', 'kategori' => 'Infrastruktur', 'konten' => 'Dinas Pekerjaan Umum mengalokasikan dana untuk perbaikan dan pelebaran jalan menuju beberapa obyek wisata unggulan di Flores Timur.', 'tanggal_publikasi' => Carbon::now(), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seeding Pengaturan
        Pengaturan::create([
            'nama_aplikasi' => 'Dashboard Flores Timur',
            'email_notifikasi' => 'admin@florestimurkab.go.id',
        ]);
    }
}
