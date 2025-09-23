@extends('layouts.app')

@section('title', 'Tambah Postingan Blog')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Postingan Baru</h1>
            <p class="text-sm text-gray-500">Buat dan publikasikan berita atau artikel baru.</p>
        </div>
    </div>

    <form action="{{ route('blog.store') }}" method="POST">
        @include('blog._form', ['data' => []])
    </form>
</div>
@endsection
