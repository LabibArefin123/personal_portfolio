/* ==========================================================
   PROFILE EDIT - PASSWORD MANAGEMENT
========================================================== */

(function (window, document) {
    "use strict";

    const ProfileEdit = window.ProfileEdit;

    ProfileEdit.initPassword = function () {
        const state = ProfileEdit.state;

        const newPassword = state.newPassword;
        const confirmPassword = state.confirmPassword;

        const strengthBar = document.getElementById("passwordStrengthBar");

        const strengthText = document.getElementById("passwordStrengthText");

        const passwordMatchText = document.getElementById("passwordMatchText");

        /* ==========================================
           01. PASSWORD SHOW / HIDE
        ========================================== */

        document
            .querySelectorAll(".toggle-password")
            .forEach(function (button) {
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
           02. PASSWORD STRENGTH EVALUATION
        ========================================== */

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

        /* ==========================================
           03. PASSWORD MATCH VALIDATION
        ========================================== */

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

        /* ==========================================
           04. PASSWORD EVENT LISTENERS
        ========================================== */

        if (newPassword) {
            newPassword.addEventListener("input", function () {
                updatePasswordStrength();
                updatePasswordMatch();
            });
        }

        if (confirmPassword) {
            confirmPassword.addEventListener("input", updatePasswordMatch);
        }
    };
})(window, document);
