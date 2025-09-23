@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
<div class="space-y-8">
    <!-- Card Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang di Dashboard</h1>
        <p class="text-sm text-gray-500">Berikut adalah ringkasan data terkini dari Kabupaten Flores Timur.</p>
    </div>

    <!-- Section KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card Total Penduduk -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <div class="bg-blue-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.122-1.28-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.122-1.28.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Penduduk</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalPenduduk) }}</p>
            </div>
        </div>

        <!-- Card Total Sekolah -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <div class="bg-green-100 p-3 rounded-full">
                 <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422A12.083 12.083 0 0121.25 12c0 2.44-1.38 4.58-3.42 5.578L12 14z"></path><path d="M12 14l-6.16-3.422A12.083 12.083 0 002.75 12c0 2.44 1.38 4.58 3.42 5.578L12 14z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Sekolah</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalSekolah) }}</p>
            </div>
        </div>

        <!-- Card Total Faskes -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <div class="bg-red-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Faskes</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalFaskes) }}</p>
            </div>
        </div>
        
        <!-- Card Total Anggaran -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <div class="bg-yellow-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 16v-1m0 1v.01M4 4h16v16H4V4z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Anggaran</p>
                <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalAnggaran, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Card Total Sarana -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <div class="bg-indigo-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Sarana</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalSarana) }}</p>
            </div>
        </div>
        
        <!-- Card Total Postingan Blog -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
            <div class="bg-pink-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Postingan Blog</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalBlog) }}</p>
            </div>
        </div>
    </div>

    <!-- Section Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Chart Populasi per Kecamatan -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Populasi per Kecamatan</h2>
            <div id="populasiChart"></div>
        </div>
        
        <!-- Chart Anggaran vs Realisasi -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Anggaran vs Realisasi</h2>
            <div id="anggaranChart"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Chart Populasi
        var populasiOptions = {
            series: [{
                name: 'Jumlah Penduduk',
                data: @json($populasiChartData['data'] ?? [])
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                },
            },
            dataLabels: { enabled: false },
            xaxis: {
                categories: @json($populasiChartData['labels'] ?? []),
            },
            yaxis: {
                title: { text: 'Jumlah Jiwa' }
            },
            fill: { opacity: 1 },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " jiwa"
                    }
                }
            }
        };

        var populasiChart = new ApexCharts(document.querySelector("#populasiChart"), populasiOptions);
        populasiChart.render();

        // Chart Anggaran
        var anggaranOptions = {
            series: [{
                name: 'Anggaran',
                data: @json($anggaranChartData['anggaran'] ?? [])
            }, {
                name: 'Realisasi',
                data: @json($anggaranChartData['realisasi'] ?? [])
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '60%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: { enabled: false },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($anggaranChartData['labels'] ?? []),
            },
            yaxis: {
                title: { text: 'Rupiah (Rp)' },
                labels: {
                    formatter: function (val) {
                        return new Intl.NumberFormat('id-ID').format(val);
                    }
                }
            },
            fill: { opacity: 1 },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "Rp " + new Intl.NumberFormat('id-ID').format(val);
                    }
                }
            }
        };

        var anggaranChart = new ApexCharts(document.querySelector("#anggaranChart"), anggaranOptions);
        anggaranChart.render();
    });
</script>
@endpush

