<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kesehatan;
use Illuminate\View\View;
use App\Models\Pendidikan;
use App\Models\Kependudukan;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Menampilkan halaman utama portal publik dengan data dari database.
     */
    public function index(Request $request): View
    {
        $role = $request->query('role', 'public');

        // Mengambil data ringkasan dari database menggunakan Eloquent
        $totalPenduduk = Kependudukan::sum('jumlah_penduduk');
        $totalSekolah = Pendidikan::count();
        $totalFaskes = Kesehatan::count();
        
        // Ambil 3 postingan blog terbaru dari database
        $latestPosts = Blog::latest('tanggal_publikasi')->take(3)->get();

        return view('portal.welcome', compact(
            'role',
            'totalPenduduk',
            'totalSekolah',
            'totalFaskes',
            'latestPosts'
        ));
    }

    /**
     * Menampilkan halaman detail kependudukan dari database.
     */
    public function kependudukan(Request $request): View
    {
        $role = $request->query('role', 'public');
        $data = Kependudukan::all();

        $chartData = [
            'labels' => ['Pria', 'Wanita'],
            'data'   => [$data->sum('pria'), $data->sum('wanita')],
        ];

        return view('portal.kependudukan', compact('data', 'chartData', 'role'));
    }

    /**
     * Menampilkan halaman detail postingan blog dari database.
     */
    public function showPost(Request $request, string $id): View
    {
        $role = $request->query('role', 'public');

        // Cari postingan berdasarkan ID di database, jika tidak ada akan menampilkan 404
        $post = Blog::findOrFail($id);

        return view('portal.blog_detail', compact('post', 'role'));
    }
}

