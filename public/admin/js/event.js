$(function () {

    // CREATE
    $("#createEventBtn").on("click", function () {

        let modal  = document.getElementById("eventModal");
        let alpine = modal.__x.$data;

        alpine.form = {
            event_id: 0,
            title: '',
            description: '',
            mode: '',
            status: '1'
        };

        $("#event_date").val('');
        $("#start_time").val('');
        $("#end_time").val('');

        $("#event_label").text("Add Event");
        $("#save_event").text("Save");
        $("#eventModal").css("display", "flex");
    });

    // EDIT
    $(document).on("click", ".editEventBtn", function () {

        let modal  = document.getElementById("eventModal");
        let alpine = modal.__x.$data;

        alpine.form.event_id    = $(this).data("id");
        alpine.form.title       = $(this).data("title");
        alpine.form.description = $(this).data("description");
        alpine.form.mode        = $(this).data("mode");
        alpine.form.status      = $(this).data("status");

         $("#event_date").val($(this).data("date"));
        $("#start_time").val($(this).data("start"));
        $("#end_time").val($(this).data("end"));

        $("#event_label").text("Edit Event");
        $("#save_event").text("Update");
        $("#eventModal").css("display", "flex");
    });

    // SAVE
    $("#eventForm").on("submit", function (e) {
        e.preventDefault();

        let fields = [
            { id: "#title", msg: "Title required" },
            { id: "#description", msg: "Description required" },
            { id: "#event_date", msg: "Date required" },
            { id: "#start_time", msg: "Start time required" },
            { id: "#end_time", msg: "End time required" },
            { id: "#mode", msg: "Mode required" }
        ];

        for (let f of fields) {
            let el = $(f.id);
           if (!el.val()) {
    showToast(f.msg, "error", 2000);
    return;
}
        }

        let formData = new FormData(this);

        sendRequest(
            "/admin/event/save",
            formData,
            "POST",
            function (res) {
                showToast(res.message, "success", 2000);
                $("#eventModal").hide();
                reloadEventList();
            }
        );
    });

    // DELETE
    $(document).on("click", ".btnDeleteEvent", function () {

    let id = $(this).data("id");

    let modal = document.getElementById("deleteEventModal");
    let alpine = modal.__x.$data;

    alpine.deleteId = id;
    alpine.open = true;
});

    window.deleteEvent = function (id) {
        sendRequest(
            "/admin/event/delete",
            { id },
            "POST",
            function () {
                showToast("Event deleted successfully!", "success", 2000);
                 let modal = document.getElementById("deleteEventModal");
            modal.__x.$data.open = false;
                reloadEventList();
            }
        );
    };

    function reloadEventList() {
        $.get("/admin/event/list", function (html) {
            $("#eventTableBody").html(
                $(html).find("#eventTableBody").html()
            );
        });
    }
});
