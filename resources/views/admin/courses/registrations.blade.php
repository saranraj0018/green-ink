<x-layouts.admin>
    <div class="p-4">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Course Registrations (Paid)</h2>
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                    <tr class="bg-[#006400] text-white uppercase text-sm">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Payment ID</th>
                        <th class="px-3 py-2">Name</th>
                        <th class="px-3 py-2">Email</th>
                        <th class="px-3 py-2">Phone</th>
                        <th class="px-3 py-2">Course</th>
                        <th class="px-3 py-2">Paid At</th>
                        <th class="px-3 py-2">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($registrations as $row)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $row->id }}</td>

                            <td class="px-4 py-3 font-semibold text-green-700">
                                {{ $row->student_id }}
                            </td>

                            <td class="px-4 py-3">{{ $row->name }}</td>
                            <td class="px-4 py-3">{{ $row->email }}</td>
                            <td class="px-4 py-3">{{ $row->phone }}</td>

                            <td class="px-4 py-3">{{ $row->course_type }}</td>

                            <td class="px-4 py-3">
                                {{ $row->payment?->created_at?->format('d M Y, h:i A') }}
                            </td>

                            <td class="px-4 py-3">
                                <a href="{{ route('course.registrations.show', $row->id) }}"
                                   class="px-3 py-1 bg-[#006400] text-white rounded text-sm hover:bg-green-700">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-6 text-gray-500">
                                No paid registrations found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4">
            {{ $registrations->links() }}
        </div>

    </div>
</x-layouts.admin>
