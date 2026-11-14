document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector(".github-stats-wrapper");

    if (!section) return;

    const cards = section.querySelectorAll(
        ".github-info-card, .github-image-card",
    );

    const list = section.querySelector(".github-list");

    const reduceMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)",
    ).matches;

    // Fallback for unsupported browsers.
    if (reduceMotion || !("IntersectionObserver" in window)) {
        cards.forEach((card) => {
            card.classList.add("is-visible");
        });

        if (list) {
            list.classList.add("is-visible");
        }

        return;
    }

    // Activate animation styles.
    section.classList.add("github-activity--ready");

    // Card reveal observer.
    const cardObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                const card = entry.target;

                const index = Array.from(cards).indexOf(card);

                card.style.transitionDelay = `${index * 150}ms`;

                card.classList.add("is-visible");

                observer.unobserve(card);
            });
        },
        {
            threshold: 0.15,
            rootMargin: "0px 0px -40px 0px",
        },
    );

    cards.forEach((card) => {
        cardObserver.observe(card);
    });

    // GitHub technologies list animation.
    if (list) {
        const listObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;

                    list.classList.add("is-visible");

                    observer.unobserve(list);
                });
            },
            {
                threshold: 0.2,
            },
        );

        listObserver.observe(list);
    }

    console.log("[Education] GitHub activity animation initialized.");
});
