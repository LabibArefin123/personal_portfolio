/* ==========================================================
   PROFILE EDIT - FORM MANAGEMENT
========================================================== */

(function (window, document) {
    "use strict";

    const ProfileEdit = window.ProfileEdit;

    ProfileEdit.initForm = function () {
        const state = ProfileEdit.state;
        const form = state.form;

        /* ==========================================
           01. PROFILE COMPLETION CHECKLIST
        ========================================== */

        const checklistFields = {
            name: document.getElementById("name"),
            username: document.getElementById("username"),
            email: document.getElementById("email"),
            phone: document.getElementById("phone"),
            profile_picture: state.imageInput,
        };

        function updateChecklist() {
            Object.entries(checklistFields).forEach(function ([key, field]) {
                const item = document.querySelector(
                    `[data-check-field="${key}"]`,
                );

                if (!item || !field) {
                    return;
                }

                const completed =
                    key === "profile_picture"
                        ? Boolean(
                              field.files.length ||
                              field.dataset.existing === "true",
                          )
                        : Boolean(field.value.trim());

                item.classList.toggle("completed", completed);

                const icon = item.querySelector("i");

                if (icon) {
                    icon.classList.toggle("fa-check-circle", completed);

                    icon.classList.toggle("far", !completed);

                    icon.classList.toggle("fas", completed);

                    icon.classList.toggle("fa-circle", !completed);
                }
            });
        }

        /* Mark existing profile image as available. */

        if (state.imageInput && state.imagePreview) {
            state.imageInput.dataset.existing = state.imagePreview.src
                ? "true"
                : "false";
        }

        form.addEventListener("input", updateChecklist);
        form.addEventListener("change", updateChecklist);

        updateChecklist();

        /* ==========================================
           02. FORM SUBMISSION
        ========================================== */

        form.addEventListener("submit", function (event) {
            if (state.isSubmitting) {
                return;
            }

            event.preventDefault();

            /* Browser validation. */

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            /* Fallback confirmation. */

            if (typeof Swal === "undefined") {
                if (
                    window.confirm(
                        "Are you sure you want to update your profile?",
                    )
                ) {
                    submitForm();
                }

                return;
            }

            /* SweetAlert confirmation. */

            Swal.fire({
                title: "Update your profile?",
                text: "Please confirm that you want to save these changes.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes, save changes",
                cancelButtonText: "Review again",
                reverseButtons: true,
                customClass: {
                    popup: "backend-swal-popup",
                    title: "backend-swal-title",
                    htmlContainer: "backend-swal-message",
                },
            }).then(function (result) {
                if (result.isConfirmed) {
                    submitForm();
                }
            });
        });

        /* ==========================================
           03. ACTUAL FORM SUBMISSION
        ========================================== */

        function submitForm() {
            if (state.isSubmitting) {
                return;
            }

            state.isSubmitting = true;

            if (state.submitButton) {
                state.submitButton.disabled = true;

                state.submitButton.innerHTML = `
                    <i class="fas fa-spinner"></i>
                    <span>Updating Profile...</span>
                `;
            }

            /* Prevent browser exit warning. */

            state.isDirty = false;

            /* Submit without triggering submit event again. */

            HTMLFormElement.prototype.submit.call(form);
        }
    };
})(window, document);
