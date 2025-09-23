<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama dengan data ringkasan.
     */
    public function index(): View
    {
        // Mengambil data dari session untuk setiap modul.
        // Jika session kosong, data default akan dibuat oleh masing-masing controller saat halamannya diakses.
        // Untuk dashboard, kita akan memanggil data default di sini jika diperlukan.
        $kependudukanData = Session::get('kependudukan', []);
        $pendidikanData = Session::get('pendidikan', []);
        $kesehatanData = Session::get('kesehatan', []);
        $anggaranData = Session::get('anggaran', []);
        $saranaData = Session::get('sarana', []);
        $blogData = Session::get('blog', []);

        // Menghitung data ringkasan (KPI)
        $totalPenduduk = array_sum(array_column($kependudukanData, 'jumlah_penduduk'));
        $totalSekolah = count($pendidikanData);
        $totalFaskes = count($kesehatanData);
        $totalAnggaran = array_sum(array_column($anggaranData, 'jumlah_anggaran'));
        $totalSarana = count($saranaData);
        $totalBlog = count($blogData);

        // Menyiapkan data untuk Chart Anggaran vs Realisasi
        $anggaranChartData = [
            'labels' => array_column($anggaranData, 'nama_program'),
            'anggaran' => array_map('intval', array_column($anggaranData, 'jumlah_anggaran')),
            'realisasi' => array_map('intval', array_column($anggaranData, 'realisasi')),
        ];

        // Menyiapkan data untuk Chart Populasi
        $populasiChartData = [
            'labels' => array_column($kependudukanData, 'nama_kecamatan'),
            'data' => array_map('intval', array_column($kependudukanData, 'jumlah_penduduk')),
        ];


        return view('dashboard', compact(
            'totalPenduduk',
            'totalSekolah',
            'totalFaskes',
            'totalAnggaran',
            'totalSarana',
            'totalBlog',
            'anggaranChartData',
            'populasiChartData'
        ));
    }
}

