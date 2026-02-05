<div id="marqueeModal"
     x-data="{
        form: {
            marquee_id: 0,
            content: '',
            status: '1'
        }
     }"
     class="fixed inset-0 hidden items-center justify-center z-50">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40"
         onclick="$('#marqueeModal').hide()"></div>

    <!-- Modal Box -->
    <div class="bg-white p-6 rounded-2xl shadow-2xl w-[600px] max-w-[95%] relative z-10">

        <h2 class="text-2xl font-bold mb-5 text-gray-800"
            id="marquee_label">
            Add Marquee
        </h2>

        <form id="marqueeForm" class="space-y-5">

            <!-- Hidden ID -->
            <input type="hidden"
                   name="marquee_id"
                   x-model="form.marquee_id">

            <!-- Content -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Marquee Text
                </label>

                <textarea
                    name="content"
                    rows="4"
                    x-model="form.content"
                    placeholder="Enter marquee text here..."
                    class="w-full border border-gray-300 rounded-lg p-3
                           focus:outline-none focus:ring-2 focus:ring-[#006400]"></textarea>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Status
                </label>

                <select
                    name="status"
                    x-model="form.status"
                    class="w-full border border-gray-300 rounded-lg p-2
                           focus:outline-none focus:ring-2 focus:ring-[#006400]">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button"
                        onclick="$('#marqueeModal').hide()"
                        class="px-5 py-2 rounded-lg border border-gray-300
                               hover:bg-gray-100">
                    Cancel
                </button>

                <button type="submit"
                        id="save_marquee"
                        class="bg-[#006400] text-white px-5 py-2
                               rounded-lg hover:bg-[#004d00]">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>
