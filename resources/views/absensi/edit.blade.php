@extends('layouts.app', ['title' => 'Edit User - Absensi Karyawan'])

@section('content')
    <div class="p-8 rounded border border-gray-200">
        <form id="editUserForm" action="{{ route('absensi.update', $user_info['Row']['PIN2']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="pin" class="block text-sm font-medium text-gray-600">PIN</label>
                <input type="text" name="pin" id="pin" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $user_info['Row']['PIN2'] }}">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nama Karyawan</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $user_info['Row']['Name'] }}">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                @if (is_array($user_info['Row']['Password']))
                    <input type="text" name="password" id="password" class="mt-1 p-2 w-full border rounded-md"
                        value="">
                @else
                    <input type="text" name="password" id="password" class="mt-1 p-2 w-full border rounded-md"
                        value="{{ $user_info['Row']['Password'] }}">
                @endif
            </div>

            <div class="mb-4">
                <label for="privilege" class="block text-sm font-medium text-gray-600">Privilege</label>
                <input type="text" name="privilege" id="privilege" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $user_info['Row']['Privilege'] }}">
            </div>

            <div class="flex justify-end">
                <button type="submit" id="editUserButton"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                    Update User
                </button>
            </div>
        </form>
    </div>
@endsection

@push('myscripts')
    <script>
        $(document).ready(function() {
            $('#editUserButton').click(function(e) {
                e.preventDefault();

                var formData = {
                    pin: $('#pin').val(),
                    name: $('#name').val(),
                    password: $('#password').val(),
                    privilege: $('#privilege').val(),
                };

                $.ajax({
                    type: 'PUT',
                    url: '{{ route('absensi.update', $user_info['Row']['PIN2']) }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        '_method': 'PUT'
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success');
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
