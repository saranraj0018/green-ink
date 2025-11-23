 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Greenink</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


<!-- NAVBAR -->
<section class="bg-white/50 shadow-sm">
    <div class="container mx-auto px-4 md:px-10 py-4 flex items-center justify-between">

        <!-- Left: Logo -->
        <div class="flex items-center">
            <img src="{{ asset('assets/greeninklogo.png') }}" alt="logo" class="h-16 md:h-20">
        </div>

        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden text-green-700 text-3xl font-bold">
            ☰
        </button>

        <!-- Center: Navigation -->
        <nav id="navbar-menu" class="hidden md:flex">
            <ul class="flex flex-col md:flex-row items-center gap-3 md:gap-5 text-sm font-semibold
                      border border-green-600 px-4 py-2 md:px-6 md:py-3 bg-white rounded-full shadow-sm">

                @php
                  $menus = [
    'home' => 'Home',
    'about' => 'About',
    'Courses' => 'Courses',
    'Features' => 'Features',
    'Events' => 'Events',
    'Career' => 'Career',
    'Store' => 'Store',
    'Blogs' => 'Blogs',
    'ContactUs' => 'Contact Us',
];

                @endphp

                @foreach ($menus as $route => $label)
                    <li>
                        <a href="{{ route($route) }}"
                            class="px-3 py-2 rounded-md transition 
                            {{ request()->routeIs($route) ?
                                'bg-green-700 text-white' :
                                'text-green-700 hover:bg-green-50' }}">
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Right: Sign In -->
        <div class="hidden md:block">
            <button
                class="px-6 py-2 border border-green-600 text-green-700 rounded-full 
                       hover:bg-green-700 hover:text-white transition">
                Sign In
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-4">
        <ul class="flex flex-col gap-3 py-3 bg-white border rounded-xl shadow-md">
            @foreach ($menus as $route => $label)
                <li>
                    <a href="{{ route($route) }}"
                        class="block w-full text-center py-2 rounded-md text-green-700 hover:bg-green-50">
                        {{ $label }}
                    </a>
                </li>
            @endforeach

            <li>
                <button
                    class="w-full py-2 border border-green-600 text-green-700 rounded-full 
                           hover:bg-green-700 hover:text-white transition">
                    Sign In
                </button>
            </li>
        </ul>
    </div>
</section>


<!-- Script: Toggle Mobile Menu -->
<script>
    const toggleBtn = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('navbar-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    toggleBtn.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('hidden');
    });
</script>

@yield('content')

