$(function () {

    /* =======================
       CREATE MARQUEE
    ======================= */
    $("#createMarqueeBtn").on("click", function () {

        let modal  = document.getElementById("marqueeModal");
        let alpine = modal.__x.$data;

        alpine.form = {
            marquee_id: 0,
            content: '',
            status: '1'
        };

        $("#marquee_label").text("Add Marquee");
        $("#save_marquee").text("Save");

        $("#marqueeModal").css("display", "flex");
    });


    /* =======================
       EDIT MARQUEE
    ======================= */
    $(document).on("click", ".editMarqueeBtn", function () {

        let modal  = document.getElementById("marqueeModal");
        let alpine = modal.__x.$data;

        alpine.form.marquee_id = $(this).data("id");
        alpine.form.content    = $(this).data("content");
        alpine.form.status     = $(this).data("status");

        $("#marquee_label").text("Edit Marquee");
        $("#save_marquee").text("Update");

        $("#marqueeModal").css("display", "flex");
    });


    /* =======================
       SAVE MARQUEE
    ======================= */
    $("#marqueeForm").on("submit", function (e) {
        e.preventDefault();

        if (!$("textarea[name='content']").val()) {
            showToast("Marquee text required", "error", 2000);
            return;
        }

        let formData = new FormData(this);

        sendRequest(
            "/admin/marquee/save",
            formData,
            "POST",
            function (res) {
                showToast(res.message, "success", 2000);
                $("#marqueeModal").hide();
                reloadMarqueeList();
            },
            function (err) {
                console.log("VALIDATION ERROR:", err.responseJSON);
                showToast("Validation failed", "error", 3000);
            }
        );
    });


    /* =======================
       DELETE MARQUEE
    ======================= */
    $(document).on("click", ".btnDeleteMarquee", function () {

        let id = $(this).data("id");

        let modal  = document.getElementById("deleteMarqueeModal");
        let alpine = modal.__x.$data;

        alpine.deleteId = id;
        alpine.open = true;
    });


    window.deleteMarquee = function (id) {

        sendRequest(
            "/admin/marquee/delete",
            { id },
            "POST",
            function () {
                showToast("Marquee deleted successfully!", "success", 2000);

                let modal = document.getElementById("deleteMarqueeModal");
                modal.__x.$data.open = false;

                reloadMarqueeList();
            }
        );
    };


    /* =======================
       RELOAD LIST
    ======================= */
    function reloadMarqueeList() {
        $.get("/admin/marquee/list", function (html) {
            $("#marqueeTableBody").html(
                $(html).find("#marqueeTableBody").html()
            );
        });
    }

});
