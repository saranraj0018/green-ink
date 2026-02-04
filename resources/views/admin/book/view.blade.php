<x-layouts.admin>
    <div class="p-4">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Books</h2>
            <button id="createBookBtn" class="bg-[#006400] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                <tr class="bg-[#006400] text-white text-sm uppercase tracking-wider">
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Name</th>
                    <th class="px-3 py-2">Image</th>
                    <th class="px-3 py-2">Regular Price</th>
                    <th class="px-3 py-2">Sale Price</th>
                    <th class="px-3 py-2">Rating</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">User</th>
                    <th class="px-3 py-2">Created Date</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
                </thead>

                <tbody id="bookTableBody" class="divide-y divide-gray-200">
                @foreach($books as $book)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $book->id }}</td>

                        <td class="px-4 py-3">{{ $book->name }}</td>

                        <td class="px-4 py-3">
                            @if($book->image)
                                <img src="{{ asset('storage/'.$book->image) }}"
                                     class="h-10 w-10 object-cover rounded-lg shadow-sm border" />
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            ₹ {{ number_format($book->regular_price, 2) }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $book->sale_price ? '₹ '.number_format($book->sale_price,2) : '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $book->rating ?? 0 }}/5
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                {{ $book->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $book->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            {{ $book->admin?->name ?? '—' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $book->created_at->format('d M Y, h:i A') }}
                        </td>

                        <td class="px-4 py-3 flex justify-center gap-4">
                            <!-- Edit -->
                            <button
                                class="text-blue-600 hover:text-blue-800 transition editBookBtn"
                                data-id="{{ $book->id }}"
                                data-name="{{ $book->name }}"
                                data-regular_price="{{ $book->regular_price }}"
                                data-sale_price="{{ $book->sale_price }}"
                                data-rating="{{ $book->rating }}"
                                data-status="{{ $book->status }}"
                                data-image="{{ $book->image ? asset('storage/'.$book->image) : '' }}"
                                data-description="{{ $book->description }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <!-- Delete -->
                            <button
                                class="text-red-600 hover:text-red-800 transition btnDeleteBook"
                                data-id="{{ $book->id }}">
                                <i class="fa-solid fa-delete-left"></i>
                            </button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-4">
            {{ $books->links() }}
        </div>

        @include('admin.book.model')
    </div>
</x-layouts.admin>

<script src="{{ asset('admin/js/book.js') }}"></script>
