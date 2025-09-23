<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Blog; // Menggunakan Eloquent Model
use Illuminate\View\View; // Best practice untuk memanggil View

class BlogController extends Controller
{
    /**
     * Menampilkan daftar semua postingan blog.
     * Mengambil data langsung dari database.
     */
    public function index(): View
    {
        // Mengambil semua data dari model Blog, diurutkan berdasarkan tanggal terbaru
        $data = Blog::latest('tanggal_publikasi')->paginate(10); // Menggunakan paginasi

        // Menghitung jumlah postingan per kategori untuk chart
        $kategoriCounts = Blog::selectRaw('kategori, count(*) as count')
            ->groupBy('kategori')
            ->pluck('count', 'kategori');

        $chartData = [
            'labels' => $kategoriCounts->keys()->toArray(),
            'data'   => $kategoriCounts->values()->toArray(),
        ];

        return view('blog.index', compact('data', 'chartData'));
    }

    /**
     * Menampilkan formulir untuk membuat postingan baru.
     */
    public function create(): View
    {
        // Mengirimkan model Blog baru agar form-binding lebih mudah
        return view('blog.create', ['blog' => new Blog()]);
    }

    /**
     * Menyimpan postingan baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:Pariwisata,Sosial,Infrastruktur,Pemerintahan,Ekonomi,Pendidikan,Kesehatan',
            'konten' => 'required|string',
            'tanggal_publikasi' => 'required|date',
        ]);

        // Membuat record baru di database menggunakan Eloquent
        Blog::create($validatedData);

        return redirect()->route('blog.index')->with('success', 'Postingan berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit postingan yang ada.
     */
    public function edit(Blog $blog): View // Route Model Binding
    {
        // Laravel akan otomatis mencari Blog berdasarkan ID dan melempar 404 jika tidak ditemukan
        return view('blog.edit', ['data' => $blog]);
    }

    /**
     * Memperbarui postingan di database.
     */
    public function update(Request $request, Blog $blog): RedirectResponse // Route Model Binding
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:Pariwisata,Sosial,Infrastruktur,Pemerintahan,Ekonomi,Pendidikan,Kesehatan',
            'konten' => 'required|string',
            'tanggal_publikasi' => 'required|date',
        ]);

        // Memperbarui record di database
        $blog->update($validatedData);

        return redirect()->route('blog.index')->with('success', 'Postingan berhasil diperbarui.');
    }

    /**
     * Menghapus postingan dari database.
     */
    public function destroy(Blog $blog): RedirectResponse // Route Model Binding
    {
        // Menghapus record dari database
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Postingan berhasil dihapus.');
    }
}
