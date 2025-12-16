<section class="my-10">
    <h2 class="text-center text-3xl font-medium">
        Why Work With Greenink?
    </h2>
    <div class="my-container bg-cover bg-no-repeat my-10 bg-center py-10"
        style="background-image:url({{ asset('assets/careers/keypointBg.png') }});">
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 md:col-span-3">
                <div class="bg-white/40 border border-gray-300 p-5" style="border-radius:0 30px 0 30px;">
                    <div class="flex gap-2">
                        <span class="Innovation p-3 bg-[#AD7800] rounded-full"></span>
                        <div class="text-lg font-medium my-auto">Innovation First</div>
                    </div>
                    <p class="text-sm mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris .
                    </p>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3">
                <div class="bg-white/40 border border-gray-300 p-5" style="border-radius:0 30px 0 30px;">
                    <div class="flex gap-2">
                        <span class="Collaborative p-3 bg-[#AD7800] rounded-full"></span>
                        <div class="text-lg font-medium my-auto">Collaborative Culture</div>
                    </div>
                    <p class="text-sm mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris .
                    </p>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3">
                <div class="bg-white/40 border border-gray-300 p-5" style="border-radius:0 30px 0 30px;">
                    <div class="flex gap-2">
                        <span class="Growth p-3 bg-[#AD7800] rounded-full"></span>
                        <div class="text-lg font-medium my-auto">Continues Growth </div>
                    </div>
                    <p class="text-sm mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris .
                    </p>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3">
                <div class="bg-white/40 border border-gray-300 p-5" style="border-radius:0 30px 0 30px;">
                    <div class="flex gap-2">
                        <span class="Balance p-3 bg-[#AD7800] rounded-full"></span>
                        <div class="text-lg font-medium my-auto">Work Life Balance</div>
                    </div>
                    <p class="text-sm mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris .
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const Innovation = `
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
            <path d="M5.78589 15.75C4.94176 14.3676 4.4967 12.7786 4.50002 11.1589C4.50002 6.23812 8.52977 2.25 13.5 2.25C18.4703 2.25 22.5 6.23812 22.5 11.1589C22.5033 12.7786 22.0583 14.3676 21.2141 15.75" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M16.8754 21.375L16.7292 22.1029C16.5717 22.8982 16.4918 23.2954 16.3129 23.6104C16.0373 24.0959 15.591 24.4616 15.0608 24.6364C14.7177 24.75 14.3104 24.75 13.5004 24.75C12.6904 24.75 12.2832 24.75 11.94 24.6375C11.4096 24.4624 10.9633 24.0963 10.6879 23.6104C10.509 23.2954 10.4292 22.8982 10.2717 22.1029L10.1254 21.375M8.30629 19.2352C8.20279 18.9247 8.15104 18.7684 8.15666 18.6424C8.16303 18.5121 8.207 18.3864 8.28327 18.2806C8.35954 18.1748 8.46483 18.0934 8.58641 18.0461C8.70341 18 8.86766 18 9.19391 18H17.8069C18.1343 18 18.2974 18 18.4144 18.045C18.5362 18.0923 18.6416 18.1739 18.7179 18.28C18.7941 18.386 18.838 18.5119 18.8442 18.6424C18.8498 18.7684 18.798 18.9236 18.6945 19.2352C18.5033 19.8101 18.4077 20.0981 18.2603 20.331C17.952 20.8177 17.4689 21.1676 16.9103 21.3086C16.6425 21.375 16.341 21.375 15.7369 21.375H11.2639C10.6598 21.375 10.3572 21.375 10.0905 21.3075C9.53216 21.1667 9.049 20.8173 8.74054 20.331C8.59316 20.0981 8.49754 19.8101 8.30629 19.2352Z" stroke="white" stroke-width="1.5"/>
            <path d="M9.28125 10.9688L11.8125 13.5V18M17.7188 10.9688L15.1875 13.5V18M9.28125 11.8125C9.50503 11.8125 9.71964 11.7236 9.87787 11.5654C10.0361 11.4071 10.125 11.1925 10.125 10.9688C10.125 10.745 10.0361 10.5304 9.87787 10.3721C9.71964 10.2139 9.50503 10.125 9.28125 10.125C9.05747 10.125 8.84286 10.2139 8.68463 10.3721C8.52639 10.5304 8.4375 10.745 8.4375 10.9688C8.4375 11.1925 8.52639 11.4071 8.68463 11.5654C8.84286 11.7236 9.05747 11.8125 9.28125 11.8125ZM17.7188 11.8125C17.495 11.8125 17.2804 11.7236 17.1221 11.5654C16.9639 11.4071 16.875 11.1925 16.875 10.9688C16.875 10.745 16.9639 10.5304 17.1221 10.3721C17.2804 10.2139 17.495 10.125 17.7188 10.125C17.9425 10.125 18.1571 10.2139 18.3154 10.3721C18.4736 10.5304 18.5625 10.745 18.5625 10.9688C18.5625 11.1925 18.4736 11.4071 18.3154 11.5654C18.1571 11.7236 17.9425 11.8125 17.7188 11.8125Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `;
        const Collaborative = `
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.74935 3.79165C9.74935 4.50994 9.46401 5.19882 8.9561 5.70673C8.44818 6.21464 7.75931 6.49998 7.04102 6.49998C6.32272 6.49998 5.63385 6.21464 5.12593 5.70673C4.61802 5.19882 4.33268 4.50994 4.33268 3.79165C4.33268 3.07335 4.61802 2.38448 5.12593 1.87657C5.63385 1.36865 6.32272 1.08331 7.04102 1.08331C7.75931 1.08331 8.44818 1.36865 8.9561 1.87657C9.46401 2.38448 9.74935 3.07335 9.74935 3.79165ZM18.9577 20.0416C19.676 20.0416 20.3649 19.7563 20.8728 19.2484C21.3807 18.7405 21.666 18.0516 21.666 17.3333C21.666 16.615 21.3807 15.9261 20.8728 15.4182C20.3649 14.9103 19.676 14.625 18.9577 14.625C18.2394 14.625 17.5505 14.9103 17.0426 15.4182C16.5347 15.9261 16.2493 16.615 16.2493 17.3333C16.2493 18.0516 16.5347 18.7405 17.0426 19.2484C17.5505 19.7563 18.2394 20.0416 18.9577 20.0416ZM14.0827 24.9166V22.75C14.0827 22.75 15.7077 21.125 18.9577 21.125C22.2077 21.125 23.8327 22.75 23.8327 22.75V24.9166H14.0827ZM2.16602 11.375V9.20831C2.16602 9.20831 3.79102 7.58331 7.04102 7.58331C10.291 7.58331 11.916 9.20831 11.916 9.20831V11.375H2.16602ZM19.4993 5.41665H14.6243V3.24998H21.666V10.2916H19.4993V5.41665ZM4.33268 15.7083V22.75H11.3743V20.5833H6.49935V15.7083H4.33268Z" fill="white"/>
        </svg>
    `;
        const Growth = `
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
  <path d="M25.5729 7.72333C25.4545 7.43826 25.228 7.21172 24.9429 7.09333C24.8027 7.03355 24.6521 7.00184 24.4996 7H18.6663C18.3568 7 18.0601 7.12292 17.8413 7.34171C17.6225 7.5605 17.4996 7.85725 17.4996 8.16667C17.4996 8.47609 17.6225 8.77283 17.8413 8.99162C18.0601 9.21042 18.3568 9.33333 18.6663 9.33333H21.6879L15.1663 15.855L11.3279 12.005C11.2195 11.8956 11.0904 11.8089 10.9483 11.7496C10.8061 11.6904 10.6536 11.6599 10.4996 11.6599C10.3456 11.6599 10.1931 11.6904 10.0509 11.7496C9.90876 11.8089 9.77973 11.8956 9.67127 12.005L2.67127 19.005C2.56192 19.1135 2.47513 19.2425 2.4159 19.3847C2.35667 19.5268 2.32617 19.6793 2.32617 19.8333C2.32617 19.9873 2.35667 20.1398 2.4159 20.282C2.47513 20.4242 2.56192 20.5532 2.67127 20.6617C2.77973 20.771 2.90876 20.8578 3.05093 20.917C3.1931 20.9763 3.34559 21.0068 3.4996 21.0068C3.65362 21.0068 3.80611 20.9763 3.94828 20.917C4.09045 20.8578 4.21948 20.771 4.32794 20.6617L10.4996 14.4783L14.3379 18.3283C14.4464 18.4377 14.5754 18.5245 14.7176 18.5837C14.8598 18.6429 15.0123 18.6734 15.1663 18.6734C15.3203 18.6734 15.4728 18.6429 15.6149 18.5837C15.7571 18.5245 15.8861 18.4377 15.9946 18.3283L23.3329 10.9783V14C23.3329 14.3094 23.4559 14.6062 23.6746 14.825C23.8934 15.0437 24.1902 15.1667 24.4996 15.1667C24.809 15.1667 25.1058 15.0437 25.3246 14.825C25.5434 14.6062 25.6663 14.3094 25.6663 14V8.16667C25.6644 8.01421 25.6327 7.86359 25.5729 7.72333Z" fill="white"/>
</svg>
    `;
        const Balance = `
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
  <path d="M6.5 24.375H1.625V19.5H6.5V24.375ZM3.25 22.75H4.875V21.125H3.25V22.75ZM15.4375 24.375H10.5625V19.5H15.4375V24.375ZM12.1875 22.75H13.8125V21.125H12.1875V22.75ZM24.375 24.375H19.5V19.5H24.375V24.375ZM21.125 22.75H22.75V21.125H21.125V22.75ZM13 8.125C12.3572 8.125 11.7289 7.93439 11.1944 7.57728C10.6599 7.22016 10.2434 6.71258 9.99739 6.11872C9.75141 5.52486 9.68705 4.8714 9.81245 4.24096C9.93785 3.61052 10.2474 3.03142 10.7019 2.5769C11.1564 2.12238 11.7355 1.81285 12.366 1.68745C12.9964 1.56205 13.6499 1.62641 14.2437 1.87239C14.8376 2.11838 15.3452 2.53494 15.7023 3.0694C16.0594 3.60386 16.25 4.23221 16.25 4.875C16.2489 5.73663 15.9062 6.56265 15.2969 7.17191C14.6876 7.78117 13.8616 8.12393 13 8.125ZM13 3.25C12.6786 3.25 12.3644 3.34531 12.0972 3.52386C11.83 3.70242 11.6217 3.95621 11.4987 4.25314C11.3757 4.55007 11.3435 4.8768 11.4062 5.19202C11.4689 5.50724 11.6237 5.79679 11.851 6.02405C12.0782 6.25131 12.3678 6.40608 12.683 6.46878C12.9982 6.53148 13.3249 6.4993 13.6219 6.37631C13.9188 6.25331 14.1726 6.04503 14.3511 5.7778C14.5297 5.51057 14.625 5.1964 14.625 4.875C14.625 4.44402 14.4538 4.0307 14.149 3.72595C13.8443 3.42121 13.431 3.25 13 3.25ZM21.125 13H17.0625C16.2009 12.9989 15.3749 12.6562 14.7656 12.0469C14.1563 11.4377 13.8136 10.6116 13.8125 9.75H12.1875C12.1864 10.6116 11.8437 11.4377 11.2344 12.0469C10.6251 12.6562 9.79912 12.9989 8.9375 13H4.875C4.44402 13 4.0307 13.1712 3.72595 13.476C3.4212 13.7807 3.25 14.194 3.25 14.625V17.875H4.875V14.625H8.9375C10.1384 14.6246 11.2964 14.1788 12.1875 13.3738V17.875H13.8125V13.3738C14.7036 14.1788 15.8616 14.6246 17.0625 14.625H21.125V17.875H22.75V14.625C22.75 14.194 22.5788 13.7807 22.274 13.476C21.9693 13.1712 21.556 13 21.125 13Z" fill="white"/>
</svg>
    `;

        const InnovationElements = document.getElementsByClassName('Innovation');

        for (let i = 0; i < InnovationElements.length; i++) {
            InnovationElements[i].innerHTML = Innovation;
        }
        const CollaborativeElements = document.getElementsByClassName('Collaborative');

        for (let i = 0; i < CollaborativeElements.length; i++) {
            CollaborativeElements[i].innerHTML = Collaborative;
        }
        const GrowthElements = document.getElementsByClassName('Growth');

        for (let i = 0; i < GrowthElements.length; i++) {
            GrowthElements[i].innerHTML = Growth;[]
        }
        const BalanceElements = document.getElementsByClassName('Balance');

        for (let i = 0; i < BalanceElements.length; i++) {
            BalanceElements[i].innerHTML = Balance;
        }

    });
</script>
