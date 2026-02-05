<x-layouts.admin>
    <div class="p-4">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Exam Categories</h2>

            <button id="createExamCategoryBtn"
                class="bg-[#006400] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                    <tr class="bg-[#006400] text-white text-sm uppercase tracking-wider">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Title</th>
                        <th class="px-3 py-2">Icon</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">User</th>
                        <th class="px-3 py-2">Created At</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody id="examCategoryTableBody" class="divide-y divide-gray-200">
                    @foreach ($categories as $cat)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 font-medium text-gray-900">
                                {{ $cat->id }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $cat->title }}
                            </td>

                            <td class="px-4 py-3">
                                @if ($cat->icon)
                                    <img src="{{ asset('storage/' . $cat->icon) }}"
                                        class="h-10 w-10 object-cover rounded-lg shadow-sm border" />
                                @else
                                    <span class="text-gray-400 italic">No Icon</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $cat->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $cat->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                {{ $cat->admin?->name ?? '—' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $cat->created_at->format('d M Y, h:i A') }}
                            </td>

                            <td class="px-4 py-3 flex justify-center gap-4">
                                <!-- Edit -->
                                <button
                                    class="text-blue-600 hover:text-blue-800 transition editExamCategoryBtn"
                                    data-id="{{ $cat->id }}"
                                    data-title="{{ $cat->title }}"
                                    data-description="{{ $cat->description }}"
                                    data-status="{{ $cat->status }}"
                                    data-icon="{{ $cat->icon ? asset('storage/'.$cat->icon) : '' }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete -->
                                <button
                                    class="text-red-600 hover:text-red-800 transition btnDeleteExamCategory"
                                    data-id="{{ $cat->id }}">
                                    <i class="fa-solid fa-delete-left"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-4">
            {{ $categories->links() }}
        </div>

        {{-- Modal --}}
        @include('admin.examcategory.modal')
    </div>
</x-layouts.admin>

<script src="{{ asset('admin/js/examcategory.js') }}"></script>
