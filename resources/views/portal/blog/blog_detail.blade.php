@extends('layouts.portal')

@section('title', $post->judul)

@push('styles')
<style>
    .prose {
        max-width: 80ch; /* Memberi batas lebar tulisan agar nyaman dibaca */
    }
    .prose h1 {
        font-size: 2.5rem;
        line-height: 2.75rem;
        font-weight: 800;
        color: #1f2937;
    }
    .prose p {
        font-size: 1.125rem;
        line-height: 1.75rem;
        color: #374151;
        margin-top: 1.5em;
        margin-bottom: 1.5em;
    }
    .prose img {
        border-radius: 0.75rem;
        margin-top: 2em;
        margin-bottom: 2em;
    }
    .prose a {
        color: #2563eb;
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<!-- Main Content for Blog Post -->
<main class="container mx-auto px-6 py-12">
    <article class="prose lg:prose-xl mx-auto bg-white p-8 md:p-12 rounded-xl shadow-md">

        <!-- Info Meta: Kategori dan Tanggal -->
        <div class="not-prose mb-6">
            <span class="text-indigo-600 font-semibold">{{ $post->kategori }}</span>
            <span class="mx-2 text-gray-400">•</span>
            <span class="text-gray-500">Diterbitkan pada: <strong>{{ \Carbon\Carbon::parse($post->tanggal_publikasi)->translatedFormat('d F Y') }}</strong></span>
        </div>
        
        <!-- Judul Berita -->
        <h1>{{ $post->judul }}</h1>

        <!-- Gambar Utama Berita, dinamis dengan fallback -->
        <img src="{{ $post->image_url ?? 'https://placehold.co/800x450/a78bfa/white?text=' . urlencode($post->judul) }}" alt="{{ $post->judul }}" class="w-full">

        <!-- Isi Konten Berita -->
        <div>
            {!! $post->konten !!}
        </div>
        
        <div class="mt-12 border-t pt-6 not-prose">
            <a href="{{ route('portal.index') }}#berita" class="text-blue-600 hover:underline">← Kembali ke Daftar Berita</a>
        </div>

    </article>
</main>
@endsection

