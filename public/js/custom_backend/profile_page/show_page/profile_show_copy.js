/* ==========================================================
   USER PROFILE SHOW - COPY INFORMATION
========================================================== */

(function (window) {
    "use strict";

    const ProfileShow = window.ProfileShow;

    ProfileShow.initCopy = function () {
        const copyButtons = ProfileShow.state.copyButtons;

        if (!copyButtons || !copyButtons.length) {
            return;
        }

        /* ==========================================
           COPY PROFILE INFORMATION
        ========================================== */

        copyButtons.forEach(function (button) {
            button.addEventListener("click", async function () {
                const value = button.dataset.copy;

                if (!value) {
                    return;
                }

                try {
                    /* Copy information to clipboard. */

                    await navigator.clipboard.writeText(value);

                    const icon = button.querySelector("i");

                    /* Success animation. */

                    button.classList.add("is-copied");

                    if (icon) {
                        icon.classList.remove("fa-copy");
                        icon.classList.add("fa-check");
                    }

                    /* Success notification. */

                    if (typeof Swal !== "undefined") {
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: "success",
                            title: "Copied successfully",
                            text: value,
                            showConfirmButton: false,
                            timer: 1800,
                            timerProgressBar: true,
                            customClass: {
                                popup: "backend-swal-popup",
                                title: "backend-swal-title",
                            },
                        });
                    }

                    /* Reset button appearance. */

                    window.setTimeout(function () {
                        button.classList.remove("is-copied");

                        if (icon) {
                            icon.classList.remove("fa-check");
                            icon.classList.add("fa-copy");
                        }
                    }, 1800);
                } catch (error) {
                    console.error(
                        "[User Profile] Clipboard operation failed:",
                        error,
                    );

                    /* Error notification. */

                    if (typeof Swal !== "undefined") {
                        Swal.fire({
                            icon: "error",
                            title: "Unable to copy",
                            text: "Please copy the information manually.",
                        });
                    } else {
                        window.alert(
                            "Unable to copy. Please copy it manually.",
                        );
                    }
                }
            });
        });
    };
})(window);
