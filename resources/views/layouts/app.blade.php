<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-800">
        @include('layouts.navigation')
    
    <div class="h-full flex flex-col relative">
        <div class="fixed inset-0 bg-[url('/public/img/fondo.jpg')] bg-no-repeat bg-top w-full" style="background-size: 100% auto;"></div>
        <div class="fixed inset-0" style="background: linear-gradient(to bottom, transparent 0%, #19212d 80%);"></div>
        <main class="flex-1 relative z-10">
            {{ $slot }}
        </main>
        
    </div>

    @include('layouts.view_multimedia')

    <div id="contentMessage" class="fixed bottom-4 right-4 translate-x-full transition-transform duration-300 ease-in-out text-center w-auto rounded-xl px-4 py-3 justify-center text-1xl z-50"></div>

    </body>
</html>
