/* ==========================================================
   PROFILE EDIT - CHANGE DETECTION
========================================================== */

(function (window, document) {
    "use strict";

    const ProfileEdit = window.ProfileEdit;

    ProfileEdit.initChanges = function () {
        const state = ProfileEdit.state;
        const form = state.form;

        /* ==========================================
           01. SCROLL REVEAL ANIMATION
        ========================================== */

        const revealItems = document.querySelectorAll(".profile-edit-reveal");

        if ("IntersectionObserver" in window) {
            const revealObserver = new IntersectionObserver(
                function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("is-visible");
                            observer.unobserve(entry.target);
                        }
                    });
                },
                {
                    threshold: 0.1,
                    rootMargin: "0px 0px -25px 0px",
                },
            );

            revealItems.forEach(function (item, index) {
                item.style.transitionDelay = `${Math.min(index * 65, 260)}ms`;

                revealObserver.observe(item);
            });
        } else {
            revealItems.forEach(function (item) {
                item.classList.add("is-visible");
            });
        }

        /* ==========================================
           02. UNSAVED CHANGES DETECTION
        ========================================== */

        ProfileEdit.checkFormChanges = function () {
            let changed = false;

            form.querySelectorAll(
                "input:not([type='file']):not([type='hidden'])",
            ).forEach(function (input) {
                if (state.initialValues.get(input.name) !== input.value) {
                    changed = true;
                }
            });

            if (state.imageInput && state.imageInput.files.length > 0) {
                changed = true;
            }

            state.isDirty = changed;

            if (state.unsavedIndicator) {
                state.unsavedIndicator.classList.toggle("is-dirty", changed);

                const text = state.unsavedIndicator.querySelector("small");

                if (text) {
                    text.textContent = changed
                        ? "Unsaved changes"
                        : "All changes saved";
                }
            }

            return changed;
        };

        form.addEventListener("input", ProfileEdit.checkFormChanges);

        form.addEventListener("change", ProfileEdit.checkFormChanges);

        /* ==========================================
           03. BROWSER EXIT WARNING
        ========================================== */

        window.addEventListener("beforeunload", function (event) {
            if (state.isDirty && !state.isSubmitting) {
                event.preventDefault();
                event.returnValue = "";
            }
        });

        /* ==========================================
           04. CANCEL BUTTON CONFIRMATION
        ========================================== */

        if (state.cancelButton) {
            state.cancelButton.addEventListener("click", function (event) {
                if (!ProfileEdit.checkFormChanges()) {
                    return;
                }

                event.preventDefault();

                const destination = state.cancelButton.href;

                if (typeof Swal !== "undefined") {
                    Swal.fire({
                        title: "Discard your changes?",
                        text: "Your unsaved profile changes will be lost.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Discard changes",
                        cancelButtonText: "Continue editing",
                        reverseButtons: true,
                        customClass: {
                            popup: "backend-swal-popup",
                            title: "backend-swal-title",
                            htmlContainer: "backend-swal-message",
                        },
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            state.isSubmitting = true;
                            window.location.href = destination;
                        }
                    });
                } else if (window.confirm("Discard your unsaved changes?")) {
                    state.isSubmitting = true;
                    window.location.href = destination;
                }
            });
        }
    };
})(window, document);
