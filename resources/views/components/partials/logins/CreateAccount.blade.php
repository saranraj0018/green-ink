<div class="my-3 space-y-1">
    <h2 class="text-primary text-2xl font-medium text-center">
        Create Account
    </h2>
    <p class="text-center text-sm">
        Join thousands of learners on their journey to success
    </p>
    <div class="mx-8">
        <form class="mt-5 mx-8">
            <label class="text-sm font-medium">
                Full Name
            </label><br>
            <input type="text"
                class="focus:outline-none border border-gray-200 rounded-lg text-sm font-medium px-3 py-2 my-3 w-full"
                placeholder="Your Name">
            <br>
            <label class="text-sm font-medium">
                Email Address
            </label><br>
            <input type="email"
                class="focus:outline-none border border-gray-200 rounded-lg text-sm font-medium px-3 py-2 my-3 w-full"
                placeholder="Your.email@gmail.com"><br>
            <label class="text-sm font-medium">
                Phone Number
            </label><br>
            <input type="tel"
                class="focus:outline-none border border-gray-200 rounded-lg text-sm font-medium px-3 py-2 my-3 w-full"
                placeholder="97********00"><br>
            <p class="text-sm">
                we'll send you a one-time password to verify your identify
            </p>
            <div class="flex justify-center">
                <button type="button" class="text-white rounded-full px-5 py-1"
                    style="background: linear-gradient(180deg, #1B4D3E 0%, #059F71 100%);">
                    Create Account
                </button>
            </div>
            <div class="flex items-center w-full my-3">
                <div class="grow border-t border-[#4aa08c]"></div>
                <span class="px-3 text-primary text-sm font-medium">Already Have an account?</span>
                <div class="grow border-t border-[#4aa08c]"></div>
            </div>
            <div class="flex justify-center">
                <button type="button" class="border border-gray-400 rounded-3xl font-medium text-sm px-5 py-1"
                    @click="step = 'signinInstead'">
                    Sign in Instead
                </button>
            </div>
    </div>
</div>
