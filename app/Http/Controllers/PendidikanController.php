<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PendidikanController extends Controller
{
    private function getPendidikanData()
    {
        if (!Session::has('pendidikan')) {
            Session::put('pendidikan', [
                ['id' => 'sek-1', 'nama_sekolah' => 'SMA Negeri 1 Larantuka', 'jenjang' => 'SMA', 'jumlah_siswa' => 800, 'jumlah_guru' => 50],
                ['id' => 'sek-2', 'nama_sekolah' => 'SMP Negeri 1 Larantuka', 'jenjang' => 'SMP', 'jumlah_siswa' => 650, 'jumlah_guru' => 45],
                ['id' => 'sek-3', 'nama_sekolah' => 'SD Inpres Larantuka', 'jenjang' => 'SD', 'jumlah_siswa' => 400, 'jumlah_guru' => 25],
                ['id' => 'sek-4', 'nama_sekolah' => 'TK Santa Maria', 'jenjang' => 'TK', 'jumlah_siswa' => 100, 'jumlah_guru' => 10],
            ]);
        }
        return Session::get('pendidikan');
    }

    private function setPendidikanData($data)
    {
        Session::put('pendidikan', $data);
    }

    public function index(): View
    {
        $data = $this->getPendidikanData();
        $jenjangCounts = array_count_values(array_column($data, 'jenjang'));
        $chartData = [
            'labels' => array_keys($jenjangCounts),
            'data'   => array_values($jenjangCounts),
        ];
        return view('pendidikan.index', compact('data', 'chartData'));
    }

    public function create(): View
    {
        return view('pendidikan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'jenjang' => 'required|string|in:TK,SD,SMP,SMA',
            'jumlah_siswa' => 'required|integer|min:0',
            'jumlah_guru' => 'required|integer|min:0',
        ]);

        $data = $this->getPendidikanData();
        $data[] = [
            'id' => 'sek-' . Str::uuid(),
            'nama_sekolah' => $request->nama_sekolah,
            'jenjang' => $request->jenjang,
            'jumlah_siswa' => $request->jumlah_siswa,
            'jumlah_guru' => $request->jumlah_guru,
        ];
        $this->setPendidikanData($data);

        return redirect()->route('pendidikan.index')->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $data = $this->getPendidikanData();
        $detailData = collect($data)->firstWhere('id', $id);
        if (!$detailData) abort(404);
        return view('pendidikan.edit', ['data' => $detailData]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'jenjang' => 'required|string|in:TK,SD,SMP,SMA',
            'jumlah_siswa' => 'required|integer|min:0',
            'jumlah_guru' => 'required|integer|min:0',
        ]);

        $data = $this->getPendidikanData();
        $index = collect($data)->search(fn($item) => $item['id'] == $id);
        if ($index === false) {
            return redirect()->route('pendidikan.index')->with('error', 'Data tidak ditemukan.');
        }

        $data[$index] = [
            'id' => $id,
            'nama_sekolah' => $request->nama_sekolah,
            'jenjang' => $request->jenjang,
            'jumlah_siswa' => $request->jumlah_siswa,
            'jumlah_guru' => $request->jumlah_guru,
        ];
        $this->setPendidikanData($data);

        return redirect()->route('pendidikan.index')->with('success', 'Data sekolah berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $data = $this->getPendidikanData();
        $data = array_values(array_filter($data, fn($item) => $item['id'] != $id));
        $this->setPendidikanData($data);

        return redirect()->route('pendidikan.index')->with('success', 'Data sekolah berhasil dihapus.');
    }
}

