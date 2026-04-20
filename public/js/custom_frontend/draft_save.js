document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    if (!form) return;

    const inputs = form.querySelectorAll("input, textarea, select");

    inputs.forEach((input) => {
        const saved = localStorage.getItem("draft_" + input.name);
        if (saved) input.value = saved;

        input.addEventListener("input", () => {
            localStorage.setItem("draft_" + input.name, input.value);
        });
    });
});
