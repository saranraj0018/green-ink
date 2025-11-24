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
            <button id="openSignupDesktop"
    class="px-6 py-2 border border-green-600 text-green-700 rounded-full 
           hover:bg-green-700 hover:text-white transition">
    Sign In
</button>
        </div>
        <!-- Signup Modal -->
<div id="signupModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
  <div class="bg-gradient-to-b from-white to-[#E5F6FF] rounded-2xl shadow-2xl w-full max-w-7xl  relative">

    <!-- Close Button -->
    <button id="closeSignup" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>

    <div class="max-w-7xl flex my-10 mx-auto">

    <!-- Left section -->
    <div class="hidden lg:flex w-1/2 bg-green-900 text-white flex-col justify-center px-16 relative overflow-hidden rounded-3xl shadow-lg">
        <div class="absolute inset-0 bg-gradient-to-br from-green-800 to-green-600 opacity-70"></div>

        <div class="relative z-10">
            <p class="text-sm bg-white/20 px-3 py-1 rounded-full inline-block mb-6">
                Trusted by 10,000+ learners
            </p>
            <h1 class="text-5xl font-extrabold mb-4">
                Welcome to<br />Greenink
            </h1>

            <p class="text-sm leading-relaxed mb-8 max-w-md">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>

            <div class="flex gap-4 text-base text-black w-130 bg-white rounded-xl py-2 px-10">
                <div class="flex items-center gap-2"><span>✔️</span> 100+ Courses</div>
                <div class="flex items-center gap-2"><span>✔️</span> Expert Mentors</div>
                <div class="flex items-center gap-2"><span>✔️</span> Lifetime Access</div>
            </div>
        </div>
    </div>



            </li>
        </ul>



    <!-- Right section -->
    <div class="w-full lg:w-1/2 bg-white flex flex-col justify-center items-center px-8 py-12">

        <img src="{{ asset('assets/greeninklogo.png') }}" alt="Logo" class="h-20 mb-4" />

        <h2 class="text-2xl font-bold text-green-900 mb-2">Welcome Back</h2>
        <p class="text-gray-500 text-sm mb-6">
            Enter your email to receive a verification code
        </p>

        <!-- Email form -->
        <form action="{{ route('send.otp') }}" method="POST" class="w-full max-w-md space-y-4">
            @csrf

            @if(session('error'))
                <p class="text-red-600 text-sm">{{ session('error') }}</p>
            @endif

            <div>
                <label class="text-gray-700 text-sm font-medium">Email Address</label>
                <input
                    type="email"
                    name="email"
                    class="w-full mt-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                    placeholder="youremail@gmail.com"
                />
            </div>

            <div class="flex items-center gap-2">
                <div class="flex-grow h-px bg-gray-300"></div>
                <span class="text-gray-400 text-sm">OR</span>
                <div class="flex-grow h-px bg-gray-300"></div>
            </div>

            <div>
                <label class="text-gray-700 text-sm font-medium">Phone Number</label>
                <input
                    type="text"
                    name="phone"
                    class="w-full mt-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                    placeholder="0000000000"
                />
            </div>

            <button
                type="submit"
                class="w-full bg-green-700 text-white font-medium py-2 rounded-lg hover:bg-green-800 transition"
            >
                Send OTP
            </button>
        </form>

        <div class="border-t w-full max-w-md my-6"></div>

        <p class="text-sm text-gray-600">New to Greenink?</p>

       <a href="#" id="openPopup"
   class="mt-3 inline-block bg-white border border-gray-300 px-6 py-2 rounded-lg hover:bg-gray-100">
    Create Account
</a>
<!-- Popup (Modal) -->
<div id="popupModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-80 shadow-lg relative">
        <h2 class="text-xl font-semibold mb-3">Create Account</h2>

        <!-- Popup content -->
        <p class="text-gray-600">Your account creation form goes here.</p>

        <!-- Close button -->
        <button id="closePopup"
                class="mt-4 bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded">
            Close
        </button>
    </div>
</div>

        <p class="text-xs text-gray-400 mt-4">
            By continuing, you agree to our
            <a href="#" class="underline">Terms of Service</a> and
            <a href="#" class="underline">Privacy Policy</a>
        </p>
    </div>
</div>

    </div>
    </div>
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
<script>
    const openMobileBtn = document.getElementById('openSignup');
    const openDesktopBtn = document.getElementById('openSignupDesktop');
    const modal = document.getElementById('signupModal');
    const overlay = document.getElementById('signupOverlay');
    const closeBtn = document.getElementById('closeSignup');

    function openPopup() {
        modal.classList.remove('hidden');
        overlay.classList.remove('hidden');
    }

    // open from mobile button
    if (openMobileBtn) {
        openMobileBtn.addEventListener('click', openPopup);
    }

    // open from desktop button
    if (openDesktopBtn) {
        openDesktopBtn.addEventListener('click', openPopup);
    }

    // close popup
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            overlay.classList.add('hidden');
        });
    }

    // click outside to close
    if (overlay) {
        overlay.addEventListener('click', () => {
            modal.classList.add('hidden');
            overlay.classList.add('hidden');
        });
    }
</script>
<script>
    const openBtn  = document.getElementById("openPopup");
    const closeBtn = document.getElementById("closePopup");
    const modal    = document.getElementById("popupModal");

    openBtn.addEventListener("click", function (e) {
        e.preventDefault();
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    });

    closeBtn.addEventListener("click", function () {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    });
</script>



@yield('content')

