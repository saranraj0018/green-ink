@section('content')
    <section class="max-w-6xl mx-auto ">

        <div id="tabContent">
            <div class="tab-pane" data-content="all">
                <div class="grid grid-cols-12 gap-5 mt-10">
                    @foreach ($course as $courses)
                        <div class="col-span-12 md:col-span-4 rounded-3xl shadow-lg  ">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $courses->image) }}" alt="Event"
                                     class="rounded-t-2xl w-full">
                                @if ($courses->type == 'paid')
                                    <span
                                        class= "absolute top-3 right-3 bg-[#FFC31F] text-green-900 px-3 text-sm py-1 rounded-full">
                                        Premium
                                    </span>
                                @endif
                            </div>

                            <div class="py-5 px-5">
                                <p
                                    class="text-sm font-normal text-[#014631]  text-center py-2 px-10 rounded-3xl bg-[#DEF6EE] ">
                                    {{ $courses->get_category->name ?? '' }}</p>
                                <p class="text-sm font-semibold text-black text-justify pt-3">{{ $courses->title ?? '' }}
                                </p>
                                <div class="flex gap-3 pt-3">
                                    <p class="text-sm font-normal text-[#FFB100]"><i class="fa fa-star"
                                                                                     aria-hidden="true"></i> {{ $courses->star_point ?? '' }}</p>
                                    <p class="text-sm font-normal text-[#FFB100]"><i class="fa fa-user"
                                                                                     aria-hidden="true"></i> 0 </p>
                                    <p class="text-sm font-normal text-[#FFB100]"><i class="fa fa-clock"
                                                                                     aria-hidden="true"></i> {{ $courses->hours ?? '' }}hrs</p>
                                </div>
                                <div class="flex pt-4 justify-between">
                                    <h5 class="text-lg font-normal text-[#02A171]">${{ $courses->amount ?? '' }}</h5>
                                    <a href="{{ route('view_course', ['id' => encrypt($courses->id)]) }}"
                                       class="text-center text-white font-semibold py-2 px-10 rounded-3xl bg-[#02A171]">
                                        View Courses
                                    </a>

                                </div>
                            </div>
                        </div>
                        <!-- add content-->
                    @endforeach
                </div>
            </div>
        </div>

    </section>

