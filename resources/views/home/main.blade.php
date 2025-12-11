  <x-partials.header />

  @include('home.categories')
  @include('home.founder')
  @include('home.courses')
  <div class="my-container my-10 py-44 bg-cover bg-center bg-no-repeat space-y-4"
      style="background-image: url('{{ asset('assets/inspiringBg.png') }}');">
      <h2 class="text-white text-5xl text-center font-semibold">
          Inspiring Minds. Building Futures.
      </h2>
      <p class="text-lg text-center text-white">
          Her commitment to student growth and quality education forms the backbone of Greenink Academy.<br> This video
          shares her journey, values, and the mission that drives our academy forward.
      </p>
  </div>

  @include('home.ambassador')
  @include('home.journey')

  <script src="{{ asset('users/js/home.js') }}"></script>



  <x-partials.footer />
