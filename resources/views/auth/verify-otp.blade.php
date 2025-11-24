    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

            <div class="flex gap-4 text-base text-black w-130 bg-white rounded-xl py-2 px-10">
                <div class="flex items-center gap-2"><span>✔️</span> 100+ Courses</div>
                <div class="flex items-center gap-2"><span>✔️</span> Expert Mentors</div>
                <div class="flex items-center gap-2"><span>✔️</span> Lifetime Access</div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 bg-white shadow-lg flex flex-col justify-center items-center px-8 py-12">

        <img src="{{ asset('assets/greeninklogo.png') }}" class="h-20 mb-4">

        <h2 class="text-2xl font-bold text-green-900 mb-2">Verify your Email</h2>
        <p class="text-gray-500 text-sm mb-4">
            We've sent a 6-digit verification code to <br>
            <strong>{{ session('email') }}</strong>
        </p>

        <form action="{{ route('verify.otp') }}" method="POST" class="flex gap-2">
            @csrf
            <input type="text" name="otp" maxlength="6"
                class="border px-4 py-2 w-40 text-center tracking-widest text-xl">
            <button type="submit"
                class="bg-green-700 text-white px-6 py-2 rounded-lg ml-2 hover:bg-green-800">
                Verify
            </button>
        </form>

        <a href="#" class="text-green-600 text-sm mt-3">Resend OTP</a>
    </div>
</div>
