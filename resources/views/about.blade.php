<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    @include('layouts.header')

    <!-- Banner -->
    <section class="relative bg-black text-white text-center">
        <img src="{{ asset('images/aboutbanner.png') }}" 
             alt="Jewelry"
             class="w-full object-cover h-60 sm:h-96 md:h-[600px]" />
    </section>

    <!-- Features -->
    <div class="flex flex-col sm:flex-row justify-around my-8 text-center gap-6 sm:gap-0 px-4">
        <div>
            <img src="{{ asset('images/gemstone.png') }}" class="mx-auto w-10 h-10">
            <p class="font-bold mt-2 text-sm sm:text-base">100% NATURAL GEMSTONES</p>
        </div>
        <div>
            <img src="{{ asset('images/delivery.png') }}" class="mx-auto w-10 h-10">
            <p class="font-bold mt-2 text-sm sm:text-base">ISLAND-WIDE DELIVERY</p>
        </div>
        <div>
            <img src="{{ asset('images/verified.png') }}" class="mx-auto w-10 h-10">
            <p class="font-bold mt-2 text-sm sm:text-base">100% ORIGINAL SILVER</p>
        </div>
    </div>

    <!-- About Text -->
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-semibold mb-4">ABOUT US!</h2>
        <p class="text-lg leading-relaxed">
            At <strong>R&M JewelryCo</strong>, we believe that every piece of jewelry should tell a story — your story.
            Founded with a passion for elegance and individuality, we specialize in crafting high-quality,
            customized jewelry using genuine gemstones and fine silver.
            From timeless rings to unique pendants and bracelets, each piece is made
            with care, precision, and a touch of personal meaning.
            Whether you're celebrating a special moment or simply treating yourself, our goal is to create jewelry
            that reflects your style and significance.
            With a blend of craftsmanship and creativity,
            <strong>R&M JewelryCo</strong> is where beauty meets authenticity.
        </p>
    </div>

    <!-- Image -->
    <div class="flex justify-center my-8">
        <img src="{{ asset('images/a1.png') }}" alt="Gemstones" class="w-1/2">
    </div>

</body>
</html>
