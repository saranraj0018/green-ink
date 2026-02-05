$(function () {

    // ===== CREATE BOOK =====
    $(document).on("click", "#createBookBtn", function () {

        document.getElementById("bookForm").reset();

        let modal  = document.getElementById("bookModal");
        let alpine = modal.__x.$data;

        alpine.previewUrl = '';
        alpine.exiting_image = '';
        alpine.form.book_id = 0;
        alpine.form.name = '';
        alpine.form.regular_price = '';
        alpine.form.sale_price = '';
        alpine.form.rating = '';
        alpine.form.status = 1;
        alpine.form.description = '';

        $("#bookModal").css("display", "flex");
        $("#book_label").text("Add Book");
        $("#save_book").text("Save");
    });

    // ===== EDIT BOOK =====
    $(document).on("click", ".editBookBtn", function () {

        let id     = $(this).data("id");
        let name   = $(this).data("name");
        let regular_price = $(this).data("regular_price");
        let sale_price    = $(this).data("sale_price");
        let rating = $(this).data("rating");
        let status = $(this).data("status");
        let image  = $(this).data("image");
        let description = $(this).data("description");

        $("#bookModal").css("display", "flex");
        $("#book_label").text("Edit Book");
        $("#save_book").text("Update");

        let modal  = document.getElementById("bookModal");
        let alpine = modal.__x.$data;

        alpine.previewUrl = image || '';
        alpine.exiting_image = image || '';
        alpine.form.book_id = id;
        alpine.form.name = name;
        alpine.form.regular_price = regular_price;
        alpine.form.sale_price = sale_price;
        alpine.form.rating = rating;
        alpine.form.status = status;
        alpine.form.description = description;
    });

    // ===== SAVE / UPDATE =====
    $(document).on("submit", "#bookForm", function (e) {
        e.preventDefault();

        let fields = [
            { id: "input[name='name']", condition: v => v === "", message: "Book name is required" },
            { id: "input[name='regular_price']", condition: v => v === "", message: "Regular price is required" },
            { id: "input[name='sale_price']", condition: v => v === "", message: "Sale price is required" },
            { id: "select[name='status']", condition: v => v === "", message: "Status is required" },
            { id: "input[name='image']", condition: v => v === "", message: "Book image is required" },
        ];

        // Skip image validation if existing image is present
        if ($('#existing_image').val()) {
            fields = fields.filter(f => f.id !== "input[name='image']");
        }

        let isValid = true;
        for (const field of fields) {
            const val = $(field.id).val();
            if (field.condition(val)) {
                showToast(field.message, "error", 2000);
                isValid = false;
                break; // stop at first invalid field
            }
        }

        if (!isValid) return;

        // ===== SALE PRICE VALIDATION =====
        let regularPrice = parseFloat($("input[name='regular_price']").val()) || 0;
        let salePrice = parseFloat($("input[name='sale_price']").val());

        if (!isNaN(salePrice) && salePrice > regularPrice) {
            showToast("Sale price cannot be greater than regular price", "error", 2500);
            return;
        }

        let formData = new FormData(this);

        sendRequest(
            "/admin/book/save",
            formData,
            "POST",
            function (res) {
                if (res.success) {
                    showToast(res.message, "success", 2000);

                    setTimeout(() => {
                        $("#bookModal").hide();

                        let modal = document.getElementById("bookModal");
                        let alpine = modal.__x.$data;

                        alpine.previewUrl = '';
                        alpine.form = {
                            book_id: 0,
                            name: '',
                            regular_price: '',
                            sale_price: '',
                            rating: '',
                            status: 1,
                            description: ''
                        };

                        document.getElementById("bookForm").reset();
                        reloadBookList();
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
                    showToast(msg, "error", 2500);
                } else {
                    showToast(err.message || "Unexpected error", "error", 2000);
                }
            }
        );
    });

    // ===== DELETE =====
    $(document).on("click", ".btnDeleteBook", function () {
        let id = $(this).data("id");
        let modal = document.querySelector('#deleteBookModal');
        let alpine = modal.__x.$data;

    alpine.deleteId = id;
    alpine.open = true;
});

    window.deleteBook = function (id) {
        sendRequest(
            "/admin/book/delete",
            { id: id },
            "POST",
            function() {
                    showToast("Book deleted successfully!", "success", 2000);
                 let modal = document.getElementById("deleteBookModal");
            modal.__x.$data.open = false;
                reloadBookList();
            }
        );
    };

    // ===== HELPERS =====
    function reloadBookList() {
        $.get("/admin/book/list", function (html) {
            let $tbody = $(html).find("#bookTableBody").html();
            $("#bookTableBody").html($tbody);
        });
    }

});
