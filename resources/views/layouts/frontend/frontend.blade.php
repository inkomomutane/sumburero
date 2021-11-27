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
    <div class="wrapper @yield('wrapper','home-default-wrapper')">

       
        @include('layouts.frontend.header.header')
        @include('layouts.frontend.content.content')
        <div id="fb-root"></div>

        <!-- Your Plug-in de chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>
        @include('layouts.frontend.footer.footer')
    </div>
    @include('layouts.frontend.assets.js')
    @stack('js')
    <!-- Messenger Plug-in de chat Code -->


    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "112369233524838");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/pt_PT/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

</body>

</html>
