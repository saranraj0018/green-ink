<div id="courseModal" x-data="{
    previewUrl: '',
    exiting_image: '',
    open: false,
    form: {
        course_id: 0,
        category_id: '',
        title: '',
        type: 'free',
        amount: '',
        hours: '',
        star_point: '',
        description: '',
        course_overview: '',
        learning_outcomes: '',
        status: '1',
        image: '',
        video_files: [],
        cover_video
    }
}" x-cloak>

    <template x-if="open">
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black/40" @click="open=false"></div>
            <!-- Modal Box -->
            <div class="bg-white rounded-2xl shadow-2xl w-[900px] max-w-[95%] max-h-[90vh] relative z-10 flex flex-col">
                <h2 class="text-2xl font-bold p-6 pb-3 text-gray-800" id="course_label">Add Course</h2>
                <!-- Scrollable Form Section -->
                <div class="px-6 overflow-y-auto" style="max-height: 65vh;">
                    <form id="courseForm" class="space-y-6 pt-4">
                        <input type="hidden" name="course_id" x-model="form.course_id" />
                        <input type="hidden" name="exiting_image" x-model="exiting_image" />
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <!-- Course Title -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Course Title</label>
                                <input type="text" name="title" x-model="form.title" id="title"
                                    class="form-input w-full border border-gray-300 rounded-lg p-2"
                                    placeholder="Enter course title">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Category</label>
                                <select name="category_id" id="category_id" x-model="form.category_id"
                                    class="form-input w-full border border-gray-300 rounded-lg p-2">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Type + Amount -->
                            <div class="flex items-center gap-3">
                                <div class="w-full">
                                    <label class="block text-gray-700 font-medium mb-2">Course Type</label>
                                    <select name="type" x-model="form.type" id="type"
                                        class="form-input w-full border border-gray-300 rounded-lg p-2">
                                        <option value="free">Free</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                </div>

                                <div class="w-full">
                                    <label class="block text-gray-700 font-medium mb-2">Amount (₹)</label>
                                    <input type="number" name="amount" x-model="form.amount" id="amount"
                                        :disabled="form.type === 'free'"
                                        class="form-input w-full border border-gray-300 rounded-lg p-2">
                                </div>
                            </div>

                            <!-- Hours + Star -->
                            <div class="flex items-center gap-3">
                                <div class="w-full">
                                    <label class="block text-gray-700 font-medium mb-2">Course Hours</label>
                                    <input type="number" name="hours" x-model="form.hours" id="hours"
                                        class="form-input w-full border border-gray-300 rounded-lg p-2">
                                </div>

                                <div class="w-full">
                                    <label class="block text-gray-700 font-medium mb-2">Star Rating</label>
                                    <input type="number" step="0.1" name="star_point" x-model="form.star_point"
                                        id="star_point" class="form-input w-full border border-gray-300 rounded-lg p-2">
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Description</label>
                                <textarea name="description" x-model="form.description" id="description"
                                    class="form-input w-full border border-gray-300 rounded-lg p-2" rows="3"></textarea>
                            </div>

                            <!-- Course Overview -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Course Overview</label>
                                <textarea name="course_overview" x-model="form.course_overview" id="course_overview"
                                    class="form-input w-full border border-gray-300 rounded-lg p-2" rows="3"></textarea>
                            </div>

                            <!-- Learning Outcomes -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">What You'll Learn</label>
                                <textarea name="learning_outcomes" x-model="form.learning_outcomes" id="learning_outcomes"
                                    placeholder="Add bullet points separated by new lines"
                                    class="form-input w-full border border-gray-300 rounded-lg p-2" rows="3"></textarea>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Status</label>
                                <select name="status" x-model="form.status" id="status"
                                    class="form-input w-full border border-gray-300 rounded-lg p-2">
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>

                            <!-- Image -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Course Image</label>
                                <input type="file" name="course_image" id="course_image" accept=".png, .jpg, .jpeg"
                                    x-ref="fileInput"
                                    @change="
                                       const file = $refs.fileInput.files[0];
                                       if (file) {
                                           const reader = new FileReader();
                                           reader.onload = e => { previewUrl = e.target.result }
                                           reader.readAsDataURL(file);
                                       }
                                   "
                                    class="form-input w-full border border-gray-300 rounded-lg p-2 cursor-pointer bg-gray-50">

                                <div class="mt-4 flex justify-center overflow-hidden">
                                    <img :src="previewUrl" x-show="previewUrl"
                                        class="w-full max-h-[30vh] rounded-lg border border-gray-300 shadow-md object-cover" />
                                </div>
                            </div>

                            <!-- Video Upload (Multiple) -->
                            <div class="col-span-2" x-data="{ video_files: [] }">
    <label class="block text-gray-700 font-medium mb-2">Upload Course Videos</label>

    <input type="file"
        name="videos[]"
        id="videos"
        accept="video/mp4,video/mkv,video/webm"
        multiple
        @change="video_files = Array.from($event.target.files)"
        class="form-input w-full border border-gray-300 rounded-lg p-2 cursor-pointer bg-gray-50">

    <!-- Preview File List -->
    <template x-if="video_files.length > 0">
        <ul class="mt-3 space-y-1 bg-gray-100 p-3 rounded-lg border">
            <template x-for="(video, index) in video_files" :key="index">
                <li class="text-sm text-gray-700 flex items-center justify-between">
                    <span x-text="video.name"></span>
                </li>
            </template>
        </ul>
    </template>
</div>

                        </div>
                    </form>
                </div>

                <!-- Fixed Footer Buttons -->
                <div class="flex justify-end gap-3 p-4 rounded-2xl bg-white">
                    <button type="button" @click="open=false"
                        class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="submit" form="courseForm"
                        class="bg-[#006400] text-white px-5 py-2 rounded-lg hover:bg-[#006400]">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>


