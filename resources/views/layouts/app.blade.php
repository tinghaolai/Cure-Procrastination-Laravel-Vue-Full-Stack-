<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <div id="app" class="flex flex-wrap overflow-hidden">

            <div class="w-full overflow-hidden ">
                @include('layouts.navigation')
            </div>
            <div class="w-full overflow-hidden">
                @yield('content')
            </div>
            <div class="w-full overflow-hidden">
                @include('layouts.footer')
            </div>
            @include('layouts.scrollup')


        </div>



    </div>
</body>
</html>







