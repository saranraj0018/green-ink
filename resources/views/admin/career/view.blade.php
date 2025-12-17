<x-layouts.admin>
    <div class="p-4">

        <!-- Header -->
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Careers</h2>
            <button id="createCareerBtn"
                class="bg-[#006400] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700">
                <thead>
                    <tr class="bg-[#006400] text-white uppercase">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Title</th>
                        <th class="px-3 py-2">Mode</th>
                        <th class="px-3 py-2">Experience</th>
                        <th class="px-3 py-2">Location</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">User</th>
                        <th class="px-3 py-2">Created</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody id="careerTableBody" class="divide-y">
                    @foreach($careers as $career)
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 py-2">{{ $career->id }}</td>
                            <td class="px-3 py-2">{{ $career->title }}</td>
                            <td class="px-3 py-2">{{ $career->mode }}</td>
                            <td class="px-3 py-2">{{ $career->experience }}</td>
                            <td class="px-3 py-2">{{ $career->location }}</td>

                            <td class="px-3 py-2">
                                <span class="px-3 py-1 text-xs rounded-full
                                    {{ $career->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $career->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-3 py-2">
                                {{ $career->admin?->name ?? '—' }}
                            </td>

                            <td class="px-3 py-2">
                                {{ $career->created_at->format('d M Y') }}
                            </td>

                            <td class="px-3 py-2 flex justify-center gap-3">
                                <!-- Edit -->
                                <button
                                    class="text-blue-600 editCareerBtn"
                                    data-id="{{ $career->id }}"
                                    data-title="{{ $career->title }}"
                                    data-description="{{ $career->description }}"
                                    data-mode="{{ $career->mode }}"
                                    data-experience="{{ $career->experience }}"
                                    data-skills="{{ $career->skills }}"
                                    data-location="{{ $career->location }}"
                                    data-status="{{ $career->status }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete -->
                                <button
                                    class="text-red-600 btnDeleteCareer"
                                    data-id="{{ $career->id }}">
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
            {{ $careers->links() }}
        </div>

        <!-- Modals -->
        @include('admin.career.modal')

    </div>
</x-layouts.admin>

<script src="{{ asset('admin/js/career.js') }}"></script>
