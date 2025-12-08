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
