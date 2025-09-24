<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Resmi') - Pemerintah Kabupaten Flores Timur</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-bg {
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1577985051167-5d8571b58535?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div id="app">
        <!-- Header & Navigation -->
        <header x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
            <nav class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Lambang_Kabupaten_Flores_Timur.png" alt="Logo Flores Timur" class="h-10 w-auto mr-3">
                        <a href="{{ route('portal.index') }}" class="text-xl font-bold text-gray-800">
                            Kabupaten Flores Timur
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('portal.index') }}" class="text-gray-600 hover:text-blue-600 transition">Beranda</a>
                        <a href="{{ route('portal.kependudukan') }}" class="text-gray-600 hover:text-blue-600 transition">Kependudukan</a>
                        {{-- Tautan menu lain bisa ditambahkan di sini --}}
                        <a href="{{ route('portal.pendidikan') }}" class="text-gray-600 hover:text-blue-600 transition">Pendidikan</a>
                        <a href="{{ route('portal.kesehatan') }}" class="text-gray-600 hover:text-blue-600 transition">Kesehatan</a>
                        <a href="{{ route('portal.blog.index') }}" class="text-gray-600 hover:text-blue-600 transition">Berita</a>
                    </div>
                    
                    <!-- Tombol Login/Admin -->
                     <div class="hidden md:flex items-center">
                        @if(request()->query('role') === 'admin')
                             <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                                Kelola Dashboard
                            </a>
                        @else
                             <a href="{{ route('login') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 transition">
                                Login
                            </a>
                        @endif
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button @click="open = !open" class="text-gray-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div x-show="open" class="md:hidden mt-4">
                    <a href="{{ route('portal.index') }}" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-100">Beranda</a>
                    <a href="{{ route('portal.kependudukan') }}" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-100">Kependudukan</a>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-100">Pendidikan</a>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-100">Kesehatan</a>
                     @if(request()->query('role') === 'admin')
                         <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-sm text-blue-600 hover:bg-gray-100">Kelola Dashboard</a>
                    @else
                         <a href="{{ route('login') }}" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-100">Login</a>
                    @endif
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
        
        <!-- Footer -->
        <footer class="bg-gray-800 text-white mt-12">
            <div class="container mx-auto px-6 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-lg font-semibold">Pemerintah Kabupaten Flores Timur</h3>
                        <p class="text-sm text-gray-400">Jl. Jend. Sudirman No.1, Larantuka, NTT</p>
                    </div>
                    <div class="text-center">
                        <p class="text-sm">&copy; {{ date('Y') }} Hak Cipta Dilindungi. Dikembangkan untuk Flores Timur.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @stack('scripts')
</body>
</html>

