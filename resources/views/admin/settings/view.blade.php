<x-layouts.admin>
    <div class="p-4">

        <!-- Header -->
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Course ID Prefix</h2>

            {{-- <button id="createPrefixBtn"
                class="bg-[#006400] text-white px-4 py-2 rounded">
                Create / Edit
            </button> --}}
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">

                <thead>
                    <tr class="bg-[#006400] text-white text-sm uppercase tracking-wider">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Prefix</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody id="prefixTableBody" class="divide-y divide-gray-200">
                    @foreach($prefixes as $prefix)
                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-4 py-3 font-medium">
                                {{ $prefix->id }}
                            </td>

                            <td class="px-4 py-3 max-w-xl">
                                <p class="text-gray-700 font-medium">
                                    {{ $prefix->value }}
                                </p>
                            </td>

                            <td class="px-4 py-3 flex justify-center gap-4">

                                <!-- Edit -->
                                <button
                                    class="text-blue-600 hover:text-blue-800 transition editPrefixBtn"
                                    data-id="{{ $prefix->id }}"
                                    data-value="{{ $prefix->value }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>


        <!-- Modal -->
        <div id="prefixModal"
             x-data="{
                form: {
                    prefix_id: 0,
                    value: ''
                }
             }"
             class="fixed inset-0 hidden items-center justify-center z-50">

            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black/40"
                 onclick="$('#prefixModal').hide()"></div>

            <!-- Modal Box -->
            <div class="bg-white p-6 rounded-2xl shadow-2xl w-[500px] max-w-[95%] relative z-10">

                <h2 class="text-2xl font-bold mb-5 text-gray-800"
                    id="prefix_label">
                    Add / Edit Prefix
                </h2>

                <form id="prefixForm" class="space-y-5">

                    <!-- Hidden ID -->
                    <input type="hidden"
                           name="prefix_id"
                           x-model="form.prefix_id">

                    <!-- Prefix -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            Prefix
                        </label>

                        <input type="text"
                               name="value"
                               x-model="form.value"
                               placeholder="Enter prefix (e.g., STU2026-)"
                               class="w-full border border-gray-300 rounded-lg p-3
                                      focus:outline-none focus:ring-2 focus:ring-[#006400]">
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button"
                                onclick="$('#prefixModal').hide()"
                                class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">
                            Cancel
                        </button>

                        <button type="submit"
                                id="save_prefix"
                                class="bg-[#006400] text-white px-5 py-2 rounded-lg hover:bg-[#004d00]">
                            Save
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</x-layouts.admin>

<script>
$(function () {

    /* =======================
       CREATE PREFIX
    ======================= */
    $("#createPrefixBtn").on("click", function () {
        let modal  = document.getElementById("prefixModal");
        let alpine = modal.__x.$data;

        alpine.form = {
            prefix_id: 0,
            value: ''
        };

        $("#prefix_label").text("Add / Edit Prefix");
        $("#save_prefix").text("Save");

        $("#prefixModal").css("display", "flex");
    });

    /* =======================
       EDIT PREFIX
    ======================= */
    $(document).on("click", ".editPrefixBtn", function () {
        let modal  = document.getElementById("prefixModal");
        let alpine = modal.__x.$data;

        alpine.form.prefix_id = $(this).data("id");
        alpine.form.value = $(this).data("value");

        $("#prefix_label").text("Edit Prefix");
        $("#save_prefix").text("Update");

        $("#prefixModal").css("display", "flex");
    });

    /* =======================
       SAVE PREFIX
    ======================= */
    $("#prefixForm").on("submit", function (e) {
        e.preventDefault();

        if (!$("input[name='value']").val()) {
            alert("Prefix is required"); // simple error
            return;
        }

        let formData = $(this).serialize();

        $.post("/admin/settings/save", formData, function(res){
            $("#prefixModal").hide();
            location.reload(); 
        });
    });

});
</script>
