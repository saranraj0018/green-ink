<div id="signupModal" class="hidden fixed inset-0 flex items-center justify-center z-[1000]" onclick="closePopup()">
    <!-- Click outside closes -->

    <!-- Popup content wrapper (STOP click bubbling) -->
    <div class="w-4/5" onclick="event.stopPropagation();">

        <div class="grid grid-cols-12 gap-3 bg-white rounded-2xl overflow-hidden">

            <div class="col-span-12 md:col-span-6 bg-cover bg-center bg-no-repeat p-8 space-y-5 flex flex-col justify-center h-[96vh]"
                style="background-image: url('{{ asset('assets/signupBG.png') }}');">

                <h2 class="bg-[#4d7d71] rounded-full py-1 px-2 w-max text-white">
                    Trusted by 10,000+ learners
                </h2>

                <h3 class="text-white text-5xl font-medium">
                    Welcome to <br> Greenink
                </h3>

                <p class="text-white text-sm text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.
                </p>

                <div class="flex bg-white rounded-md p-2 gap-3 w-max mx-auto">
                    <div class="flex gap-2 my-auto"><span class="tickIcon"></span>
                        <p class="text-primary text-sm font-medium">100+ Courses</p>
                    </div>
                    <div class="flex gap-2 my-auto"><span class="tickIcon"></span>
                        <p class="text-primary text-sm font-medium">Expert Mentors</p>
                    </div>
                    <div class="flex gap-2 my-auto"><span class="tickIcon"></span>
                        <p class="text-primary text-sm font-medium">Lifetime Access</p>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 p-3">
                <img src="{{ asset('assets/greeninklogo.png') }}" alt="logo" class="mx-auto w-1/2">
                @include('components.partials.logins.Actions')
                <script src="//unpkg.com/alpinejs" defer></script>
            </div>

        </div>
    </div>

</div>

<!-- Tick Icon Script -->
<script>
    const tick = `
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
        <path d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM8 15L3 10L4.41 8.59L8 12.17L15.59 4.58L17 6L8 15Z" fill="#1B4D3E"/>
    </svg>`;

    const tickElements = document.getElementsByClassName('tickIcon');
    for (let i = 0; i < tickElements.length; i++) {
        tickElements[i].innerHTML = tick;
    }
</script>
