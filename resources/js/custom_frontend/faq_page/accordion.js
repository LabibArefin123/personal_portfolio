document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".faq-item");

    if (!items.length) return;

    items.forEach((item) => {
        const btn = item.querySelector(".faq-question");
        const answer = item.querySelector(".faq-answer");
        const icon = item.querySelector(".faq-icon i");

        btn.addEventListener("click", () => {
            items.forEach((other) => {
                if (other !== item) {
                    other.classList.remove("active");
                    other.querySelector(".faq-answer").style.maxHeight = null;

                    const i = other.querySelector(".faq-icon i");
                    i.classList.remove("fa-minus");
                    i.classList.add("fa-plus");
                }
            });

            item.classList.toggle("active");

            if (item.classList.contains("active")) {
                answer.style.maxHeight = answer.scrollHeight + "px";
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus");
            } else {
                answer.style.maxHeight = null;
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus");
            }
        });
    });

    const first = document.querySelector(".faq-item.active .faq-answer");
    if (first) first.style.maxHeight = first.scrollHeight + "px";
});
