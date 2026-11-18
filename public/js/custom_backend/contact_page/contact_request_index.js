/* =========================================================
   CONTACT REQUEST PAGE
   Full Message Modal
========================================================= */

document.addEventListener("DOMContentLoaded", function () {
    const messageModalElement = document.getElementById("fullMessageModal");
    const messageContent = document.getElementById("fullMessageContent");

    if (!messageModalElement || !messageContent) {
        return;
    }

    // Bootstrap 5 Modal Instance
    const messageModal =
        bootstrap.Modal.getOrCreateInstance(messageModalElement);

    // Event delegation supports DataTables redraws
    document.addEventListener("click", function (event) {
        const viewButton = event.target.closest(".view-full-message");

        if (!viewButton) {
            return;
        }

        const message = viewButton.getAttribute("data-message") || "";

        // Safe text insertion
        messageContent.textContent = message;

        messageModal.show();
    });

    // Clear message when modal closes
    messageModalElement.addEventListener("hidden.bs.modal", function () {
        messageContent.textContent = "";
    });
});
