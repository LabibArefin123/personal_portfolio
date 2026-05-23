document.addEventListener("DOMContentLoaded", function () {
    // SUCCESS TOAST
    if (window.appData?.contactSuccess) {
        const data = window.appData.contactSuccess;

        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "success",
            title: "Message Sent Successfully 🚀",
            html: `
                <div style="margin-top:8px;font-size:13px;">
                    <div><strong>Today Count:</strong> ${data.count}</div>
                    <div><strong>Time:</strong> ${data.time}</div>
                </div>
            `,
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            background: "#0f172a",
            color: "#fff",
            iconColor: "#22c55e",
            customClass: {
                popup: "animated fadeInRight",
            },
        });
    }

    // VALIDATION ERRORS
    if (window.appData?.errors?.length > 0) {
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "error",
            title: "Validation Error",
            html: `
                <ul style="padding-left:18px;text-align:left;">
                    ${window.appData.errors.map((error) => `<li>${error}</li>`).join("")}
                </ul>
            `,
            showConfirmButton: false,
            timer: 6000,
            timerProgressBar: true,
            background: "#1e293b",
            color: "#fff",
        });
    }
});
