<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    @php
        $curUrl = Request::segment(1);
    @endphp

    <div id="app" class="relative @guest sm:bg-gradient-to-r from-gray-200 to-white @else bg-white @endguest">
        @include('layouts/navbar')
        <main class=" @guest  @else pt-16 pb-24 @endguest">
            @yield('content')
        </main>
        @include('layouts/footer')
        @stack('modals')
    </div>

    @include('components/jsinclude')
</body>

</html>
