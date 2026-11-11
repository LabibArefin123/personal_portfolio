(() => {
    const linkPattern =
        /(?:https?:\/\/|ftp:\/\/|www\.)|(?:\[[^\]]+\]\([^)]+\))|(?:<a\b)|\b(?:[a-z0-9-]+\.)+(?:com|net|org|io|co|dev|app|info|biz|xyz|online|site|link|me|ly|gg|tech|edu|gov|bd|uk|us|de|in|ai)\b/i;

    // Display validation error.
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

    // Remove validation error.
    const clearError = (field) => {
        field.classList.remove("is-invalid");

        const error = field.parentElement.querySelector(".js-field-error");

        if (error) error.remove();
    };

    // Validate name.
    const validateName = (field) => {
        const value = field.value.trim();

        if (value.length < 2 || value.length > 80) {
            setError(field, "Name must contain 2–80 characters.");
            return false;
        }

        if (!/^[\p{L}\p{M}][\p{L}\p{M}\s.'-]*$/u.test(value)) {
            setError(field, "Please enter a valid name.");
            return false;
        }

        clearError(field);
        return true;
    };

    // Validate email.
    const validateEmail = (field) => {
        const value = field.value.trim();

        const valid =
            /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value) && value.length <= 150;

        if (!valid) {
            setError(field, "Please enter a valid email address.");
            return false;
        }

        clearError(field);
        return true;
    };

    // Validate phone.
    const validatePhone = (field) => {
        const value = field.value.trim();

        if (value && !/^\+?[0-9\s().-]{7,25}$/.test(value)) {
            setError(field, "Please enter a valid phone number.");
            return false;
        }

        clearError(field);
        return true;
    };

    // Validate subject.
    const validateSubject = (field) => {
        const value = field.value.trim();

        if (value && (value.length < 3 || value.length > 120)) {
            setError(field, "Subject must contain 3–120 characters.");
            return false;
        }

        if (linkPattern.test(value)) {
            setError(field, "Links are not permitted in the subject.");
            return false;
        }

        clearError(field);
        return true;
    };

    // Validate message.
    const validateMessage = (field, elements) => {
        const value = field.value.trim();

        if (elements.characterCount) {
            elements.characterCount.textContent = `${field.value.length} / 5000`;
        }

        if (value.length < 20) {
            setError(field, "Please write at least 20 characters.");

            if (elements.messageStatus) {
                elements.messageStatus.textContent =
                    "Your message is too short.";
            }

            return false;
        }

        if (value.length > 5000) {
            setError(field, "Maximum 5000 characters allowed.");
            return false;
        }

        if (linkPattern.test(value)) {
            setError(field, "Links and website addresses are not allowed.");

            if (elements.messageStatus) {
                elements.messageStatus.innerHTML =
                    '<i class="bi bi-shield-exclamation"></i> Website links detected.';
            }

            return false;
        }

        if (/<[^>]*>|javascript\s*:/i.test(value)) {
            setError(field, "HTML and script content are not allowed.");
            return false;
        }

        clearError(field);

        if (elements.messageStatus) {
            elements.messageStatus.innerHTML =
                '<i class="bi bi-shield-check"></i> Message looks good.';
        }

        return true;
    };

    // Expose validation methods.
    window.initContactValidation = (fields, elements) => {
        const validators = {
            name: () => validateName(fields.name),
            email: () => validateEmail(fields.email),
            phone: () => validatePhone(fields.phone),
            subject: () => validateSubject(fields.subject),
            message: () => validateMessage(fields.message, elements),
        };

        Object.keys(validators).forEach((key) => {
            fields[key].addEventListener("input", validators[key]);
        });

        window.contactFormValidators = validators;
    };
})();
