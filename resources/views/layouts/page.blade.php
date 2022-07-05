<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
        <meta name="theme-color" content="#292E38">

        <title>{{config('app.name')}}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased bg-primary-dark">
        <div class="min-h-screen w-full flex flex-col justify-between">
            <div>
                <x-page.header/>

                <div class="mt-20">
                    <div
                        id="page-title-container"
                        style="background-image: url('{{asset('images/diagonales-decalees.png')}}')"
                    >
                        <h1 class="text-6xl text-white font-bold uppercase">
                            @yield('title')
                        </h1>
                    </div>

                    <div class="py-8">
                        @yield('content')
                    </div>
                </div>
            </div>

            <x-page.footer/>
        </div>
    </body>
</html>
