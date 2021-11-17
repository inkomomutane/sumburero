<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Biosp database central') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    @stack('cssLibs')
    <!-- Page Specific CSS File -->
    @stack('css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/components.min.css') }} ">
</head>

<body class="layout-4">
    <div id="app">
        @include('layouts.backend.content.login_content')
        @yield('modals')
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('backend/js/bundle.js') }}"></script>
    <script src="{{ asset('backend/js/CodiePie.js') }}"></script>

    <!-- JS Libraies -->
    @stack('jsLibs')
    <!-- Page Specific JS File -->
    @stack('js')
    <!-- Template JS File -->
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/custom.js') }}"></script>

</body>
</body>

</html>
