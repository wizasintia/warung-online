<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

<div class="min-h-screen relative flex items-center justify-center bg-cover bg-center"
     style="background-image: url('/images/umkm-bg.jpg');">

    <div class="absolute inset-0 bg-gradient-to-br from-pink-500/70 to-white/80"></div>

    <div class="relative z-10 w-full max-w-md px-6">

        <div class="text-center mb-8">
           <h1 class="text-3xl font-bold text-[purple drop-shadow-lg"
                style="text-shadow: 4px 7px 10px rgba(255,105,180,0.8);">
                LOGIN UMKM
           </h1>
            <p class="text-lg font-medium text-pink-200 drop-shadow-md"
               style="text-shadow: 0px 0px 8px rgba(186,85,211,0.7);">
                Kelola penjualan & produk Anda
            </p>
        </div>

        {{ $slot }}

    </div>
</div>

</body>
</html>
