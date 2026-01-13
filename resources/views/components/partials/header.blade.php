<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Greenink</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])


<!-- NAVBAR -->
<section class="lg:fixed md:top-0 bg-gray-200/90 shadow-sm z-100">
    <div class="mx-auto px-4 md:px-10 py-1">
        <div class="grid grid-cols-12 gap-1 md:gap-2">
            <!-- Logo -->
            <div class="col-span-8 lg:col-span-2">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('assets/greeninklogo.png') }}" alt="logo" class="w-full">
                </a>
            </div>

            <div class="col-span-4 md:col-span-1 lg:col-span-8 my-auto">
                @include('components.partials.nav')
            </div>

            <div class="col-span-12 md:col-span-3 lg:col-span-2 my-auto">
                <div class="flex gap-1 my-auto justify-end">
                    <a href="tel:+91 84287 75012"
                        class="px-2 py-1 bg-primary border text-white rounded-full hover:bg-green-700 text-sm flex gap-1">
                        <span class="callIcon my-auto"></span><span class="my-auto">+91 84287 75012</span>
                    </a>
                    <a href="/cart" class="rounded-full p-2 bg-[#f2f2f2]">
                        <span class="BagIcon"></span>
                    </a>
                    {{-- <button id="openSignupDesktop"
                        class="px-2 py-1 bg-primary border text-white rounded-full hover:bg-green-700 text-sm">
                        Sign In
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="py-0.5 my-container" style="background: linear-gradient(90deg, #1B4D3E 0%, #3FB390 100%), linear-gradient(90deg, #00BC7D 0%, #096 100%);">
        <marquee
        behavior="scroll"
        direction="left"
        scrollamount="5"
        onmouseover="this.stop();"
        onmouseout="this.start();"
        style="font-family: 'Poppins', sans-serif; font-size:15px; color:#fff;"
        >
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam maiores dolores neque esse accusamus expedita facere cumque id, minus perferendis, dolorum rerum delectus, alias recusandae. Maxime sint totam maiores iusto.
        </marquee>


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
    // closeBtn.addEventListener('click', closePopup);

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
    const UserIcon = `
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
    <path d="M12 10C14.2091 10 16 8.20914 16 6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6C8 8.20914 9.79086 10 12 10Z" stroke="#101010" stroke-width="1.5"/>
    <path d="M20 17.5C20 19.985 20 22 12 22C4 22 4 19.985 4 17.5C4 15.015 7.582 13 12 13C16.418 13 20 15.015 20 17.5Z" stroke="#101010" stroke-width="1.5"/>
    </svg>
    `;

    document.querySelectorAll('.UserIcon').forEach(el => {
        el.innerHTML = UserIcon;
    });
    const BagIcon = `
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
    <path d="M21.7544 15.1727C21.3398 12.8096 20.9252 10.405 20.5106 8.04188C20.3862 7.29563 20.2619 6.50793 20.096 5.76168C19.8473 4.35211 18.7694 3.14982 17.3183 2.90107C16.6136 2.7767 15.8673 2.81816 15.204 2.81816H8.11465C7.11965 2.81816 6.20757 2.85961 5.33695 3.44003C4.59071 3.97898 4.09321 4.72523 3.92738 5.63731C3.30551 9.2027 2.64218 12.7681 2.06176 16.292C1.77156 17.9918 2.5178 19.7331 4.01029 20.6037C4.83946 21.1012 5.75153 21.1841 6.66361 21.1841H16.7794C17.4842 21.1841 18.189 21.2255 18.8523 21.0597C20.5935 20.6451 21.8373 19.0697 21.9616 17.287C22.086 16.6237 21.8787 15.8775 21.7544 15.1727ZM19.7229 19.3185C19.0596 19.8989 18.2304 19.9403 17.4013 19.9403H6.12466C4.67362 19.9403 3.42988 18.9039 3.26405 17.4529C3.18113 16.831 3.34696 16.2091 3.47134 15.6287C3.63717 14.5923 3.84446 13.5558 4.01029 12.5194C4.3005 10.3221 4.798 8.16625 5.17112 5.96897C5.41987 4.72523 6.37341 4.0619 7.61715 4.0619H16.4477C17.6085 4.0619 18.6035 4.64231 18.8937 5.80314C19.0181 6.30064 19.0596 6.79813 19.1425 7.29563C19.5571 9.57583 19.9302 11.8146 20.3448 14.0948C20.635 15.8775 21.3398 17.9918 19.7229 19.3185Z" fill="black"/>
    <path d="M14.7066 6.05184V7.58579C14.6651 8.45641 14.2091 9.32703 13.4214 9.78307C11.8045 10.7781 9.60726 9.78307 9.31705 7.876C9.23413 7.29559 9.27559 6.67371 9.27559 6.0933C9.27559 5.3056 8.03185 5.3056 8.03185 6.0933C8.03185 6.75663 7.99039 7.41996 8.07331 8.04183C8.23914 9.24412 8.98539 10.322 10.0218 10.9439C12.2191 12.1876 15.1212 10.9854 15.7845 8.53933C15.9918 7.75162 15.9089 6.92246 15.9089 6.0933C15.9503 5.22268 14.7066 5.22268 14.7066 6.05184Z" fill="black"/>
    </svg>
    `;

    document.querySelectorAll('.BagIcon').forEach(el => {
        el.innerHTML = BagIcon;
    });
</script>
