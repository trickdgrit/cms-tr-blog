@extends('layouts.portal')

@section('title', 'Selamat Datang')

@section('content')

<!-- Hero Section -->
<section class="hero-bg text-white">
    <div class="container mx-auto px-6 py-24 md:py-32 text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">Portal Resmi Kabupaten Flores Timur</h1>
        <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-3xl mx-auto">Menyajikan data dan informasi transparan untuk kemajuan bersama membangun Lewotana.</p>
        <a href="#statistik" class="bg-blue-600 text-white px-8 py-3 rounded-md hover:bg-blue-700 transition text-lg font-semibold">Lihat Data Statistik</a>
    </div>
</section>

<!-- Main Content Area -->
<div class="container mx-auto px-6 py-12">

    <!-- Statistik Section -->
    <section id="statistik" class="mb-16">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Statistik Utama</h2>
            <p class="text-gray-500">Data kunci Kabupaten Flores Timur secara sekilas.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card Total Penduduk -->
            <div class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:-translate-y-2 transition-transform duration-300">
                <div class="bg-blue-100 text-blue-600 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.122-1.28-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.122-1.28.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-4xl font-bold text-gray-900">{{ number_format($totalPenduduk) }}</h3>
                <p class="text-gray-500 mt-1">Total Penduduk</p>
            </div>
            <!-- Card Total Sekolah -->
            <div class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:-translate-y-2 transition-transform duration-300">
                <div class="bg-green-100 text-green-600 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422A12.083 12.083 0 0121.25 12c0 2.44-1.38 4.58-3.42 5.578L12 14z"></path><path d="M12 14l-6.16-3.422A12.083 12.083 0 002.75 12c0 2.44-1.38 4.58-3.42 5.578L12 14z"></path></svg>
                </div>
                <h3 class="text-4xl font-bold text-gray-900">{{ number_format($totalSekolah) }}</h3>
                <p class="text-gray-500 mt-1">Total Sekolah</p>
            </div>
            <!-- Card Total Faskes -->
            <div class="bg-white p-8 rounded-lg shadow-lg text-center transform hover:-translate-y-2 transition-transform duration-300">
                <div class="bg-red-100 text-red-600 rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-4xl font-bold text-gray-900">{{ number_format($totalFaskes) }}</h3>
                <p class="text-gray-500 mt-1">Total Faskes</p>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru Section -->
    <section>
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Berita & Informasi Terbaru</h2>
            <p class="text-gray-500">Kabar terkini seputar kegiatan dan pembangunan di Flores Timur.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($latestPosts as $post)
            {{-- PERUBAHAN DI BARIS BERIKUT --}}
            <a href="{{ url('/blog/' . ($post['id'] ?? '')) }}" class="block bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                <img class="h-56 w-full object-cover" src="https://placehold.co/600x400/1D4ED8/FFFFFF?text=Berita" alt="Gambar Berita">
                <div class="p-6">
                    <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">{{ $post['kategori'] ?? 'Umum' }}</span>
                    <h3 class="mt-4 font-bold text-xl text-gray-900">{{ $post['judul'] ?? 'Judul Tidak Tersedia' }}</h3>
                    <p class="mt-2 text-gray-600 text-sm">
                        {{ \Illuminate\Support\Str::limit($post['konten'] ?? 'Konten tidak tersedia.', 120) }}
                    </p>
                    <div class="mt-4 flex items-center">
                        <p class="text-sm text-gray-500">Dipublikasikan pada {{ \Carbon\Carbon::parse($post['tanggal_publikasi'] ?? now())->format('d M Y') }}</p>
                    </div>
                </div>
            </a>
            @empty
            <p class="col-span-3 text-center text-gray-500">Belum ada berita untuk ditampilkan.</p>
            @endforelse
        </div>
    </section>

</div>

@endsection

