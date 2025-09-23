@csrf

<div class="space-y-4">
    <!-- Input Nama Kecamatan -->
    <div>
        <label for="nama_kecamatan" class="block text-sm font-medium text-gray-700">Nama Kecamatan</label>
        <input type="text" name="nama_kecamatan" id="nama_kecamatan" value="{{ old('nama_kecamatan', $data['nama_kecamatan'] ?? '') }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('nama_kecamatan') border-red-500 @enderror"
               required>
        @error('nama_kecamatan')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Input Jumlah Penduduk -->
    <div>
        <label for="jumlah_penduduk" class="block text-sm font-medium text-gray-700">Jumlah Penduduk</label>
        <input type="number" name="jumlah_penduduk" id="jumlah_penduduk" value="{{ old('jumlah_penduduk', $data['jumlah_penduduk'] ?? '') }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('jumlah_penduduk') border-red-500 @enderror"
               required>
        @error('jumlah_penduduk')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Input Jumlah Laki-laki -->
    <div>
        <label for="pria" class="block text-sm font-medium text-gray-700">Jumlah Laki-laki</label>
        <input type="number" name="pria" id="pria" value="{{ old('pria', $data['pria'] ?? '') }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('pria') border-red-500 @enderror"
               required>
        @error('pria')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Input Jumlah Perempuan -->
    <div>
        <label for="wanita" class="block text-sm font-medium text-gray-700">Jumlah Perempuan</label>
        <input type="number" name="wanita" id="wanita" value="{{ old('wanita', $data['wanita'] ?? '') }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('wanita') border-red-500 @enderror"
               required>
        @error('wanita')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Tombol Aksi -->
<div class="flex justify-end mt-6 space-x-4">
    <a href="{{ route('kependudukan.index') }}"
       class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300 text-sm font-medium">
        Batal
    </a>
    <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
        Simpan Data
    </button>
</div>

