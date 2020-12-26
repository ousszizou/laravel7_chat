<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1 class="text-6xl">{{ __("welcome", ["name" => "algorithm"]) }}</h1>
    <p>
        {{ trans_choice('apples', 40) }} apples
    </p>
    <a href="{{route(Route::currentRouteName(), "ar")}}">AR</a>
    <a href="{{route(Route::currentRouteName(), "en")}}">EN</a>
</body>
</html>
