<header class="bg-white shadow sticky top-0 z-50">
  <div class="container mx-auto flex justify-between items-center px-4 py-4">
    <img src="{{ asset('images/NLogo.png') }}" alt="Logo" class="h-10" />

    <!-- Hamburger -->
    <button id="menu-toggle" class="md:hidden text-2xl focus:outline-none">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex items-center space-x-6">
      <a href="{{ url('/') }}" class="hover:text-blue-600">HOME</a>
      <a href="{{ url('/about') }}" class="hover:text-blue-600">ABOUT</a>
      <div class="relative group">
        <button class="hover:text-blue-600">JEWELRIES <i class="fa fa-caret-down"></i></button>
        <div class="absolute hidden group-hover:block bg-white shadow-lg mt-0 rounded w-40 z-10">
          <a href="{{ url('/rings') }}" class="block px-4 py-2 hover:bg-gray-100">Rings</a>
          <a href="{{ url('/pendants') }}" class="block px-4 py-2 hover:bg-gray-100">Pendants</a>
          <a href="{{ url('/earrings') }}" class="block px-4 py-2 hover:bg-gray-100">Earrings</a>
          <a href="{{ url('/bracelets') }}" class="block px-4 py-2 hover:bg-gray-100">Bracelets</a>
        </div>
      </div>
      <a href="{{ url('/cart') }}" class="hover:text-blue-600">CART</a>
    </nav>

    <!-- Auth Links -->
    <div class="hidden md:flex items-center space-x-4">
      @auth
        <a href="{{ route('profile.show') }}" class="hover:text-blue-600 flex items-center space-x-1">
          <i class="fa fa-user text-xl"></i>
          <span>Profile</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="hover:text-red-600">Logout</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="hover:text-blue-600">Sign In</a>
        <a href="{{ route('register') }}" class="hover:text-blue-600">Sign Up</a>
      @endauth
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2">
    <a href="{{ url('/') }}" class="block py-2 hover:text-blue-600">HOME</a>
    <a href="{{ url('/about') }}" class="block py-2 hover:text-blue-600">ABOUT</a>
    <details class="bg-white">
      <summary class="py-2 cursor-pointer hover:text-blue-600">JEWELRIES</summary>
      <div class="pl-4">
        <a href="{{ url('/rings') }}" class="block py-1 hover:text-blue-600">Rings</a>
        <a href="{{ url('/pendants') }}" class="block py-1 hover:text-blue-600">Pendants</a>
        <a href="{{ url('/earrings') }}" class="block py-1 hover:text-blue-600">Earrings</a>
        <a href="{{ url('/bracelets') }}" class="block py-1 hover:text-blue-600">Bracelets</a>
      </div>
    </details>
    <a href="{{ url('/cart') }}" class="block py-2 hover:text-blue-600">CART</a>

    <!-- Mobile Auth Links -->
    @auth
      <a href="{{ route('profile.show') }}" class="block py-2 hover:text-blue-600">Profile</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left py-2 hover:text-red-600">Logout</button>
      </form>
    @else
      <a href="{{ route('login') }}" class="block py-2 hover:text-blue-600">Sign In</a>
      <a href="{{ route('register') }}" class="block py-2 hover:text-blue-600">Sign Up</a>
    @endauth
  </div>
</header>

<script>
  document.getElementById('menu-toggle')?.addEventListener('click', function () {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>
