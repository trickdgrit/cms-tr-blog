@csrf
<div class="space-y-6">
    <!-- Judul -->
    <div>
        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Postingan</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul', data_get($data, 'judul')) }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('judul') border-red-500 @enderror">
        @error('judul')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Kategori -->
        <div>
            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ old('kategori', data_get($data, 'kategori')) }}"
                   class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm @error('kategori') border-red-500 @enderror">
            @error('kategori')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <!-- Nama Penulis -->
        <div>
            <label for="nama_penulis" class="block text-sm font-medium text-gray-700">Nama Penulis</label>
            <input type="text" name="nama_penulis" id="nama_penulis" value="{{ old('nama_penulis', data_get($data, 'nama_penulis', Auth::user()->name)) }}"
                   class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm @error('nama_penulis') border-red-500 @enderror">
            @error('nama_penulis')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
    </div>
    
    <!-- Tanggal Publikasi -->
    <div>
        <label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700">Tanggal Publikasi</label>
        <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" value="{{ old('tanggal_publikasi', (data_get($data, 'tanggal_publikasi') ? \Carbon\Carbon::parse(data_get($data, 'tanggal_publikasi'))->format('Y-m-d') : now()->format('Y-m-d'))) }}"
               class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm @error('tanggal_publikasi') border-red-500 @enderror">
        @error('tanggal_publikasi')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>

    <!-- Gambar -->
    <div>
        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Utama</label>
        <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('gambar') border-red-500 @enderror">
        @error('gambar')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
        @if(data_get($data, 'gambar'))
            <div class="mt-4">
                <p class="text-sm text-gray-500 mb-2">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . data_get($data, 'gambar')) }}" alt="{{ data_get($data, 'judul') }}" class="h-32 w-auto rounded-md">
            </div>
        @endif
    </div>

    <!-- Konten -->
    <div>
        <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
        <textarea name="konten" id="konten" rows="10"
                  class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('konten') border-red-500 @enderror">{{ old('konten', data_get($data, 'konten')) }}</textarea>
        @error('konten')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-8 flex justify-end">
    <a href="{{ route('blog.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition mr-2">Batal</a>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
        Simpan Postingan
    </button>
</div>

