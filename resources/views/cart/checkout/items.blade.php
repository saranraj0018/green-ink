@php
    $address = [
        'Address' => 'No. 24, 2nd Floor, Green Park Avenue,Anna Nagar, Chennai - 600040,Tamil Nadu, India.',
        'state' => 'Tamil Nadu, India',
    ];
@endphp

<div class="bg-white rounded-xl p-5 shadow-sm">

    <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold text-gray-800">Delivery Information</h3>

        <button id="openAddressPopup" class="EditIcon bg-[#F5F5F5] rounded-full p-1 cursor-pointer"></button>
    </div>

    <div class="md:flex gap-4 items-start border-t border-gray-300 p-2 md:p-4 space-y-3">
        <img src="/img/cart/location.png" alt="">

        <div class="flex-1 space-y-1">
            <p class="text-sm font-medium">Delievery To</p>
            <p class="text-sm text-gray-600">
                {{ $address['Address'] }} <br>
                {{ $address['state'] }}
            </p>
        </div>

        <button id="openAddressPopup2" class="text-sm border bg-primary px-2 py-1 text-white rounded-full cursor-pointer">
            Change Address
        </button>
    </div>
</div>


<!-- POPUP OVERLAY -->
<div id="addressPopup"
    class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden
           justify-center items-end md:items-center z-50 h-screen">

    <!-- POPUP CARD -->
    <div id="addressCard"
        class="bg-white w-full md:w-1/2 rounded-t-2xl md:rounded-xl
               transform translate-y-10 opacity-0 transition-all duration-300 p-5">

        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold">Change Delivery Address</h3>
            <button id="closeAddressPopup">✕</button>
        </div>

        <form class="space-y-3">
            <input type="text" class="w-full border border-gray-300 p-2 rounded focus:outline-none"
                placeholder="Flat / House No">
            <input type="text" class="w-full border border-gray-300 p-2 rounded focus:outline-none"
                placeholder="Street / Area">
            <input type="text" class="w-full border border-gray-300 p-2 rounded focus:outline-none"
                placeholder="City">
            <input type="text" class="w-full border border-gray-300 p-2 rounded focus:outline-none"
                placeholder="State">
            <input type="text" class="w-full border border-gray-300 p-2 rounded focus:outline-none"
                placeholder="Pincode">

            <button type="button" class="w-full bg-black text-white py-2 rounded mt-2" id="saveAddress">
                Save Address
            </button>
        </form>
    </div>
</div>

<!-- SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const openBtns = [
            document.getElementById("openAddressPopup"),
            document.getElementById("openAddressPopup2")
        ];

        const popup = document.getElementById("addressPopup");
        const card = document.getElementById("addressCard");
        const closeBtn = document.getElementById("closeAddressPopup");

        openBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                popup.classList.remove("hidden");
                popup.classList.add("flex");

                setTimeout(() => {
                    card.classList.remove("translate-y-10", "opacity-0");
                    card.classList.add("translate-y-0", "opacity-100");
                }, 20);
            });
        });

        // Close on background click
        popup.addEventListener("click", (e) => {
            if (e.target === popup) closePopup();
        });

        closeBtn.addEventListener("click", closePopup);

        function closePopup() {
            card.classList.add("translate-y-10", "opacity-0");
            card.classList.remove("translate-y-0", "opacity-100");

            setTimeout(() => {
                popup.classList.add("hidden");
            }, 300);
        }
    });
</script>


<script>
    const EditIcon = `
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 26 26" fill="none">
  <path d="M4.91814 20.4065H5.04093L8.31163 20.1051C8.7693 20.0604 9.19349 19.8595 9.51721 19.5358L21.8633 7.18973C22.4437 6.60927 22.7674 5.83903 22.7674 5.02415C22.7674 4.20927 22.4437 3.43903 21.8633 2.85857L21.0707 2.06601C19.9098 0.90508 17.8893 0.90508 16.7284 2.06601L15.1544 3.63996L4.39349 14.4009C4.06977 14.7246 3.86884 15.1488 3.83535 15.6065L3.53395 18.8772C3.50047 19.2902 3.64558 19.6921 3.93581 19.9935C4.20372 20.2614 4.54977 20.4065 4.91814 20.4065ZM18.9051 2.83624C19.2623 2.83624 19.6195 2.9702 19.8874 3.24927L20.68 4.04182C20.8104 4.17003 20.914 4.32292 20.9847 4.49157C21.0554 4.66023 21.0918 4.84127 21.0918 5.02415C21.0918 5.20703 21.0554 5.38807 20.9847 5.55673C20.914 5.72538 20.8104 5.87827 20.68 6.00647L19.6977 6.9888L16.9405 4.23159L17.9228 3.24927C18.1907 2.98136 18.5479 2.83624 18.9051 2.83624ZM5.49861 15.7628C5.49861 15.6958 5.53209 15.64 5.57674 15.5953L15.746 5.41485L18.5033 8.17206L8.33395 18.3414C8.33395 18.3414 8.22233 18.4195 8.16651 18.4195L5.2307 18.6874L5.49861 15.7516V15.7628ZM25 23.9674C25 24.4251 24.6205 24.8046 24.1628 24.8046H1.83721C1.37953 24.8046 1 24.4251 1 23.9674C1 23.5097 1.37953 23.1302 1.83721 23.1302H24.1628C24.6205 23.1302 25 23.5097 25 23.9674Z" fill="black"/>
</svg>
`;

    document.querySelectorAll('.EditIcon').forEach(el => {
        el.innerHTML = EditIcon;
    });
</script>
