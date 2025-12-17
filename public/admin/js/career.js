$(function () {

    // ======================
    // CREATE CAREER
    // ======================
    $("#createCareerBtn").on("click", function () {

        let modal  = document.getElementById("careerModal");
        let alpine = modal.__x.$data;

        alpine.form = {
            career_id: 0,
            title: '',
            description: '',
            mode: '',
            experience: '',
            skills: '',
            location: '',
            status: '1'
        };

        $("#career_label").text("Add Career");
        $("#save_career").text("Save");
        $("#careerModal").css("display", "flex");
    });


    // ======================
    // EDIT CAREER
    // ======================
    $(document).on("click", ".editCareerBtn", function () {

        let modal  = document.getElementById("careerModal");
        let alpine = modal.__x.$data;

        alpine.form.career_id  = $(this).data("id");
        alpine.form.title      = $(this).data("title");
        alpine.form.description= $(this).data("description");
        alpine.form.mode       = $(this).data("mode");
        alpine.form.experience = $(this).data("experience");
        alpine.form.skills     = $(this).data("skills");
        alpine.form.location   = $(this).data("location");
        alpine.form.status     = $(this).data("status");

        $("#career_label").text("Edit Career");
        $("#save_career").text("Update");
        $("#careerModal").css("display", "flex");
    });


    // ======================
    // SAVE CAREER
    // ======================
    $("#careerForm").on("submit", function (e) {
        e.preventDefault();

        let fields = [
            { id: "#title", msg: "Title required" },
            { id: "#description", msg: "Description required" },
            { id: "#mode", msg: "Mode required" },
            { id: "#experience", msg: "Experience required" },
            { id: "#skills", msg: "Skills required" },
            { id: "#location", msg: "Location required" }
        ];

        for (let f of fields) {
            if (!$(f.id).val()) {
                showToast(f.msg, "error", 2000);
                return;
            }
        }

        let formData = new FormData(this);

        sendRequest(
            "/admin/career/save",
            formData,
            "POST",
            function (res) {
                showToast(res.message, "success", 2000);
                $("#careerModal").hide();
                reloadCareerList();
            }
        );
    });


    // ======================
    // DELETE CAREER (OPEN MODAL)
    // ======================
    $(document).on("click", ".btnDeleteCareer", function () {

        let modal  = document.getElementById("deleteCareerModal");
        let alpine = modal.__x.$data;

        alpine.deleteId = $(this).data("id");
        alpine.open = true;
    });


    // ======================
    // DELETE CAREER (CONFIRM)
    // ======================
    window.deleteCareer = function (id) {
        sendRequest(
            "/admin/career/delete",
            { id },
            "POST",
            function () {
                showToast("Career deleted successfully!", "success", 2000);
                let modal = document.getElementById("deleteCareerModal");
                modal.__x.$data.open = false;
                reloadCareerList();
            }
        );
    };


    // ======================
    // RELOAD TABLE
    // ======================
    function reloadCareerList() {
        $.get("/admin/career/list", function (html) {
            $("#careerTableBody").html(
                $(html).find("#careerTableBody").html()
            );
        });
    }

});
