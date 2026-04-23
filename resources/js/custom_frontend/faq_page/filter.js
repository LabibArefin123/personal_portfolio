document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".faq-filter");
    const items = document.querySelectorAll(".faq-item");

    if (!buttons.length) return;

    buttons.forEach((btn) => {
        btn.addEventListener("click", function () {
            buttons.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");

            const filter = this.dataset.filter;

            items.forEach((item) => {
                const category = item.dataset.category || "all";

                if (filter === "all" || category === filter) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });
});
