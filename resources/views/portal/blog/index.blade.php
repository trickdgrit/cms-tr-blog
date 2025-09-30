@extends('layouts.portal')

@section('title', 'Berita & Informasi')

@section('content')
<!-- Header Section -->
<section class="bg-gray-700 text-white">
    <div class="container mx-auto px-6 py-16 text-center">
        <h1 class="text-4xl font-extrabold">Berita & Informasi</h1>
        <p class="mt-4 text-lg text-gray-200">Kumpulan berita dan informasi terkini dari Pemerintah Kabupaten Flores Timur.</p>
    </div>
</section>

<!-- Main Content -->
<div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
        {{-- Menggunakan Route Model Binding dengan mengirim seluruh objek $post --}}
        <a href="{{ route('portal.blog.show', $post) }}" class="block bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
            {{-- Menampilkan gambar dari storage, atau placeholder jika tidak ada --}}
            <img class="h-56 w-full object-cover" src="{{ $post->gambar ? asset('storage/' . $post->gambar) : 'https://placehold.co/600x400/4B5563/FFFFFF?text=Berita' }}" alt="{{ $post->judul }}">
            <div class="p-6">
                <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">{{ $post->kategori }}</span>
                <h3 class="mt-4 font-bold text-xl text-gray-900 leading-tight">{{ $post->judul }}</h3>
                <p class="mt-2 text-gray-600 text-sm">
                    Oleh: <span class="font-semibold">{{ $post->nama_penulis }}</span> pada {{ $post->tanggal_publikasi->format('d M Y') }}
                </p>
            </div>
        </a>
        @empty
        <p class="col-span-3 text-center text-gray-500">Belum ada berita untuk ditampilkan.</p>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div class="mt-12">
        {{ $posts->links() }}
    </div>
</div>
@endsection

