<div id="examCategoryModal"
     x-data="{ previewUrl: '', exiting_icon:'', form: { title: '', description: '', status: '1', cat_id: 0, icon: '' } }"
     class="fixed inset-0 hidden items-center justify-center z-50">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40" @click="$('#examCategoryModal').hide()"></div>

    <!-- Modal Box -->
    <div class="bg-white rounded-2xl shadow-2xl w-[600px] max-w-[90%] relative z-10 flex flex-col max-h-[90vh]">

        <h2 class="text-2xl font-bold mb-4 text-gray-800 p-6 border-b" id="examCategory_label">Add Exam Category</h2>

        <!-- Scrollable content -->
        <div class="overflow-y-auto px-6 py-4 flex-1 space-y-6">
            <form id="examCategoryForm" class="space-y-6">
                <input type="hidden" name="id" x-model="form.cat_id" id="exam_category_id" />
                <input type="hidden" name="existing_icon" x-model="exiting_icon" id="existing_icon" />

                <!-- Title + Status -->
                <div class="flex items-center gap-3">
                    <div class="w-full">
                        <label class="block text-gray-700 font-medium mb-2">Title</label>
                        <input type="text" name="title" id="exam_category_title"
                               x-model="form.title"
                               placeholder="Enter title"
                               class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                    </div>

                    <div class="w-full">
                        <label class="block text-gray-700 font-medium mb-2">Status</label>
                        <select name="status" id="exam_category_status" x-model="form.status"
                                class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea name="description" id="exam_category_description"
                              x-model="form.description"
                              placeholder="Enter description"
                              class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]"></textarea>
                </div>

                <!-- Icon Upload -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Icon</label>
                    <input type="file" name="icon" id="exam_category_icon" accept=".png, .jpg, .jpeg"
                           x-ref="fileInput"
                           @change="
                               const file = $refs.fileInput.files[0];
                               if (file) {
                                   const reader = new FileReader();
                                   reader.onload = e => { previewUrl = e.target.result }
                                   reader.readAsDataURL(file);
                               }
                           "
                           class="form-input w-full border border-gray-300 rounded-lg p-2 cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#006400] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#006400] file:text-white hover:file:bg-[#006400]">

                    <div class="mt-4 flex justify-center overflow-hidden">
                        <img :src="previewUrl" x-show="previewUrl"
                             class="w-full max-h-[30vh] rounded-lg border border-gray-300 shadow-md object-cover" />
                    </div>
                </div>
            </form>
        </div>

        <!-- Buttons fixed at bottom -->
        <div class="flex justify-end gap-3 p-6 border-t bg-white">
            <button type="button" onclick="$('#examCategoryModal').hide()"
                    class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">Cancel</button>
            <button type="submit" form="examCategoryForm"
                    class="bg-[#006400] text-white px-5 py-2 rounded-lg hover:bg-[#006400]" id="save_exam_cat">
                Save
            </button>
        </div>

    </div>
</div>


{{-- Delete Modal --}}
<div id="deleteExamCategoryModal" x-data="{ open: false, deleteId: null }">
    <template x-if="open">
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="absolute inset-0 bg-black/40" @click="open = false"></div>
            <div class="bg-white p-6 rounded-xl shadow-xl w-[400px] relative z-10">
                <h2 class="text-lg font-bold mb-4 text-gray-800">Confirm Delete</h2>
                <p class="text-gray-600 mb-6">Are you sure you want to delete this exam category?</p>
                <div class="flex justify-end gap-3">
                    <button @click="open = false"
                        class="px-4 py-1 border rounded-lg hover:bg-gray-100">Cancel</button>
                    <button @click="deleteExamCategory(deleteId)"
                        class="px-4 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">Delete</button>
                </div>
            </div>
        </div>
    </template>
</div>
