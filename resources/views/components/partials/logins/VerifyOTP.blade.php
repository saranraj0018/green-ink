<div class="my-3 space-y-1">
    <h2 class="text-primary text-2xl font-medium text-center">
        Verify your Email
    </h2>
    <p class="text-center text-sm">
        we’ve sent a 6-digit verification code to<br><b> youremail@gmail.com</b>
    </p>
    <div class="mx-8">
        <form class="mt-5 mx-8">
            <div class="flex gap-3">
                <input type="number"
                    class="focus:outline-none border border-gray-300 rounded-lg text-sm font-medium px-1 py-2 my-3 w-1/6">
                <input type="number"
                    class="focus:outline-none border border-gray-300 rounded-lg text-sm font-medium px-1 py-2 my-3 w-1/6">
                <input type="number"
                    class="focus:outline-none border border-gray-300 rounded-lg text-sm font-medium px-1 py-2 my-3 w-1/6">
                <input type="number"
                    class="focus:outline-none border border-gray-300 rounded-lg text-sm font-medium px-1 py-2 my-3 w-1/6">
                <input type="number"
                    class="focus:outline-none border border-gray-300 rounded-lg text-sm font-medium px-1 py-2 my-3 w-1/6">
                <input type="number"
                    class="focus:outline-none border border-gray-300 rounded-lg text-sm font-medium px-1 py-2 my-3 w-1/6">
            </div>
            <p class="text-center text-sm">
                Enter the code to Sign in
            </p>
            <p class="text-center text-sm text-primary my-2">
                Resend OTP in 49s
            </p>
            <div class="bg-[#EFEFEF] border border-[#E2E2E2] rounded-lg p-3 text-[12px] mt-2">
                <b>Tips:</b> check your spam folder if you don’t see the email. The code expires in 10 minutes
            </div>
            <button type="button" class="my-3 text-sm text-primary" @click="step = 'signinInstead'">
                back
            </button>
        </form>
    </div>
</div>
