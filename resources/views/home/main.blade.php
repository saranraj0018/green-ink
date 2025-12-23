  <x-partials.header />

  @include('home.categories')
  @include('home.founder')
  @include('home.courses',['courses' => $course])
  <div class="my-container my-10 py-44 bg-cover bg-center bg-no-repeat space-y-4"
      style="background-image: url('{{ asset('assets/inspiringBg.png') }}');">
      <h2 class="text-white text-5xl text-center font-semibold">
          Guiding Students with Clarity & Purpose!
      </h2>
      <p class="text-lg text-center text-white">
          We focus on structured, personalised coaching, not rushed learning. Students choose exams that match<br> their strengths, supported by consistent practice, smart preparation and dedicated mentoring.
      </p>
  </div>

  @include('home.ambassador')
  @include('home.journey')

  <script src="{{ asset('users/js/home.js') }}"></script>



  <x-partials.footer />
