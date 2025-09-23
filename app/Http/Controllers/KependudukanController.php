<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class KependudukanController extends Controller
{
    private function getKependudukanData()
    {
        // PERBAIKAN: Periksa jika data tidak ada di session, maka buat data default.
        if (!Session::has('kependudukan')) {
            Session::put('kependudukan', [
                ['id' => 'kec-1', 'nama_kecamatan' => 'Larantuka', 'jumlah_penduduk' => 35000, 'pria' => 17000, 'wanita' => 18000],
                ['id' => 'kec-2', 'nama_kecamatan' => 'Ile Mandiri', 'jumlah_penduduk' => 25000, 'pria' => 12000, 'wanita' => 13000],
                ['id' => 'kec-3', 'nama_kecamatan' => 'Tanjung Bunga', 'jumlah_penduduk' => 18000, 'pria' => 9500, 'wanita' => 8500],
                ['id' => 'kec-4', 'nama_kecamatan' => 'Wulanggitang', 'jumlah_penduduk' => 22000, 'pria' => 11500, 'wanita' => 10500],
            ]);
        }
        return Session::get('kependudukan');
    }

    private function setKependudukanData($data)
    {
        Session::put('kependudukan', $data);
    }

    public function index(): View
    {
        $data = $this->getKependudukanData();
        $totalPria = array_sum(array_column($data, 'pria'));
        $totalWanita = array_sum(array_column($data, 'wanita'));
        $chartData = [
            'labels' => ['Pria', 'Wanita'],
            'data'   => [$totalPria, $totalWanita],
        ];
        return view('kependudukan.index', compact('data', 'chartData'));
    }

    public function create(): View
    {
        return view('kependudukan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
            'jumlah_penduduk' => 'required|integer|min:0',
            'pria' => 'required|integer|min:0',
            'wanita' => 'required|integer|min:0',
        ]);

        $data = $this->getKependudukanData();
        $newData = [
            'id' => 'kec-' . Str::uuid(),
            'nama_kecamatan' => $request->nama_kecamatan,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'pria' => $request->pria,
            'wanita' => $request->wanita,
        ];
        $data[] = $newData;
        $this->setKependudukanData($data);

        return redirect()->route('kependudukan.index')->with('success', 'Data kependudukan berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $data = $this->getKependudukanData();
        $detailData = collect($data)->firstWhere('id', $id);
        if (!$detailData) abort(404);
        return view('kependudukan.edit', ['data' => $detailData]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
            'jumlah_penduduk' => 'required|integer|min:0',
            'pria' => 'required|integer|min:0',
            'wanita' => 'required|integer|min:0',
        ]);

        $data = $this->getKependudukanData();
        $index = collect($data)->search(fn($item) => $item['id'] == $id);

        if ($index === false) {
            return redirect()->route('kependudukan.index')->with('error', 'Data tidak ditemukan.');
        }

        $data[$index] = [
            'id' => $id,
            'nama_kecamatan' => $request->nama_kecamatan,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'pria' => $request->pria,
            'wanita' => $request->wanita,
        ];
        $this->setKependudukanData($data);

        return redirect()->route('kependudukan.index')->with('success', 'Data kependudukan berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $data = $this->getKependudukanData();
        $data = array_values(array_filter($data, fn($item) => $item['id'] != $id));
        $this->setKependudukanData($data);

        return redirect()->route('kependudukan.index')->with('success', 'Data kependudukan berhasil dihapus.');
    }
}

