@extends('layouts.app')

@section('title', 'Manajemen Blog')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Blog</h1>
            <p class="text-sm text-gray-500">Kelola semua postingan berita dan informasi.</p>
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Grafik Postingan per Kategori</h2>
        <div id="kategoriChart"></div>
    </div>

    <!-- Tabel Data -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Postingan</h2>
            <a href="{{ route('blog.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
                Tambah Postingan
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Gambar</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Judul</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Penulis</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tgl Publikasi</th>
                        <th class="py-3 px-4 border-b text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($data as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">
                            {{-- Menampilkan gambar dari storage, atau placeholder jika tidak ada --}}
                            <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://placehold.co/100x60/e2e8f0/adb5bd?text=N/A' }}" alt="{{ $item->judul }}" class="h-12 w-20 object-cover rounded">
                        </td>
                        <td class="py-3 px-4 border-b font-medium">{{ $item->judul }}</td>
                        <td class="py-3 px-4 border-b">{{ $item->kategori }}</td>
                        <td class="py-3 px-4 border-b">{{ $item->nama_penulis }}</td>
                        <td class="py-3 px-4 border-b">{{ $item->tanggal_publikasi->format('d M Y') }}</td>
                        <td class="py-3 px-4 border-b text-center">
                            <div class="flex item-center justify-center space-x-2">
                                {{-- Menggunakan Route Model Binding dengan mengirim objek $item --}}
                                <a href="{{ route('blog.edit', $item) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <form action="{{ route('blog.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada postingan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var options = {
            series: @json($chartData['data'] ?? []),
            chart: {
                type: 'pie',
                height: 350
            },
            labels: @json($chartData['labels'] ?? []),
            legend: { position: 'bottom' },
        };

        var chart = new ApexCharts(document.querySelector("#kategoriChart"), options);
        chart.render();
    });
</script>
@endpush

