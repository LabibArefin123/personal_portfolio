document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    // ==========================================
    // Custom Toast Notification Configuration
    // ==========================================

    const notification = window.backendNotification || {};

    if (typeof Swal === "undefined") {
        console.warn("[Custom Toaster] SweetAlert2 is not loaded.");
        return;
    }

    const notificationConfig = {
        success: {
            icon: "success",
            title: "Success",
            timer: 2000,
        },
        error: {
            icon: "error",
            title: "Oops...",
            timer: 2500,
        },
        warning: {
            icon: "warning",
            title: "Warning",
            timer: 2500,
        },
        info: {
            icon: "info",
            title: "Information",
            timer: 2500,
        },
    };

    // ==========================================
    // Display Session Notifications
    // ==========================================

    Object.entries(notificationConfig).forEach(([type, config]) => {
        const message = notification[type];

        if (!message) return;

        Swal.fire({
            icon: config.icon,
            title: config.title,
            text: message,
            timer: config.timer,
            timerProgressBar: true,
            showConfirmButton: false,
            customClass: {
                popup: "backend-swal-popup",
                title: "backend-swal-title",
                htmlContainer: "backend-swal-message",
                timerProgressBar: "backend-swal-progress",
            },
        });
    });

    console.log("[Custom Toaster] Notification module loaded.");
});
