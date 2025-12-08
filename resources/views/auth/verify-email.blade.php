    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <div class="max-w-7xl mx-auto my-10 grid grid-cols-1 md:grid-cols-2">

        <!-- LEFT SECTION -->
        <div class="bg-gradient-to-br from-green-800 to-green-900 text-white flex flex-col justify-center p-10 rounded-3xl">
            
            <span class="text-sm bg-white/10 px-3 py-1 rounded-full w-fit mb-4">
                Trusted by 10,000+ learners
            </span>

            <h1 class="text-4xl font-bold mb-4">
                Welcome to <br> Greenink
            </h1>

            <p class="text-white/80 max-w-md mb-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>

            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-green-300">✔</span> 100+ Courses
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-green-300">✔</span> Expert Mentors
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-green-300">✔</span> Lifetime Access
                </div>
            </div>
        </div>

        <!-- RIGHT SECTION -->
        <div class="flex flex-col justify-center items-center p-10 bg-white">

            <!-- Logo -->
            <img src="/assets/greeninklogo.png" class="w-80" alt="Green Ink Academy Logo">

            <h2 class="text-2xl font-semibold mb-2">Verify your Email</h2>

            <p class="text-gray-500 text-sm mb-6">
                We've sent a 6-digit verification code to <br>
                <span class="font-semibold">80********75</span>
            </p>

            <!-- OTP Inputs -->
            <form method="POST" action="{{ route('verify.otp') }}" class="space-y-6">
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

                <button 
                    type="submit"
                    class="w-full mt-4 bg-green-700 text-white py-2 rounded-lg hover:bg-green-800 transition">
                    Enter the code to Sign in
                </button>

                <p class="text-sm text-green-700 text-center cursor-pointer">
                    Resend OTP in 48s
                </p>
            </form>

            <!-- Tips -->
            <div class="mt-6 bg-gray-100 border px-4 py-2 text-sm text-gray-600 rounded-lg">
                <strong>Tips:</strong> Check your spam folder if you don’t see the email.  
                <br>The code expires in 10 minutes.
            </div>
        </div>
    </div>
