@extends('layouts.app')

@section('title', 'Data Kependudukan')

@section('content')
<div class="space-y-8">
    <!-- Card Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Kependudukan</h1>
            <p class="text-sm text-gray-500">Visualisasi dan manajemen data kependudukan per kecamatan.</p>
        </div>
    </div>

    <!-- Section Chart -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Grafik Rasio Jenis Kelamin</h2>
        <div id="genderChart"></div>
    </div>

    <!-- Section Tabel -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Data Kecamatan</h2>
            <a href="{{ route('kependudukan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
                Tambah Data
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
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Kecamatan</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah Penduduk</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Laki-laki</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Perempuan</th>
                        <th class="py-3 px-4 border-b text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($data as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border-b">{{ $item['nama_kecamatan'] ?? 'N/A' }}</td>
                        <td class="py-3 px-4 border-b">{{ number_format($item['jumlah_penduduk'] ?? 0) }}</td>
                        <td class="py-3 px-4 border-b">{{ number_format($item['pria'] ?? 0) }}</td>
                        <td class="py-3 px-4 border-b">{{ number_format($item['wanita'] ?? 0) }}</td>
                        <td class="py-3 px-4 border-b text-center">
                            {{-- Hanya tampilkan tombol aksi jika ID ada untuk mencegah error --}}
                            @if(isset($item['id']))
                            <div class="flex item-center justify-center space-x-2">
                                <a href="{{ route('kependudukan.edit', $item['id']) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <form action="{{ route('kependudukan.destroy', $item['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Tidak ada data.</td>
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
            series: @json($chartData['data'] ?? [0, 0]),
            chart: {
                type: 'pie',
                height: 350
            },
            labels: @json($chartData['labels'] ?? ['Pria', 'Wanita']),
            colors: ['#3B82F6', '#EC4899'],
            legend: {
                position: 'bottom'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: '100%'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#genderChart"), options);
        chart.render();
    });
</script>
@endpush

