<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class BlogController extends Controller
{
    private function getBlogData()
    {
        // Memeriksa jika data tidak ada di session, maka buat data default.
        if (!Session::has('blog')) {
            Session::put('blog', [
                ['id' => 'blog-1', 'judul' => 'Festival Bale Nagi 2025 Kembali Digelar', 'kategori' => 'Pariwisata', 'konten' => 'Festival tahunan Bale Nagi akan kembali menyapa masyarakat Flores Timur dengan berbagai atraksi budaya dan pameran ekonomi kreatif. Acara ini diharapkan dapat menarik wisatawan domestik maupun mancanegara.', 'tanggal_publikasi' => Carbon::now()->subDays(2)->toDateTimeString()],
                ['id' => 'blog-2', 'judul' => 'Pemkab Flotim Salurkan Bantuan untuk Korban Banjir', 'kategori' => 'Sosial', 'konten' => 'Pemerintah Kabupaten Flores Timur bergerak cepat menyalurkan bantuan logistik dan kebutuhan pokok kepada warga yang terdampak bencana banjir di wilayah Ile Ape.', 'tanggal_publikasi' => Carbon::now()->subDays(1)->toDateTimeString()],
                ['id' => 'blog-3', 'judul' => 'Peningkatan Kualitas Jalan Menuju Obyek Wisata', 'kategori' => 'Infrastruktur', 'konten' => 'Dinas Pekerjaan Umum mengalokasikan dana untuk perbaikan dan pelebaran jalan menuju lokasi wisata unggulan seperti Pantai Oa dan Danau Asmara untuk meningkatkan aksesibilitas.', 'tanggal_publikasi' => Carbon::now()->toDateTimeString()],
            ]);
        }
        return Session::get('blog');
    }

    private function setBlogData($data)
    {
        Session::put('blog', $data);
    }

    public function index(): View
    {
        $data = $this->getBlogData();
        $kategoriCounts = array_count_values(array_column($data, 'kategori'));
        $chartData = [
            'labels' => array_keys($kategoriCounts),
            'data'   => array_values($kategoriCounts),
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
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:Pariwisata,Sosial,Infrastruktur,Pemerintahan,Ekonomi',
            'konten' => 'required|string',
            'tanggal_publikasi' => 'required|date',
        ]);

        $data = $this->getBlogData();
        $data[] = [
            'id' => 'blog-' . Str::uuid(),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'konten' => $request->konten,
            'tanggal_publikasi' => $request->tanggal_publikasi,
        ];
        $this->setBlogData($data);

        return redirect()->route('blog.index')->with('success', 'Postingan berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $data = $this->getBlogData();
        $detailData = collect($data)->firstWhere('id', $id);
        if (!$detailData) abort(404);
        return view('blog.edit', ['data' => $detailData]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:Pariwisata,Sosial,Infrastruktur,Pemerintahan,Ekonomi',
            'konten' => 'required|string',
            'tanggal_publikasi' => 'required|date',
        ]);

        $data = $this->getBlogData();
        $index = collect($data)->search(fn($item) => $item['id'] == $id);
        if ($index === false) {
            return redirect()->route('blog.index')->with('error', 'Data tidak ditemukan.');
        }

        $data[$index] = [
            'id' => $id,
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'konten' => $request->konten,
            'tanggal_publikasi' => $request->tanggal_publikasi,
        ];
        $this->setBlogData($data);

        return redirect()->route('blog.index')->with('success', 'Postingan berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $data = $this->getBlogData();
        $data = array_values(array_filter($data, fn($item) => $item['id'] != $id));
        $this->setBlogData($data);

        return redirect()->route('blog.index')->with('success', 'Postingan berhasil dihapus.');
    }
}

