@extends('layouts.app', ['title' => 'Data Absensi - Hasil Filter'])

@section('content')
    {{-- Header --}}
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-lg text-blueGray-700 text-center mb-3">
                    Hasil Filter Absensi
                </h3>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <form action="{{ route('absensi.filtered') }}" method="GET">
        @csrf
        <div class="grid grid-cols-3 gap-4 mb-5">
            <div class="ml-5">
                <label for="tanggal" class="block text-sm font-medium text-gray-600">Tanggal:</label>
                <input class="mt-1 p-2 w-full border rounded-md" type="date" id="tanggal" name="tanggal"
                    value="{{ request('tanggal') }}">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-600">Status:</label>
                <select id="status" name="status" class="mt-1 p-2 w-full border rounded-md">
                    <option value="">Semua</option>
                    <option value="terlambat" {{ request('status') === 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                    <option value="tepat" {{ request('status') === 'tepat' ? 'selected' : '' }}>Tepat Waktu</option>
                </select>
            </div>

            <div class="mr-5">
                <button type="submit" class="w-full bg-blue-500 text-white rounded-md p-2 mt-6">Filter</button>
            </div>
        </div>
    </form>

    <!-- Table -->
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="attendanceTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">PIN</th>
                <th scope="col" class="px-6 py-3">Date and Time</th>
                <th scope="col" class="px-6 py-3">Verified</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Work Code</th>
                <th scope="col" class="px-6 py-3">Terlambat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filteredRows as $attendance)
                <tr class="text-center">
                    <td class="px-6 py-3">{{ $attendance['PIN'] ?? '' }}</td>
                    <td class="px-6 py-3">{{ $attendance['DateTime'] ?? '' }}</td>
                    <td class="px-6 py-3">{{ $attendance['Verified'] ?? '' }}</td>
                    <td class="px-6 py-3">{{ $attendance['Status'] ?? '' }}</td>
                    <td class="px-6 py-3">{{ $attendance['WorkCode'] ?? '' }}</td>
                    @php
                        $dateTimeString = $attendance['DateTime'];
                        $dateTime = new DateTime($dateTimeString);
                        $jam = $dateTime->format('H:i:s');
                    @endphp
                    <td class="px-6 py-3">
                        @if ($jam >= '08:00:00')
                            <button class=" bg-red-500 text-white m-5 rounded-md px-2 py-1">Terlambat</button>
                        @else
                            <button class=" bg-green-500 text-white m-5 rounded-md px-2 py-1">Tepat Waktu</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@push('myscripts')
    <script>
        $(document).ready(function() {
            var table = $('#attendanceTable').DataTable();
            $('#filterButton').on('click', function() {
                var tanggal = $('#tanggal').val();
                var status = $('#status').val();
                table.columns().search('').draw();
                if (tanggal !== '') {
                    table.columns(1).search(tanggal).draw();
                }
                if (status !== '') {
                    var statusFilter = (status === 'terlambat') ? 'Terlambat' : 'Tepat Waktu';
                    table.columns(5).search(statusFilter).draw();
                }
            });
        });
    </script>
@endpush
