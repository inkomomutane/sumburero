<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('layouts.frontend.assets.css')
    @stack('css')
</head>

<body>
    <!--wrapper start-->
    <div class="wrapper home-default-wrapper">

        <!--== Start Preloader Content ==-->
        <div class="preloader-wrap">
            <div class="preloader">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!--== End Preloader Content ==-->
        @include('layouts.frontend.header.header')
        @include('layouts.backend.content.content')
        @include('layouts.frontend.footer.footer')
    </div>
    @include('layouts.frontend.assets.js')
    @stack('js')

</body>

</html>
