document.addEventListener("DOMContentLoaded", function () {
    const modalElement = document.querySelector(
        "[data-auth-notification-modal]",
    );

    if (!modalElement) {
        return;
    }

    // Ensure Bootstrap 5 Modal is available.
    if (typeof bootstrap === "undefined" || !bootstrap.Modal) {
        console.error("[Auth Notification] Bootstrap Modal is not available.");
        return;
    }

    const authModal = new bootstrap.Modal(modalElement, {
        backdrop: "static",
        keyboard: true,
        focus: true,
    });

    // Automatically display the login or logout modal.
    authModal.show();

    console.log(`[Auth Notification] ${modalElement.id} initialized.`);
});
