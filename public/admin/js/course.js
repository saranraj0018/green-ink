$(function () {
    let selectedCourseVideos = [];

    function openModal() {
        $("#courseModal").removeClass("hidden");
    }

    function closeModal() {
        $("#courseModal").addClass("hidden");
        $("#courseForm")[0].reset();
        $("#imagePreview").addClass("hidden");
        $("#previewImg").attr("src", "");
        $("#exiting_image").val("");
    }

    // ADD COURSE
    $("#createCourseBtn").click(function () {
        $("#course_label").text("Add Course");
        $("#course_id").val("");
        openModal();
    });

    // CLOSE MODAL
    $("#closeModal, #closeModalBtn").click(closeModal);

    // IMAGE PREVIEW
    $("#course_image").change(function () {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#previewImg").attr("src", e.target.result);
                $("#imagePreview").removeClass("hidden");
            };
            reader.readAsDataURL(file);
        }
    });

    // REMOVE IMAGE
    $("#removeImage").click(function () {
        $("#course_image").val("");
        $("#previewImg").attr("src", "");
        $("#imagePreview").addClass("hidden");
        $("#exiting_image").val("");
    });

    // EDIT COURSE
    $(document).on("click", ".editCourseBtn", function () {
        $("#course_label").text("Edit Course");

        $("#course_id").val($(this).data("id"));
        $("#title").val($(this).data("title"));
        $("#category_id").val($(this).data("category"));
        $("#type").val($(this).data("type"));
        $("#amount").val($(this).data("amount"));
        $("#hours").val($(this).data("hours"));
        $("#star_point").val($(this).data("star"));
        $("#description").val($(this).data("description"));
        $("#course_overview").val($(this).data("overview"));
        $("#learning_outcomes").val($(this).data("outcomes"));
        $("#status").val($(this).data("status"));
        $("#instructor").val($(this).data("instructor"));

        let image = $(this).data("image");
        if (image) {
            $("#previewImg").attr("src", image);
            $("#imagePreview").removeClass("hidden");
            $("#exiting_image").val(image);
        }
        /* Cover video */
        let coverVideo = $(this).data("cover_video");
        if (coverVideo) {
            $("#coverVideoName").text(coverVideo);
            $("#coverVideoPreview").removeClass("hidden");
            $("#exiting_cover_video").val(coverVideo);
        }

        /* Course videos */
        let videos = $(this).data("course_videos") || [];
        $("#courseVideoList").empty();

        if (videos.length) {
            videos.forEach((video, index) => {
                $("#courseVideoList").append(`
                    <li class="flex justify-between items-center text-sm">
                        <span>${video.file_name}</span>
                        <button type="button"
                            class="removeExistingVideo text-red-600"
                            data-index="${index}">
                            Remove
                        </button>
                    </li>
                `);
            });
            console.log(videos);
            $("#courseVideoList").removeClass("hidden");
            $("#exiting_course_videos").val(JSON.stringify(videos));
        }
        openModal();
    });

    $("#cover_video").on("change", function () {
        let file = this.files[0];
        if (!file) return;

        $("#coverVideoName").text(file.name);
        $("#coverVideoPreview").removeClass("hidden");
        $("#exiting_cover_video").val("");
    });

    $("#removeCoverVideo").on("click", function () {
        $("#cover_video").val("");
        $("#coverVideoName").text("");
        $("#coverVideoPreview").addClass("hidden");
        $("#exiting_cover_video").val("");
    });

    /* ---------- COURSE VIDEOS (MULTIPLE) ---------- */

    $("#course_videos").on("change", function () {
        let files = Array.from(this.files);

        files.forEach((file) => {
            selectedCourseVideos.push(file);
        });

        renderCourseVideos();
        syncCourseVideoInput();
    });
    function renderCourseVideos() {
        $("#courseVideoList").empty();

        if (!selectedCourseVideos.length) {
            $("#courseVideoList").addClass("hidden");
            return;
        }

        selectedCourseVideos.forEach((file, index) => {
            $("#courseVideoList").append(`
            <li class="flex justify-between items-center text-sm">
                <span>${file.name}</span>
                <button type="button"
                    class="removeNewVideo text-red-600"
                    data-index="${index}">
                    Remove
                </button>
            </li>
        `);
        });

        $("#courseVideoList").removeClass("hidden");
    }

    $(document).on("click", ".removeNewVideo", function () {
        let index = $(this).data("index");

        selectedCourseVideos.splice(index, 1);

        renderCourseVideos();
        syncCourseVideoInput();
    });
    function syncCourseVideoInput() {
        let dataTransfer = new DataTransfer();

        selectedCourseVideos.forEach((file) => {
            dataTransfer.items.add(file);
        });

        document.getElementById("course_videos").files = dataTransfer.files;
    }
    function closeModal() {
        $("#courseModal").addClass("hidden");
        $("#courseForm")[0].reset();

        selectedCourseVideos = [];
        $("#courseVideoList").empty().addClass("hidden");

        $("#imagePreview").addClass("hidden");
        $("#previewImg").attr("src", "");
        $("#exiting_image").val("");
    }

    $(document).on("click", ".removeExistingVideo", function () {
        let index = $(this).data("index");
        let existing = JSON.parse($("#exiting_course_videos").val() || "[]");

        existing.splice(index, 1);
        $("#exiting_course_videos").val(JSON.stringify(existing));
        $(this).parent().remove();
    });
    // Use event delegation because #categoryForm may not exist initially
    $(document).on("submit", "#courseForm", function (e) {
        e.preventDefault();

        /* ---------- VALIDATION ---------- */

        let fields = [
            { id: "#title", message: "Course Title is required" },
            { id: "#category_id", message: "Please Select Category" },
            { id: "#type", message: "Please Select Course Type" },
            { id: "#hours", message: "Course Hours is required" },
            { id: "#star_point", message: "Star Point is required" },
            { id: "#course_overview", message: "Course Overview is required" },
            { id: "#instructor", message: "Course Instructor is required" },
            {
                id: "#learning_outcomes",
                message: "Learning Outcome is required",
            },
            { id: "#description", message: "Description is required" },
        ];

        let isValid = true;
        fields.forEach((f) => {
            if ($(f.id).val().trim() === "") {
                showToast(f.message, "error", 2000);
                isValid = false;
            }
        });

        if (!isValid) return;

        /* ---------- SUBMIT ---------- */

        let formData = new FormData(this);

        sendRequest(
            "/admin/course-save",
            formData,
            "POST",

            /* SUCCESS */
            function (res) {
                if (!res.success) {
                    showToast(
                        res.message || "Something went wrong",
                        "error",
                        2000
                    );
                    return;
                }

                showToast(res.message, "success", 2000);

                setTimeout(() => {
                    closeCourseModal();
                    reloadCourseList();
                }, 500);
            },

            /* ERROR */
            function (err) {
                if (err.errors) {
                    let msg = "";
                    $.each(err.errors, function (k, v) {
                        msg += v[0] + "<br>";
                    });
                    showToast(msg, "error", 2500);
                } else {
                    showToast(err.message || "Unexpected error", "error", 2000);
                }
            }
        );
    });

    function closeCourseModal() {
        $("#courseModal").addClass("hidden");

        // Reset form
        $("#courseForm")[0].reset();

        // Image preview
        $("#imagePreview").addClass("hidden");
        $("#previewImg").attr("src", "");
        $("#exiting_image").val("");

        // Cover video
        $("#coverVideoPreview").addClass("hidden");
        $("#coverVideoName").text("");
        $("#exiting_cover_video").val("");

        // Course videos
        selectedCourseVideos = [];
        $("#courseVideoList").empty().addClass("hidden");
        $("#course_videos").val("");
    }
    function reloadCourseList() {
        $.get("/admin/course-list", function (html) {
            let $tbody = $(html).find("#courseTableBody").html();
            $("#courseTableBody").html($tbody);
        });
    }
    $("#closeModal, #closeModalBtn").on("click", function () {
        closeCourseModal();
    });

    // ==== DELETE =====


    // ===== Helpers =====
    function reloadCourseList() {
        $.get("/admin/course-list", function (html) {
            let $tbody = $(html).find("#courseTableBody").html();
            $("#courseTableBody").html($tbody);
        });
    }

    let deleteCourseId = null;

    /* OPEN DELETE MODAL */
    $(document).on("click", ".btnDeleteCourse", function () {
        deleteCourseId = $(this).data("id");
        $("#deleteCourseModal").removeClass("hidden");
    });

    /* CLOSE MODAL */
    $("#cancelDelete").on("click", function () {
        deleteCourseId = null;
        $("#deleteCourseModal").addClass("hidden");
    });

    /* CONFIRM DELETE */
    $("#confirmDelete").on("click", function () {
        if (!deleteCourseId) return;
        sendRequest(
            "/admin/course-delete",
            { id: deleteCourseId },
            "POST",
            function (res) {
                if (res.success) {
                    showToast(res.message, "success", 2000);
                    reloadCourseList();
                } else {
                    showToast(res.message, "error", 2000);
                }

                $("#deleteCourseModal").addClass("hidden");
                deleteCourseId = null;
            },
            function (err) {
                showToast(err.message || "Delete failed", "error", 2000);
                $("#deleteCourseModal").addClass("hidden");
                deleteCourseId = null;
            }
        );
    });

});
