@extends('layouts.app', ['title' => 'Atur Template Fingerprint - Absensi Karyawan'])

@section('content')
    <div class="p-8 rounded border border-gray-200">
        <h2 class="text-2xl font-bold mb-4">Atur Template Fingerprint</h2>
        <form action="{{ route('absensi.setTemplate') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="template" class="block text-sm font-medium text-gray-600">Template Fingerprint (Base64)</label>
                <textarea name="template" id="template" class="mt-1 p-2 border rounded-md w-full" rows="5" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Atur Template
                </button>
            </div>
        </form>
    </div>
@endsection
