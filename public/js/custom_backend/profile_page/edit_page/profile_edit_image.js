/* ==========================================================
   PROFILE EDIT - IMAGE PREVIEW
========================================================== */

(function (window) {
    "use strict";

    const ProfileEdit = window.ProfileEdit;

    ProfileEdit.initImage = function () {
        const state = ProfileEdit.state;

        const imageInput = state.imageInput;
        const imagePreview = state.imagePreview;
        const secondaryPreview = state.secondaryPreview;
        const fileNameElement = state.fileNameElement;

        if (!imageInput) {
            return;
        }

        /* ==========================================
           IMAGE SELECTION
        ========================================== */

        imageInput.addEventListener("change", function () {
            const file = this.files[0];

            if (!file) {
                ProfileEdit.checkFormChanges();
                return;
            }

            /* Validate image format. */

            const allowedTypes = ["image/jpeg", "image/png", "image/webp"];

            if (!allowedTypes.includes(file.type)) {
                this.value = "";

                ProfileEdit.showAlert(
                    "Invalid image",
                    "Please select a JPG, PNG, or WEBP image.",
                    "error",
                );

                ProfileEdit.checkFormChanges();
                return;
            }

            /* Validate image size. */

            if (file.size > 5 * 1024 * 1024) {
                this.value = "";

                ProfileEdit.showAlert(
                    "Image is too large",
                    "Please choose an image smaller than 5 MB.",
                    "warning",
                );

                ProfileEdit.checkFormChanges();
                return;
            }

            /* Revoke previous preview URL. */

            if (state.currentPreviewUrl) {
                URL.revokeObjectURL(state.currentPreviewUrl);
            }

            /* Create new preview URL. */

            state.currentPreviewUrl = URL.createObjectURL(file);

            if (imagePreview) {
                imagePreview.src = state.currentPreviewUrl;
            }

            if (secondaryPreview) {
                secondaryPreview.src = state.currentPreviewUrl;
            }

            if (fileNameElement) {
                fileNameElement.textContent = file.name;
            }

            ProfileEdit.checkFormChanges();

            console.log("[User Profile] Profile image preview updated.");
        });

        /* ==========================================
           CLEANUP PREVIEW URL
        ========================================== */

        window.addEventListener("beforeunload", function () {
            if (state.currentPreviewUrl) {
                URL.revokeObjectURL(state.currentPreviewUrl);
                state.currentPreviewUrl = null;
            }
        });
    };
})(window);
