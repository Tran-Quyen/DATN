<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="yud_col">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon_io/logo512.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon_io/logo192.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon_io/logo512.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon_io/site.webmanifest') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!--Exzoom-->
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['public/assets/css/bootstrap.min.css', 'public/assets/css/custom.css', 'public/assets/css/owl.carousel.min.css', 'public/assets/css/owl.theme.default.min.css', 'public/assets/js/bootstrap.bundle.min.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        {{-- navbar --}}
        @include('layouts.inc.frontend.navbar')
        {{-- main --}}
        <main class="">
            @yield('content')
        </main>
        {{-- footer --}}
        @include('layouts.inc.frontend.footer')

    </div>

    <script src="{{ asset('assets/js/jquery-3.6.3.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://kit.fontawesome.com/c672e81c5b.js" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('message', event => {
            if(event.detail) {
                alertify.set('notifier','position', 'top-right');
                alertify.notify(event.detail.text, event.detail.type);
            }
        })
    </script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>
    @yield('script')
    @livewireScripts
    @stack('scripts')

</body>
</html>
