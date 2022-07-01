<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{config('app.name')}}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css'])
    </head>

    <body class="antialiased bg-primary-light">
        <x-page.header/>

        <div class="mt-20 py-8">
            @yield('content')
        </div>

        <div id="top-page-bg"></div>
    </body>
</html>
