document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("educationEditForm");
    const button = document.getElementById("educationSaveButton");

    if (!form || !button) return;

    form.addEventListener("submit", function () {
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
    });
});
