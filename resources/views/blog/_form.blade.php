@csrf
<div class="space-y-4">
    <div>
        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Postingan</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul', $data['judul'] ?? '') }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('judul') border-red-500 @enderror">
        @error('judul')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    
    <div>
        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="kategori" id="kategori" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('kategori') border-red-500 @enderror">
            @php $kategori_pilihan = old('kategori', $data['kategori'] ?? ''); @endphp
            <option value="">Pilih Kategori</option>
            <option value="Pemerintahan" @if($kategori_pilihan == 'Pemerintahan') selected @endif>Pemerintahan</option>
            <option value="Pariwisata" @if($kategori_pilihan == 'Pariwisata') selected @endif>Pariwisata</option>
            <option value="Pendidikan" @if($kategori_pilihan == 'Pendidikan') selected @endif>Pendidikan</option>
            <option value="Kesehatan" @if($kategori_pilihan == 'Kesehatan') selected @endif>Kesehatan</option>
            <option value="Ekonomi" @if($kategori_pilihan == 'Ekonomi') selected @endif>Ekonomi</option>
        </select>
        @error('kategori')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
        <textarea name="konten" id="konten" rows="6" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('konten') border-red-500 @enderror">{{ old('konten', $data['konten'] ?? '') }}</textarea>
        @error('konten')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    
    <div>
        <label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700">Tanggal Publikasi</label>
        <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" value="{{ old('tanggal_publikasi', $data['tanggal_publikasi'] ?? date('Y-m-d')) }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('tanggal_publikasi') border-red-500 @enderror">
        @error('tanggal_publikasi')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

</div>

<div class="mt-6 flex justify-end space-x-4">
    <a href="{{ route('blog.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-300 text-sm font-medium">
        Batal
    </a>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 text-sm font-medium">
        Simpan Postingan
    </button>
</div>
