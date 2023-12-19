@extends('layouts.app', ['title' => 'Tambah User Baru - Absensi Karyawan'])

@section('content')
    <div class="p-8 rounded border border-gray-200">
        <form id="addUserForm" action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="pin" class="block text-sm font-medium text-gray-600">PIN</label>
                <input type="text" name="pin" id="pin" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nama Karyawan</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="text" name="password" id="password" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="privilege" class="block text-sm font-medium text-gray-600">Privilege</label>
                <input type="text" name="privilege" id="privilege" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <!-- Add other form fields as needed -->

            <div class="flex justify-end">
                <button type="submit" id="addUserButton"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah User
                </button>
            </div>
        </form>
    </div>
@endsection

@push('myscripts')
    <script>
        $(document).ready(function() {
            $('#addUserButton').click(function(e) {
                e.preventDefault();

                var formData = {
                    pin: $('#pin').val(),
                    name: $('#name').val(),
                    password: $('#password').val(),
                    privilege: $('#privilege').val(),
                    // Add other fields as needed
                };

                $.ajax({
                    type: 'POST',
                    url: '{{ route('absensi.store') }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success');

                            // Handle redirection
                            window.location.href = '{{ route('absensi.index') }}';
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
