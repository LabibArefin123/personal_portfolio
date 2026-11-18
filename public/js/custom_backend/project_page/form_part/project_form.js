/* =========================================================
   PROJECT FORM - INTERACTIONS
========================================================= */

document.addEventListener("DOMContentLoaded", function () {
    /* -----------------------------------------------------
       1. SCROLL / ENTRANCE REVEAL
    ----------------------------------------------------- */

    const revealElements = document.querySelectorAll(".project-reveal");

    if ("IntersectionObserver" in window) {
        const revealObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.08,
            },
        );

        revealElements.forEach((element) => {
            revealObserver.observe(element);
        });
    } else {
        revealElements.forEach((element) => {
            element.classList.add("is-visible");
        });
    }

    /* -----------------------------------------------------
       2. IMAGE UPLOAD ELEMENTS
    ----------------------------------------------------- */

    const uploadArea = document.getElementById("projectUploadArea");
    const imageInput = document.getElementById("projectImage");
    const uploadContent = document.getElementById("projectUploadContent");
    const imagePreview = document.getElementById("projectImagePreview");
    const previewImage = document.getElementById("projectPreviewImage");
    const removeImageButton = document.getElementById("removeProjectImage");

    let previewObjectUrl = null;

    /* -----------------------------------------------------
       3. IMAGE PREVIEW
    ----------------------------------------------------- */

    function showImagePreview(file) {
        if (!file) {
            return;
        }

        if (!file.type.startsWith("image/")) {
            alert("Please select a valid image file.");

            if (imageInput) {
                imageInput.value = "";
            }

            return;
        }

        if (previewObjectUrl) {
            URL.revokeObjectURL(previewObjectUrl);
        }

        previewObjectUrl = URL.createObjectURL(file);

        previewImage.src = previewObjectUrl;

        uploadContent.style.display = "none";
        imagePreview.classList.add("is-active");
    }

    /* -----------------------------------------------------
       4. FILE INPUT CHANGE
    ----------------------------------------------------- */

    if (imageInput && uploadArea) {
        imageInput.addEventListener("change", function () {
            const file = this.files[0];

            if (file) {
                showImagePreview(file);
            }
        });

        /* -------------------------------------------------
           5. CLICK TO OPEN FILE SELECTOR
        ------------------------------------------------- */

        uploadArea.addEventListener("click", function (event) {
            if (event.target.closest(".project-remove-image")) {
                return;
            }

            imageInput.click();
        });

        /* -------------------------------------------------
           6. DRAG AND DROP
        ------------------------------------------------- */

        ["dragenter", "dragover"].forEach((eventName) => {
            uploadArea.addEventListener(eventName, function (event) {
                event.preventDefault();
                event.stopPropagation();

                uploadArea.classList.add("is-dragging");
            });
        });

        ["dragleave", "drop"].forEach((eventName) => {
            uploadArea.addEventListener(eventName, function (event) {
                event.preventDefault();
                event.stopPropagation();

                uploadArea.classList.remove("is-dragging");
            });
        });

        uploadArea.addEventListener("drop", function (event) {
            const files = event.dataTransfer.files;

            if (!files.length) {
                return;
            }

            const file = files[0];

            if (!file.type.startsWith("image/")) {
                alert("Please drop a valid image file.");
                return;
            }

            const dataTransfer = new DataTransfer();

            dataTransfer.items.add(file);

            imageInput.files = dataTransfer.files;

            showImagePreview(file);
        });
    }

    /* -----------------------------------------------------
       7. REMOVE SELECTED IMAGE
    ----------------------------------------------------- */

    if (removeImageButton) {
        removeImageButton.addEventListener("click", function (event) {
            event.preventDefault();
            event.stopPropagation();

            if (imageInput) {
                imageInput.value = "";
            }

            if (previewObjectUrl) {
                URL.revokeObjectURL(previewObjectUrl);
                previewObjectUrl = null;
            }

            previewImage.src = "";

            imagePreview.classList.remove("is-active");
            uploadContent.style.display = "block";
        });
    }

    /* -----------------------------------------------------
       8. FORM SUBMISSION
    ----------------------------------------------------- */

    const projectForm = document.getElementById("projectForm");

    if (projectForm) {
        projectForm.addEventListener("submit", function () {
            const submitButton = projectForm.querySelector(
                ".project-submit-btn",
            );

            if (!submitButton) {
                return;
            }

            submitButton.disabled = true;

            submitButton.innerHTML = `
                <i class="fas fa-spinner fa-spin"></i>
                Processing...
            `;
        });
    }
});
