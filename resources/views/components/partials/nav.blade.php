<nav x-data="{ sidebarOpen: false }">
    <div class="container mx-auto p-2 lg:p-4 flex items-center justify-end lg:justify-between">
        <!-- Desktop Menu -->
        <ul class="hidden lg:flex space-x-6 text-primary-light font-medium border border-primary-light mx-auto rounded-3xl py-2 px-4">
            <li><a href="/" class="hover:text-green-600">Home</a></li>
            <li><a href="/about" class="hover:text-green-600">About</a></li>
            <li><a href="/courses" class="hover:text-green-600">Courses</a></li>
            <li><a href="/features" class="hover:text-green-600">features</a></li>
            <li><a href="/events" class="hover:text-green-600">Events</a></li>
            <li><a href="/careers" class="hover:text-green-600">Careers</a></li>
            <li><a href="/contact" class="hover:text-green-600">Contact</a></li>
        </ul>

        <!-- Mobile Hamburger -->
        <button @click="sidebarOpen = true" class="lg:hidden focus:outline-none">
            <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Overlay (Click outside closes) -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity
        class="fixed inset-0 bg-black/50 lg:hidden">
    </div>

    <!-- Sidebar -->
    <aside x-show="sidebarOpen" @click.outside="sidebarOpen = false" x-transition
        class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg p-6 lg:hidden z-1000">

        <!-- Close Button -->
        <button @click="sidebarOpen = false" class="absolute right-4 top-4 text-gray-600 text-3xl">
            &times;
        </button>

        <ul class="mt-10 space-y-4 text-lg text-gray-700">
            <li><a href="/" class="block hover:text-green-600">Home</a></li>
            <li><a href="/about" class="block hover:text-green-600">About</a></li>
            <li><a href="/courses" class="block hover:text-green-600">Courses</a></li>
            <li><a href="/features" class="block hover:text-green-600">features</a></li>
            <li><a href="/events" class="block hover:text-green-600">Events</a></li>
            <li><a href="/careers" class="block hover:text-green-600">Careers</a></li>
            <li><a href="/contact" class="block hover:text-green-600">Contact</a></li>
        </ul>
    </aside>
</nav>
