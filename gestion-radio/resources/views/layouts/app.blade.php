<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Radio Fanamby') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-radio-dark text-gray-100" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">

        @include('layouts.navigation')

        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
             class="fixed inset-0 bg-black/60 z-30 lg:hidden"></div>

        <div class="flex-1 flex flex-col lg:ml-64 min-h-screen">

            <div class="lg:hidden flex items-center justify-between bg-radio-panel px-4 py-3 border-b border-white/10">
                <button @click="sidebarOpen = true" class="text-gray-200">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="font-bold text-radio-green">Radio Fanamby</span>
                <div class="w-7"></div>
            </div>

            @isset($header)
                <header class="bg-radio-panel/60 border-b border-white/5 backdrop-blur">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>