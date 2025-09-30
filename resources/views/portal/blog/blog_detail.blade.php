@extends('layouts.portal')

@section('title', $post->judul ?? 'Detail Berita')

@section('content')
<div class="bg-white py-12">
    <div class="container mx-auto px-6">
        <article class="max-w-4xl mx-auto">
            <!-- Breadcrumbs / Navigasi kembali -->
            <div class="mb-6 text-sm text-gray-500">
                <a href="{{ route('portal.index') }}" class="hover:text-blue-600 transition">Beranda</a>
                <span class="mx-2">/</span>
                <a href="{{ route('portal.blog.index') }}" class="hover:text-blue-600 transition">Berita</a>
            </div>

            <!-- Header Postingan -->
            <header class="mb-8">
                <p class="text-blue-600 font-semibold bg-blue-100 inline-block px-3 py-1 rounded-full text-sm mb-2">{{ $post->kategori ?? 'Umum' }}</p>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">{{ $post->judul ?? 'Judul Tidak Tersedia' }}</h1>
                <p class="mt-4 text-gray-500">
                    Oleh <span class="font-semibold text-gray-700">{{ $post->nama_penulis ?? 'Admin' }}</span> | Dipublikasikan pada 
                    {{-- PERBAIKAN DI BARIS BERIKUT --}}
                    {{ $post->tanggal_publikasi ? $post->tanggal_publikasi->format('d F Y') : 'Tanggal tidak ditentukan' }}
                </p>
            </header>
            
            <!-- Gambar Utama Postingan -->
            @if($post->gambar)
            <figure class="mb-8">
                 <img class="w-full h-auto rounded-lg shadow-lg object-cover" style="max-height: 500px;" src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}">
            </figure>
            @endif

            <!-- Konten Postingan -->
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                {{-- Menggunakan nl2br(e(...)) untuk mengubah baris baru (enter) menjadi tag <br> secara aman --}}
                {!! nl2br(e($post->konten)) !!}
            </div>
        </article>
    </div>
</div>
@endsection

