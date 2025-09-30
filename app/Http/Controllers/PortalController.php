<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Kependudukan;
use App\Models\Pendidikan;
use App\Models\Kesehatan;
use App\Models\Post;

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
     * Menggunakan Route Model Binding dengan slug.
     */
    public function showPost(Request $request, Blog $post): View
    {
        $role = $request->query('role', 'public');

        // --- PERBAIKAN DI SINI ---
        // Memeriksa apakah model yang di-binding benar-benar ada di database.
        // Jika tidak (misalnya slug tidak cocok), tampilkan halaman 404.
        if (!$post->exists) {
            abort(404);
        }

        return view('portal.blog.blog_detail', compact('post', 'role'));
    }

    /**
     * Menampilkan halaman detail pendidikan dari database.
     */
    public function pendidikan(Request $request): View
    {
        $role = $request->query('role', 'public');
        $data = Pendidikan::orderBy('jenjang')->get();

        // Menyiapkan data untuk chart
        $jenjangCounts = $data->countBy('jenjang');
        $chartData = [
            'labels' => $jenjangCounts->keys(),
            'data'   => $jenjangCounts->values(),
        ];

        return view('portal.pendidikan', compact('data', 'chartData', 'role'));
    }

    /**
     * Menampilkan halaman detail kesehatan dari database.
     */
    public function kesehatan(Request $request): View
    {
        $role = $request->query('role', 'public');
        $data = Kesehatan::orderBy('jenis')->get();

        // Menyiapkan data untuk chart
        $jenisCounts = $data->countBy('jenis');
        $chartData = [
            'labels' => $jenisCounts->keys(),
            'data'   => $jenisCounts->values(),
        ];

        return view('portal.kesehatan', compact('data', 'chartData', 'role'));
    }

    /**
     * Menampilkan halaman indeks berita/blog dengan paginasi.
     */
    public function blogIndex(Request $request): View
    {
        $role = $request->query('role', 'public');
        
        // Mengambil semua postingan, diurutkan dari yang terbaru, dengan paginasi (6 postingan per halaman)
        $posts = Blog::latest('tanggal_publikasi')->paginate(6);

        return view('portal.blog.index', compact('posts', 'role'));
    }
}

