<div id="careerModal" x-data="{
    form: {
        career_id: 0,
        title: '',
        department: '',
        description: '',
        mode: '',
        experience: '',
        skills: '',
        location: '',
        status: '1'
    }
}" class="fixed inset-0 hidden flex items-center justify-center z-50">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40 z-40" onclick="$('#careerModal').hide()"></div>

    <!-- Modal -->
    <div
        class="relative bg-white p-8 rounded-2xl shadow-2xl
                w-[700px] max-w-[95%] z-50 pointer-events-auto">

        <h2 class="text-2xl font-bold mb-6" id="career_label">
            Add Career
        </h2>

        <form id="careerForm" class="space-y-6">

            <input type="hidden" name="career_id" x-model="form.career_id">

            <!-- Job Title + Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Job Title</label>
                    <input type="text" id="title" name="title" x-model="form.title"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>

                <div>
                    <label>Department</label>
                    <input type="text" id="department" name="department" x-model="form.department"
                        class="form-input w-full border border-gray-300 rounded-lg p-2
                  focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label>Description</label>
                <textarea id="description" name="description" x-model="form.description" rows="3"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]"></textarea>
            </div>

            <!-- Mode + Experience -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Mode</label>
                    <input type="text" id="mode" name="mode" x-model="form.mode"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>

                <div>
                    <label>Experience</label>
                    <input type="text" id="experience" name="experience" x-model="form.experience"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>
            </div>

            <!-- Skills + Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Skills</label>
                    <input type="text" id="skills" name="skills" x-model="form.skills"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>

                <div>
                    <label>Location</label>
                    <input type="text" id="location" name="location" x-model="form.location"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>
                
                <div>
                    <label>Status</label>
                    <select id="status" name="status" x-model="form.status"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="$('#careerModal').hide()"
                    class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100"">
                    Cancel
                </button>

                <button type="submit" id="save_career"
                    class="bg-[#006400] text-white px-5 py-2 rounded-lg hover:bg-[#006400]">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>


<!-- DELETE MODAL -->
<div id="deleteCareerModal" x-data="{ open: false, deleteId: null }">
    <template x-if="open">
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="absolute inset-0 bg-black/40" @click="open = false"></div>

            <div class="bg-white p-6 rounded-xl w-[400px]">
                <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>
                <p class="mb-6">Delete this career?</p>

                <div class="flex justify-end gap-3">
                    <button @click="open = false" class="border px-4 py-1 rounded">
                        Cancel
                    </button>
                    <button @click="deleteCareer(deleteId)" class="bg-red-600 text-white px-4 py-1 rounded">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
