  <x-partials.header />
  <section class="mt-5 md:mt-44 lg:mt-34">
      <div class="my-container">
          <div class="rounded-2xl bg-cover py-10 md:py-20 bg-center bg-no-repeat px-6 md:px-20"
              style="background-image: url('{{ asset('assets/all-courses/all-courses-bg.png') }}')">
              <h2 class="text-white text-2xl font-medium">
                  Courses
              </h2>
              <p class="text-white text-lg">
                  Continue your learning journey
              </p>
          </div>
      </div>
  </section>
  <section class="my-10 my-container space-y-3">
      <h2 class="text-2xl text-center font-medium">
          Explore Our Categories
      </h2>
      <p class="text-md text-center">
          Continue your learning journey
      </p>

      <div class="grid grid-cols-12 gap-3">
          <div class="col-span-12 md:col-span-8 space-y-4">
              <div class="w-max py-0.5 px-2 rounded-full bg-[#DCF5E1] text-primary-light text-sm font-medium">
                  {{ $course->get_category->name ?? '' }}
              </div>
              <h3 class="font-medium text-2xl">
                  {{ $course->title ?? '' }}
              </h3>
              <p class="text-md">
                  {{ $course->description ?? '' }}
              </p>
              <div class="shadow-md border border-gray-200 p-4 rounded-3xl space-y-3">
                  <h3 class="font-medium text-xl text-primary-light">
                      Course Overview
                  </h3>
                  <p class="text-sm">
                      {{ $course->course_overview ?? '' }}
                  </p>

              </div>
              @php
                  $outcomes = explode("\n", $course->learning_outcomes);
              @endphp

              <div class="shadow-md border border-gray-200 p-4 rounded-3xl space-y-3">
                  <h3 class="font-medium text-xl text-primary-light">
                      What you'll Learn
                  </h3>

                  <ul class="space-y-2 text-sm">
                      @foreach ($outcomes as $outcome)
                          @if (trim($outcome) != '')
                              <li>
                                  <div class="flex gap-2">
                                      <span class="tick my-auto"></span>{{ $outcome }}
                                  </div>
                              </li>
                          @endif
                      @endforeach
                  </ul>
              </div>

          </div>

          {{-- <div class="col-span-12 md:col-span-4">
              <div class="shadow-md border border-gray-200 p-4 rounded-3xl space-y-3">
                  <img src={{ asset('assets/all-courses/video-thumb.png') }} alt="" class="w-full">
                  <p class="font-medium text-xl text-primary-light">
                      $ {{ $course->amount ?? '' }}
                  </p>
                  <div class="mx-8 space-y-3">
                      <button class="bg-[#FFB100] px-2 py-1 rounded-full text-white w-full">
                          Enroll Now
                      </button>
                      <button class="bg-white px-2 py-1 rounded-full text-[#FFB100] w-full border border-[#FFB100]">
                          Add to Wishlist
                      </button>
                  </div>
                  <p class="text-md font-medium">
                      This course include :
                  </p>
                  <ul class="space-y-2 text-sm">
                      <li>
                          <div class="flex gap-2">
                              <span class="play my-auto"></span> {{ $course->hours ?? '' }} hrs on-demand video
                          </div>
                      </li>
                      <li>
                          <div class="flex gap-2">
                              <span class="doc my-auto"></span>Downloadable resources
                          </div>
                      </li>
                      <li>
                          <div class="flex gap-2">
                              <span class="certificate my-auto"></span>Certificate of completion
                          </div>
                      </li>
                  </ul>
              </div>
          </div> --}}
          <div class="col-span-12 md:col-span-4">
              <div class="shadow-md border border-gray-200 p-4 rounded-3xl space-y-3">

                  <!-- Video Player -->
                  @if (!empty($course_videos->file_path))
                      <video controls class="w-full rounded-xl">
                          <source src="{{ asset('storage/' . $course_videos->file_path) }}" type="video/mp4">
                          Your browser does not support the video tag.
                      </video>
                  @else
                      <img src="{{ asset('assets/all-courses/video-thumb.png') }}" alt="" class="w-full">
                  @endif

                  <!-- Course Price -->
                  <p class="font-medium text-xl text-primary-light">
                      $ {{ $course->amount ?? '' }}
                  </p>

                  <!-- Buttons -->
                  <div class="mx-8 space-y-3" x-data="{
    userSignedIn: {{ auth()->check() ? 'true' : 'false' }},
    courseType: '{{ $course->type }}',
    enroll() {
        if (!this.userSignedIn) {
            // If user is not signed in
            window.location.href = '{{ route('admin.login') }}';
            return;
        }

        if (this.courseType === 'paid') {
            // Trigger payment gateway
            this.pay();
        } else {
            // Free course enrollment
            this.enrollFree();
        }
    },
    pay() {
        // Call your payment gateway JS integration here
        console.log('Redirecting to payment gateway...');
        // Example: window.location.href = '/pay/{{ $course->id }}';
    },
    enrollFree() {
        // Make AJAX request to enroll user
        fetch('{{ route("enroll.free") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ course_id: '{{ $course->id }}' })
        }).then(res => res.json())
          .then(data => {
              if (data.success) alert('Enrolled successfully!');
          });
    }
}">
    <button @click="enroll()" class="bg-[#FFB100] px-2 py-1 rounded-full text-white w-full">
        Enroll Now
    </button>
    <button class="bg-white px-2 py-1 rounded-full text-[#FFB100] w-full border border-[#FFB100]">
        Add to Wishlist
    </button>
