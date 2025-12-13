$(function () {
    let allFiles = [];
    $(document).on("click", "#createCourseBtn", function () {
        let modal = document.getElementById("courseModal");
        let alpine = modal.__x.$data;

        alpine.open = true; // ← REQUIRED
        alpine.previewUrl = "";
        alpine.exiting_image = "";

        // Reset form fields
        alpine.form = {
            course_id: 0,
            category_id: "",
            title: "",
            type: "free",
            amount: "",
            hours: "",
            star_point: "",
            description: "",
            course_overview: "",
            learning_outcomes: "",
            status: "1",
            image: "",
            video_files: [],
            cover_video: "",
        };

        $("#course_label").text("Add Course");
        $("#save_course").text("Save");
    });

    $(document).on("click", ".editCourseBtn", function () {
        let id = $(this).data("id");
        let name = $(this).data("name");
        let status = $(this).data("status");
        let image = $(this).data("image");

        // open modal
        $("#courseModal").css("display", "flex");
        $("#course_label").text("Edit Course");
        $("#save_course").text("Update");

        // update Alpine state for preview
        let modal = document.getElementById("courseModal");
        let alpine = modal.__x.$data;
        alpine.previewUrl = image || "";
        alpine.exiting_image = image || "";
        alpine.form.name = name;
        alpine.form.status = status;
        alpine.form.cat_id = id;
    });

    // Use event delegation because #categoryForm may not exist initially
    $(document).on("submit", "#courseForm", function (e) {
        e.preventDefault();
        // Fields to validate
        let fields = [
            {
                id: "#title",
                condition: (val) => val === "",
                message: "Course Title is required",
            },
            {
                id: "#category_id",
                condition: (val) => val === "",
                message: "Please Select Category",
            },
            {
                id: "#type",
                condition: (val) => val === "",
                message: "Please Select Course Type",
            },
            {
                id: "#hours",
                condition: (val) => val === "",
                message: "Course Hours is required",
            },
            {
                id: "#star_point",
                condition: (val) => val === "",
                message: "Star Point is required",
            },
            {
                id: "#course_overview",
                condition: (val) => val === "",
                message: "Course Overview is required",
            },
            {
                id: "#learning_outcomes",
                condition: (val) => val === "",
                message: "Learning Outcome is required",
            },
            {
                id: "#description",
                condition: (val) => val === "",
                message: "Description is required",
            },
        ];

        if ($("#exiting_image").val()) {
            fields = fields.filter((field) => field.id !== "#course_image");
        }

        let isValid = true;
        for (const field of fields) {
            const result = validateField(field);
            if (!result) isValid = false;
        }

        if (!isValid) return;

        let formData = new FormData(this);
        sendRequest(
            "/admin/course-save",
            formData,
            "POST",
            function (res) {
                if (res.success) {
                    showToast(res.message, "success", 2000);
                    setTimeout(() => {
                        $("#courseModal").hide();
                        // Reset the form so next time it's clean
                        let modal = document.querySelector("#courseModal");
                        let alpine = modal.__x.$data;
                        alpine.form = { name: "", status: "1" };
                        alpine.previewUrl = null;
                        document.getElementById("courseForm").reset();

                        $.get("/admin/course-list", function (html) {
                            let $tbody = $(html)
                                .find("#courseTableBody")
                                .html();
                            $("#courseTableBody").html($tbody);
                        });
                    }, 500);
                } else {
                    showToast("Something went wrong!", "error", 2000);
                }
            },
            function (err) {
                if (err.errors) {
                    let msg = "";
                    $.each(err.errors, function (k, v) {
                        msg += v[0] + "<br>";
                    });
                    showToast(msg, "error", 2000);
                } else {
                    showToast(err.message || "Unexpected error", "error", 2000);
                }
            }
        );
    });

    // ==== DELETE =====
    $(document).on("click", ".btnDeleteCourse", function () {
        let id = $(this).data("id");
        let modalScope = document.querySelector("#deleteCourseModal").__x.$data;
        modalScope.deleteId = id;
        modalScope.open = true;
    });

    window.deleteCourse = function (id) {
        sendRequest(
            "/admin/course-delete",
            { id: id },
            "POST",
            function (res) {
                if (res.success) {
                    showToast("Course deleted successfully!", "success", 2000);
                    reloadCourseList();
                } else {
                    showToast(res.message, "error", 2000);
                }
                document.querySelector(
                    "#deleteCourseModal"
                ).__x.$data.open = false;
            },
            function (err) {
                showToast(err.message || "Delete failed", "error", 2000);
                document.querySelector(
                    "#deleteCourseModal"
                ).__x.$data.open = false;
            }
        );
    };

    // ===== Helpers =====
    function reloadCourseList() {
        $.get("/admin/course-list", function (html) {
            let $tbody = $(html).find("#courseTableBody").html();
            $("#courseTableBody").html($tbody);
        });
    }

    $(document).on("change", "#videos", function () {
        let files = Array.from(this.files);
        // Add new files to allFiles, avoiding duplicates
        files.forEach((file) => {
            if (!allFiles.some((f) => f.name === file.name)) {
                console.log("test0");
                allFiles.push(file);
            }
        });

        // Render preview
        let list = $("#videoList");
        list.empty();

        if (allFiles.length > 0) {
            list.removeClass("hidden");
        }

        allFiles.forEach((file, index) => {
            console.log("test1");
            list.append(`
                <li class="text-sm text-gray-700 flex justify-between items-center">
                    <span>${file.name}</span>
                    <button type="button" class="remove-file text-red-500 text-xs ml-2" data-index="${index}">Remove</button>
                </li>
            `);
        });

        // Reset input to allow selecting same file again if needed
        this.value = "";
    });

    // Remove file from preview
    $(document).on("click", ".remove-file", function () {
        let index = $(this).data("index");
        allFiles.splice(index, 1);
        $(this).parent().remove();

        if (allFiles.length === 0) {
            $("#videoList").addClass("hidden");
        }
    });

      $(document).on("change", "#cover_video", function () {
          let file = this.files[0]; // Only single file
          let list = $("#cover_videoList");
          list.empty();

          if (file) {
              list.removeClass("hidden");
              list.append(`
                <li class="text-sm text-gray-700 flex justify-between items-center">
                    <span>${file.name}</span>
                    <button type="button" id="removeVideo" class="text-red-500 text-xs ml-2">Remove</button>
                </li>
            `);
          }

          // Reset input to allow reselecting same file if removed
          this.value = "";
      });

     // Remove video
     $(document).on("click", "#removeVideo", function () {
         $("#cover_videoList").empty().addClass("hidden");
         $("#video").val(""); // clear input
     });
});
