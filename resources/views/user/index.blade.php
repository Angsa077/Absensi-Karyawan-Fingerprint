@extends('layouts.app', ['title' => 'Data User - Absensi Karyawan'])

@section('content')
    {{-- Header --}}
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-lg text-blueGray-700 text-center mb-3">
                    Data User
                </h3>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <form action="{{ route('user.filtered') }}" method="GET">
        @csrf
        <div class="grid grid-cols-3 gap-4 mb-5">
            <div class="ml-5">
                <label for="pin2" class="block text-sm font-medium text-gray-600">PIN2:</label>
                <input class="mt-1 p-2 w-full border rounded-md" type="text" id="pin2" name="pin2"
                    value="{{ request('pin2') }}" placeholder="Masukan PIN 2">
            </div>

            <div class="ml-5">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input class="mt-1 p-2 w-full border rounded-md" type="text" id="name" name="name"
                    value="{{ request('name') }}" placeholder="Masukan Nama Karyawan">
            </div>

            <div class="mr-5">
                <button type="submit" class="w-full bg-blue-500 text-white rounded-md p-2 mt-6">Filter</button>
            </div>
        </div>
    </form>

    <!-- Table -->
    <div class="block w-full overflow-x-auto">
        <div class="table-container">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="userTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">PIN</th>
                        <th scope="col" class="px-6 py-3">PIN2</th>
                        <th scope="col" class="px-6 py-3">Nama Karyawan</th>
                        <th scope="col" class="px-6 py-3">Password</th>
                        <th scope="col" class="px-6 py-3">Privilege</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getAllUserInfo['Row'] as $user)
                        <tr class="text-center">
                            <td scope="col" class="px-6 py-3">{{ $user['PIN'] ?? '' }}</td>
                            <td scope="col" class="px-6 py-3">{{ $user['PIN2'] ?? '' }}</td>
                            <td scope="col" class="px-6 py-3">{{ is_array($user['Name']) ? '' : htmlspecialchars($user['Name']) }}</td>

                            <td scope="col" class="px-6 py-3">{{ is_array($user['Password']) ? '' : '*********' }}
                            </td>
                            <td scope="col" class="px-6 py-3">{{ $user['Privilege'] == 0 ? 'User' : 'Admin' }}</td>
                            <td scope="col" class="px-6 py-3">
                                <a href="{{ route('user.edit', $user['PIN2']) }}"
                                    class="text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm px-3 py-1.5 text-center inline-flex items-center dark:focus:ring-[#F7BE38]/50 me-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                    </svg>
                                </a>
                                <button
                                    class="deleteButton text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-1.5 text-center inline-flex items-center dark:focus:ring-red-800 me-2 mb-2"
                                    data-pin="{{ $user['PIN2'] }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                        viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="my-5 mx-10">
                <div class="grid">
                    <a href="{{ route('user.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded-md text-center">
                        Tambah User
                    </a>
                </div>
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
                    url: '{{ url('user') }}/' + pin,
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

            // Click event for filter button
            var table = $('#userTable').DataTable();
            $('#filterButton').on('click', function() {
                var pin2 = $('#pin2').val().toLowerCase();
                var name = $('#name').val().toLowerCase();
                table.columns().search('').draw();
                if (pin2 !== '') {
                    table.columns(2).search(pin2).draw();
                }
                if (name !== '') {
                    table.columns(3).search(name).draw();
                }
            });
        });
    </script>
@endpush
