<x-partials.header/>
@section('content')
<!-- banner section-->
<img src="./assets/homebanner.png" class="" alt=""/>

<div class="max-w-6xl mx-auto px-6 py-14 ">

    <!-- Header -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-semibold text-green-600">Get in Touch</h2>
        <p class="text-gray-600 mt-2">
            Have question? We'd love to hear from you, send us a message and we’ll respond as soon as possible
        </p>
    </div>

        <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

        <!-- Left: Form -->
        <div>

            <h3 class="text-xl font-semibold mb-6">Send us a message</h3>

            <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <!-- Name -->
                <label class="block font-medium">Your Name</label>
                <input type="text" name="name" placeholder="John Doe"
                    class="w-full mt-2 mb-5 px-4 py-3 border rounded-3xl focus:ring focus:ring-green-300">

                <!-- Email -->
                <label class="block font-medium">Email Address</label>
                <input type="email" name="email" placeholder="john@example.com"
                    class="w-full mt-2 mb-5 px-4 py-3 border rounded-3xl focus:ring focus:ring-green-300">

                <!-- Message -->
                <label class="block font-medium">Message</label>
                <textarea name="message" rows="5" placeholder="Tell us how we can help you..."
                    class="w-full mt-2 mb-5 px-4 py-3 border rounded-3xl focus:ring focus:ring-green-300"></textarea>

                <!-- Button -->
                 <div class="flex justify-center">
                <button type="submit"
                    class="bg-green-600 text-white px-8 py-3 rounded-full hover:bg-green-700 ">
                    Send Message
                </button>
                </div>
            </form>

        </div>

                <!-- Right: Contact Info -->
        <div>

            <h3 class="text-xl font-semibold mb-6">Contact Information</h3>
            <p class="text-gray-600 mb-6">
                We’re here to help! Reach out through any of these channels and our team will get back to you promptly.
            </p>

            <!-- Email Card -->
            <div class="flex items-start gap-4 bg-white border rounded-xl p-5 shadow-sm mb-6">
                <img src="/icons/email.png" class="w-10 h-10">
                <div>
                    <h4 class="font-semibold">Email Us</h4>
                    <p class="text-gray-600">Support@greenlinkacademy.com</p>
                </div>
            </div>

            <!-- Call Card -->
            <div class="flex items-start gap-4 bg-white border rounded-xl p-5 shadow-sm mb-6">
                <img src="/icons/phone.png" class="w-10 h-10">
                <div>
                    <h4 class="font-semibold">Call Us</h4>
                    <p class="text-gray-600">+1 (555) 123-4567</p>
                </div>
            </div>

            <!-- Visit Card -->
            <div class="flex items-start gap-4 bg-white border rounded-xl p-5 shadow-sm">
                <img src="/icons/location.png" class="w-10 h-10">
                <div>
                    <h4 class="font-semibold">Visit Us</h4>
                    <p class="text-gray-600">123 Learning Street, Education City, EC 1235</p>
                </div>
            </div>

        </div>
    </div>
</div>
    </div>


<!-- looking and answer-->

<section class="py-5 max-w-5xl mx-auto">
   <h2 class="text-5xl text-center font-semibold text-green-800">Looking for Answer</h2>
   <p class="text-center text-lg font-normal text-black py-5">Check out our section for quick to common questions.</p>
  <div class="flex justify-center">
    <button type="button"
        class="text-sm text-center font-semibold text-white bg-green-700 py-3 px-8 rounded-3xl hover:bg-green-800 transition">
        Learn More About Us
    </button>
</div>

</section>

   <x-partials.footer/>
  <script src="users/js/home.js"></script>