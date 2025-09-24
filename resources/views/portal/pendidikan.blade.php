@extends('layouts.portal')

@section('title', 'Data Pendidikan')

@section('content')

<!-- Header Section -->
<section class="bg-blue-600 text-white">
    <div class="container mx-auto px-6 py-16 text-center">
        <h1 class="text-4xl font-extrabold">Data Sektor Pendidikan</h1>
        <p class="mt-4 text-lg text-blue-100">Informasi mengenai sarana pendidikan di Kabupaten Flores Timur.</p>
    </div>
</section>

<!-- Main Content -->
<div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content (Tabel) -->
        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-lg">
             <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Sekolah</h2>
             <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                            <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Sekolah</th>
                            <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenjang</th>
                            <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah Siswa</th>
                            <th class="py-3 px-4 border-b text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jumlah Guru</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($data as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 border-b font-medium">{{ $item->nama_sekolah }}</td>
                            <td class="py-3 px-4 border-b">{{ $item->jenjang }}</td>
                            <td class="py-3 px-4 border-b">{{ number_format($item->jumlah_siswa) }}</td>
                            <td class="py-3 px-4 border-b">{{ number_format($item->jumlah_guru) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Data sekolah tidak tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sidebar (Chart) -->
        <aside class="space-y-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Statistik Jenjang Sekolah</h3>
                <div id="jenjangChart"></div>
            </div>
        </aside>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var options = {
            series: @json($chartData['data'] ?? []),
            chart: {
                type: 'donut',
                height: 350
            },
            labels: @json($chartData['labels'] ?? []),
            colors: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444'],
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

        var chart = new ApexCharts(document.querySelector("#jenjangChart"), options);
        chart.render();
    });
</script>
@endpush

