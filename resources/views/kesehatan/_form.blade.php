@csrf

<div class="space-y-4">
    <!-- Input Nama Faskes -->
    <div>
        <label for="nama_faskes" class="block text-sm font-medium text-gray-700">Nama Fasilitas Kesehatan</label>
        <input type="text" name="nama_faskes" id="nama_faskes" value="{{ old('nama_faskes', $data['nama_faskes'] ?? '') }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('nama_faskes') border-red-500 @enderror"
               required>
        @error('nama_faskes')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Dropdown Jenis Faskes -->
    <div>
        <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Faskes</label>
        <select name="jenis" id="jenis"
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('jenis') border-red-500 @enderror"
                required>
            <option value="">Pilih Jenis</option>
            <option value="Rumah Sakit" {{ old('jenis', $data['jenis'] ?? '') == 'Rumah Sakit' ? 'selected' : '' }}>Rumah Sakit</option>
            <option value="Puskesmas" {{ old('jenis', $data['jenis'] ?? '') == 'Puskesmas' ? 'selected' : '' }}>Puskesmas</option>
            <option value="Klinik" {{ old('jenis', $data['jenis'] ?? '') == 'Klinik' ? 'selected' : '' }}>Klinik</option>
            <option value="Apotek" {{ old('jenis', $data['jenis'] ?? '') == 'Apotek' ? 'selected' : '' }}>Apotek</option>
        </select>
        @error('jenis')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Input Alamat -->
    <div>
        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea name="alamat" id="alamat" rows="3"
                  class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('alamat') border-red-500 @enderror"
                  required>{{ old('alamat', $data['alamat'] ?? '') }}</textarea>
        @error('alamat')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Input Jumlah Tenaga Medis -->
    <div>
        <label for="jumlah_tenaga_medis" class="block text-sm font-medium text-gray-700">Jumlah Tenaga Medis</label>
        <input type="number" name="jumlah_tenaga_medis" id="jumlah_tenaga_medis" value="{{ old('jumlah_tenaga_medis', $data['jumlah_tenaga_medis'] ?? '') }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('jumlah_tenaga_medis') border-red-500 @enderror"
               required>
        @error('jumlah_tenaga_medis')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Tombol Aksi -->
<div class="flex justify-end mt-6 space-x-4">
    <a href="{{ route('kesehatan.index') }}"
       class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300 text-sm font-medium">
        Batal
    </a>
    <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
        Simpan Data
    </button>
</div>

