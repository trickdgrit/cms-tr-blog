<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(): View
    {
        $data = Blog::latest('tanggal_publikasi')->get();
        $kategoriCounts = $data->countBy('kategori');
        $chartData = [
            'labels' => $kategoriCounts->keys(),
            'data'   => $kategoriCounts->values(),
        ];
        return view('blog.index', compact('data', 'chartData'));
    }

    public function create(): View
    {
        return view('blog.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255|unique:blogs,judul', // Tambah validasi unik
            'kategori' => 'required|string|max:100',
            'nama_penulis' => 'required|string|max:100',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'konten' => 'required|string',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('posts', 'public');
        }

        Blog::create([
            'judul' => $request->judul,
            // PERBAIKAN: Slug dibuat lebih sederhana, hanya dari judul.
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'nama_penulis' => $request->nama_penulis,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'gambar' => $path,
            'konten' => $request->konten,
        ]);

        return redirect()->route('blog.index')->with('success', 'Postingan blog berhasil ditambahkan.');
    }

    public function edit(Blog $blog): View
    {
        return view('blog.edit', ['data' => $blog]);
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $request->validate([
            // Memastikan judul unik, kecuali untuk postingan ini sendiri
            'judul' => 'required|string|max:255|unique:blogs,judul,' . $blog->id,
            'kategori' => 'required|string|max:100',
            'nama_penulis' => 'required|string|max:100',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'konten' => 'required|string',
        ]);

        $path = $blog->gambar;
        if ($request->hasFile('gambar')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('gambar')->store('posts', 'public');
        }

        $blog->update([
            'judul' => $request->judul,
             // PERBAIKAN: Slug dibuat lebih sederhana, hanya dari judul.
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'nama_penulis' => $request->nama_penulis,
            'tanggal_publikasi' => $request->tanggal_publikasi,
            'gambar' => $path,
            'konten' => $request->konten,
        ]);

        return redirect()->route('blog.index')->with('success', 'Postingan blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        if ($blog->gambar) {
            Storage::disk('public')->delete($blog->gambar);
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Postingan blog berhasil dihapus.');
    }
}

