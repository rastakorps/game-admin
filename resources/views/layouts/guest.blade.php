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
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#3E92CC] dark:bg-gray-900">
        <div class="justify-self-end me-5 mt-5">
            @if (request()->routeIs('login') || request()->is('/'))
                <a 
                    href="{{ route('register') }}" 
                    class="inline-flex items-center px-4 py-2 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest bg-[#F9A826] hover:bg-[#D88F20] transition ease-in-out duration-150">
                    Regístrate
                </a>
            @else
                <a 
                    href="{{ route('login') }}" 
                    class="inline-flex items-center px-4 py-2 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest bg-[#F9A826] hover:bg-[#D88F20] transition ease-in-out duration-150">
                    Iniciar sesión
                </a>
            @endif
            
        </div>
        <div class="min-h-screen flex flex-col items-center pt-2 sm:pt-0">
            <div>
                <a href="/">
                    <img src="{{ asset('images/game-admin-logo.png') }}" alt="Game-Admin Logo" class="h-36 rounded-2xl">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
