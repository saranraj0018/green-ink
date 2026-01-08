<div class="my-container my-10 space-y-3">
    <h2 class="text-center text-xl font-medium uppercase">
        Best Selling Books
    </h2>
    <p class="text-center text-sm text-gray-600">
        Dive into the most talked about books of the season
    </p>

    @php
        $data = [
            [
                'img' => '/assets/store/book1.png',
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'genre' => 'Self Help',
                'regularPrice' => 399,
                'selling' => 199,
                'star' => 3,
            ],
            [
                'img' => '/assets/store/book1.png',
                'title' => 'Rich Dad Poor Dad',
                'author' => 'Robert Kiyosaki',
                'genre' => 'Finance',
                'regularPrice' => 499,
                'selling' => 249,
                'star' => 3,
            ],
            [
                'img' => '/assets/store/book1.png',
                'title' => 'The Psychology of Money',
                'author' => 'Morgan Housel',
                'genre' => 'Finance',
                'regularPrice' => 399,
                'selling' => 199,
                'star' => 3,
            ],
            [
                'img' => '/assets/store/book1.png',
                'title' => 'Deep Work',
                'author' => 'Cal Newport',
                'genre' => 'Productivity',
                'regularPrice' => 450,
                'selling' => 299,
                'star' => 3,
            ],
        ];
    @endphp

    <div class="grid grid-cols-12 gap-4 mt-8">
        @foreach ($data as $book)
            <div class="col-span-6 md:col-span-4 lg:col-span-3">
                <div class="rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                    <!-- Book Image -->
                    <div class="flex justify-center">
                        <img src="{{ $book['img'] }}" alt="{{ $book['title'] }}" class="w-full lg:h-60">
                    </div>

                    <!-- Book Details -->
                    <div class="p-2 md:p-4 space-y-1 bg-[#f4f4f4]">
                        <div class="flex justify-between">
                            <div>
                                <h3 class="font-semibold text-xs md:text-lg line-clamp-1">
                                    {{ $book['title'] }}
                                </h3>
                                <p class="text-xs md:text-sm text-gray-500">
                                    {{ $book['author'] }} . {{ $book['genre'] }}
                                </p>
                            </div>

                            <div class="flex gap-1 h-max">
                                <i class="fa fa-star my-auto text-xs text-yellow-400" aria-hidden="true"></i>
                                <span class="text-xs">
                                    {{ $book['star'] }}
                                </span>
                            </div>
                        </div>


                        <!-- Price -->
                        <div class="md:flex justify-between">
                            <div class="flex items-center gap-1 mt-2">
                                <span class="text-lg font-semibold">
                                    ₹{{ $book['selling'] }}
                                </span>
                                <span class="text-xs line-through text-gray-400">
                                    ₹{{ $book['regularPrice'] }}
                                </span>
                            </div>
                            <!-- CTA -->
                            <button
                                class="mt-3 bg-primary text-white py-1 px-2 rounded-full text-xs md:text-sm transition w-full md:w-max">
                                Buy Now
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
