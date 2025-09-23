@extends('layouts.app')

@section('title', 'Data Pendidikan')

@section('content')
<div class="space-y-8">
    <!-- Card Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Pendidikan</h1>
            <p class="text-sm text-gray-500">Visualisasi dan manajemen data sekolah di Flores Timur.</p>
        </div>
    </div>

    <!-- Section Chart -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Grafik Jumlah Sekolah per Jenjang</h2>
        <div id="jenjangChart"></div>
    </div>

    <!-- Section Tabel -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">Data Sekolah</h2>
            <a href="{{ route('pendidikan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
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
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Sekolah</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenjang</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah Siswa</th>
                        <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah Guru</th>
                        <th class="py-3 px-4 border-b text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($data as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border-b">{{ $item['nama_sekolah'] ?? 'N/A' }}</td>
                        <td class="py-3 px-4 border-b">{{ $item['jenjang'] ?? 'N/A' }}</td>
                        <td class="py-3 px-4 border-b">{{ number_format($item['jumlah_siswa'] ?? 0) }}</td>
                        <td class="py-3 px-4 border-b">{{ number_format($item['jumlah_guru'] ?? 0) }}</td>
                        <td class="py-3 px-4 border-b text-center">
                            @if(isset($item['id']))
                            <div class="flex item-center justify-center space-x-2">
                                <a href="{{ route('pendidikan.edit', $item['id']) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <form action="{{ route('pendidikan.destroy', $item['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
            series: [{
                name: 'Jumlah Sekolah',
                data: @json($chartData['data'] ?? [])
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($chartData['labels'] ?? []),
            },
            yaxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " sekolah"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#jenjangChart"), options);
        chart.render();
    });
</script>
@endpush

