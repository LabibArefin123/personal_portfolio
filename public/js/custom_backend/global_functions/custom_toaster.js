document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    const notification = window.backendNotification || {};

    if (typeof Swal === "undefined") {
        console.warn("[Custom Toaster] SweetAlert2 is not loaded.");
        return;
    }

    const notificationConfig = {
        login_success: {
            icon: "success",
            title: "Welcome Back!",
        },

        logout_success: {
            icon: "success",
            title: "Successfully Logged Out",
        },

        success: {
            icon: "success",
            title: "Success",
        },

        error: {
            icon: "error",
            title: "Something Went Wrong",
        },

        warning: {
            icon: "warning",
            title: "Warning",
        },

        info: {
            icon: "info",
            title: "Information",
        },
    };

    // Find the first available notification.
    const activeNotification = Object.entries(notificationConfig).find(
        ([type]) => notification[type],
    );

    if (!activeNotification) {
        return;
    }

    const [type, config] = activeNotification;
    const message = notification[type];

    Swal.fire({
        toast: true,
        position: "top-end",

        icon: config.icon,
        title: config.title,
        text: message,

        timer: 5000,
        timerProgressBar: true,
        showConfirmButton: false,

        showCloseButton: true,
        allowOutsideClick: true,
        allowEscapeKey: true,

        customClass: {
            popup: "backend-swal-popup",
            title: "backend-swal-title",
            htmlContainer: "backend-swal-message",
            timerProgressBar: "backend-swal-progress",
            closeButton: "backend-swal-close",
        },

        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    console.log(`[Custom Toaster] ${type} notification displayed.`);
});
