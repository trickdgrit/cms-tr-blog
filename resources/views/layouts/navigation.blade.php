<!-- Sidebar -->
<div class="w-64 bg-gray-800 text-white flex flex-col min-h-screen flex-shrink-0">
    <!-- Logo/Header Sidebar -->
    <div class="h-16 flex items-center justify-center px-4 bg-gray-900">
        <h1 class="text-xl font-bold tracking-wider">Flores Timur</h1>
    </div>

    <!-- Menu Links -->
    <nav class="flex-1 px-4 py-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-900' : '' }}">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Dashboard
        </a>
        <a href="{{ route('kependudukan.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('kependudukan.*') ? 'bg-gray-900' : '' }}">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.122-1.28-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.122-1.28.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Kependudukan
        </a>
        <a href="{{ route('pendidikan.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('pendidikan.*') ? 'bg-gray-900' : '' }}">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422A12.083 12.083 0 0121.25 12c0 2.44-1.38 4.58-3.42 5.578L12 14z"></path><path d="M12 14l-6.16-3.422A12.083 12.083 0 002.75 12c0 2.44 1.38 4.58 3.42 5.578L12 14z"></path></svg>
            Pendidikan
        </a>
        <a href="{{ route('kesehatan.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('kesehatan.*') ? 'bg-gray-900' : '' }}">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Kesehatan
        </a>
        <a href="{{ route('anggaran.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('anggaran.*') ? 'bg-gray-900' : '' }}">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 16v-1m0 1v.01M4 4h16v16H4V4z"></path></svg>
            Anggaran
        </a>
        <a href="{{ route('sarana.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('sarana.*') ? 'bg-gray-900' : '' }}">
           <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            Sarana & Prasarana
        </a>
        <a href="{{ route('blog.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('blog.*') ? 'bg-gray-900' : '' }}">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            Blog
        </a>
        <a href="{{ route('pengaturan.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('pengaturan.*') ? 'bg-gray-900' : '' }}">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.096 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Pengaturan
        </a>
    </nav>

    <!-- Logout Button -->
    <div class="p-4 mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); this.closest('form').submit();"
               class="flex items-center w-full px-3 py-2 text-sm font-medium rounded-md text-red-300 hover:bg-red-700 hover:text-white">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </a>
        </form>
    </div>
</div>
