@extends('layouts.app')

@section('title', 'Tambah Data Sarana & Prasarana')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Data Baru</h1>
            <p class="text-sm text-gray-500">Isi formulir di bawah untuk menambah data sarana & prasarana.</p>
        </div>
    </div>

    <form action="{{ route('sarana.store') }}" method="POST">
        @include('sarana._form', ['data' => []])
    </form>
</div>
@endsection

