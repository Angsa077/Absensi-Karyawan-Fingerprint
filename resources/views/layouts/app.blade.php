<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
    <title>{{ $title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/app.css')
</head>

<body>
    <div id="root">
        <!-- start navbar -->
        @include('layouts.sidebar')
        <!-- end navbar -->

            <!-- start content -->
        <div class="relative md:ml-64 bg-blueGray-50">
            <div class="relative bg-blue-500 md:pt-16 pb-16 pt-8">
                <div class="px-4 md:px-10 mx-auto w-full">
                    @if (Request::routeIs('dashboard'))
                        @yield('dashboard')
                    @endif
                </div>
            </div>

            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <div class="flex flex-wrap mt-4">
                    <div class="w-full mb-12 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full overflow-x-auto mb-6 shadow-lg rounded bg-white">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>
    </div>

    <!-- JS & Jquery -->
    @include('layouts.script')
    <!-- * JS & Jquery -->
</body>

</html>
