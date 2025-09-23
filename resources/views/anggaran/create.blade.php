@extends('layouts.app')

@section('title', 'Tambah Data Anggaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Data Program Anggaran</h1>
            <p class="text-sm text-gray-500">Isi formulir di bawah untuk menambahkan data baru.</p>
        </div>
    </div>

    {{-- Form ini akan mengirim data ke method 'store' di AnggaranController --}}
    <form action="{{ route('anggaran.store') }}" method="POST">
        {{-- Memanggil form partial, dengan mengirimkan array data kosong --}}
        @include('anggaran._form', ['data' => []])
    </form>
</div>
@endsection

