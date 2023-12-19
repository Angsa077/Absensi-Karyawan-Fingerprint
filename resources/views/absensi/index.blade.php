@extends('layouts.app', ['title' => 'Absensi Karyawan - Absensi Karyawan'])

@section('content')
    <div class="p-8 rounded border border-gray-200">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            {{-- {{ print_r($user_info_array, true) }} --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="userTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">PIN</th>
                        <th scope="col" class="px-6 py-3">PIN2</th>
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
                            <td scope="col" class="px-6 py-3">{{ $user['PIN2'] ?? '' }}</td>
                            <td scope="col" class="px-6 py-3">{{ $user['Name'] ?? '' }}</td>
                            <td scope="col" class="px-6 py-3">{{ is_array($user['Password']) ? '' : $user['Password'] }}
                            </td>
                            <td scope="col" class="px-6 py-3">{{ $user['Privilege'] ?? '' }}</td>
                            <td scope="col" class="px-6 py-3">
                                <button class="deleteButton bg-red-600 hover:bg-red-900 text-white p-1 rounded-lg"
                                        data-pin="{{ $user['PIN2'] }}">Delete</button>
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

@push('myscripts')
    <script>
        $(document).ready(function() {
            // Function to handle user deletion
            function deleteUser(pin) {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ url('absensi') }}/' + pin,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success');
                            window.location.reload();
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
            }

            // Click event for delete button
            $('#userTable').on('click', '.deleteButton', function(e) {
                e.preventDefault();
                var pin = $(this).data('pin');

                // Show confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Call the delete function
                        deleteUser(pin);
                    }
                });
            });
        });
    </script>
@endpush