$(document).ready(function () {

    $(".counter").each(function () {
        let $this = $(this);
        let target = parseInt($this.data("target"));

        $({ countNum: 0 }).animate(
            { countNum: target },
            {
                duration: 2000,
                easing: "swing",
                step: function () {
                    let value = Math.floor(this.countNum);

                    // Display while counting
                    if (target >= 1000) {
                        // show 1k, 2k, 50k, etc
                        $this.text(Math.floor(value / 1000) + "k+");
                    } else if (target === 95) {
                        // success rate shows percentage
                        $this.text(value + "%");
                    } else {
                        // normal numbers
                        $this.text(value + "+");
                    }
                },
                complete: function () {
                    // Final correct display
                    if (target >= 1000) {
                        $this.text(Math.floor(target / 1000) + "k+");
                    } else if (target === 95) {
                        $this.text(target + "%");
                    } else {
                        $this.text(target + "+");
                    }
                }
            }
        );
    });

});
//search bar//
    
    $(document).ready(function () {
        $("#courseSearch").on("input", function () {
            console.log("Search: " + $(this).val());
        });
    });

    // jQuery Form Validation

$("#contactForm").on("submit", function (e) {
    let valid = true;
    $(this).find("input, textarea").each(function () {
        if (!$(this).val()) {
            $(this).addClass("border-red-500");
            valid = false;
        } else {
            $(this).removeClass("border-red-500");
        }
    });

    if (!valid) {
        e.preventDefault();
        alert("Please fill out all fields.");
    }
});



//login//
  // Open Login Modal (Desktop & Mobile)
  $("#openLogin, .openLoginBtn,").on("click", function () {
      $("#loginModal").removeClass("hidden");
  });

  // Close Login Modal when clicking X
  $("#closeModal").on("click", function () {
      $("#loginModal").addClass("hidden");
  });

  // Close when clicking outside modal content
  $(document).on("click", function (e) {
      if ($(e.target).is("#loginModal")) {
          $("#loginModal").addClass("hidden");
      }
  });

  <script src="/user/js/home.js"></script>

