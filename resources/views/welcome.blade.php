<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RM Jewelry Co.</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1.5s forwards;
        }
        .fade-in-delay {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1.5s forwards;
            animation-delay: 0.8s;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="antialiased min-h-screen bg-gradient-to-r from-gray-900 via-black to-gray-800 flex items-center justify-center">

    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/bg.jpg') }}" alt="Jewelry Background" 
             class="w-full h-full object-cover opacity-30">
    </div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>

    <!-- Content -->
    <div class="relative z-10 text-center text-white">
        <!-- Logo -->
        <div class="fade-in">
            <img src="{{ asset('images/Logo.png') }}" alt="RM Jewelry Logo" 
                 class="mx-auto w-28 h-28 drop-shadow-lg">
        </div>

        <!-- Title -->
        <h1 class="text-5xl md:text-6xl font-bold mt-6 fade-in-delay">
            RM Jewelry Co.
        </h1>
        <p class="text-lg md:text-xl mt-4 fade-in-delay">
            Where elegance meets perfection ✨
        </p>

        <!-- Buttons -->
        <div class="mt-8 flex justify-center gap-4 fade-in-delay">
            <a href="{{ route('login') }}" 
               class="px-6 py-3 bg-white text-black rounded-lg shadow-lg hover:bg-gray-200 transition">
                Login
            </a>
            <a href="{{ route('register') }}" 
               class="px-6 py-3 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black font-semibold rounded-lg shadow-lg hover:opacity-90 transition">
                Sign Up
            </a>
        </div>
    </div>

</body>
</html>
