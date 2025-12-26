  <x-partials.header />

  @include('home.categories')
  @include('home.founder')
  @include('home.courses', ['courses' => $course])

  <div class="my-container my-10 py-24 bg-cover bg-top bg-no-repeat space-y-4"
      style="background-image: url('{{ asset('assets/inspiringBg.png') }}');">
      <div class="grid grid-cols-12 gap-3">
          <div class="col-span-12 md:col-span-6 my-auto">
              <h2 class="text-white text-4xl font-semibold">
                  Awarded “Best Coaching Institute for Research & Innovation”
              </h2>
              <p class="text-lg text-white my-5">
                  for redefining exam preparation through technology, data, and mentorship.
              </p>
              <p class="text-white text-lg">
                  This award recognizes GreenInk's continuous research on
              </p>
              <ul class="text-white list-disc text-sm">
                  <li>
                      how students fail,
                  </li>
                  <li>
                      how toppers practiceand
                  </li>
                  <li>
                      how technology can guide daily preparation.
                  </li>
              </ul>
          </div>
          <div class="col-span-12 md:col-span-6 my-auto">
              <img src="/assets/founder.png" alt="Founder Image" />
          </div>
      </div>
  </div>

  @include('home.ambassador')
  @include('home.journey')

  <script src="{{ asset('users/js/home.js') }}"></script>



  <x-partials.footer />
