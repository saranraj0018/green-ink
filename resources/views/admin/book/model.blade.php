<div id="bookModal"
     x-data="{
        previewUrl: '',
        exiting_image: '',
        form: {
            book_id: 0,
            name: '',
            regular_price: '',
            sale_price: '',
            rating: '',
            image: '',
            status: '1',
            description: ''
        }
     }"
     class="fixed inset-0 hidden items-center justify-center z-50">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40" onclick="$('#bookModal').hide()"></div>

    <!-- Modal Box -->
 <div class="bg-white p-8 rounded-2xl shadow-2xl w-[700px] max-w-[95%] relative z-10
            max-h-[90vh] overflow-y-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800" id="book_label">
            Add Book
        </h2>

        <form id="bookForm" class="space-y-6">

            <input type="hidden" name="book_id" x-model="form.book_id" id="book_id">
            <input type="hidden" name="existing_image" x-model="exiting_image" id="existing_image">

            <!-- Name -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Book Name</label>
                <input type="text" name="name" x-model="form.name"
                       placeholder="Enter book name"
                       class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
            </div>

            <!-- Prices -->
            <div class="flex gap-4">
                <div class="w-full">
                    <label class="block text-gray-700 font-medium mb-2">Regular Price</label>
                    <input type="number" step="0.01" name="regular_price"
                           x-model="form.regular_price"
                           class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>

                <div class="w-full">
                    <label class="block text-gray-700 font-medium mb-2">Sale Price</label>
                    <input type="number" step="0.01" name="sale_price"
                           x-model="form.sale_price"
                           class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>
            </div>

            <!-- Rating + Status -->
            <div class="flex gap-4">
                <div class="w-full">
                    <label class="block text-gray-700 font-medium mb-2">Rating (0 – 5)</label>
                    <input type="number" step="0.1" max="5" min="0"
                           name="rating" x-model="form.rating"
                           class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>

                <div class="w-full">
                    <label class="block text-gray-700 font-medium mb-2">Status</label>
                    <select name="status" x-model="form.status"
                            class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Author Name</label>
                <textarea name="description" rows="3"
                          x-model="form.description"
                          class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]"
                          placeholder="Book description"></textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Book Image</label>
                <input type="file" name="image" accept=".jpg,.jpeg,.png"
                       x-ref="fileInput"
                       @change="
                           const file = $refs.fileInput.files[0];
                           if (file) {
                               const reader = new FileReader();
                               reader.onload = e => previewUrl = e.target.result;
                               reader.readAsDataURL(file);
                           }
                       "
                       class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">

                <div class="mt-4 flex justify-center" x-show="previewUrl">
                    <img :src="previewUrl"
                         class="max-h-[200px] rounded-lg shadow border object-cover">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="$('#bookModal').hide()"
                        class="px-5 py-2 border rounded-lg">
                    Cancel
                </button>

                <button type="submit"
                        class="bg-[#006400] text-white px-5 py-2 rounded-lg"
                        id="save_book">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteBookModal" x-data="{ open: false, deleteId: null }">
    <template x-if="open">
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="absolute inset-0 bg-black/40" @click="open = false"></div>
            <div class="bg-white p-6 rounded-xl shadow-xl w-[400px] relative z-10">
                <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>
                <p class="text-gray-600 mb-6">Are you sure you want to delete this book?</p>

                <div class="flex justify-end gap-3">
                    <button @click="open = false"
                            class="px-4 py-1 border rounded-lg">
                        Cancel
                    </button>

                    <button @click="deleteBook(deleteId)"
                            class="px-4 py-1 bg-red-600 text-white rounded-lg">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
