<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @yield('owl')
    <link href="{{ asset('front/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    @yield('style')

</head>
<body>
    @include('global.header')
    <div id="app">
        <main>
            @yield('content')
        </main>
        <router-view></router-view>
    </div>
    @include('global.footer')
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="{{ asset('front/js/main.js') }}" defer></script>
    @yield('scripts')
    @auth
        <script>
        $(document).ready(function () {
            cartCound();
            function cartCound(){
                $.ajax({
                type: "GET",
                url: "/counter",
                    success: function (response) {
                    $('.cartcount').html(response.data);
                    }
                });
            }
        });
        </script>
    @endauth
</body>
</html>
