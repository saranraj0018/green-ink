<x-layouts.admin>
    <div class="p-4">

        <!-- Header -->
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Career Applications</h2>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                    <tr class="bg-[#006400] text-white text-sm uppercase tracking-wider">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Name</th>
                        <th class="px-3 py-2">Email</th>
                        <th class="px-3 py-2">Phone</th>
                        <th class="px-3 py-2">Experience</th>
                        <th class="px-3 py-2">Resume</th>
                        <th class="px-3 py-2">Applied At</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($applications as $row)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 font-medium">{{ $row->id }}</td>

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
                                {{ $row->experience }}
                            </td>

                            <td class="px-4 py-3">
                                @if($row->resume)
                                    <a href="{{ asset('storage/'.$row->resume) }}"
                                       target="_blank"
                                       class="text-blue-600 underline">
                                        View Resume
                                    </a>
                                @else
                                    —
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                {{ $row->created_at->format('d M Y, h:i A') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">
                                No career applications found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4">
            {{ $applications->links() }}
        </div>

    </div>
</x-layouts.admin>
