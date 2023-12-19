@extends('layouts.app', ['title' => 'Edit User - Absensi Karyawan'])

@section('content')
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-lg text-blueGray-700 text-center mb-3">
                    Edit Data User
                </h3>
            </div>
        </div>
    </div>
    <div class="p-8 rounded border border-gray-200">
        <form id="editUserForm" action="{{ route('user.update', $userInfo['Row']['PIN2']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="pin" class="block text-sm font-medium text-gray-600">PIN</label>
                <input type="text" name="pin" id="pin" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $userInfo['Row']['PIN2'] }}">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nama Karyawan</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ $userInfo['Row']['Name'] }}">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                @if (is_array($userInfo['Row']['Password']))
                    <input type="text" name="password" id="password" class="mt-1 p-2 w-full border rounded-md"
                        value="">
                @else
                    <input type="text" name="password" id="password" class="mt-1 p-2 w-full border rounded-md"
                        value="{{ $userInfo['Row']['Password'] }}">
                @endif
            </div>

            <div class="mb-4">
                <label for="privilege" class="block text-sm font-medium text-gray-600">Privilege</label>
                <select name="privilege" id="privilege" class="mt-1 p-2 w-full border rounded-md">
                    <option value="0" @if ($userInfo['Row']['Privilege'] == 0) selected @endif>User</option>
                    <option value="1" @if ($userInfo['Row']['Privilege'] >= 1) selected @endif>Admin</option>
                </select>
            </div>

            <hr>
            <div class="grid cols-12 mt-5">
                <button type="submit" id="editUserButton"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded-md text-center">
                    Perbarui
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
                    url: '{{ route('user.update', $userInfo['Row']['PIN2']) }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        '_method': 'PUT'
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success');
                            window.location.href = '{{ route('user.index') }}';
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
