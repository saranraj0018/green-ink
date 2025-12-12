<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Greenink</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
@vite(['resources/css/app.css', 'resources/js/app.js'])


<!-- NAVBAR -->
<section class="md:fixed md:top-0 bg-gray-200/90 shadow-sm z-100">
    <div class="mx-auto px-4 md:px-10 py-1">
        <div class="grid grid-cols-12 gap-1 md:gap-2">

            <!-- Logo -->
            <div class="col-span-8 lg:col-span-3">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('assets/greeninklogo.png') }}" alt="logo" class="w-full md:w-4/5">
                </a>
            </div>

            <div class="col-span-4 lg:col-span-7 my-auto">
                @include('components.partials.nav')
            </div>

            <div class="col-span-12 lg:col-span-2 my-auto">
                <div class="flex gap-1 my-auto justify-end">
                    <button
                        class="px-2 py-1 bg-primary border text-white rounded-full hover:bg-green-700 text-sm flex gap-1">
                        <span class="callIcon my-auto"></span> +91 8110967668
                    </button>
                    <button id="openSignupDesktop"
                        class="px-2 py-1 bg-primary border text-white rounded-full hover:bg-green-700 text-sm">
                        Sign In
                    </button>
                </div>
            </div>

        </div>


    </div>
</section>

<!-- ★★★★★ POPUP SECTION ★★★★★ -->
<div id="signupOverlay" class="hidden fixed inset-0 bg-black/50 z-1000"></div>
@include('components.partials.logins.main')
<!-- ★★★★★ END POPUP SECTION ★★★★★ -->


<!-- ★★★★★ POPUP SCRIPT ★★★★★ -->
<script>
    const openMobileBtn = document.getElementById('openSignup'); // Optional mobile button
    const openDesktopBtn = document.getElementById('openSignupDesktop');

    const modal = document.getElementById('signupModal');
    const overlay = document.getElementById('signupOverlay');
    const closeBtn = document.getElementById('closeSignup');

    function openPopup() {
        modal.classList.remove('hidden');
        overlay.classList.remove('hidden');
    }

    function closePopup() {
        modal.classList.add('hidden');
        overlay.classList.add('hidden');
    }

    // Open popup
    if (openMobileBtn) openMobileBtn.addEventListener('click', openPopup);
    if (openDesktopBtn) openDesktopBtn.addEventListener('click', openPopup);

    // Close button
    closeBtn.addEventListener('click', closePopup);

    // Click outside modal to close
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closePopup();
        }
    });
</script>
<!-- ★★★★★ END POPUP SCRIPT ★★★★★ -->

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const callIcon = `

    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 16 16" fill="none">
    <path d="M14.93 16C13.2447 16 11.5167 15.578 9.746 14.734C7.97533 13.89 6.32733 12.705 4.802 11.179C3.28867 9.65367 2.11 8.00867 1.266 6.244C0.422 4.47933 0 2.75467 0 1.07C0 0.77 0.1 0.516667 0.3 0.31C0.5 0.103333 0.75 0 1.05 0H3.523C3.795 0 4.03233 0.0856666 4.235 0.257C4.43767 0.428333 4.57467 0.648 4.646 0.916L5.142 3.3C5.18867 3.58 5.18033 3.82433 5.117 4.033C5.05367 4.24167 4.94267 4.41267 4.784 4.546L2.59 6.592C3.00067 7.33667 3.45433 8.02867 3.951 8.668C4.44767 9.30733 4.97767 9.913 5.541 10.485C6.121 11.065 6.74567 11.605 7.415 12.105C8.08433 12.6043 8.819 13.0757 9.619 13.519L11.758 11.342C11.9207 11.1667 12.1037 11.051 12.307 10.995C12.5097 10.9397 12.7343 10.9287 12.981 10.962L15.084 11.392C15.356 11.4587 15.5767 11.5957 15.746 11.803C15.9153 12.0103 16 12.2477 16 12.515V14.95C16 15.25 15.8967 15.5 15.69 15.7C15.4833 15.9 15.23 16 14.93 16Z" fill="white"/>
    </svg>

    `;

        const tickElements = document.getElementsByClassName('callIcon');

        for (let i = 0; i < tickElements.length; i++) {
            tickElements[i].innerHTML = callIcon;
        }

    });
</script>
