<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Kabupaten Flores Timur</title>
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
        .hero-bg {
            background-image: linear-gradient(to right, rgba(0,0,0,0.6), rgba(0,0,0,0.2)), url('https://placehold.co/1600x800/a78bfa/white?text=Pemandangan+Flores+Timur');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>

    <!-- Header & Navigation -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="https://placehold.co/40x40/3b82f6/white?text=FT" alt="Logo Flores Timur" class="rounded-full">
                <span class="font-bold text-xl text-slate-800">Flores Timur</span>
            </div>
            <nav class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-slate-600 hover:text-blue-600 transition">Beranda</a>
                <a href="/portal/kependudukan" class="text-slate-600 hover:text-blue-600 transition">Kependudukan</a>
                <a href="#" class="text-slate-600 hover:text-blue-600 transition">Berita</a>
                <a href="#" class="text-slate-600 hover:text-blue-600 transition">Profil Daerah</a>
                <a href="#" class="text-slate-600 hover:text-blue-600 transition">Layanan Publik</a>
            </nav>
            <a href="/login" class="hidden md:block bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition shadow">Login Admin</a>
            <button class="md:hidden" id="mobile-menu-button">
                <i data-lucide="menu"></i>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <a href="/" class="block py-2 px-6 text-sm hover:bg-gray-100">Beranda</a>
            <a href="/portal/kependudukan" class="block py-2 px-6 text-sm hover:bg-gray-100">Kependudukan</a>
            <a href="#" class="block py-2 px-6 text-sm hover:bg-gray-100">Berita</a>
            <a href="#" class="block py-2 px-6 text-sm hover:bg-gray-100">Profil Daerah</a>
            <a href="#" class="block py-2 px-6 text-sm hover:bg-gray-100">Layanan Publik</a>
            <a href="/login" class="block py-2 px-6 text-sm bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold">Login Admin</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-bg text-white h-[60vh] flex items-center">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl md:text-6xl font-bold max-w-3xl leading-tight">Membangun Flores Timur, Sejahtera Bersama</h1>
            <p class="mt-4 max-w-xl text-lg">Portal informasi dan layanan resmi Pemerintah Kabupaten Flores Timur. Transparan, akuntabel, dan melayani.</p>
            <div class="mt-8">
                <a href="#berita" class="bg-white text-slate-800 font-bold px-8 py-3 rounded-full hover:bg-slate-200 transition text-lg">Lihat Berita Terbaru</a>
            </div>
        </div>
    </section>
    
    <!-- Layanan Unggulan Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-slate-800">Layanan Unggulan</h2>
            <p class="text-slate-500 mt-2">Akses layanan publik kami dengan mudah dan cepat.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
                <div class="p-8 border border-gray-200 rounded-xl hover:shadow-lg hover:-translate-y-2 transition-transform">
                    <i data-lucide="file-text" class="mx-auto text-blue-600 h-12 w-12"></i>
                    <h3 class="font-bold text-xl mt-4">Perizinan Online</h3>
                    <p class="text-slate-500 mt-2 text-sm">Ajukan berbagai jenis perizinan usaha dan lainnya secara online.</p>
                </div>
                <div class="p-8 border border-gray-200 rounded-xl hover:shadow-lg hover:-translate-y-2 transition-transform">
                    <i data-lucide="users" class="mx-auto text-green-600 h-12 w-12"></i>
                    <h3 class="font-bold text-xl mt-4">Info Kependudukan</h3>
                    <p class="text-slate-500 mt-2 text-sm">Cek data kependudukan dan informasi terkait administrasi.</p>
                </div>
                <div class="p-8 border border-gray-200 rounded-xl hover:shadow-lg hover:-translate-y-2 transition-transform">
                    <i data-lucide="heart-pulse" class="mx-auto text-red-600 h-12 w-12"></i>
                    <h3 class="font-bold text-xl mt-4">Jadwal Kesehatan</h3>
                    <p class="text-slate-500 mt-2 text-sm">Informasi jadwal puskesmas, posyandu, dan program kesehatan lainnya.</p>
                </div>
                <div class="p-8 border border-gray-200 rounded-xl hover:shadow-lg hover:-translate-y-2 transition-transform">
                    <i data-lucide="landmark" class="mx-auto text-yellow-600 h-12 w-12"></i>
                    <h3 class="font-bold text-xl mt-4">Pajak & Retribusi</h3>
                    <p class="text-slate-500 mt-2 text-sm">Informasi dan pembayaran pajak daerah serta retribusi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terkini Section -->
    <section id="berita" class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-slate-800 text-center">Berita Terkini Flores Timur</h2>
             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                <!-- News Card 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden group">
                    <img src="https://placehold.co/400x250/a78bfa/white?text=Berita+1" class="w-full h-48 object-cover group-hover:scale-105 transition-transform">
                    <div class="p-6">
                        <p class="text-sm text-slate-500">Infrastruktur • 20 Sep 2025</p>
                        <h3 class="font-bold text-xl mt-2 text-slate-800">Peresmian Jalan Baru di Kecamatan Wulanggitang</h3>
                        <a href="#" class="text-blue-600 font-semibold mt-4 inline-block">Baca Selengkapnya →</a>
                    </div>
                </div>
                <!-- News Card 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden group">
                    <img src="https://placehold.co/400x250/facc15/white?text=Berita+2" class="w-full h-48 object-cover group-hover:scale-105 transition-transform">
                    <div class="p-6">
                        <p class="text-sm text-slate-500">Kesehatan • 18 Sep 2025</p>
                        <h3 class="font-bold text-xl mt-2 text-slate-800">Program Vaksinasi Baru Jangkau 5.000 Warga</h3>
                        <a href="#" class="text-blue-600 font-semibold mt-4 inline-block">Baca Selengkapnya →</a>
                    </div>
                </div>
                <!-- News Card 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden group">
                    <img src="https://placehold.co/400x250/4ade80/white?text=Berita+3" class="w-full h-48 object-cover group-hover:scale-105 transition-transform">
                    <div class="p-6">
                        <p class="text-sm text-slate-500">Pendidikan • 15 Sep 2025</p>
                        <h3 class="font-bold text-xl mt-2 text-slate-800">Bantuan Pendidikan Disalurkan ke 30 Sekolah</h3>
                        <a href="#" class="text-blue-600 font-semibold mt-4 inline-block">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-800 text-white py-12">
        <div class="container mx-auto px-6 text-center">
             <p>&copy; 2025 Pemerintah Kabupaten Flores Timur. Semua Hak Cipta Dilindungi.</p>
             <div class="flex justify-center space-x-6 mt-4">
                 <a href="#" class="hover:text-blue-400"><i data-lucide="facebook"></i></a>
                 <a href="#" class="hover:text-blue-400"><i data-lucide="twitter"></i></a>
                 <a href="#" class="hover:text-blue-400"><i data-lucide="instagram"></i></a>
                 <a href="#" class="hover:text-blue-400"><i data-lucide="youtube"></i></a>
             </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

