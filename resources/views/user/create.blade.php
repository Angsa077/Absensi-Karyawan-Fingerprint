@extends('layouts.app', ['title' => 'Tambah User Baru - Absensi Karyawan'])

@section('content')
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-lg text-blueGray-700 text-center mb-3">
                    Tambah Data User
                </h3>
            </div>
        </div>
    </div>
    <div class="p-8 rounded border border-gray-200">
        <form id="addUserForm" action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="pin" class="block text-sm font-medium text-gray-600">PIN</label>
                <input type="text" name="pin" id="pin" class="mt-1 p-2 w-full border rounded-md"
                    placeholder="Masukkan PIN karyawan">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nama Karyawan</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md"
                    placeholder="Masukkan Nama karyawan">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="text" name="password" id="password" class="mt-1 p-2 w-full border rounded-md"
                    placeholder="Masukkan Password karyawan">
            </div>

            <div class="mb-4">
                <label for="privilege" class="block text-sm font-medium text-gray-600">Privilege</label>
                <select name="privilege" id="privilege" class="mt-1 p-2 w-full border rounded-md">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>

            <hr>
            <div class="grid cols-12 mt-5">
                <button type="submit" id="addUserButton"
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
                    url: '{{ route('user.store') }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success');

                            // Handle redirection
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
