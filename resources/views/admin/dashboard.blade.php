<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!--  Total Orders -->
                <a href="{{ route('admin.orders')  }}"
                   class="group relative block bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <span class="absolute top-0 left-0 w-full h-1 bg-blue-500 rounded-t-xl transition-all duration-300 group-hover:h-2"></span>
                    <h3 class="text-gray-500 text-sm uppercase tracking-wide mt-2 group-hover:text-blue-600">Total Orders</h3>
                    <p class="text-4xl font-bold text-blue-600 mt-2 group-hover:text-blue-800">{{ $totalOrders }}</p>
                </a>

                <!-- Total Products -->
                <a href="{{ route('admin.products') }}"
                   class="group relative block bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <span class="absolute top-0 left-0 w-full h-1 bg-green-500 rounded-t-xl transition-all duration-300 group-hover:h-2"></span>
                    <h3 class="text-gray-500 text-sm uppercase tracking-wide mt-2 group-hover:text-green-600">Total Products</h3>
                    <p class="text-4xl font-bold text-green-600 mt-2 group-hover:text-green-800">{{ $totalProducts }}</p>
                </a>

                <!-- Registered Users -->
                <a href="{{ route('admin.users.index') }}"
                   class="group relative block bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <span class="absolute top-0 left-0 w-full h-1 bg-purple-500 rounded-t-xl transition-all duration-300 group-hover:h-2"></span>
                    <h3 class="text-gray-500 text-sm uppercase tracking-wide mt-2 group-hover:text-purple-600">All Users</h3>
                    <p class="text-4xl font-bold text-purple-600 mt-2 group-hover:text-purple-800">{{ $totalUsers }}</p>
                </a>

                <!-- Customers -->
                <div class="group relative block bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <span class="absolute top-0 left-0 w-full h-1 bg-yellow-500 rounded-t-xl transition-all duration-300 group-hover:h-2"></span>
                    <h3 class="text-gray-500 text-sm uppercase tracking-wide mt-2 group-hover:text-yellow-600">Customers</h3>
                    <p class="text-4xl font-bold text-yellow-600 mt-2 group-hover:text-yellow-800">{{ $totalCustomers }}</p>
                </div>

                <!-- Admins -->
                <div class="group relative block bg-white rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <span class="absolute top-0 left-0 w-full h-1 bg-red-500 rounded-t-xl transition-all duration-300 group-hover:h-2"></span>
                    <h3 class="text-gray-500 text-sm uppercase tracking-wide mt-2 group-hover:text-red-600">Admins</h3>
                    <p class="text-4xl font-bold text-red-600 mt-2 group-hover:text-red-800">{{ $totalAdmins }}</p>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="mt-10 bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                <div class="text-gray-500 italic">
                    Recent user registrations, orders, or other activities will appear here.
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
