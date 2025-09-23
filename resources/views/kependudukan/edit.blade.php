@extends('layouts.app')

@section('title', 'Edit Data Kependudukan')

@section('content')
<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-800">Formulir Edit Data Kecamatan</h2>

    <div class="max-w-2xl bg-white p-6 rounded-lg shadow">
        <form action="{{ route('kependudukan.update', $data['id']) }}" method="POST">
            @method('PUT')
            
            @include('kependudukan._form', ['data' => $data])

            <div class="pt-5 mt-5 border-t border-gray-200">
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('kependudukan.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
