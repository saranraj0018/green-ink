
<x-layouts.admin>
    <div class="p-4">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Courses</h2>
            <button id="createCourseBtn" class="bg-[#006400] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                <tr class="bg-[#006400] text-white text-sm uppercase tracking-wider">
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Image</th>
                    <th class="px-3 py-2">Course Name</th>
                    <th class="px-3 py-2">Category</th>
                    <th class="px-3 py-2">Type</th>
                    <th class="px-3 py-2">Hours</th>
                    <th class="px-3 py-2">Amount</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Created At</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
                </thead>
                <tbody id="courseTableBody" class="divide-y divide-gray-200">
                @foreach($courses as $course)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-2 py-3 font-medium text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-2 py-3">
                         @if($course->image)
                             <img src="{{ asset('storage/'.$course->image) }}"
                                  class="h-10 w-10 object-cover rounded-lg shadow-sm border" />
                         @else
                             <span class="text-gray-400 italic">No Image</span>
                         @endif
                        </td>
                        <td class="px-2 py-3">{{ $course->title ?? '' }}</td>
                        <td class="px-2 py-3">{{ $course->get_category->name ?? ''}}</td>
                        <td class="px-2 py-3">{{ strtoupper($course->type) ?? ''}}</td>
                        <td class="px-2 py-3">{{ $course->hours ?? ''}}</td>
                        <td class="px-2 py-3">{{ $course->amount ?? ''}}</td>
                       <td class="px-4 py-3">
    <span class="px-3 py-1 text-xs font-semibold rounded-full
        {{ $course->status == 1 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
        {{ $course->status == 1 ? 'Active' : 'Inactive' }}
    </span>
</td>

                        <td class="px-4 py-3">
                            {{ $course->created_at->format('d M Y, h:i A') }}
                        </td>
                        <td class="px-4 py-3 flex justify-center gap-4">
                            <!-- Edit -->
                            <button
                                class="text-blue-600 hover:text-blue-800 transition editCourseBtn"
                                data-id="{{ $course->id }}"
                                data-title="{{ $course->title }}"
                                data-status="{{ $course->status }}"
                                data-image="{{ $course->image ? asset('storage/'.$course->image) : '' }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <!-- Delete -->
                            {{-- @if ($cat->products->isEmpty())
                            <button class="text-red-600 hover:text-red-800 transition btnDeleteCourse" data-id="{{ $cat->id }}">
                                <i class="fa-solid fa-delete-left"></i>
                            </button>
                            @endif --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
         <div class="p-4">
            {{ $courses->links() }}
        </div>
        @include('admin.courses.course_model',[
            'category' => $category
        ])
    </div>

</x-layouts.admin>
<script src="{{ asset('admin/js/course.js') }}"></script>

