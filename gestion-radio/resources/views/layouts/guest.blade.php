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
<body class="font-sans antialiased bg-radio-dark text-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10">

        <div class="mb-8 flex flex-col items-center">
            <span class="text-radio-green font-extrabold text-2xl tracking-wide leading-none">89.1 FM</span>
            <span class="text-radio-pink font-black text-xl tracking-widest leading-none mt-0.5">FANAMBI</span>
        </div>

        <div class="w-full sm:max-w-md bg-radio-panel border border-white/5 rounded-2xl shadow-xl px-6 py-8 sm:px-8">
            {{ $slot }}
        </div>
    </div>
</body>
</html>