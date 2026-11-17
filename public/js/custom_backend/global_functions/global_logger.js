document.addEventListener("DOMContentLoaded", function () {
    console.log("Global Error Logger Loaded ✅");

    function formatError(err) {
        if (!err) return null;

        if (err instanceof Event) return null;

        if (typeof err === "string") return err;

        if (err instanceof Error) return err.message;

        if (err.responseJSON && err.responseJSON.message) {
            return err.responseJSON.message;
        }

        try {
            return JSON.stringify(err, null, 2);
        } catch {
            return "Unexpected system error occurred.";
        }
    }

    window.onerror = function (message, source, lineno, colno, error) {
        showErrorModal(formatError(error || message));
        return false;
    };

    window.addEventListener("unhandledrejection", function (event) {
        showErrorModal(formatError(event.reason));
    });

    function showErrorModal(message) {
        if (!message || message.length < 3) return;

        const $modal = $("#errorModal");
        $("#errorMessageText").text(message);

        // 🔥 IMPORTANT: reset modal before show
        $modal.modal("hide");

        setTimeout(() => {
            $modal.modal({
                backdrop: true,
                keyboard: true,
                show: true,
            });
        }, 150);
    }
});
