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
                                ' text-green-700' :
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
             <div class=" rounded-2xl shadow-2xl  max-w-7xl   relative">

                 <!-- Close Button -->
                 <button id="closeSignup" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>

                 <div class="max-w-5xl flex  mx-auto">

                     <!-- Left section -->
                     <div class="hidden lg:flex w-1/2 bg-green-900 text-white flex-col justify-center px-16 relative overflow-hidden rounded-3xl shadow-lg">
                         <div class="absolute inset-0 bg-gradient-to-br from-green-800 to-green-600 opacity-70"></div>

                         <div class="relative z-10">
                             <p class="text-sm bg-white/20 px-3 py-1 rounded-full inline-block mb-6">
                                 Trusted by 10,000+ learners
                             </p>
                             <h1 class="text-3xl font-extrabold mb-4">
                                 Welcome to<br />Greenink
                             </h1>

                             <p class="text-sm leading-relaxed mb-8 max-w-md">
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             </p>

                             <div class="flex gap-4 text-xs text-black w-100 bg-white rounded-xl py-2 px-5">
                                 <div class="flex items-center gap-2"><span>✔️</span> 100+ Courses</div>
                                 <div class="flex items-center gap-2"><span>✔️</span> Expert Mentors</div>
                                 <div class="flex items-center gap-2"><span>✔️</span> Lifetime Access</div>
                             </div>
                         </div>
                     </div>



                     </li>
                     </ul>



                     <!-- Right section -->
                     <div class="w-full lg:w-1/2 bg-white flex flex-col justify-center items-center px-8 py-2">

                         <img src="{{ asset('assets/greeninklogo.png') }}" alt="Logo" class="h-20 mb-4 pt-3" />

                         <h2 class="text-xl font-bold text-[#1B4D3E] mb-2">Welcome Back</h2>
                         <p class="text-black text-sm mb-6">
                             Enter your email to receive a verification code
                         </p>

                         <!-- Email form -->
                         <form action="{{ route('send.otp') }}" method="POST" class="w-full max-w-md space-y-4">
                             @csrf

                             @if(session('error'))
                             <p class="text-red-600 text-sm">{{ session('error') }}</p>
                             @endif

                             <div>
                                 <label class="text-black text-sm font-medium">Email Address</label>
                                 <input
                                     type="email"
                                     name="email"
                                     class="w-full mt-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                                     placeholder="youremail@gmail.com" />
                                 <p class="text-xs text-justify text-black font-normal py-2">we’ll send you a one-time password to verify your identify</p>
                             </div>

                             <div class="flex items-center gap-2">
                                 <div class="flex-grow h-px bg-[#008357]"></div>
                                 <span class="text-black font-semibold text-sm">OR</span>
                                 <div class="flex-grow h-px bg-[#008357]"></div>
                             </div>

                             <div>
                                 <label class="text-black text-sm font-medium">Phone Number</label>
                                 <input
                                     type="text"
                                     name="phone"
                                     class="w-full mt-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                                     placeholder="0000000000" />
                                 <p class="text-xs text-justify text-black font-normal py-2">we’ll send you a one-time password to verify your identify</p>

                             </div>
                            <div class="flex justify-center">
    <button
        id="sendOtpBtn"
        type="button"
        class="bg-gradient-to-b from-[#1B4D3E] to-[#059F71] text-white font-medium py-2 px-20 rounded-3xl hover:bg-green-800 transition">
        Send OTP
    </button>
</div>

<!-- OTP POPUP -->
<div id="otpPopup" class="fixed inset-0 hidden bg-black bg-opacity-50 justify-center items-center z-50">
    <div class=" rounded-xl max-w-6xl  shadow-xl relative">

        <button id="closeOtpPopup" class="absolute top-3 right-3 text-gray-600 text-2xl">&times;</button>

       <div class="max-w-7xl flex my-10 mx-auto ">
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

            <div class="flex gap-4 text-xs text-black w-110 bg-white rounded-xl py-2 px-10">
                <div class="flex items-center gap-2"><span>✔️</span> 100+ Courses</div>
                <div class="flex items-center gap-2"><span>✔️</span> Expert Mentors</div>
                <div class="flex items-center gap-2"><span>✔️</span> Lifetime Access</div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 bg-white shadow-lg flex flex-col justify-center items-center rounded-xl px-8 py-12">

        <img src="{{ asset('assets/greeninklogo.png') }}" class="h-20 mb-4">

        <h2 class="text-2xl font-bold text-[#1B4D3E] mb-2">Verify your Email</h2>
        <p class="text-black text-center text-sm mb-4">
            We've sent a 6-digit verification code to <br>
            youremail@gmail.com
            <strong>{{ session('email') }}</strong>
        </p>

        <form action="{{ route('verify.otp') }}" method="POST" class="flex gap-2">
            @csrf
           
           <!-- OTP Inputs -->
            <form method="POST" action="{{ route('verify.otp') }}" >
                @csrf
                
                <div class="flex gap-3 justify-center">
                    @for ($i = 1; $i <= 6; $i++)
                        <input 
                            type="text" 
                            name="otp[]" 
                            maxlength="1"
                            class="w-12 h-12 border-2 border-gray-300 rounded-lg text-center text-xl focus:border-green-600 focus:ring-2 focus:ring-green-400"
                            required
                        >
                    @endfor
                </div>
        </form>
        <p class="text-center text-black text-sm py-3  font-normal">Enter the code to Sign in</p>

        <a href="#" class="text-green-600 text-sm mt-3">Resend OTP</a>

        <p class="text-sm text-black font-normal bg-[#E2E2E2] rounded-3xl py-5 px-5 text-center w-100 my-6"><b>Tips </b>: check your spam folder if you don’t see the email. The code expires in 10 minutes</p>
    </div>
