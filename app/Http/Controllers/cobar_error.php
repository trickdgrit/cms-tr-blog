<?php

namespace App\Http\Controllers;

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
        $latestPosts = Post::latest('tanggal_publikasi')->take(3)->get();

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

        // --- KODE DEBUGGING DITAMBAHKAN DI SINI ---
        // Kita akan melihat ID apa yang diterima dan ID apa saja yang ada di database.
        $availableIds = Post::pluck('id')->toArray();
        dd('Mencari ID:', $id, 'ID yang Tersedia di Database:', $availableIds);
        // -------------------------------------------

        // Cari postingan berdasarkan ID di database, jika tidak ada akan menampilkan 404
        $post = Post::findOrFail($id);

        return view('portal.blog_detail', compact('post', 'role'));
    }
}
```

### Apa yang Harus Dilakukan Sekarang?

1.  **Simpan** perubahan pada file `PortalController.php` di atas.
2.  **Buka kembali halaman utama portal** Anda.
3.  **Klik salah satu judul berita** seperti yang Anda lakukan sebelumnya.

Sekarang, alih-alih mendapatkan halaman 404, Anda akan melihat layar putih dengan teks debug. Teks tersebut akan terlihat seperti ini:

```
"Mencari ID:" // [Ini adalah ID dari URL yang Anda klik]
"1"

"ID yang Tersedia di Database:" // [Ini adalah semua ID yang ada di tabel 'posts' atau 'blogs']
array:3 [
  0 => 1
  1 => 2
  2 => 3
]

