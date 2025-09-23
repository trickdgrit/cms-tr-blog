@csrf
<div class="space-y-4">
    <div>
        <label for="nama_program" class="block text-sm font-medium text-gray-700">Nama Program</label>
        <input type="text" name="nama_program" id="nama_program" value="{{ old('nama_program', $data['nama_program'] ?? '') }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        @error('nama_program')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="sumber_dana" class="block text-sm font-medium text-gray-700">Sumber Dana</label>
        <select name="sumber_dana" id="sumber_dana" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            <option value="">Pilih Sumber Dana</option>
            <option value="APBD" {{ old('sumber_dana', $data['sumber_dana'] ?? '') == 'APBD' ? 'selected' : '' }}>APBD</option>
            <option value="APBN" {{ old('sumber_dana', $data['sumber_dana'] ?? '') == 'APBN' ? 'selected' : '' }}>APBN</option>
            <option value="DAK" {{ old('sumber_dana', $data['sumber_dana'] ?? '') == 'DAK' ? 'selected' : '' }}>DAK (Dana Alokasi Khusus)</option>
        </select>
        @error('sumber_dana')
             <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="jumlah_anggaran" class="block text-sm font-medium text-gray-700">Jumlah Anggaran</label>
        <input type="number" name="jumlah_anggaran" id="jumlah_anggaran" value="{{ old('jumlah_anggaran', $data['jumlah_anggaran'] ?? '') }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        @error('jumlah_anggaran')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="realisasi" class="block text-sm font-medium text-gray-700">Realisasi</label>
        <input type="number" name="realisasi" id="realisasi" value="{{ old('realisasi', $data['realisasi'] ?? '') }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
        @error('realisasi')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex justify-end pt-4">
        <a href="{{ route('anggaran.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300 text-sm font-medium mr-2">
            Batal
        </a>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
            Simpan Data
        </button>
    </div>
</div>

