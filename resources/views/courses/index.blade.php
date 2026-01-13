
@section('content')
    <section class="my-container mt-10">
        <div class="grid grid-cols-12 gap-6">

            @foreach ($course as $courses)
                   <div class="col-span-12 lg:col-span-6">
                <div class="grid grid-cols-12 rounded-2xl gap-4 items-center"
                    style="background: linear-gradient(114deg, #FFF 40.52%, #FFEDC3 69.26%);">

                    <!-- Image -->
                    <div class="col-span-12 md:col-span-4 relative">
                        <img src="{{ asset('storage/'.$courses->image) }}"
                             class="w-full h-full object-cover rounded-xl"
                             alt="{{ $courses->title }}">

                        @if ($courses->type === 'paid')
                            <span
                                class="absolute top-2 right-2 bg-[#FFC31F] text-[#014631]
                                text-xs px-4 py-1 rounded-full font-medium">
                                Premium
                            </span>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="col-span-12 md:col-span-8 p-4">
                        <h3 class="text-lg font-semibold text-[#014631] leading-snug">
                            {{ $courses->title }}
                        </h3>

                        <p class="text-sm text-primary mt-1 leading-relaxed">
                            {{ $courses->description }}
                        </p>

                        <div class="flex gap-3 mt-3">
                            <div
                                class="flex items-center gap-4 text-xs text-gray-600
                                bg-white/40 rounded-lg w-max p-1 border border-white">

                                <span class="flex items-center gap-1 text-[#014631]">
                                    ⭐ {{ $courses->star_point }}
                                </span>

                                <span class="flex items-center gap-1">
                                    👤 {{ number_format($courses->members) }}
                                </span>

                                <span class="flex items-center gap-1">
                                    ⏱ {{ $courses->hours }}hrs
                                </span>
                            </div>

                            <span class="text-lg font-semibold text-[#014631] my-auto">
                                @if($courses->type === 'free')
                                    Free
                                @else
                                    ₹{{ number_format($courses->amount) }}
                                @endif
                            </span>
                        </div>


                            <!-- Footer -->
                            <div class="flex justify-end mt-4">


                                <a href="{{ route('view_course', ['id' => encrypt($courses->id)]) }}"
                                    class="flex items-center gap-2 bg-white text-[#014631]
                                      text-sm font-semibold px-3 py-1 rounded-full shadow">
                                    View course
                                    <span
                                        class="w-6 h-6 flex items-center justify-center
                                           rounded-full bg-[#FFC31F] arrow">
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const arrow = `
          <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
        <path d="M2.17241 2.95468C2.17241 4.1567 2.17241 4.7572 2.36814 5.23146C2.49811 5.54585 2.68884 5.83151 2.92939 6.07206C3.16995 6.31261 3.4556 6.50334 3.76999 6.63331C4.24426 6.82905 4.84475 6.82905 6.04677 6.82905H10.2876M8.12271 9.31128L10.0632 7.37128C10.213 7.22154 10.2881 7.02529 10.2881 6.82905C10.2881 6.72832 10.2682 6.62859 10.2296 6.53555C10.191 6.44251 10.1345 6.35799 10.0632 6.28681L8.12322 4.34681" stroke="#1B4D3E" stroke-width="0.919913" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        `;

            const tickElements = document.getElementsByClassName('arrow');

            for (let i = 0; i < tickElements.length; i++) {
                tickElements[i].innerHTML = arrow;
            }

        });
    </script>
