<x-layouts.admin>
    <div class="p-4">

        <!-- Header -->
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Event Registrations</h2>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                    <tr class="bg-[#006400] text-white text-sm uppercase tracking-wider">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Event</th>
                        <th class="px-3 py-2">Name</th>
                        <th class="px-3 py-2">Email</th>
                        <th class="px-3 py-2">Phone</th>
                        <th class="px-3 py-2">Registered At</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($registrations as $row)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 font-medium">{{ $row->id }}</td>

                            <td class="px-4 py-3">
                                {{ $row->event?->title ?? '—' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $row->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $row->email }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $row->phone }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $row->created_at->format('d M Y, h:i A') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                No registrations found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4">
            {{ $registrations->links() }}
        </div>

    </div>
</x-layouts.admin>
