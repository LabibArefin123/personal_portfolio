document.querySelectorAll(".copy-email-btn").forEach((button) => {
    button.addEventListener("click", function () {
        const email = this.dataset.email;

        navigator.clipboard.writeText(email);

        this.innerText = "Copied!";

        setTimeout(() => {
            this.innerText = "Copy";
        }, 2000);
    });
});
