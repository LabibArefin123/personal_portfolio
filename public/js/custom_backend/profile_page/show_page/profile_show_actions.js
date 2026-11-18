/* ==========================================================
   USER PROFILE SHOW - PROFILE ACTIONS
========================================================== */

(function (window) {
    "use strict";

    const ProfileShow = window.ProfileShow;

    ProfileShow.initActions = function () {
        const editButtons = ProfileShow.state.editButtons;

        if (!editButtons || !editButtons.length) {
            return;
        }

        /* ==========================================
           EDIT PROFILE CONFIRMATION
        ========================================== */

        editButtons.forEach(function (button) {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                const destination = button.getAttribute("href");

                if (!destination) {
                    return;
                }

                /* SweetAlert confirmation. */

                if (typeof Swal !== "undefined") {
                    Swal.fire({
                        title: "Edit your profile?",
                        text: "You can update your personal and contact information.",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonText: "Yes, continue",
                        cancelButtonText: "Cancel",
                        reverseButtons: true,
                        buttonsStyling: true,
                        customClass: {
                            popup: "backend-swal-popup",
                            title: "backend-swal-title",
                            htmlContainer: "backend-swal-message",
                        },
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            window.location.href = destination;
                        }
                    });
                } else {
                    if (window.confirm("Do you want to edit your profile?")) {
                        window.location.href = destination;
                    }
                }
            });
        });
    };
})(window);
