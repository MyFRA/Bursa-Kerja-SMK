<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO -->
    {!! SEO::generate() !!}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body style="background-color: #F8FAFC">
    <div id="app">
        <!-- Navbar Component -->
        @include('perusahaan.layouts.partials.navbar')

        <!-- Container -->
        @yield('content')

        <!-- Footer Component -->
        @include('perusahaan.layouts.partials.footer')
    </div>
    @yield('script')
</body>
</html>
