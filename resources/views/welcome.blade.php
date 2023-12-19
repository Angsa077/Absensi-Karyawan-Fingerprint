@extends('layouts.app', ['title' => 'Home- Absensi Karyawan'])

@section('welcome')
    @php
        $hideSideBar = true;
        $hideContent = true;
    @endphp
    <section class="header relative items-center flex h-screen" style="background-image: url('{{ asset('assets/img/home.png') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto items-center flex flex-wrap">
            <div class="w-full md:w-8/12 lg:w-6/12 xl:w-6/12 mx-auto bg-white p-20 rounded-lg shadow-lg text-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-8">
                        Selamat Datang, Silahkan Absen Terlebih Dahulu
                    </h2>
                    <p id="dateTime" class="text-lg text-gray-600 mb-8">
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full transition duration-300">
                            Absen Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function updateDateTime() {
            var dateTimeElement = document.getElementById('dateTime');
            var now = new Date();
            var formattedDateTime = now.toLocaleString();
            dateTimeElement.textContent = formattedDateTime;
        }
        setInterval(updateDateTime, 1000);
        window.onload = updateDateTime;
    </script>
@endsection
