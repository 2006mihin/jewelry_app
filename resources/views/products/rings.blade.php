<!DOCTYPE html>
<html>
<head>
    <title>Rings</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    {{-- Header --}}
    @include('layouts.header')

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Rings Collection</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($products as $product)
                <div class="border rounded-lg shadow p-4 bg-white flex flex-col">
                    
                    {{-- Product Image --}}
                    @if($product->image)
                        <img src="{{ asset('storage/products/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-48 object-cover rounded mb-4">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" 
                             alt="No image" 
                             class="w-full h-48 object-cover rounded mb-4">
                    @endif

                    {{-- Product Info --}}
                    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                    <p class="text-gray-600">{{ $product->description }}</p>
                    <p class="font-bold mt-2">${{ number_format($product->price, 2) }}</p>
                    <p class="text-sm text-gray-500">Stock: {{ $product->stock }}</p>

                    {{-- Buttons --}}
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('products.show', $product->id) }}" 
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            View
                        </a>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No rings available right now.</p>
            @endforelse
        </div>
    </div>

</body>
</html>
