@extends('layouts.app', ['title' => 'Absensi Karyawan - Absensi Karyawan'])

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="p-8 rounded border border-gray-200">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            {{ print_r($user_info_array, true) }}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="userTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">PIN</th>
                        <th scope="col" class="px-6 py-3">Nama Karyawan</th>
                        <th scope="col" class="px-6 py-3">Password</th>
                        <th scope="col" class="px-6 py-3">Privilege</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_info_array['Row'] as $user)
                        <tr>
                            <td scope="col" class="px-6 py-3">{{ $user['PIN'] ?? '' }}</td>
                            <td scope="col" class="px-6 py-3">{{ $user['Name'] ?? '' }}</td>
                            <td scope="col" class="px-6 py-3">{{ is_array($user['Password']) ? '' : $user['Password'] }}
                            </td>
                            <td scope="col" class="px-6 py-3">{{ $user['Privilege'] ?? '' }}</td>
                            <td scope="col" class="px-6 py-3">
                                <form action="{{ route('absensi.destroy', $user['PIN']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-end m-5">
                <a href="{{ route('absensi.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add User
                </a>
            </div>
        </div>
    </div>
@endsection
