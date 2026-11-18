/* ==========================================================
   USER PROFILE EDIT PAGE
========================================================== */

document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    const form = document.getElementById("profileUpdateForm");

    if (!form) {
        return;
    }

    const submitButton = document.getElementById("updateProfileBtn");
    const unsavedIndicator = document.getElementById("unsavedIndicator");
    const cancelButton = document.getElementById("cancelProfileEdit");

    let isDirty = false;
    let isSubmitting = false;
    let confirmationAccepted = false;

    const initialFormData = new FormData(form);

    const initialValues = new Map();

    form.querySelectorAll(
        "input:not([type='file']):not([type='hidden'])",
    ).forEach(function (input) {
        initialValues.set(input.name, input.value);
    });

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

    function checkFormChanges() {
        let changed = false;

        form.querySelectorAll(
            "input:not([type='file']):not([type='hidden'])",
        ).forEach(function (input) {
            if (initialValues.get(input.name) !== input.value) {
                changed = true;
            }
        });

        const imageInput = document.getElementById("profile_picture");

        if (imageInput && imageInput.files.length > 0) {
            changed = true;
        }

        isDirty = changed;

        if (unsavedIndicator) {
            unsavedIndicator.classList.toggle("is-dirty", changed);

            const text = unsavedIndicator.querySelector("small");

            if (text) {
                text.textContent = changed
                    ? "Unsaved changes"
                    : "All changes saved";
            }
        }

        return changed;
    }

    form.addEventListener("input", checkFormChanges);
    form.addEventListener("change", checkFormChanges);

    window.addEventListener("beforeunload", function (event) {
        if (isDirty && !isSubmitting) {
            event.preventDefault();
            event.returnValue = "";
        }
    });

    /* ==========================================
       03. CANCEL BUTTON CONFIRMATION
    ========================================== */

    if (cancelButton) {
        cancelButton.addEventListener("click", function (event) {
            if (!checkFormChanges()) {
                return;
            }

            event.preventDefault();

            const destination = cancelButton.href;

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
                        isSubmitting = true;
                        window.location.href = destination;
                    }
                });
            } else if (window.confirm("Discard your unsaved changes?")) {
                isSubmitting = true;
                window.location.href = destination;
            }
        });
    }

    /* ==========================================
       04. PROFILE IMAGE PREVIEW
    ========================================== */

    const imageInput = document.getElementById("profile_picture");
    const imagePreview = document.getElementById("profileImagePreview");
    const secondaryPreview = document.getElementById(
        "profileImagePreviewSecondary",
    );
    const fileNameElement = document.getElementById("profileImageFileName");

    let currentPreviewUrl = null;

    if (imageInput) {
        imageInput.addEventListener("change", function () {
            const file = this.files[0];

            if (!file) {
                return;
            }

            const allowedTypes = ["image/jpeg", "image/png", "image/webp"];

            if (!allowedTypes.includes(file.type)) {
                this.value = "";

                showAlert(
                    "Invalid image",
                    "Please select a JPG, PNG, or WEBP image.",
                    "error",
                );

                checkFormChanges();
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                this.value = "";

                showAlert(
                    "Image is too large",
                    "Please choose an image smaller than 5 MB.",
                    "warning",
                );

                checkFormChanges();
                return;
            }

            if (currentPreviewUrl) {
                URL.revokeObjectURL(currentPreviewUrl);
            }

            currentPreviewUrl = URL.createObjectURL(file);

            if (imagePreview) {
                imagePreview.src = currentPreviewUrl;
            }

            if (secondaryPreview) {
                secondaryPreview.src = currentPreviewUrl;
            }

            if (fileNameElement) {
                fileNameElement.textContent = file.name;
            }

            checkFormChanges();

            console.log("[User Profile] Profile image preview updated.");
        });
    }

    /* ==========================================
       05. PASSWORD SHOW / HIDE
    ========================================== */

    document.querySelectorAll(".toggle-password").forEach(function (button) {
        button.addEventListener("click", function () {
            const targetId = this.dataset.target;
            const input = document.getElementById(targetId);
            const icon = this.querySelector("i");

            if (!input || !icon) {
                return;
            }

            const isPassword = input.type === "password";

            input.type = isPassword ? "text" : "password";

            icon.classList.toggle("fa-eye", !isPassword);
            icon.classList.toggle("fa-eye-slash", isPassword);

            this.setAttribute(
                "aria-label",
                isPassword ? "Hide password" : "Show password",
            );
        });
    });

    /* ==========================================
       06. PASSWORD STRENGTH
    ========================================== */

    const newPassword = document.getElementById("new_password");
    const strengthBar = document.getElementById("passwordStrengthBar");
    const strengthText = document.getElementById("passwordStrengthText");

    function evaluatePassword(password) {
        let score = 0;

        if (password.length >= 8) score++;
        if (/[a-z]/.test(password)) score++;
        if (/[A-Z]/.test(password)) score++;
        if (/[0-9]/.test(password)) score++;
        if (/[^A-Za-z0-9]/.test(password)) score++;

        return score;
    }

    function updatePasswordStrength() {
        if (!newPassword || !strengthBar || !strengthText) {
            return;
        }

        const password = newPassword.value;

        if (!password) {
            strengthBar.style.width = "0%";
            strengthText.textContent = "Password strength";
            return;
        }

        const score = evaluatePassword(password);

        const strengthLevels = [
            { label: "Very weak", width: "15%", color: "#ef4444" },
            { label: "Weak", width: "30%", color: "#f97316" },
            { label: "Fair", width: "50%", color: "#eab308" },
            { label: "Good", width: "75%", color: "#0ea5e9" },
            { label: "Strong", width: "90%", color: "#16a36a" },
            { label: "Very strong", width: "100%", color: "#15803d" },
        ];

        const level = strengthLevels[score];

        strengthBar.style.width = level.width;
        strengthBar.style.background = level.color;
        strengthText.textContent = level.label;
        strengthText.style.color = level.color;
    }

    if (newPassword) {
        newPassword.addEventListener("input", function () {
            updatePasswordStrength();
            updatePasswordMatch();
        });
    }

    /* ==========================================
       07. PASSWORD CONFIRMATION
    ========================================== */

    const confirmPassword = document.getElementById("confirm_password");
    const passwordMatchText = document.getElementById("passwordMatchText");

    function updatePasswordMatch() {
        if (!newPassword || !confirmPassword || !passwordMatchText) {
            return;
        }

        const password = newPassword.value;
        const confirmation = confirmPassword.value;

        passwordMatchText.classList.remove("match", "mismatch");

        if (!confirmation) {
            passwordMatchText.textContent = "";
            return;
        }

        if (password === confirmation) {
            passwordMatchText.textContent = "Passwords match";
            passwordMatchText.classList.add("match");
        } else {
            passwordMatchText.textContent = "Passwords do not match";
            passwordMatchText.classList.add("mismatch");
        }
    }

    if (confirmPassword) {
        confirmPassword.addEventListener("input", updatePasswordMatch);
    }

    /* ==========================================
       08. PROFILE CHECKLIST
    ========================================== */

    const checklistFields = {
        name: document.getElementById("name"),
        username: document.getElementById("username"),
        email: document.getElementById("email"),
        phone: document.getElementById("phone"),
        profile_picture: imageInput,
    };

    function updateChecklist() {
        Object.entries(checklistFields).forEach(function ([key, field]) {
            const item = document.querySelector(`[data-check-field="${key}"]`);

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

    // Mark the existing profile image as already available.
    if (imageInput && imagePreview) {
        imageInput.dataset.existing = imagePreview.src ? "true" : "false";
    }

    form.addEventListener("input", updateChecklist);
    form.addEventListener("change", updateChecklist);

    updateChecklist();

    /* ==========================================
       09. SWEETALERT HELPER
    ========================================== */

    function showAlert(title, text, icon) {
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
    }

    /* ==========================================
       10. FORM SUBMISSION CONFIRMATION
    ========================================== */

    form.addEventListener("submit", function (event) {
        if (isSubmitting) {
            return;
        }

        event.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        if (typeof Swal === "undefined") {
            if (
                window.confirm("Are you sure you want to update your profile?")
            ) {
                submitForm();
            }

            return;
        }

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

    function submitForm() {
        if (isSubmitting) {
            return;
        }

        isSubmitting = true;

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <i class="fas fa-spinner"></i>
                <span>Updating Profile...</span>
            `;
        }

        // Prevent the unsaved changes warning during form submission.
        isDirty = false;

        // Submit the original form without triggering the submit handler again.
        HTMLFormElement.prototype.submit.call(form);
    }

    console.log("[User Profile] Premium edit page initialized.");
});
