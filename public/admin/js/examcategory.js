$(function () {

    // ===== CREATE =====
    $(document).on("click", "#createExamCategoryBtn", function () {
        document.getElementById("examCategoryForm").reset();
        let modal  = document.getElementById("examCategoryModal");
        let alpine = modal.__x.$data;
        alpine.previewUrl = '';
        alpine.exiting_icon = '';
        alpine.form.title = '';
        alpine.form.description = '';
        alpine.form.status = 1;
        alpine.form.cat_id = 0;
        $("#examCategoryModal").css("display", "flex");
        $("#examCategory_label").text("Add Exam Category");
        $("#save_exam_cat").text("Save");
    });

    // ===== EDIT =====
    $(document).on("click", ".editExamCategoryBtn", function () {
        let id          = $(this).data("id");
        let title       = $(this).data("title");
        let description = $(this).data("description");
        let status      = $(this).data("status");
        let icon        = $(this).data("icon");

        $("#examCategoryModal").css("display", "flex");
        $("#examCategory_label").text("Edit Exam Category");
        $("#save_exam_cat").text("Update");

        let modal  = document.getElementById("examCategoryModal");
        let alpine = modal.__x.$data;
        alpine.previewUrl = icon || '';
        alpine.exiting_icon = icon || '';
        alpine.form.title = title;
        alpine.form.description = description;
        alpine.form.status = status;
        alpine.form.cat_id = id;
    });

    // ===== SAVE (AJAX) =====
    $(document).on("submit", "#examCategoryForm", function (e) {
        e.preventDefault();

        // Fields validation
        let fields = [
            { id: "#exam_category_title", condition: val => val === "", message: "Title is required" },
            { id: "#exam_category_status", condition: val => val === "", message: "Please select status" },
            { id: "#exam_category_icon", condition: val => val === "", message: "Please upload an icon" },
        ];

        if ($('#existing_icon').val()) {
            fields = fields.filter(field => field.id !== "#exam_category_icon");
        }

        let isValid = true;
        for (const field of fields) {
            const val = $(field.id).val();
            if (field.condition(val)) {
                showToast(field.message, "error", 2000);
                isValid = false;
            }
        }
        if (!isValid) return;

        let formData = new FormData(this);
        sendRequest(
            "/admin/exam-category/save",
            formData,
            "POST",
            function(res){
                if(res.success){
                    showToast(res.message, "success", 2000);
                    setTimeout(() => {
                        $('#examCategoryModal').hide();

                        let modal = document.querySelector('#examCategoryModal');
                        let alpine = modal.__x.$data;
                        alpine.form = { title: '', description: '', status: '1', cat_id: 0, icon: '' };
                        alpine.previewUrl = null;
                        document.getElementById("examCategoryForm").reset();

                        $.get("/admin/exam-category/list", function (html) {
                            let $tbody = $(html).find("#examCategoryTableBody").html();
                            $("#examCategoryTableBody").html($tbody);
                        });
                    }, 500);
                } else {
                    showToast("Something went wrong!", "error", 2000);
                }
            },
            function(err){
                if(err.errors){
                    let msg = "";
                    $.each(err.errors, function(k,v){ msg+=v[0]+"<br>"; });
                    showToast(msg, "error", 2000);
                } else {
                    showToast(err.message || "Unexpected error", "error", 2000);
                }
            }
        );
    });

    // ===== DELETE =====
    $(document).on("click", ".btnDeleteExamCategory", function () {
        let id = $(this).data("id");
        let modal = document.querySelector('#deleteExamCategoryModal');
        let alpine = modal.__x.$data;

        alpine.deleteId = id;
        alpine.open = true;
    });

    window.deleteExamCategory = function (id) {
        sendRequest(
            "/admin/exam-category/delete",
            { id: id },
            "POST",
            function() {
                showToast("Exam category deleted successfully!", "success", 2000);
                let modal = document.getElementById("deleteExamCategoryModal");
                modal.__x.$data.open = false;
                reloadExamCategoryList();
            }
        );
    };

    // ===== Helper: reload table =====
    function reloadExamCategoryList() {
        $.get("/admin/exam-category/list", function (html) {
            let $tbody = $(html).find("#examCategoryTableBody").html();
            $("#examCategoryTableBody").html($tbody);
        });
    }
});