</div>


           
        </form>
    </div>
</div>


                         <div class="flex items-center gap-2 py-3 w-full">
                             <div class="flex-grow h-px bg-[#008357]"></div>
                             <span class="text-black font-normal text-xs">New to Greenink?</span>
                             <div class="flex-grow h-px bg-[#008357]"></div>
                         </div>

<a href="#" id="openPopup"
   class="inline-block text-black font-semibold bg-white border border-gray-300 px-10 py-2 rounded-3xl hover:bg-gray-100">
   Create Account
</a>
<div id="popupModal" class="fixed inset-0 bg-white hidden justify-center items-center">
    <div class=" rounded-lg shadow-lg relative ">
       <section class=" max-w-5xl mx-auto ">

<div class="grid grid-cols-1 md:grid-cols-2 min-h-screen">

    <!-- LEFT PANEL -->
    <div class="bg-gradient-to-br from-green-700 to-green-900 px-10  text-white flex flex-col justify-center rounded-3xl">

    </div>

    <!-- RIGHT PANEL -->
    <div class="bg-white flex justify-center items-center px-6 md:px-16 shadow-lg pb-10">
        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="./assets/greeninklogo.png"class="w-50" alt="logo"/> 
            </div>

            <h2 class="text-xl font-bold text-center text-[#1B4D3E]">Create Account</h2>
            <p class="text-center text-black mt-1 mb-4">
                Join thousands of learners on their journey to success
            </p>

            <!-- Form -->
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <label class="block mb-1 font-medium text-black">Full Name</label>
                <input type="text" name="name" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">

                <!-- Email -->
                <label class="block mb-1 font-medium text-black">Email Address</label>
                <input type="email" name="email" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">

                <!-- Phone -->
                <label class="block mb-1 font-medium text-black">Phone Number</label>
                <input type="text" name="phone" required maxlength="15"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-2">

                <p class="text-black font-normal text-sm mb-2">
                    Get course updates and important notifications via SMS
                </p>
                  <div class="flex justify-center">
                <button   id="sendOtpBtn" type="submit"
                        class=" bg-gradient-to-t from-[#1B4D3E] to-[#059F71] text-white py-2 px-20 rounded-3xl hover:bg-green-800 transition">
                    Create Account
                </button>
                  </div>
            </form>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <hr class="flex-grow border-[#008357]">
                <span class="mx-2 text-black text-sm">Already have an account?</span>
                <hr class="flex-grow border-[#008357]">
            </div>

            <!-- Sign In -->
             <div class="flex justify-center">
            <a href="{{ route('login') }}"
               class="block  text-center border border-gray-300 text-black font-semibold py-2 px-20 rounded-3xl hover:bg-gray-100">
                Sign In Instead
            </a>
             </div>

            <p class="text-center text-xs text-black mt-4">
                By continuing, you agree to our
                <a class="text-[#008357] ">Terms of Service</a> and
                <a class="text-[#008357]">Privacy Policy</a>.
            </p>

        </div>
    </div>

</div>
    </div>
</div>
                         

                         <p class="text-xs text-black mt-4 mb-4">
                             By continuing, you agree to our
                             <a href="#" class=" text-[#008357]">Terms of Service</a> and
                             <a href="#" class=" text-[#008357]">Privacy Policy</a>
                         </p>
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


         </ul>
     </div>
 </section>

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
     var modal = document.getElementById('signupModal');
     const overlay = document.getElementById('signupOverlay');
     var closeBtn = document.getElementById('closeSignup');

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
     const openBtn = document.getElementById("openPopup");
     const closeBtn = document.getElementById("closePopup");
     const modal = document.getElementById("popupModal");

     openBtn.addEventListener("click", function(e) {
         e.preventDefault();
         modal.classList.remove("hidden");
         modal.classList.add("flex");
     });

     closeBtn.addEventListener("click", function() {
         modal.classList.add("hidden");
         modal.classList.remove("flex");
     });
 </script>
 <!-- otp-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    // Open popup
    $('#sendOtpBtn').on('click', function () {
        $('#otpPopup').removeClass('hidden').addClass('flex');
    });

    // Close popup
    $('#closeOtpPopup').on('click', function () {
        $('#otpPopup').addClass('hidden').removeClass('flex');
    });

    // Click outside box to close
    $('#otpPopup').on('click', function(e) {
        if ($(e.target).is('#otpPopup')) {
            $('#otpPopup').addClass('hidden').removeClass('flex');
        }
    });

});
</script>
<!-- create accout-->
<script>
$(document).ready(function () {

    // Open popup
    $("#openPopup").click(function (e) {
        e.preventDefault(); // prevents page refresh on link click
        $("#popupModal").removeClass("hidden").addClass("flex");
    });

    // Close popup
    $("#closePopup").click(function () {
        $("#popupModal").addClass("hidden").removeClass("flex");
    });

    // Click outside to close
    $("#popupModal").click(function (e) {
        if ($(e.target).is("#popupModal")) {
            $("#popupModal").addClass("hidden").removeClass("flex");
        }
    });

});
</script>


 @yield('content')