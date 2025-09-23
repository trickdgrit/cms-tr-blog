@csrf
<div class="space-y-4">
    <!-- Nama Sarana -->
    <div>
        <label for="nama_sarana" class="block text-sm font-medium text-gray-700">Nama Sarana</label>
        <input type="text" name="nama_sarana" id="nama_sarana"
               value="{{ old('nama_sarana', $data['nama_sarana'] ?? '') }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('nama_sarana') border-red-500 @enderror"
               placeholder="Contoh: Jalan Raya Larantuka-Maumere">
        @error('nama_sarana')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Kategori -->
    <div>
        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="kategori" id="kategori" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md @error('kategori') border-red-500 @enderror">
            <option value="">Pilih Kategori</option>
            @php
                $kategoriOptions = ['Jalan', 'Jembatan', 'Pasar', 'Terminal', 'Irigasi'];
            @endphp
            @foreach($kategoriOptions as $option)
                <option value="{{ $option }}" {{ old('kategori', $data['kategori'] ?? '') == $option ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        </select>
        @error('kategori')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Kondisi -->
    <div>
        <label for="kondisi" class="block text-sm font-medium text-gray-700">Kondisi</label>
        <select name="kondisi" id="kondisi" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md @error('kondisi') border-red-500 @enderror">
            <option value="">Pilih Kondisi</option>
            @php
                $kondisiOptions = ['Baik', 'Rusak Ringan', 'Rusak Berat'];
            @endphp
            @foreach($kondisiOptions as $option)
                <option value="{{ $option }}" {{ old('kondisi', $data['kondisi'] ?? '') == $option ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        </select>
        @error('kondisi')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Jumlah -->
    <div>
        <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah"
               value="{{ old('jumlah', $data['jumlah'] ?? 1) }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('jumlah') border-red-500 @enderror"
               min="1">
        @error('jumlah')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-6 flex items-center justify-end space-x-4">
    <a href="{{ route('sarana.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300 text-sm font-medium">
        Batal
    </a>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
        Simpan Data
    </button>
</div>

