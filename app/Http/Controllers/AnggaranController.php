<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AnggaranController extends Controller
{
    private function getAnggaranData()
    {
        // Memeriksa jika data tidak ada di session, maka buat data default.
        if (!Session::has('anggaran')) {
            Session::put('anggaran', [
                ['id' => 'ang-1', 'nama_program' => 'Pembangunan Jalan Desa', 'sumber_dana' => 'APBD', 'jumlah_anggaran' => 500000000, 'realisasi' => 450000000],
                ['id' => 'ang-2', 'nama_program' => 'Bantuan Siswa Miskin', 'sumber_dana' => 'APBN', 'jumlah_anggaran' => 750000000, 'realisasi' => 700000000],
                ['id' => 'ang-3', 'nama_program' => 'Perbaikan Fasilitas Kesehatan', 'sumber_dana' => 'DAK', 'jumlah_anggaran' => 300000000, 'realisasi' => 250000000],
                ['id' => 'ang-4', 'nama_program' => 'Pelatihan UMKM', 'sumber_dana' => 'APBD', 'jumlah_anggaran' => 150000000, 'realisasi' => 150000000],
            ]);
        }
        return Session::get('anggaran');
    }

    private function setAnggaranData($data)
    {
        Session::put('anggaran', $data);
    }

    public function index(): View
    {
        $data = $this->getAnggaranData();
        $sumberDanaTotals = [];
        foreach ($data as $item) {
            $sumber = $item['sumber_dana'];
            $jumlah = $item['jumlah_anggaran'];
            if (!isset($sumberDanaTotals[$sumber])) {
                $sumberDanaTotals[$sumber] = 0;
            }
            $sumberDanaTotals[$sumber] += $jumlah;
        }
        $chartData = [
            'labels' => array_keys($sumberDanaTotals),
            'data'   => array_values($sumberDanaTotals),
        ];
        return view('anggaran.index', compact('data', 'chartData'));
    }

    public function create(): View
    {
        return view('anggaran.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'sumber_dana' => 'required|string|in:APBD,APBN,DAK,Lainnya',
            'jumlah_anggaran' => 'required|integer|min:0',
            'realisasi' => 'required|integer|min:0',
        ]);

        $data = $this->getAnggaranData();
        $data[] = [
            'id' => 'ang-' . Str::uuid(),
            'nama_program' => $request->nama_program,
            'sumber_dana' => $request->sumber_dana,
            'jumlah_anggaran' => $request->jumlah_anggaran,
            'realisasi' => $request->realisasi,
        ];
        $this->setAnggaranData($data);

        return redirect()->route('anggaran.index')->with('success', 'Data anggaran berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $data = $this->getAnggaranData();
        $detailData = collect($data)->firstWhere('id', $id);
        if (!$detailData) abort(404);
        return view('anggaran.edit', ['data' => $detailData]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'sumber_dana' => 'required|string|in:APBD,APBN,DAK,Lainnya',
            'jumlah_anggaran' => 'required|integer|min:0',
            'realisasi' => 'required|integer|min:0',
        ]);

        $data = $this->getAnggaranData();
        $index = collect($data)->search(fn($item) => $item['id'] == $id);
        if ($index === false) {
            return redirect()->route('anggaran.index')->with('error', 'Data tidak ditemukan.');
        }

        $data[$index] = [
            'id' => $id,
            'nama_program' => $request->nama_program,
            'sumber_dana' => $request->sumber_dana,
            'jumlah_anggaran' => $request->jumlah_anggaran,
            'realisasi' => $request->realisasi,
        ];
        $this->setAnggaranData($data);

        return redirect()->route('anggaran.index')->with('success', 'Data anggaran berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $data = $this->getAnggaranData();
        $data = array_values(array_filter($data, fn($item) => $item['id'] != $id));
        $this->setAnggaranData($data);

        return redirect()->route('anggaran.index')->with('success', 'Data anggaran berhasil dihapus.');
    }
}

