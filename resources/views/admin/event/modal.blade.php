<div id="eventModal"
     x-data="{
        form: {
            event_id: 0,
            title: '',
            description: '',
            event_date: '',
            start_time: '',
            end_time: '',
            mode: '',
            status: '1'
        }
     }"
     class="fixed inset-0 hidden items-center justify-center z-50">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40" onclick="$('#eventModal').hide()"></div>

    <!-- Modal -->
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-[700px] max-w-[95%] relative z-10">

        <h2 class="text-2xl font-bold mb-6" id="event_label">Add Event</h2>

        <form id="eventForm" class="space-y-6">

            <input type="hidden" name="event_id" x-model="form.event_id">

            <!-- Title + Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Event Title</label>
                    <input type="text" id="title" name="title"
                           x-model="form.title"
                           class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>

                <div>
                    <label>Status</label>
                    <select id="status" name="status"
                            x-model="form.status"
                            class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label>Description</label>
                <textarea id="description" name="description"
                          x-model="form.description"
                          rows="3"
                          class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]"></textarea>
            </div>

            <!-- Date + Mode -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Event Date</label>
                    <input type="date" id="event_date" name="event_date"
                           class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>

                <div>
                    <label>Mode</label>
                    <input type="text" id="mode" name="mode"
                           x-model="form.mode"
                           placeholder="Offline / Online / Hybrid"
                           class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>
            </div>

            <!-- Time -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Start Time</label>
                    <input type="time" id="start_time" name="start_time"
                           class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>

                <div>
                    <label>End Time</label>
                    <input type="time" id="end_time" name="end_time"
                           class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#006400]">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button"
                        onclick="$('#eventModal').hide()"
                        class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100"">
                    Cancel
                </button>

                <button type="submit"
                        id="save_event"
                        class="bg-[#006400] text-white px-5 py-2 rounded-lg hover:bg-[#006400]">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>


<!-- DELETE MODAL -->
<div id="deleteEventModal" x-data="{ open: false, deleteId: null }">
    <template x-if="open">
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="absolute inset-0 bg-black/40" @click="open = false"></div>
            <div class="bg-white p-6 rounded-xl shadow-xl w-[400px] relative z-10">
                <h2 class="text-lg font-bold mb-4 text-gray-800">Confirm Delete</h2>
                <p class="text-gray-600 mb-6">Are you sure you want to delete this event?</p>
                <div class="flex justify-end gap-3">
                    <button @click="open = false"
                        class="px-4 py-1 border rounded-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <button @click="deleteEvent(deleteId)"
                        class="px-4 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
