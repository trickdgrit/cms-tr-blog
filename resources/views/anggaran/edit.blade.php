@extends('layouts.app')

@section('title', 'Edit Data Anggaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Data Program Anggaran</h1>
            <p class="text-sm text-gray-500">Perbarui informasi untuk: {{ $data['nama_program'] ?? 'Program' }}</p>
        </div>
    </div>

    {{-- Form ini akan mengirim data ke method 'update' di AnggaranController --}}
    <form action="{{ route('anggaran.update', $data['id']) }}" method="POST">
        @method('PUT') {{-- Memberitahu Laravel bahwa ini adalah proses update --}}
        
        {{-- Memanggil form partial, dengan mengirimkan data yang ada untuk diedit --}}
        @include('anggaran._form', ['data' => $data])
    </form>
</div>
@endsection

