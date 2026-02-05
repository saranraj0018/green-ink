<x-layouts.admin>
    <div class="p-4">

        <!-- Header -->
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Marquee</h2>

            <button id="createMarqueeBtn"
                class="bg-[#006400] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">

                <thead>
                    <tr class="bg-[#006400] text-white text-sm uppercase tracking-wider">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2 text-center">Content</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">Created Date</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody id="marqueeTableBody" class="divide-y divide-gray-200">
                    @foreach($marquees as $marquee)
                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-4 py-3 font-medium">
                                {{ $marquee->id }}
                            </td>

                            <td class="px-4 py-3 max-w-xl">
                                <p class="line-clamp-2 text-gray-700">
                                    {{ $marquee->content }}
                                </p>
                            </td>

                            <td class="px-4 py-3">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $marquee->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $marquee->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                {{ $marquee->created_at->format('d M Y, h:i A') }}
                            </td>

                            <td class="px-4 py-3 flex justify-center gap-4">

                                <!-- Edit -->
                                <button
                                    class="text-blue-600 hover:text-blue-800 transition editMarqueeBtn"
                                    data-id="{{ $marquee->id }}"
                                    data-content="{{ $marquee->content }}"
                                    data-status="{{ $marquee->status }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete -->
                                <button
                                    class="text-red-600 hover:text-red-800 transition btnDeleteMarquee"
                                    data-id="{{ $marquee->id }}">
                                    <i class="fa-solid fa-delete-left"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4">
            {{ $marquees->links() }}
        </div>

        <!-- Modal -->
        @include('admin.marquee.modal')

    </div>
</x-layouts.admin>

<script src="{{ asset('admin/js/marquee.js') }}"></script>
