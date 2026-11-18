/* ==========================================================
   PROFILE EDIT - MAIN INITIALIZATION
========================================================== */

(function (window, document) {
    "use strict";

    window.ProfileEdit = window.ProfileEdit || {};

    const ProfileEdit = window.ProfileEdit;

    ProfileEdit.state = {
        form: null,
        submitButton: null,
        unsavedIndicator: null,
        cancelButton: null,

        isDirty: false,
        isSubmitting: false,

        initialValues: new Map(),
        currentPreviewUrl: null,

        imageInput: null,
        imagePreview: null,
        secondaryPreview: null,
        fileNameElement: null,

        newPassword: null,
        confirmPassword: null,
    };

    /* ==========================================
       SWEETALERT HELPER
    ========================================== */

    ProfileEdit.showAlert = function (title, text, icon) {
        if (typeof Swal !== "undefined") {
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                confirmButtonText: "Got it",
                customClass: {
                    popup: "backend-swal-popup",
                    title: "backend-swal-title",
                    htmlContainer: "backend-swal-message",
                },
            });
        } else {
            window.alert(`${title}\n${text}`);
        }
    };

    /* ==========================================
       MAIN INITIALIZATION
    ========================================== */

    document.addEventListener("DOMContentLoaded", function () {
        const state = ProfileEdit.state;

        state.form = document.getElementById("profileUpdateForm");

        if (!state.form) {
            return;
        }

        state.submitButton = document.getElementById("updateProfileBtn");
        state.unsavedIndicator = document.getElementById("unsavedIndicator");
        state.cancelButton = document.getElementById("cancelProfileEdit");

        state.imageInput = document.getElementById("profile_picture");
        state.imagePreview = document.getElementById("profileImagePreview");

        state.secondaryPreview = document.getElementById(
            "profileImagePreviewSecondary",
        );

        state.fileNameElement = document.getElementById("profileImageFileName");

        state.newPassword = document.getElementById("new_password");
        state.confirmPassword = document.getElementById("confirm_password");

        /* Store initial input values. */

        state.form
            .querySelectorAll("input:not([type='file']):not([type='hidden'])")
            .forEach(function (input) {
                state.initialValues.set(input.name, input.value);
            });

        /* Initialize individual modules. */

        ProfileEdit.initChanges();
        ProfileEdit.initImage();
        ProfileEdit.initPassword();
        ProfileEdit.initForm();

        console.log("[User Profile] Premium edit page initialized.");
    });
})(window, document);
