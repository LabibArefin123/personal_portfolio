(() => {
    window.initContactSubmit = (form, fields, elements) => {
        let submitted = false;

        const submitButton = elements.submitButton;
        const startedAt = elements.startedAt;
        const messageStatus = elements.messageStatus;

        form.addEventListener("submit", (event) => {
            if (submitted) {
                event.preventDefault();
                return;
            }

            const validators = window.contactFormValidators;

            if (!validators) {
                event.preventDefault();
                return;
            }

            const valid = Object.values(validators)
                .map((validate) => validate())
                .every(Boolean);

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
            const elapsed =
                Math.floor(Date.now() / 1000) - Number(startedAt?.value || 0);

            if (elapsed < 3) {
                event.preventDefault();

                if (messageStatus) {
                    messageStatus.textContent =
                        "Please review your message before submitting.";
                }

                return;
            }

            submitted = true;

            if (submitButton) {
                submitButton.disabled = true;

                submitButton
                    .querySelector(".submit-text")
                    ?.classList.add("d-none");

                submitButton
                    .querySelector(".submit-loading")
                    ?.classList.remove("d-none");
            }
        });
    };
})();
