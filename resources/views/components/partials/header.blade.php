<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Greenink</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<section class="bg-white/50">
    <div class="grid grid-cols-12 items-center px-20 py-3">

        <!-- Logo -->
        <div class="col-span-6 md:col-span-2">
            <img src="{{ asset('assets/greeninklogo.png') }}" alt="logo" class="">
        </div>

        <!-- Hamburger for mobile -->
        <div class="col-span-6 flex justify-end md:hidden">
            <button id="menu-toggle" class="text-green-700 text-3xl">☰</button>
        </div>

        <!-- Menu -->
        <nav id="navbar-menu"
            class="col-span-12 md:col-span-6 hidden md:block mt-4 md:mt-0 ms-10">
            <ul class="flex  justify-center flex-col md:flex-row gap-4 md:gap-6 text-sm font-medium bg-white border-green-600 border rounded-3xl shadow-2xs py-3 px-3">

                <li>
                    <a href="{{ route('home') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('home') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-green-700' }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('about') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-green-700' }}">
                        About
                    </a>
                </li>

                <li>
                    <a href="{{ route('Courses') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('Courses') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-green-700' }}">
                        Courses
                    </a>
                </li>

                <li>
                    <a href="{{ route('Features') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('Features') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-green-700' }}">
                        Features
                    </a>
                </li>

                <li>
                    <a href="{{ route('Contact') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('Contact') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-green-700' }}">
                        Contact
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Buttons -->
        <div class="col-span-12 md:col-span-4 flex justify-start md:justify-end gap-3 mt-3 md:mt-0">
            <button class="text-green-700 text-sm px-4 py-2">Sign In</button>
            <button class="text-white text-sm px-4 py-2 bg-[rgba(0,131,87,1)] rounded-full">
                Start Learning
            </button>
        </div>
    </div>
</section>


<!-- Mobile menu toggle script -->
<script>
    document.getElementById('menu-toggle').onclick = function() {
        document.getElementById('navbar-menu').classList.toggle('hidden');
    }
</script>

@yield('content')