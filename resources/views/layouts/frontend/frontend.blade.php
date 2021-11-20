<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @include('layouts.frontend.assets.css')
    @stack('css')
</head>

<body>
    <!--wrapper start-->
    <div class="wrapper home-default-wrapper">

       
        @include('layouts.frontend.header.header')
        @include('layouts.frontend.content.content')
   
        @include('layouts.frontend.footer.footer')
    </div>
    @include('layouts.frontend.assets.js')
    @stack('js')

</body>

</html>
