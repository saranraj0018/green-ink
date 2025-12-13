<div class="my-3 space-y-1">
    <h2 class="text-primary text-2xl font-medium text-center">
        Create Account
    </h2>
    <p class="text-center text-sm">
        Join thousands of learners on their journey to success
    </p>
    <div class="mx-8">
        <form class="mt-5 mx-8" method="POST" id="createAccountForm" onsubmit="event.preventDefault(); alert(1);">
            @csrf
            <input type="hidden" name="register_submit" value="true">
            <label class="text-sm font-medium">Full Name</label>
            <input type="text" name="name" id="name"
                class="focus:outline-none border border-gray-200 rounded-lg text-sm font-medium px-3 py-2 my-1 w-full"
                placeholder="Your Name" value="{{ old('name') }}">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <label class="text-sm font-medium">Email Address</label>
            <input type="email" name="email" id="email"
                class="focus:outline-none border border-gray-200 rounded-lg text-sm font-medium px-3 py-2 my-1 w-full"
                placeholder="Your.email@gmail.com" value="{{ old('email') }}">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <label class="text-sm font-medium">Phone Number</label>
            <input type="tel" name="mobile_number" id="mobile_number"
                class="focus:outline-none border border-gray-200 rounded-lg text-sm font-medium px-3 py-2 my-1 w-full"
                placeholder="97********00" value="{{ old('mobile_number') }}">
            @error('mobile_number')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <p class="text-sm">
                we'll send you a one-time password to verify your identify
            </p>
            <div class="flex justify-center">
                <button type="submit" class="text-white rounded-full px-5 py-1"
                    style="background: linear-gradient(180deg, #1B4D3E 0%, #059F71 100%);">
                    Create Account
                </button>
            </div>
        </form>
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
<script>

