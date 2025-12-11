<div class="my-3 space-y-1">
    <h2 class="text-primary text-2xl font-medium text-center">
        Welcome Back
    </h2>
    <p class="text-center text-sm">
        Enter your email to receive a verification code
    </p>
    <div class="mx-8">
        <form class="mt-5">
            <label class="text-sm font-medium">
                Email address
            </label><br>
            <input type="email"
                class="focus:outline-none border border-gray-200 rounded-lg text-sm font-medium px-3 py-2 my-3 w-full"
                placeholder="Your.email@gmail.com">
            <p class="text-sm">
                we'll send you a one-time password to verify your identify
            </p>
            <div class="flex items-center w-full my-3">
                <div class="grow border-t border-[#4aa08c]"></div>
                <span class="px-3 text-primary text-sm font-medium">OR</span>
                <div class="grow border-t border-[#4aa08c]"></div>
            </div>
            <label class="text-sm font-medium">
                Phone Number
            </label><br>
            <input type="tel"
                class="focus:outline-none border border-gray-200 rounded-lg text-sm font-medium px-3 py-2 my-3 w-full"
                placeholder="0000000000">
            <div class="flex justify-center">
                <button type="button" class="text-white rounded-full px-5 py-1"
                    style="background: linear-gradient(180deg, #1B4D3E 0%, #059F71 100%);" @click="step = 'verify'">
                    Sign In
                </button>
            </div>
        </form>
        <div class="flex items-center w-full my-3">
            <div class="grow border-t border-[#4aa08c]"></div>
            <span class="px-3 text-primary text-sm font-medium">New to Greenink?</span>
            <div class="grow border-t border-[#4aa08c]"></div>
        </div>
        <div class="flex justify-center">
            <button class="border border-gray-400 rounded-3xl font-medium text-sm px-5 py-1"
                @click="step = 'createAccount'">
                Create Account
            </button>
        </div>
        <p class="text-sm text-center mt-3">
            By continuing, you agree to our <span class="text-primary"> Terms of Service</span> and<span
                class="text-primary"> Privacy Policy</span>
        </p>
    </div>
</div>
