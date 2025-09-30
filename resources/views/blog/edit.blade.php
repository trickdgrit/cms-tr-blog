@extends('layouts.app')

@section('title', 'Edit Postingan Blog')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Postingan</h1>
            <p class="text-sm text-gray-500">Perbarui informasi untuk: {{ $data->judul }}</p>
        </div>
    </div>

    {{-- Menambahkan enctype="multipart/form-data" untuk unggah file --}}
    <form action="{{ route('blog.update', $data) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('blog._form', ['data' => $data])
    </form>
</div>
@endsection

