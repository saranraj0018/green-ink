<div id="courseModal" class="fixed inset-0 bg-black/40 hidden z-50 flex items-center justify-center">

    <div class="bg-white rounded-2xl shadow-xl w-[900px] max-w-[95%] max-h-[90vh] overflow-y-auto">

        <div class="p-6 flex justify-between items-center">
            <h2 id="course_label" class="text-xl font-bold">Add Course</h2>
            <button id="closeModal" class="text-xl font-bold">&times;</button>
        </div>

        <form id="courseForm" class="p-6 space-y-4" enctype="multipart/form-data">

            <input type="hidden" id="course_id" name="course_id">
            <input type="hidden" id="exiting_image" name="exiting_image">
            <input type="hidden" name="exiting_cover_video" id="exiting_cover_video">
            <input type="hidden" name="exiting_course_videos" id="exiting_course_videos">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Title -->
                <div>
                    <label class="block mb-1 font-medium">Course Title</label>
                    <input id="title" name="title" type="text"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">
                </div>

                <!-- Category -->
                <div>
                    <label class="block mb-1 font-medium">Category</label>
                    <select id="category_id" name="category_id"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">
                        <option value="">Select Category</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Type -->
                <div>
                    <label class="block mb-1 font-medium">Course Type</label>
                    <select id="type" name="type"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">
                        <option value="free">Free</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>

                <!-- Amount -->
                <div>
                    <label class="block mb-1 font-medium">Amount</label>
                    <input id="amount" name="amount" type="number"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">
                </div>

                <!-- Hours -->
                <div>
                    <label class="block mb-1 font-medium">Hours</label>
                    <input id="hours" name="hours" type="number"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">
                </div>

                <!-- Star -->
                <div>
                    <label class="block mb-1 font-medium">Star Rating</label>
                    <input id="star_point" name="star_point" type="number" step="0.1"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">
                </div>
                <div>
                    <label class="block mb-1 font-medium">Course Instructor</label>
                    <input id="instructor" name="instructor" type="text"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">
                </div>
                <!-- Description -->
                <div class="col-span-2">
                    <label class="block mb-1 font-medium">Description</label>
                    <textarea id="description" name="description" class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2"></textarea>
                </div>

                <!-- Overview -->
                <div class="col-span-2">
                    <label class="block mb-1 font-medium">Course Overview</label>
                    <textarea id="course_overview" name="course_overview"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2"></textarea>
                </div>

                <!-- Learning -->
                <div class="col-span-2">
                    <label class="block mb-1 font-medium">What You'll Learn</label>
                    <textarea id="learning_outcomes" name="learning_outcomes"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2"></textarea>
                </div>

                <!-- Status -->
                <div>
                    <label class="block mb-1 font-medium">Status</label>
                    <select id="status" name="status"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>

                <!-- Image -->
                <div>
                    <label class="block mb-1 font-medium">Course Image</label>
                    <input type="file" id="course_image" name="course_image"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">

                    <!-- Preview -->
                    <div id="imagePreview" class="mt-2 hidden">
                        <img id="previewImg" class="w-full max-h-40 object-cover rounded">
                        <button type="button" id="removeImage" class="mt-2 text-red-600 text-sm">Remove Image</button>
                    </div>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Course Cover Video</label>
                    <input type="file" id="cover_video" name="cover_video" accept="video/mp4,video/mkv,video/webm"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">

                    <!-- Preview -->
                    <div id="coverVideoPreview" class="mt-2 hidden">
                        <p id="coverVideoName" class="text-sm text-gray-700"></p>
                        <button type="button" id="removeCoverVideo" class="text-red-600 text-sm mt-1">
                            Remove Cover Video
                        </button>
                    </div>
                </div>
                <div class="col-span-2">
                    <label class="block mb-1 font-medium">Course Videos</label>
                    <input type="file" id="course_videos" name="videos[]" multiple
                        accept="video/mp4,video/mkv,video/webm"
                        class="w-full border border-gray-300 hover:bg-gray-100 rounded-lg p-2">

                    <!-- Preview List -->
                    <ul id="courseVideoList" class="mt-2 space-y-2 bg-gray-100 p-3 rounded hidden">
                    </ul>
                </div>

            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" id="closeModalBtn"
                    class="px-4 py-2 border border-gray-300 hover:bg-gray-100 rounded">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-green-700 text-white rounded">
                    Save Course
                </button>
            </div>

        </form>
    </div>
</div>


<div id="deleteCourseModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">

    <div class="bg-white rounded-lg w-96 p-6">
        <h2 class="text-lg font-semibold mb-4">Delete Course</h2>
        <p class="text-gray-600 mb-6">
            Are you sure you want to delete this course?
        </p>

        <div class="flex justify-end gap-3">
            <button id="cancelDelete" class="px-4 py-2 border rounded">
                Cancel
            </button>
            <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded">
                Delete
            </button>
        </div>
    </div>
</div>
