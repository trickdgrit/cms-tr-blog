@extends('layouts.app')

@section('title', 'Edit Data Sarana & Prasarana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Data Sarana & Prasarana</h1>
            <p class="text-sm text-gray-500">Perbarui informasi untuk: {{ $data['nama_sarana'] }}</p>
        </div>
    </div>

    <form action="{{ route('sarana.update', $data['id']) }}" method="POST">
        @method('PUT')
        @include('sarana._form', ['data' => $data])
    </form>
</div>
@endsection

