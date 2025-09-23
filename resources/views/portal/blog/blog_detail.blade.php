<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul sekarang dinamis -->
    <title>{{ $post->title }} - Flores Timur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        .prose {
            max-width: 80ch; /* Memberi batas lebar tulisan agar nyaman dibaca */
        }
        .prose h1 {
            font-size: 2.25rem;
            line-height: 2.5rem;
            font-weight: 700;
        }
        .prose p {
            font-size: 1.125rem;
            line-height: 1.75rem;
            color: #374151;
        }
        .prose img {
            border-radius: 0.75rem;
        }
    </style>
</head>
<body>
    <!-- Header & Navigation (Sama seperti di halaman utama) -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="/" class="flex items-center space-x-3">
                    <img src="https://placehold.co/40x40/3b82f6/white?text=FT" alt="Logo Flores Timur" class="rounded-full">
                    <span class="font-bold text-xl text-slate-800">Flores Timur</span>
                </a>
            </div>
            <nav class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-slate-600 hover:text-blue-600 transition">Beranda</a>
                <a href="/portal/kependudukan" class="text-slate-600 hover:text-blue-600 transition">Kependudukan</a>
                <a href="/#berita" class="text-slate-600 hover:text-blue-600 transition">Berita</a>
                <a href="#" class="text-slate-600 hover:text-blue-600 transition">Profil Daerah</a>
            </nav>
            <a href="/login" class="hidden md:block bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition shadow">Login Admin</a>
            <!-- Tombol Menu Mobile -->
            <button class="md:hidden" id="mobile-menu-button">
                <i data-lucide="menu"></i>
            </button>
        </div>
        <!-- Menu Mobile -->
        <div class="md:hidden hidden" id="mobile-menu">
            <a href="/" class="block py-2 px-6 text-sm hover:bg-gray-100">Beranda</a>
            <a href="/portal/kependudukan" class="block py-2 px-6 text-sm hover:bg-gray-100">Kependudukan</a>
            <a href="/#berita" class="block py-2 px-6 text-sm hover:bg-gray-100">Berita</a>
            <a href="#" class="block py-2 px-6 text-sm hover:bg-gray-100">Profil Daerah</a>
            <a href="/login" class="block py-2 px-6 text-sm bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold">Login Admin</a>
        </div>
    </header>

    <!-- Main Content for Blog Post -->
    <main class="container mx-auto px-6 py-12">
        <article class="prose lg:prose-xl mx-auto bg-white p-8 md:p-12 rounded-xl shadow-md">
            <!-- Data ini akan diisi oleh Controller Anda -->
            
            <!-- Judul Berita -->
            <h1>{{ $post->title }}</h1>

            <!-- Info Meta: Kategori dan Tanggal -->
            <div class="flex items-center space-x-4 text-slate-500 mb-6">
                <span>Kategori: <strong>{{ $post->category }}</strong></span>
                <span>•</span>
                <!-- Menggunakan tanggal_publikasi -->
                <span>Diterbitkan pada: <strong>{{ \Carbon\Carbon::parse($post->tanggal_publikasi)->format('d M Y') }}</strong></span>
            </div>

            <!-- Gambar Utama Berita, dinamis dengan fallback -->
            <img src="{{ $post->image_url ?? 'https://placehold.co/800x450/a78bfa/white?text=' . urlencode($post->title) }}" alt="{{ $post->title }}" class="w-full mb-8">

            <!-- Isi Konten Berita -->
            <div>
                {!! $post->content !!}
            </div>
            
            <div class="mt-12 border-t pt-6">
                <a href="/#berita" class="text-blue-600 hover:underline">← Kembali ke Daftar Berita</a>
            </div>

        </article>
    </main>

    <!-- Footer (Sama seperti halaman utama) -->
    <footer class="bg-slate-800 text-white py-12 mt-16">
        <div class="container mx-auto px-6 text-center">
             <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Flores Timur. Semua Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script>
        lucide.createIcons();
        
        // Script untuk toggle menu mobile
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

