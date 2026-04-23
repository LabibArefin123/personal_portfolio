document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("faqSearch");
    if (!input) return;

    function highlight(el, keyword) {
        if (!keyword) {
            el.innerHTML = el.textContent;
            return;
        }

        const regex = new RegExp(`(${keyword})`, "gi");
        el.innerHTML = el.textContent.replace(
            regex,
            `<span class="faq-highlight">$1</span>`,
        );
    }

    input.addEventListener("input", function () {
        const value = this.value.toLowerCase();

        document.querySelectorAll(".faq-item").forEach((item) => {
            const question = item.querySelector(".faq-question span");
            const answer = item.querySelector(".faq-answer");

            const text = item.innerText.toLowerCase();

            if (text.includes(value)) {
                item.style.display = "block";

                highlight(question, value);
                highlight(answer, value);
            } else {
                item.style.display = "none";
            }
        });
    });
});
