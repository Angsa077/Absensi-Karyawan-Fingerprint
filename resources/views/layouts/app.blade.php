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

        <!-- start welcome -->
        @yield('welcome')
        <!-- end welcome -->

        <!-- start navbar -->
        @if (!isset($hideSideBar) || !$hideSideBar)
            @include('layouts.sidebar')
        @endif
        <!-- end navbar -->

        <!-- start content -->
        @if (!isset($hideContent) || !$hideContent)
            @include('layouts.content')
        @endif
        <!-- end content -->
    </div>

    <!-- JS & Jquery -->
    @include('layouts.script')
    <!-- * JS & Jquery -->
</body>

</html>
