<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PengaturanController extends Controller
{
    /**
     * Mengambil data pengaturan dari session atau memberikan nilai default.
     *
     * @return array
     */
    private function getPengaturanData(): array
    {
        return Session::get('pengaturan', [
            'nama_aplikasi' => 'Dashboard Flores Timur',
            'email_notifikasi' => 'admin@florestimurkab.go.id',
        ]);
    }

    /**
     * Menyimpan data pengaturan ke session.
     *
     * @param array $data
     * @return void
     */
    private function setPengaturanData(array $data): void
    {
        Session::put('pengaturan', $data);
    }

    /**
     * Menampilkan halaman formulir pengaturan dengan data yang ada.
     */
    public function index(): View
    {
        $pengaturan = $this->getPengaturanData();
        return view('pengaturan.index', ['data' => $pengaturan]);
    }

    /**
     * Memperbarui pengaturan dan menyimpannya ke session.
     */
    public function update(Request $request): RedirectResponse
    {
        // 1. Validasi data yang masuk dari form
        $validatedData = $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'email_notifikasi' => 'required|email|max:255',
        ]);

        // 2. Simpan data baru ke session
        $this->setPengaturanData($validatedData);

        // 3. Kembali ke halaman pengaturan dengan pesan sukses
        return redirect()->route('pengaturan.index')
                         ->with('success', 'Pengaturan berhasil diperbarui!');
    }
}

