@extends('layouts.app')

@section('title', 'Edit Data Faskes')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Data Fasilitas Kesehatan</h1>
            <p class="text-sm text-gray-500">Perbarui informasi untuk: {{ $data['nama_faskes'] }}</p>
        </div>
    </div>

    <form action="{{ route('kesehatan.update', $data['id']) }}" method="POST">
        @method('PUT')
        @include('kesehatan._form', ['data' => $data])
    </form>
</div>
@endsection

