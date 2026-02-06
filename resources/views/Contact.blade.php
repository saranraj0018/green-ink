<x-partials.header />
<!-- banner section-->
<img src="/assets/cnt-banner.png" class="w-full" alt="" />

<div class="my-container my-5 md:my-14">

    <!-- Header -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-semibold text-[#008357]">Get in Touch</h2>
        <p class="text-black mt-2 text-sm md:text-md">
            Have question? We'd love to hear from you, send us a message and we’ll <br> respond as soon as possible
        </p>
    </div>
    <div class="grid grid-cols-12 gap-3 md:gap-5">
        <div class="col-span-12 md:col-span-6">
            <h3 class="text-2xl font-semibold mb-6 text-center md:text-start">Send us a message</h3>
            <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <!-- Name -->
                <label class="block font-medium">Your Name</label>
                <input type="text" name="name" placeholder="John Doe"
                    class="w-full mt-2 mb-5 px-4 py-3 border border-[#DBDBDB] rounded-3xl focus:ring focus:ring-green-300">

                <!-- Email -->
                <label class="block font-medium">Email Address</label>
                <input type="email" name="email" placeholder="john@example.com"
                    class="w-full mt-2 mb-5 px-4 py-3 border border-[#DBDBDB] rounded-3xl focus:ring focus:ring-green-300">

                <!-- Message -->
                <label class="block font-medium">Message</label>
                <textarea name="message" rows="5" placeholder="Tell us how we can help you..."
                    class="w-full mt-2 mb-5 px-4 py-3 border  border-[#DBDBDB] rounded-3xl focus:ring focus:ring-green-300"></textarea>
                <button type="submit"
                    class="bg-linear-to-b from-[#008357] to-[#2BCD97] text-white px-4 md:px-8 py-1.5 md:py-3 rounded-full hover:bg-green-700">
                    Send Message
                </button>
            </form>
        </div>
        <div class="col-span-12 md:col-span-6 bg-cover bg-center bg-no-repeat p-2 md:p-5 rounded-2xl">
            <h3 class="text-2xl font-semibold mb-5 text-center md:text-start">Contact Information</h3>
            <p class="mb-6 text-sm md:text-md text-center md:text-start">
                We're here to help! Reach out through any of these channels and our team will get back to you promptly.
            </p>

            <!-- Email Card -->
            <div class="md:flex items-start gap-4 bg-white/30 border border-[#DBDBDB] rounded-xl p-5 shadow-sm mb-3 md:mb-6">
                <img src="/assets/email.png" class="w-10 h-10 mx-auto">
                <div>
                    <h4 class="font-semibold text-md md:text-xl text-center md:text-start">Email Us</h4>
                    <p class="text-gray-600 text-sm md:text-md text-center md:text-start">admin@greeninkcce.com</p>
                    <h4 class="font-semibold text-md md:text-xl text-center md:text-start">Complaints & Feedback:</h4>
                    <p class="text-gray-600 text-sm md:text-md text-center md:text-start">feedback@greeninkcce.com</p>
                </div>
            </div>

            <!-- Call Card -->
            <div class="md:flex items-start gap-4 bg-white/30 border  border-[#DBDBDB] rounded-xl p-5 shadow-sm mb-3 md:mb-6">
                <img src="/assets/phone.png" class="w-10 h-10 mx-auto">
                <div>
                    <h4 class="font-semibold text-md md:text-xl text-center md:text-start">Call Us</h4>
                    <p class="text-gray-600 text-sm md:text-md text-center md:text-start">9500405047 / 8428775012 / 9003303439</p>
                </div>
            </div>

            <!-- Visit Card -->
            <div class="md:flex items-start gap-4 bg-white/30 border border-[#DBDBDB]  rounded-xl p-5 shadow-sm">
                <img src="/assets/location.png" class="w-10 h-10 mx-auto">
                <div>
                    <h4 class="font-semibold text-md md:text-xl text-center md:text-start">Visit Us</h4>
                    <p class="text-gray-600 text-sm md:text-md text-center md:text-start">
                        42/23, Ahuja Towers, 4th Floor, TV Samy Road West, R.S. Puram, Coimbatore - 641002
                    </p>
                </div>
            </div>

        </div>


    </div>


</div>


<!-- looking and answer-->

<section class="my-container">
    <div class="bg-gray-100 rounded-3xl my-10 py-10 bg-center bg-no-repeat lg:mx-28"
        style="background-image:url({{ asset('assets/cbbg.png') }}) ">
        <h2 class="text-lg md:text-4xl text-center font-semibold text-[#008357]">Looking for Answer</h2>
        <p class="text-center text-lg font-normal text-black py-5">Check out our section for quick to common questions.
        </p>
        <div class="flex justify-center">
            <a href="/about" type="button"
                class="text-sm text-center font-semibold text-white bg-linear-to-b from-[#008357] to-[#2BCD97] py-3 px-8 rounded-3xl  transition">
                Learn More About Us
            </a>
        </div>
    </div>

</section>
<x-partials.footer />
<script src="users/js/home.js"></script>
