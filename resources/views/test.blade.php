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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
#index {

}
#slidebar button {
    border: 2px rgb(182, 231, 208);
    background-color: rgb(182, 231, 208);
    border-radius: 100%;
    height: 10px;
    width: 10px;
    margin: 10px;
}

#content {
    background-image: linear-gradient(45deg, rgb(55, 96, 144), rgb(65, 130, 200));
    height: 390px;

}

#main_img{
    max-width:100%;
    max-height:100%;
    background-image: url("storage/defaults/work.jpg");
    opacity: 0.9;
}
</style>

<body>
<div id="app">
    <div class="w-full items-center" id="index">
        <div id="content" class="flex justify-center">
            <div class="w-1/2 text-center p-3 ">
                <div class="text-3xl text-teal-200">
                    Dedicated to helping you
                </div>
                <div class="font-black text-5xl text-teal-100">
                    Cure your Procrastination
                </div>
                <div class="p-2 text-lg text-white">
                    <button class="mx-4"><img class="h-32" src="{{asset('storage/defaults/alarm.svg')}}" alt="">Clock</button>
                    <button class="mx-4"><img class="h-32" src="{{asset('storage/defaults/today.svg')}}" alt="">To Do List</button>
                    <button class="mx-4"><img class="h-32" src="{{asset('storage/defaults/relax.svg')}}" alt="">Relax</button>
                    <button class="mx-4"><img class="h-32" src="{{asset('storage/defaults/read.svg')}}" alt="">Articles</button>
                 </div>
            </div>
            <div class="w-1/2 h-1/2" id="main_img">
            </div>
        </div>
        <div id="slidebar" class="flex justify-center items-center">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        </div>
    </div>

</body>
</html>