</div>


                  <!-- Course Details -->
                  <p class="text-md font-medium">
                      This course includes:
                  </p>
                  <ul class="space-y-2 text-sm">
                      <li>
                          <div class="flex gap-2">
                              <span class="play my-auto"></span> {{ $course->hours ?? '' }} hrs on-demand video
                          </div>
                      </li>
                      <li>
                          <div class="flex gap-2">
                              <span class="doc my-auto"></span>Downloadable resources
                          </div>
                      </li>
                      <li>
                          <div class="flex gap-2">
                              <span class="certificate my-auto"></span>Certificate of completion
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </section>
  <x-partials.footer />

  <script>
      document.addEventListener("DOMContentLoaded", () => {
          const tick = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M1.75 9.75L4.25 12.25M7.75 8.25L10.25 5.75M5.75 9.75L8.25 12.25L14.25 5.75" stroke="#FFB100" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `;

          const tickElements = document.getElementsByClassName('tick');

          for (let i = 0; i < tickElements.length; i++) {
              tickElements[i].innerHTML = tick;
          }
          const play = `
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 13.125C8.23869 13.125 8.97014 12.9795 9.65259 12.6968C10.3351 12.4141 10.9551 11.9998 11.4775 11.4775C11.9998 10.9551 12.4141 10.3351 12.6968 9.65259C12.9795 8.97014 13.125 8.23869 13.125 7.5C13.125 6.76131 12.9795 6.02986 12.6968 5.34741C12.4141 4.66495 11.9998 4.04485 11.4775 3.52252C10.9551 3.00019 10.3351 2.58586 9.65259 2.30318C8.97014 2.02049 8.23869 1.875 7.5 1.875C6.00816 1.875 4.57742 2.46763 3.52252 3.52252C2.46763 4.57742 1.875 6.00816 1.875 7.5C1.875 8.99184 2.46763 10.4226 3.52252 11.4775C4.57742 12.5324 6.00816 13.125 7.5 13.125ZM6.73938 4.99375L10.2669 6.95375C10.3643 7.00789 10.4454 7.08709 10.5019 7.18313C10.5584 7.27918 10.5882 7.38858 10.5882 7.5C10.5882 7.61142 10.5584 7.72082 10.5019 7.81687C10.4454 7.91291 10.3643 7.99211 10.2669 8.04625L6.73938 10.0063C6.62516 10.0697 6.49633 10.1023 6.36566 10.1007C6.235 10.099 6.10702 10.0633 5.99442 9.99698C5.88181 9.93066 5.78849 9.83608 5.72369 9.7226C5.6589 9.60912 5.62488 9.48068 5.625 9.35V5.65C5.62488 5.51932 5.6589 5.39088 5.72369 5.2774C5.78849 5.16392 5.88181 5.06934 5.99442 5.00302C6.10702 4.93671 6.235 4.90097 6.36566 4.89935C6.49633 4.89772 6.62516 4.93026 6.73938 4.99375Z" fill="#008357"/>
        </svg>
    `;

          const tickElements2 = document.getElementsByClassName('play');

          for (let i = 0; i < tickElements2.length; i++) {
              tickElements2[i].innerHTML = play;
          }

          const doc = `
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
        <path d="M12.0469 4.35938L8.76563 1.07812C8.67188 0.984375 8.57812 0.9375 8.4375 0.9375H3.75C3.23438 0.9375 2.8125 1.35938 2.8125 1.875V13.125C2.8125 13.6406 3.23438 14.0625 3.75 14.0625H11.25C11.7656 14.0625 12.1875 13.6406 12.1875 13.125V4.6875C12.1875 4.54688 12.1406 4.45312 12.0469 4.35938ZM8.4375 2.0625L11.0625 4.6875H8.4375V2.0625ZM11.25 13.125H3.75V1.875H7.5V4.6875C7.5 5.20312 7.92188 5.625 8.4375 5.625H11.25V13.125Z" fill="#008357"/>
        <path d="M4.6875 10.3125H10.3125V11.25H4.6875V10.3125ZM4.6875 7.5H10.3125V8.4375H4.6875V7.5Z" fill="#008357"/>
        </svg>
    `;

          const tickElements3 = document.getElementsByClassName('doc');

          for (let i = 0; i < tickElements3.length; i++) {
              tickElements3[i].innerHTML = doc;
          }
          const certificate = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M9.99923 14.6666L9.81456 14.944C9.86476 14.9774 9.92307 14.9965 9.9833 14.9994C10.0435 15.0023 10.1034 14.9888 10.1566 14.9603C10.2097 14.9319 10.2542 14.8895 10.2852 14.8378C10.3161 14.7861 10.3325 14.7269 10.3326 14.6666H9.99923ZM7.99923 13.3333L8.18389 13.056C8.12919 13.0196 8.06494 13.0001 7.99923 13.0001C7.93351 13.0001 7.86927 13.0196 7.81456 13.056L7.99923 13.3333ZM5.99923 14.6666H5.66589C5.66593 14.7269 5.68231 14.7861 5.7133 14.8378C5.7443 14.8895 5.78874 14.9319 5.84189 14.9603C5.89505 14.9888 5.95493 15.0023 6.01516 14.9994C6.07538 14.9965 6.1337 14.9774 6.18389 14.944L5.99923 14.6666ZM10.1839 14.3893L8.18389 13.056L7.81456 13.6106L9.81456 14.944L10.1839 14.3893ZM7.81456 13.056L5.81456 14.3893L6.18389 14.944L8.18389 13.6106L7.81456 13.056ZM8.76123 2.07596L8.78923 2.10929L9.29656 1.67729L9.26856 1.64396L8.76123 2.07596ZM10.1919 2.69063L10.2352 2.68663L10.1819 2.02263L10.1386 2.02596L10.1919 2.69063ZM11.3119 3.76396L11.3092 3.80729L11.9732 3.86063L11.9766 3.81729L11.3119 3.76396ZM11.8899 5.20996L11.9232 5.23863L12.3552 4.73063L12.3219 4.70263L11.8899 5.20996ZM11.9232 6.76196L11.8899 6.78996L12.3219 7.29729L12.3552 7.26929L11.9232 6.76196ZM11.3092 8.19263L11.3126 8.23596L11.9766 8.18263L11.9732 8.13929L11.3092 8.19263ZM10.2359 9.31263L10.1919 9.30929L10.1386 9.97396L10.1819 9.97729L10.2359 9.31263ZM8.78923 9.89063L8.76056 9.92396L9.26856 10.356L9.29656 10.3226L8.78923 9.89063ZM7.23789 9.92396L7.20923 9.89063L6.70189 10.3226L6.72989 10.356L7.23789 9.92396ZM5.80656 9.30996L5.76323 9.3133L5.81656 9.97729L5.85989 9.97396L5.80656 9.30996ZM4.68656 8.23663L4.68989 8.19263L4.02523 8.13929L4.02189 8.18263L4.68656 8.23663ZM4.10856 6.78996L4.07523 6.76129L3.64323 7.26929L3.67656 7.29729L4.10856 6.78996ZM4.07523 5.23863L4.10856 5.20996L3.67656 4.70263L3.64323 4.73063L4.07523 5.23863ZM4.68989 3.80729L4.68589 3.76396L4.02189 3.81729L4.02523 3.86063L4.68989 3.80729ZM5.76323 2.68729L5.80656 2.69063L5.85989 2.02596L5.81656 2.02263L5.76323 2.68729ZM7.20989 2.10929L7.23723 2.07596L6.72989 1.64396L6.70189 1.67729L7.20989 2.10929ZM5.80656 2.69063C6.0698 2.71184 6.33432 2.6702 6.5783 2.56913C6.82229 2.46805 7.03877 2.31045 7.20989 2.10929L6.70189 1.67729C6.59921 1.79796 6.46931 1.8925 6.32292 1.95312C6.17653 2.01374 6.01783 2.03871 5.85989 2.02596L5.80656 2.69063ZM4.68589 3.76396C4.67424 3.61964 4.69474 3.47451 4.74467 3.33861C4.7946 3.2027 4.87346 3.07926 4.97577 2.97681C5.07809 2.87437 5.20144 2.79537 5.33728 2.74526C5.47312 2.69516 5.61823 2.67515 5.76256 2.68663L5.81656 2.02263C5.57598 2.00332 5.33341 2.03649 5.1069 2.11985C4.8804 2.20321 4.67471 2.33478 4.50404 2.50544C4.33338 2.6761 4.20181 2.8818 4.11845 3.1083C4.03509 3.33481 4.00258 3.57671 4.02189 3.81729L4.68589 3.76396ZM4.10856 5.20996C4.30971 5.03884 4.46732 4.82303 4.56839 4.57904C4.66947 4.33505 4.71111 4.07054 4.68989 3.80729L4.02523 3.86063C4.03797 4.01856 4.01301 4.17726 3.95239 4.32366C3.89177 4.47005 3.79723 4.59994 3.67656 4.70263L4.10856 5.20996ZM4.07523 6.76129C3.96499 6.66742 3.87646 6.55072 3.81574 6.41927C3.75503 6.28782 3.72359 6.14475 3.72359 5.99996C3.72359 5.85517 3.75503 5.7121 3.81574 5.58065C3.87646 5.4492 3.96499 5.33251 4.07523 5.23863L3.64323 4.73063C3.45935 4.88709 3.31166 5.08164 3.21038 5.3008C3.1091 5.51997 3.05664 5.75852 3.05664 5.99996C3.05664 6.2414 3.1091 6.47995 3.21038 6.69912C3.31166 6.91829 3.45935 7.11283 3.64323 7.26929L4.07523 6.76129ZM4.68989 8.19263C4.711 7.9295 4.6693 7.66511 4.56824 7.42125C4.46717 7.17739 4.30962 6.96102 4.10856 6.78996L3.67656 7.29729C3.79723 7.39998 3.89177 7.52987 3.95239 7.67627C4.01301 7.82266 4.03797 7.98136 4.02523 8.13929L4.68989 8.19263ZM5.76323 9.31263C5.61885 9.32429 5.47366 9.30445 5.3377 9.25448C5.20174 9.20451 5.07826 9.1256 4.97581 9.0232C4.87335 8.92081 4.79436 8.79738 4.74431 8.66145C4.69425 8.52553 4.67432 8.38035 4.68589 8.23596L4.02189 8.18263C4.00248 8.42326 4.03558 8.66524 4.1189 8.89183C4.20221 9.11841 4.33376 9.32419 4.50443 9.49493C4.67511 9.66567 4.88084 9.7973 5.1074 9.8807C5.33395 9.9641 5.57592 9.99728 5.81656 9.97796L5.76323 9.31263ZM8.76056 9.92396C8.66668 10.0342 8.54998 10.1227 8.41854 10.1834C8.28709 10.2442 8.14402 10.2756 7.99923 10.2756C7.85443 10.2756 7.71137 10.2442 7.57992 10.1834C7.44847 10.1227 7.33177 10.0342 7.23789 9.92396L6.72989 10.356C6.88636 10.5398 7.0809 10.6875 7.30007 10.7888C7.51924 10.8901 7.75779 10.9425 7.99923 10.9425C8.24066 10.9425 8.47922 10.8901 8.69839 10.7888C8.91755 10.6875 9.1121 10.5398 9.26856 10.356L8.76056 9.92396ZM11.3126 8.23596C11.3242 8.3804 11.3044 8.52565 11.2544 8.66166C11.2044 8.79767 11.1254 8.92119 11.0229 9.02365C10.9205 9.12612 10.7969 9.2051 10.6609 9.25511C10.5249 9.30512 10.3797 9.32497 10.2352 9.3133L10.1819 9.97729C10.4225 9.99671 10.6645 9.96361 10.8911 9.88029C11.1177 9.79698 11.3235 9.66543 11.4942 9.49475C11.6649 9.32408 11.7966 9.11835 11.88 8.89179C11.9634 8.66524 11.9959 8.42327 11.9766 8.18263L11.3126 8.23596ZM11.8899 6.78929C11.6889 6.96049 11.5314 7.17699 11.4304 7.42098C11.3295 7.66496 11.2879 7.92944 11.3092 8.19263L11.9732 8.13929C11.9605 7.98136 11.9854 7.82266 12.0461 7.67627C12.1067 7.52987 12.2012 7.39998 12.3219 7.29729L11.8899 6.78929ZM11.9232 5.23863C12.0335 5.33251 12.122 5.4492 12.1827 5.58065C12.2434 5.7121 12.2749 5.85517 12.2749 5.99996C12.2749 6.14475 12.2434 6.28782 12.1827 6.41927C12.122 6.55072 12.0335 6.66808 11.9232 6.76196L12.3552 7.26929C12.5391 7.11283 12.6868 6.91829 12.7881 6.69912C12.8894 6.47995 12.9418 6.2414 12.9418 5.99996C12.9418 5.75852 12.8894 5.51997 12.7881 5.3008C12.6868 5.08164 12.5391 4.88709 12.3552 4.73063L11.9232 5.23863ZM11.3092 3.80729C11.288 4.07037 11.3296 4.33472 11.4306 4.57858C11.5315 4.82244 11.689 5.03884 11.8899 5.20996L12.3219 4.70263C12.2012 4.59994 12.1067 4.47005 12.0461 4.32366C11.9854 4.17726 11.9605 4.01856 11.9732 3.86063L11.3092 3.80729ZM10.2359 2.68729C10.3802 2.67573 10.5253 2.69565 10.6612 2.74567C10.7971 2.79568 10.9205 2.87461 11.0229 2.97699C11.1252 3.07938 11.2042 3.20277 11.2542 3.33864C11.3042 3.47452 11.3235 3.61963 11.3119 3.76396L11.9766 3.81729C11.9959 3.57665 11.9634 3.33468 11.88 3.10813C11.7966 2.88158 11.6649 2.67584 11.4942 2.50517C11.3235 2.33449 11.1177 2.20294 10.8911 2.11963C10.6645 2.03631 10.4225 2.00322 10.1819 2.02263L10.2359 2.68729ZM8.78923 2.10929C8.96028 2.31035 9.17665 2.4679 9.42052 2.56897C9.66438 2.67004 9.92876 2.71173 10.1919 2.69063L10.1386 2.02596C9.98063 2.03871 9.82193 2.01374 9.67553 1.95312C9.52914 1.8925 9.39925 1.79796 9.29656 1.67729L8.78923 2.10929ZM9.26856 1.64396C9.1121 1.46008 8.91755 1.31239 8.69839 1.21111C8.47922 1.10983 8.24066 1.05737 7.99923 1.05737C7.75779 1.05737 7.51924 1.10983 7.30007 1.21111C7.0809 1.31239 6.88636 1.46008 6.72989 1.64396L7.23723 2.07596C7.33111 1.96573 7.44847 1.87719 7.57992 1.81648C7.71137 1.75576 7.85443 1.72432 7.99923 1.72432C8.14402 1.72432 8.28709 1.75576 8.41854 1.81648C8.54998 1.87719 8.66735 1.96573 8.76123 2.07596L9.26856 1.64396ZM7.20989 9.89063C7.06142 9.71622 6.87858 9.57429 6.6728 9.4737C6.46703 9.3731 6.24272 9.31534 6.01389 9.30529L5.98456 9.97196C6.1218 9.97801 6.25633 10.0123 6.37975 10.0726C6.50316 10.1329 6.61283 10.218 6.70189 10.3226L7.20989 9.89063ZM6.01389 9.30529C5.94477 9.30282 5.87557 9.3046 5.80656 9.30929L5.85989 9.97396C5.90167 9.97041 5.94323 9.96974 5.98456 9.97196L6.01389 9.30529ZM6.33256 14.6666V9.63863H5.66589V14.6666H6.33256ZM10.1926 9.30929C10.1233 9.30458 10.0539 9.30346 9.98456 9.30596L10.0139 9.97196C10.0552 9.96974 10.0968 9.97041 10.1386 9.97396L10.1926 9.30929ZM9.98456 9.30596C9.75585 9.31609 9.53167 9.37324 9.32601 9.47383C9.12036 9.57442 8.93763 9.7163 8.78923 9.89063L9.29656 10.3226C9.38563 10.218 9.49529 10.1329 9.61871 10.0726C9.74213 10.0123 9.87665 9.97801 10.0139 9.97196L9.98456 9.30596ZM9.66589 9.63929V14.6666H10.3326V9.63863L9.66589 9.63929Z" fill="#008357"/>
        <path d="M9.33268 5.33325L7.33268 7.33325L6.66602 6.66659" stroke="#008357" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `;

          const tickElements4 = document.getElementsByClassName('certificate');

          for (let i = 0; i < tickElements4.length; i++) {
              tickElements4[i].innerHTML = certificate;
          }

      });
  </script>
