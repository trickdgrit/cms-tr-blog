@csrf
<div class="space-y-4">
    <div>
        <label for="nama_sekolah" class="block text-sm font-medium text-gray-700">Nama Sekolah</label>
        <input type="text" name="nama_sekolah" id="nama_sekolah" value="{{ old('nama_sekolah', $data['nama_sekolah'] ?? '') }}" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
        <select name="jenjang" id="jenjang" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <option value="SD" @selected(old('jenjang', $data['jenjang'] ?? '') == 'SD')>SD</option>
            <option value="SMP" @selected(old('jenjang', $data['jenjang'] ?? '') == 'SMP')>SMP</option>
            <option value="SMA" @selected(old('jenjang', $data['jenjang'] ?? '') == 'SMA')>SMA</option>
            <option value="SMK" @selected(old('jenjang', $data['jenjang'] ?? '') == 'SMK')>SMK</option>
        </select>
    </div>
    <div>
        <label for="jumlah_siswa" class="block text-sm font-medium text-gray-700">Jumlah Siswa</label>
        <input type="number" name="jumlah_siswa" id="jumlah_siswa" value="{{ old('jumlah_siswa', $data['jumlah_siswa'] ?? '') }}" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="jumlah_guru" class="block text-sm font-medium text-gray-700">Jumlah Guru</label>
        <input type="number" name="jumlah_guru" id="jumlah_guru" value="{{ old('jumlah_guru', $data['jumlah_guru'] ?? '') }}" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
</div>
