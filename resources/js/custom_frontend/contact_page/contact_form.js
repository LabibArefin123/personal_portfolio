document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");

    if (!form) return;

    const name = document.getElementById("contactName");
    const email = document.getElementById("contactEmail");
    const phone = document.getElementById("contactPhone");
    const subject = document.getElementById("contactSubject");
    const message = document.getElementById("contactMessage");

    const startedAt = document.getElementById("formStartedAt");
    const submitButton = document.getElementById("contactSubmit");

    const messageStatus = document.getElementById("contactMessageStatus");
    const characterCount = document.getElementById("contactCharacterCount");

    let submitted = false;

    // Record when the form was opened.
    startedAt.value = Math.floor(Date.now() / 1000);

    // URL and domain detection.
    const linkPattern =
        /(?:https?:\/\/|ftp:\/\/|www\.)|(?:\[[^\]]+\]\([^)]+\))|(?:<a\b)|\b(?:[a-z0-9-]+\.)+(?:com|net|org|io|co|dev|app|info|biz|xyz|online|site|link|me|ly|gg|tech|edu|gov|bd|uk|us|de|in|ai)\b/i;

    // Validation helpers.
    const setError = (field, message) => {
        field.classList.add("is-invalid");
        field.classList.remove("is-valid");

        let error = field.parentElement.querySelector(".js-field-error");

        if (!error) {
            error = document.createElement("small");
            error.className = "field-error js-field-error";

            field.parentElement.appendChild(error);
        }

        error.textContent = message;
    };

    const clearError = (field) => {
        field.classList.remove("is-invalid");

        const error = field.parentElement.querySelector(".js-field-error");

        if (error) error.remove();
    };

    const validateName = () => {
        const value = name.value.trim();

        if (value.length < 2 || value.length > 80) {
            setError(name, "Name must contain 2–80 characters.");
            return false;
        }

        if (!/^[\p{L}\p{M}][\p{L}\p{M}\s.'-]*$/u.test(value)) {
            setError(name, "Please enter a valid name.");
            return false;
        }

        clearError(name);
        return true;
    };

    const validateEmail = () => {
        const value = email.value.trim();

        const valid =
            /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value) && value.length <= 150;

        if (!valid) {
            setError(email, "Please enter a valid email address.");
            return false;
        }

        clearError(email);
        return true;
    };

    const validatePhone = () => {
        const value = phone.value.trim();

        if (value && !/^\+?[0-9\s().-]{7,25}$/.test(value)) {
            setError(phone, "Please enter a valid phone number.");
            return false;
        }

        clearError(phone);
        return true;
    };

    const validateSubject = () => {
        const value = subject.value.trim();

        if (value && (value.length < 3 || value.length > 120)) {
            setError(subject, "Subject must contain 3–120 characters.");
            return false;
        }

        if (linkPattern.test(value)) {
            setError(subject, "Links are not permitted in the subject.");
            return false;
        }

        clearError(subject);
        return true;
    };

    const validateMessage = () => {
        const value = message.value.trim();

        characterCount.textContent = `${message.value.length} / 5000`;

        if (value.length < 20) {
            setError(message, "Please write at least 20 characters.");

            messageStatus.textContent = "Your message is too short.";

            return false;
        }

        if (value.length > 5000) {
            setError(message, "Maximum 5000 characters allowed.");

            return false;
        }

        if (linkPattern.test(value)) {
            setError(message, "Links and website addresses are not allowed.");

            messageStatus.innerHTML =
                '<i class="bi bi-shield-exclamation"></i> Website links detected.';

            return false;
        }

        if (/<[^>]*>|javascript\s*:/i.test(value)) {
            setError(message, "HTML and script content are not allowed.");

            return false;
        }

        clearError(message);

        messageStatus.innerHTML =
            '<i class="bi bi-shield-check"></i> Message looks good.';

        return true;
    };

    // Live validation.
    name.addEventListener("input", validateName);
    email.addEventListener("input", validateEmail);
    phone.addEventListener("input", validatePhone);
    subject.addEventListener("input", validateSubject);
    message.addEventListener("input", validateMessage);

    // Character count.
    message.addEventListener("input", () => {
        characterCount.textContent = `${message.value.length} / 5000`;
    });

    // Final submission validation.
    form.addEventListener("submit", (event) => {
        if (submitted) {
            event.preventDefault();
            return;
        }

        const valid = [
            validateName(),
            validateEmail(),
            validatePhone(),
            validateSubject(),
            validateMessage(),
        ].every(Boolean);

        if (!valid) {
            event.preventDefault();

            const firstInvalid = form.querySelector(".is-invalid");

            if (firstInvalid) {
                firstInvalid.focus();
                firstInvalid.scrollIntoView({
                    behavior: "smooth",
                    block: "center",
                });
            }

            return;
        }

        // Prevent extremely fast submissions.
        const elapsed = Math.floor(Date.now() / 1000) - Number(startedAt.value);

        if (elapsed < 3) {
            event.preventDefault();

            messageStatus.textContent =
                "Please review your message before submitting.";

            return;
        }

        submitted = true;

        submitButton.disabled = true;

        submitButton.querySelector(".submit-text").classList.add("d-none");

        submitButton
            .querySelector(".submit-loading")
            .classList.remove("d-none");
    });
});
