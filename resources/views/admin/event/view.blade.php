<x-layouts.admin>
    <div class="p-4">
        <!-- Header -->
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Events</h2>
            <button id="createEventBtn" class="bg-[#006400] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                    <tr class="bg-[#006400] text-white text-sm uppercase tracking-wider">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Title</th>
                        <th class="px-3 py-2">Date</th>
                        <th class="px-3 py-2">Time</th>
                        <th class="px-3 py-2">Mode</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">User</th>
                        <th class="px-3 py-2">Created At</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody id="eventTableBody" class="divide-y divide-gray-200">
                    @foreach($events as $event)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 font-medium">{{ $event->id }}</td>

                            <td class="px-4 py-3">
                                {{ $event->title }}
                            </td>

                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                            </td>

                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                                -
                                {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $event->mode }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    {{ $event->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $event->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                {{ $event->admin?->name ?? '—' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $event->created_at->format('d M Y, h:i A') }}
                            </td>

                            <td class="px-4 py-3 flex justify-center gap-4">
                                <!-- Edit -->
                                <button
                                    class="text-blue-600 hover:text-blue-800 transition editEventBtn"
                                    data-id="{{ $event->id }}"
                                    data-title="{{ $event->title }}"
                                    data-description="{{ $event->description }}"
                                    data-date="{{ $event->event_date }}"
                                    data-start="{{ $event->start_time }}"
                                    data-end="{{ $event->end_time }}"
                                    data-mode="{{ $event->mode }}"
                                    data-status="{{ $event->status }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete -->
                                <button
                                    class="text-red-600 hover:text-red-800 transition btnDeleteEvent"
                                    data-id="{{ $event->id }}">
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
            {{ $events->links() }}
        </div>

        <!-- Modal include -->
        @include('admin.event.modal')
    </div>
</x-layouts.admin>

<script src="{{ asset('admin/js/event.js') }}"></script>
