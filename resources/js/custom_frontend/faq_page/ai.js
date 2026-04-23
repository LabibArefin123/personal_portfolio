const faqData = [
    {
        q: "What type of software do you build?",
        a: "I build POS, CRM, ERP, Tender systems and custom business applications.",
        tags: ["system", "software", "build"],
    },
    {
        q: "Do you work with APIs?",
        a: "Yes, I build and integrate REST APIs, biometric systems and third-party services.",
        tags: ["api", "integration"],
    },
    {
        q: "Do you include SEO?",
        a: "Yes, I include basic SEO optimization like meta, performance and structure improvements.",
        tags: ["seo"],
    },
    {
        q: "Do you test systems?",
        a: "Yes, I perform real-world testing including login flow, forms, and usability checks.",
        tags: ["test", "testing"],
    },
];

function showResponse(text) {
    document.getElementById("faqAiResponse").innerHTML =
        `<div class="ai-bubble">🤖 ${text}</div>`;
}

// INPUT SEARCH
document.getElementById("faqAiInput").addEventListener("input", function () {
    const input = document.getElementById("faqAiInput");
    const responseBox = document.getElementById("faqAiResponse");

    if (input) {
        input.addEventListener("input", function () {
            const value = this.value.toLowerCase();

            let found = faqData.find(
                (item) =>
                    item.q.toLowerCase().includes(value) ||
                    item.tags.some((tag) => tag.includes(value)),
            );

            if (!responseBox) return;

            if (value.length === 0) {
                responseBox.innerHTML = "";
                return;
            }

            if (found) {
                showResponse(found.a);
            } else {
                showResponse(
                    "I couldn't find exact match. Try API, SEO, systems, or testing.",
                );
            }
        });
    }
});

// QUICK BUTTONS
document.querySelectorAll(".faq-ai-suggestions button").forEach((btn) => {
    btn.addEventListener("click", function () {
        document.getElementById("faqAiInput").value = this.dataset.q;
        document.getElementById("faqAiInput").dispatchEvent(new Event("input"));
    });
});
