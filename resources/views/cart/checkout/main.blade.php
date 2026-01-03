  <x-partials.header />
<div class="bg-primary text-white text-5xl font-medium pt-40 pb-20 text-center">
    Checkout

</div>

  <div class="my-container my-10">

    <div class="grid grid-cols-12 gap-3">
        <div class="col-span-12 lg:col-span-8">
            @include('cart.checkout.items')
        </div>
        <div class="col-span-12 lg:col-span-4">
            @include('cart.checkout.summary')

        </div>


    </div>

  </div>




  <script src="{{ asset('users/js/home.js') }}"></script>



  <x-partials.footer />
