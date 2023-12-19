@extends('layouts.app', ['title' => 'Tambah User Baru - Absensi Karyawan'])

@section('content')
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-lg text-blueGray-700 text-center mb-3">
                    Template User Random
                </h3>
            </div>
        </div>
    </div>
    <div class="p-8 rounded border border-gray-200">
        <form id="addTemplateForm" action="{{ route('template.store') }}" method="POST">
            @csrf
            <div class="grid cols-12">
                <button type="submit" id="addTemplateButton"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded-md text-center">
                    Absensi
                </button>
            </div>
        </form>
    </div>
@endsection

@push('myscripts')
    <script>
        $(document).ready(function() {
            $('#addTemplateButton').click(function(e) {
                e.preventDefault();

                var formData = {};

                $.ajax({
                    type: 'POST',
                    url: '{{ route('template.store') }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire('Success', data.success, 'success');
                            window.location.href = '{{ route('template.create') }}';
                        } else if (data.errors) {} else {
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
