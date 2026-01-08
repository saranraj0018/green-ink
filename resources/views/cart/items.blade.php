@php
    $cartItems = [
        [
            'title' => 'The Alchemist',
            'code' => 'BOOK-ALC-001',
            'price' => 399,
            'qty' => 1,
            'image' => 'assets/store/book1.png',
            'stock' => 'In Stock',
        ],
        [
            'title' => 'Atomic Habits',
            'code' => 'BOOK-ATH-002',
            'price' => 599,
            'qty' => 2,
            'image' => 'assets/store/book1.png',
            'stock' => 'In Stock',
        ],
        [
            'title' => 'Rich Dad Poor Dad',
            'code' => 'BOOK-RDPD-003',
            'price' => 499,
            'qty' => 1,
            'image' => 'assets/store/book1.png',
            'stock' => 'In Stock',
        ],
    ];
@endphp


<div class="rounded-xl overflow-x-auto">

    <table class="w-max md:w-full border-collapse">
        <!-- Table Head -->
        <thead class="bg-white p-5">
            <tr class="border-b border-gray-200 text-sm text-gray-500">
                <th class="py-3">Product</th>
                <th class="py-3">Quantity</th>
                <th class="py-3">Price</th>
            </tr>
        </thead>

        <!-- Table Body -->
        <tbody>
            @foreach ($cartItems as $item)
                <tr class="border-b border-gray-200 p-3">
                    <!-- Product -->
                    <td class="p-2">
                        <div class="flex gap-3 items-center">
                            <button
                                class="w-6 h-6 border border-gray-400 rounded-lg text-sm flex items-center justify-center">
                                ×
                            </button>

                            <img src="{{ $item['image'] }}" class="w-20 h-14 object-cover rounded">

                            <div class="space-y-1">
                                <p class="text-xs font-medium text-gray-500">
                                    {{ $item['code'] }}
                                </p>
                                <p class="text-sm font-medium">
                                    {{ $item['title'] }}
                                </p>
                                <span class="text-xs text-green-600 bg-green-100 px-2 py-0.5 rounded">
                                    {{ $item['stock'] }}
                                </span>
                            </div>
                        </div>
                    </td>

                    <!-- Quantity -->
                    <td class="p-2 text-center">
                        <div class="inline-flex items-center rounded-full p-1 bg-gray-200">
                            <button class="px-2 text-lg bg-white rounded-full">−</button>
                            <span class="px-3">{{ $item['qty'] }}</span>
                            <button class="px-2 text-lg bg-white rounded-full">+</button>
                        </div>
                    </td>

                    <!-- Price -->
                    <td class="text-right font-medium p-2">
                        ₹{{ number_format($item['price']) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
