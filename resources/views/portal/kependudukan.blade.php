@extends('layouts.portal')

@section('content')
<div class="container mx-auto px-6 py-12 space-y-12">
    <!-- Header Section -->
    <section class="text-center">
        <h1 class="text-4xl font-extrabold text-gray-800">Data Kependudukan Flores Timur</h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">Statistik demografi terperinci berdasarkan data terbaru per kecamatan.</p>
    </section>

    <!-- Chart Section -->
    <section class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
         <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Rasio Penduduk Pria & Wanita</h2>
            @if($role === 'admin')
            <a href="{{ route('kependudukan.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition text-sm font-medium">Kelola Data &rarr;</a>
            @endif
        </div>
        <div id="genderChart"></div>
    </section>

    <!-- Table Section -->
    <section class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tabel Data Penduduk per Kecamatan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kecamatan</th>
                        <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Pria</th>
                        <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Wanita</th>
                        <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total Penduduk</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @forelse($data as $item)
                    <tr>
                        <td class="py-4 px-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="py-4 px-4 whitespace-nowrap font-medium">{{ $item['nama_kecamatan'] ?? 'N/A' }}</td>
                        <td class="py-4 px-4 whitespace-nowrap text-right">{{ number_format($item['pria'] ?? 0) }}</td>
                        <td class="py-4 px-4 whitespace-nowrap text-right">{{ number_format($item['wanita'] ?? 0) }}</td>
                        <td class="py-4 px-4 whitespace-nowrap text-right font-bold">{{ number_format($item['jumlah_penduduk'] ?? 0) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var options = {
          series: [{
          name: 'Pria',
          data: @json($chartData['pria'] ?? [])
        }, {
          name: 'Wanita',
          data: @json($chartData['wanita'] ?? [])
        }],
          chart: {
          type: 'bar',
          height: 400,
          stacked: true,
          toolbar: { show: false },
        },
        plotOptions: { bar: { horizontal: true, } },
        stroke: { width: 1, colors: ['#fff'] },
        xaxis: {
          categories: @json($chartData['labels'] ?? []),
          labels: {
            formatter: (val) => new Intl.NumberFormat('id-ID').format(val)
          }
        },
        yaxis: { title: { text: undefined }, },
        tooltip: {
          y: {
            formatter: (val) => new Intl.NumberFormat('id-ID').format(val) + " Jiwa"
          }
        },
        fill: { opacity: 1 },
        legend: { position: 'top', horizontalAlign: 'left', offsetX: 40 }
        };

        var chart = new ApexCharts(document.querySelector("#genderChart"), options);
        chart.render();
    });
</script>
@endpush
