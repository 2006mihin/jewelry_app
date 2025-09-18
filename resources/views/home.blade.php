<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Home</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-pap9c3n6EhxyU3fB/..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-white text-gray-800">

<!-- HEADER -->
@include('layouts.header')

<!-- BANNER -->
<section class="relative bg-black text-white text-center">
    <img src="{{ asset('images/Emerald_earrings-Header.jpg') }}" alt="Jewelry"
         class="w-full object-cover h-60 sm:h-96 md:h-[600px] opacity-70" />
    <div class="absolute inset-0 flex flex-col justify-center items-center px-5 text-center pt-20 sm:pt-30 md:pt-36">
        <h1 class="text-lg sm:text-2xl md:text-4xl font-bold mb-4">HAPPINESS COMES IN THE BOX OF JEWELRY</h1>
        <a href="{{ url('rings') }}"
           class="mt-2 px-6 py-2 bg-white text-black font-semibold rounded shadow-md transition duration-300 hover:bg-blue-600 hover:text-white hover:shadow-lg">
           Explore Now
        </a>
    </div>
</section>

<!-- FEATURES -->
<div class="flex flex-col sm:flex-row justify-around my-8 text-center gap-6 sm:gap-0 px-4">
    @php
        $features = [
            ['img' => 'gemstone.png', 'text' => '100% NATURAL GEMSTONES'],
            ['img' => 'delivery.png', 'text' => 'ISLAND-WIDE DELIVERY'],
            ['img' => 'verified.png', 'text' => '100% ORIGINAL SILVER'],
        ];
    @endphp

    @foreach ($features as $feature)
        <div>
            <img src="{{ asset('images/' . $feature['img']) }}" class="mx-auto w-10 h-10" />
            <p class="font-bold mt-2 text-sm sm:text-base">{{ $feature['text'] }}</p>
        </div>
    @endforeach
</div>

<!-- CATEGORIES -->
<section class="container mx-auto px-4 sm:px-6 py-8">
    <h2 class="text-center text-xl sm:text-2xl font-bold mb-6">CATEGORY</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @php
            $categories = [
                ['img' => 'c1.png', 'title' => 'Rings', 'desc' => 'Stunning', 'link' => 'rings'],
                ['img' => 'c2.png', 'title' => 'Pendants', 'desc' => 'Elegant', 'link' => 'pendants'],
                ['img' => 'c3.png', 'title' => 'Earrings', 'desc' => 'Elegant', 'link' => 'earrings'],
                ['img' => 'c4.png', 'title' => 'Bracelets', 'desc' => 'Stylish', 'link' => 'bracelets'],
            ];
        @endphp

        @foreach ($categories as $cat)
            <div class="flex flex-col sm:flex-row items-center bg-blue-50 p-4 rounded h-auto sm:h-40">
                <img src="{{ asset('images/' . $cat['img']) }}" class="h-32 sm:h-40 mb-4 sm:mb-0 sm:mr-4 -ml-4" />
                <div class="text-center sm:text-right sm:ml-auto pl-4 sm:pl-6 w-full">
                    <p class="text-sm text-gray-600">{{ $cat['desc'] }}</p>
                    <h3 class="text-xl font-semibold">{{ $cat['title'] }}</h3>
                    <a href="{{ url($cat['link']) }}" class="text-blue-600 text-sm font-semibold">SHOP NOW</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- POPULAR ITEMS -->
<section class="container mx-auto px-4 sm:px-6 py-8">
    <h2 class="text-center text-xl sm:text-2xl font-bold mb-6">OUR POPULAR ITEMS</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @php
            $items = [
                ['img' => 'hring.jpg', 'desc' => 'Natural Garnet', 'name' => 'Red Garnet Ring', 'price' => 'Rs 12,500.00', 'link' => 'rings'],
                ['img' => 'hpendant.jpg', 'desc' => 'Topaz, Amethyst, Garnet, Citrine', 'name' => 'Multi-Coloured Gemstones Pendant', 'price' => 'Rs 22,000.00', 'link' => 'pendants'],
                ['img' => 'hear.jpg', 'desc' => 'Blue Topaz', 'name' => 'Cocktail Drop Earrings', 'price' => 'Rs 17,200.00', 'link' => 'earrings'],
            ];
        @endphp

        @foreach ($items as $item)
            <div class="bg-white shadow-md p-4 rounded text-center">
                <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['name'] }}" class="h-48 mx-auto object-contain mb-4" />
                <p class="text-gray-600 text-sm mb-1">{{ $item['desc'] }}</p>
                <h3 class="text-lg font-semibold mb-1">{{ $item['name'] }}</h3>
                <p class="text-gray-800 mb-2">{{ $item['price'] }}</p>
                <a href="{{ url($item['link']) }}">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">View</button>
                </a>
            </div>
        @endforeach
    </div>
</section>

<!-- MOBILE MENU SCRIPT -->
<script>
  document.getElementById('menu-toggle')?.addEventListener('click', function () {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>

@vite('resources/js/app.js')
</body>
</html>
