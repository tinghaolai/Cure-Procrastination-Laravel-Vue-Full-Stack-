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
    opacity: 0.9;
}

#clock {
    background-image: url("storage/defaults/clock.jpg");
    background-size: cover;
}

#todolist {
    background-image: url("storage/defaults/todo2.jpg");
    background-size: cover;
}
#home_articles{
    background-image: url("storage/defaults/read.jpg");
    background-size: cover;
    text-shadow: 2px 2px 5px rgb(43, 94, 72);
}
#home_relax{
    background-image: url("storage/defaults/relax.png");
    background-size: cover;

    color: rgb(4, 33, 47);
}

#home_relax span{
    color: rgb(227, 242, 242);
    background-color: rgba(36, 79, 81, 0.7);
    border: 0px solid rgba(36, 79, 81, 0.7);
    border-radius: 20px;
    background-clip: padding-box;
    box-shadow: 0px 0px 15px 3px rgba(36, 79, 81, 0.7);
}

</style>

<body>
<div id="app">
    <div class="w-full items-center" id="index">
        <div id="content" class="flex justify-center">


        </div>
        <div id="slidebar" class="flex justify-center items-center">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>
        </div>
    </div>

</body>
</html>
