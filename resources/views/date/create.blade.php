@extends('layouts.app', ['title' => 'Setting Date - Absensi Karyawan'])

@section('content')
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-lg text-blueGray-700 text-center mb-3">
                    Pengaturan Tanggal Saat Ini: {{ $date->Row->Date }} <br>
                    Pengaturan Waktu Saat Ini: {{ $date->Row->Time }}
                </h3>
            </div>
        </div>
    </div>
    <div class="p-8 rounded border border-gray-200">
        <form id="addDateForm" action="{{ route('date.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-600">DATE</label>
                <input type="date" name="date" id="date" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="time" class="block text-sm font-medium text-gray-600">TIME</label>
                <input type="time" name="time" id="time" class="mt-1 p-2 w-full border rounded-md"
                    step="1">
            </div>

            <hr>
            <div class="grid cols-12 mt-5">
                <button type="submit" id="addDateButton"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded-md text-center">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('myscripts')
<script>
    $(document).ready(function() {
        $('#addDateButton').click(function(e) {
            e.preventDefault();

            var formData = {
                date: $('#date').val(),
                time: $('#time').val(),
            };

            $.ajax({
                type: 'POST',
                url: '{{ route('date.store') }}',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.success) {
                        Swal.fire('Success', data.success, 'success');

                        // Handle redirection
                        window.location.href = '{{ route('date.create') }}';
                    } else if (data.errors) {
                        // Handle errors if needed
                    } else {
                        console.log('Error:', data.error);
                        Swal.fire('Error', data.error, 'error');
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

@endpush
