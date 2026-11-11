document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");

    if (!form) return;

    const fields = {
        name: document.getElementById("contactName"),
        email: document.getElementById("contactEmail"),
        phone: document.getElementById("contactPhone"),
        subject: document.getElementById("contactSubject"),
        message: document.getElementById("contactMessage"),
    };

    const elements = {
        startedAt: document.getElementById("formStartedAt"),
        submitButton: document.getElementById("contactSubmit"),
        messageStatus: document.getElementById("contactMessageStatus"),
        characterCount: document.getElementById("contactCharacterCount"),
    };

    // Record when the form was opened.
    if (elements.startedAt) {
        elements.startedAt.value = Math.floor(Date.now() / 1000);
    }

    // Initialize character counter.
    if (fields.message && elements.characterCount) {
        elements.characterCount.textContent = `${fields.message.value.length} / 5000`;
    }

    // Initialize validation.
    if (typeof window.initContactValidation === "function") {
        window.initContactValidation(fields, elements);
    }

    // Initialize character counter.
    if (typeof window.initContactCounter === "function") {
        window.initContactCounter(fields, elements);
    }

    // Initialize form submission.
    if (typeof window.initContactSubmit === "function") {
        window.initContactSubmit(form, fields, elements);
    }
});
