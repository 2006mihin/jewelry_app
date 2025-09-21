<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Admin Panel - Products</h1>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </header>

    <main class="p-6 max-w-7xl mx-auto">

        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('admin.dashboard') }}"
               class="inline-block px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 transition">
                &larr; Back to Dashboard
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-8">Manage Products</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Product Form -->
        <div class="bg-white p-6 rounded shadow mb-10">
            <h2 class="text-xl font-semibold mb-4">
                {{ $editing ? 'Update Product' : 'Add New Product' }}
            </h2>

            <form method="POST"
                  action="{{ $editing ? route('admin.products.update', $productToEdit->id) : route('admin.products.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if($editing)
                    @method('POST')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-medium">Product Name</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2"
                               value="{{ $editing ? $productToEdit->name : '' }}" required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Price</label>
                        <input type="number" step="0.01" name="price" class="w-full border rounded px-3 py-2"
                               value="{{ $editing ? $productToEdit->price : '' }}" required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Category</label>
                        <select name="category_id" class="w-full border rounded px-3 py-2">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $editing && $productToEdit->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Stock</label>
                        <input type="number" name="stock" class="w-full border rounded px-3 py-2"
                               value="{{ $editing ? $productToEdit->stock : '' }}" required>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block mb-1 font-medium">Image</label>
                        <input type="file" name="image" class="w-full border rounded px-3 py-2">
                        @if($editing && $productToEdit->image)
                            <img src="{{ asset('storage/' . $productToEdit->image) }}" class="h-20 mt-2">
                        @endif
                    </div>
                </div>

                <button type="submit"
                        class="mt-4 {{ $editing ? 'bg-green-600 hover:bg-green-700' : 'bg-blue-600 hover:bg-blue-700' }} text-white px-6 py-2 rounded">
                    {{ $editing ? 'Update Product' : 'Add Product' }}
                </button>
            </form>
        </div>

        <!-- Products Table -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">All Products</h2>
            <table class="min-w-full table-auto text-sm border-collapse border border-gray-200">
                <thead class="bg-gray-100 font-semibold text-left">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Image</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-4 py-2 border">Category</th>
                        <th class="px-4 py-2 border">Stock</th>
                        <th class="px-4 py-2 border text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $i => $row)
                        <tr class="border-b">
                            <td class="px-4 py-2 border">{{ $i+1 }}</td>
                            <td class="px-4 py-2 border">
                                @if($row->image)
                                    <img src="{{ asset('storage/' . $row->image) }}" class="h-12 w-12 object-contain">
                                @endif
                            </td>
                            <td class="px-4 py-2 border">{{ $row->name }}</td>
                            <td class="px-4 py-2 border">Rs {{ $row->price }}</td>
                            <td class="px-4 py-2 border">{{ $row->category->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $row->stock }}</td>
                            <td class="px-4 py-2 border text-center space-x-2">
                                <a href="{{ route('admin.products.index', ['edit' => $row->id]) }}"
                                   class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Update</a>
                                <form action="{{ route('admin.products.destroy', $row->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure?')"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</body>
</html>
