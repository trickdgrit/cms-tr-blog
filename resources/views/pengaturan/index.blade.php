@extends('layouts.app')

@section('title', 'Pengaturan Aplikasi')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Pengaturan Aplikasi</h1>
            <p class="text-sm text-gray-500">Ubah konfigurasi dasar untuk aplikasi dashboard.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('pengaturan.update') }}" method="PUT">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <!-- Nama Aplikasi -->
            <div>
                <label for="nama_aplikasi" class="block text-sm font-medium text-gray-700">Nama Aplikasi</label>
                <input type="text" name="nama_aplikasi" id="nama_aplikasi"
                       value="{{ old('nama_aplikasi', $data['nama_aplikasi'] ?? '') }}"
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('nama_aplikasi') border-red-500 @enderror">
                @error('nama_aplikasi')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Notifikasi -->
            <div>
                <label for="email_notifikasi" class="block text-sm font-medium text-gray-700">Email Notifikasi</label>
                <input type="email" name="email_notifikasi" id="email_notifikasi"
                       value="{{ old('email_notifikasi', $data['email_notifikasi'] ?? '') }}"
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('email_notifikasi') border-red-500 @enderror">
                @error('email_notifikasi')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

