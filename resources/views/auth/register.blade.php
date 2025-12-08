    @vite(['resources/css/app.css', 'resources/js/app.js'])



<section class="bg-gray-100 max-w-7xl mx-auto my-10">

<div class="grid grid-cols-1 md:grid-cols-2 min-h-screen">

    <!-- LEFT PANEL -->
    <div class="bg-gradient-to-br from-green-700 to-green-900 px-10 py-16 text-white flex flex-col justify-center rounded-3xl">
        
        <span class="bg-white/20 px-4 py-1 rounded-full text-sm  w-max">
            Trusted by 10,000+ learners
        </span>

        <h1 class="text-5xl font-bold mt-6">Welcome to<br>Greenink</h1>

        <p class="mt-4 text-white/90 leading-relaxed max-w-md">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>

        <!-- Features -->
        <div class="flex flex-wrap gap-4 mt-8">
            <div class="bg-white text-green-800 px-4 py-2 rounded-lg flex gap-2 items-center">
                ✔ 100+ Courses
            </div>

            <div class="bg-white text-green-800 px-4 py-2 rounded-lg flex gap-2 items-center">
                ✔ Expert Mentors
            </div>

            <div class="bg-white text-green-800 px-4 py-2 rounded-lg flex gap-2 items-center">
                ✔ Lifetime Access
            </div>
        </div>

    </div>

    <!-- RIGHT PANEL -->
    <div class="bg-white flex justify-center items-center px-6 md:px-16 shadow-lg pb-10">
        <div class="w-full max-w-md">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="./assets/greeninklogo.png"class="" alt="logo"/> 
            </div>

            <h2 class="text-2xl font-bold text-center text-green-800">Create Account</h2>
            <p class="text-center text-gray-600 mt-1 mb-8">
                Join thousands of learners on their journey to success
            </p>

            <!-- Form -->
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <label class="block mb-1 font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">

                <!-- Email -->
                <label class="block mb-1 font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">

                <!-- Phone -->
                <label class="block mb-1 font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" required maxlength="15"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4">

                <p class="text-gray-500 text-sm mb-4">
                    Get course updates and important notifications via SMS
                </p>

                <button type="submit"
                        class="w-full bg-green-700 text-white py-2 rounded-lg hover:bg-green-800 transition">
                    Create Account
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <hr class="flex-grow border-gray-300">
                <span class="mx-2 text-gray-500 text-sm">Already have an account?</span>
                <hr class="flex-grow border-gray-300">
            </div>

            <!-- Sign In -->
            <a href="{{ route('login') }}"
               class="block w-full text-center border border-gray-400 py-2 rounded-md hover:bg-gray-100">
                Sign In Instead
            </a>

            <p class="text-center text-xs text-gray-500 mt-4">
                By continuing, you agree to our
                <a class="text-green-700 underline">Terms of Service</a> and
                <a class="text-green-700 underline">Privacy Policy</a>.
            </p>

        </div>
    </div>

</div>



</section>
<!-- jQuery Form Validation -->
<script>
$(document).ready(function () {
    $("#registerForm").submit(function (e) {
        let phone = $("input[name='phone']").val().trim();
        if (!/^[0-9]{10,15}$/.test(phone)) {
            alert("Phone number should be 10–15 digits.");
            e.preventDefault();
        }
    });
});
</script>