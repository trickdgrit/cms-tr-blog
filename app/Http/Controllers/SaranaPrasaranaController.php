<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SaranaPrasaranaController extends Controller
{
    private function getSaranaData()
    {
        return Session::get('sarana', [
            ['id' => 'sarana-1', 'nama_sarana' => 'Jalan Raya Larantuka-Maumere', 'kategori' => 'Jalan', 'kondisi' => 'Baik', 'jumlah' => 1],
            ['id' => 'sarana-2', 'nama_sarana' => 'Pasar Inpres Larantuka', 'kategori' => 'Pasar', 'kondisi' => 'Rusak Ringan', 'jumlah' => 1],
            ['id' => 'sarana-3', 'nama_sarana' => 'Jembatan Titehena', 'kategori' => 'Jembatan', 'kondisi' => 'Baik', 'jumlah' => 1],
            ['id' => 'sarana-4', 'nama_sarana' => 'Terminal Sagu Larantuka', 'kategori' => 'Terminal', 'kondisi' => 'Baik', 'jumlah' => 1],
            ['id' => 'sarana-5', 'nama_sarana' => 'Saluran Irigasi Waima', 'kategori' => 'Irigasi', 'kondisi' => 'Rusak Berat', 'jumlah' => 1],
        ]);
    }

    private function setSaranaData($data)
    {
        Session::put('sarana', $data);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = $this->getSaranaData();

        $kategoriCounts = array_count_values(array_column($data, 'kategori'));
        $chartData = [
            'labels' => array_keys($kategoriCounts),
            'data'   => array_values($kategoriCounts),
        ];

        return view('sarana.index', compact('data', 'chartData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('sarana.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_sarana' => 'required|string|max:255',
            'kategori' => 'required|string|in:Jalan,Jembatan,Pasar,Terminal,Irigasi',
            'kondisi' => 'required|string|in:Baik,Rusak Ringan,Rusak Berat',
            'jumlah' => 'required|integer|min:1',
        ]);

        $data = $this->getSaranaData();
        $newData = [
            'id' => 'sarana-' . Str::uuid(),
            'nama_sarana' => $request->nama_sarana,
            'kategori' => $request->kategori,
            'kondisi' => $request->kondisi,
            'jumlah' => $request->jumlah,
        ];
        $data[] = $newData;
        $this->setSaranaData($data);

        return redirect()->route('sarana.index')->with('success', 'Data sarana berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data = $this->getSaranaData();
        $detailData = collect($data)->firstWhere('id', $id);

        if (!$detailData) {
            abort(404);
        }

        return view('sarana.edit', ['data' => $detailData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_sarana' => 'required|string|max:255',
            'kategori' => 'required|string|in:Jalan,Jembatan,Pasar,Terminal,Irigasi',
            'kondisi' => 'required|string|in:Baik,Rusak Ringan,Rusak Berat',
            'jumlah' => 'required|integer|min:1',
        ]);

        $data = $this->getSaranaData();
        $index = collect($data)->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        if ($index === false) {
            return redirect()->route('sarana.index')->with('error', 'Data tidak ditemukan.');
        }

        $data[$index] = [
            'id' => $id,
            'nama_sarana' => $request->nama_sarana,
            'kategori' => $request->kategori,
            'kondisi' => $request->kondisi,
            'jumlah' => $request->jumlah,
        ];

        $this->setSaranaData($data);

        return redirect()->route('sarana.index')->with('success', 'Data sarana berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $data = $this->getSaranaData();
        $data = array_filter($data, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        $this->setSaranaData($data);

        return redirect()->route('sarana.index')->with('success', 'Data sarana berhasil dihapus.');
    }
}

