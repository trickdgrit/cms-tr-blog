<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class KesehatanController extends Controller
{
    private function getKesehatanData()
    {
        // Memeriksa jika data tidak ada di session, maka buat data default.
        if (!Session::has('kesehatan')) {
            Session::put('kesehatan', [
                ['id' => 'faskes-1', 'nama_faskes' => 'RSUD dr. Hendrikus Fernandez Larantuka', 'jenis' => 'Rumah Sakit', 'alamat' => 'Jl. Jend. Sudirman, Larantuka', 'jumlah_tenaga_medis' => 150],
                ['id' => 'faskes-2', 'nama_faskes' => 'Puskesmas Nagi', 'jenis' => 'Puskesmas', 'alamat' => 'Kelurahan Nagi, Larantuka', 'jumlah_tenaga_medis' => 25],
                ['id' => 'faskes-3', 'nama_faskes' => 'Klinik Santa Elisabeth', 'jenis' => 'Klinik', 'alamat' => 'Jl. Tiga, Larantuka', 'jumlah_tenaga_medis' => 15],
                ['id' => 'faskes-4', 'nama_faskes' => 'Apotek Kimia Farma', 'jenis' => 'Apotek', 'alamat' => 'Jl. Basuki Rahmat, Larantuka', 'jumlah_tenaga_medis' => 5],
            ]);
        }
        return Session::get('kesehatan');
    }

    private function setKesehatanData($data)
    {
        Session::put('kesehatan', $data);
    }

    public function index(): View
    {
        $data = $this->getKesehatanData();
        $jenisCounts = array_count_values(array_column($data, 'jenis'));
        $chartData = [
            'labels' => array_keys($jenisCounts),
            'data'   => array_values($jenisCounts),
        ];
        return view('kesehatan.index', compact('data', 'chartData'));
    }

    public function create(): View
    {
        return view('kesehatan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_faskes' => 'required|string|max:255',
            'jenis' => 'required|string|in:Rumah Sakit,Puskesmas,Klinik,Apotek',
            'alamat' => 'required|string',
            'jumlah_tenaga_medis' => 'required|integer|min:0',
        ]);

        $data = $this->getKesehatanData();
        $data[] = [
            'id' => 'faskes-' . Str::uuid(),
            'nama_faskes' => $request->nama_faskes,
            'jenis' => $request->jenis,
            'alamat' => $request->alamat,
            'jumlah_tenaga_medis' => $request->jumlah_tenaga_medis,
        ];
        $this->setKesehatanData($data);

        return redirect()->route('kesehatan.index')->with('success', 'Data faskes berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $data = $this->getKesehatanData();
        $detailData = collect($data)->firstWhere('id', $id);
        if (!$detailData) abort(404);
        return view('kesehatan.edit', ['data' => $detailData]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_faskes' => 'required|string|max:255',
            'jenis' => 'required|string|in:Rumah Sakit,Puskesmas,Klinik,Apotek',
            'alamat' => 'required|string',
            'jumlah_tenaga_medis' => 'required|integer|min:0',
        ]);

        $data = $this->getKesehatanData();
        $index = collect($data)->search(fn($item) => $item['id'] == $id);
        if ($index === false) {
            return redirect()->route('kesehatan.index')->with('error', 'Data tidak ditemukan.');
        }

        $data[$index] = [
            'id' => $id,
            'nama_faskes' => $request->nama_faskes,
            'jenis' => $request->jenis,
            'alamat' => $request->alamat,
            'jumlah_tenaga_medis' => $request->jumlah_tenaga_medis,
        ];
        $this->setKesehatanData($data);

        return redirect()->route('kesehatan.index')->with('success', 'Data faskes berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $data = $this->getKesehatanData();
        $data = array_values(array_filter($data, fn($item) => $item['id'] != $id));
        $this->setKesehatanData($data);

        return redirect()->route('kesehatan.index')->with('success', 'Data faskes berhasil dihapus.');
    }
}

