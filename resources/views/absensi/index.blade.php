@extends('layouts.app', ['title' => 'Data Absensi - Absensi Karyawan'])

@section('content')
    @php
        $attendanceLog = json_decode($getAllAttLog, true);
        $attendanceRows = array_reverse($attendanceLog['Row']);
    @endphp

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="attendanceTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">PIN</th>
                <th scope="col" class="px-6 py-3">Date and Time</th>
                <th scope="col" class="px-6 py-3">Verified</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Work Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendanceRows as $attendance)
                <tr>
                    <td class="px-6 py-3">{{ $attendance['PIN'] ?? '' }}</td>
                    <td class="px-6 py-3">{{ $attendance['DateTime'] ?? '' }}</td>
                    <td class="px-6 py-3">{{ $attendance['Verified'] ?? '' }}</td>
                    <td class="px-6 py-3">{{ $attendance['Status'] ?? '' }}</td>
                    <td class="px-6 py-3">{{ $attendance['WorkCode'] ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
