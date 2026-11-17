document.addEventListener("DOMContentLoaded", () => {
    /* ==========================================
       Dashboard - Current Date
    ========================================== */

    const dateElement = document.getElementById("dashboardCurrentDate");

    if (dateElement) {
        dateElement.textContent = new Intl.DateTimeFormat("en-US", {
            weekday: "short",
            day: "numeric",
            month: "short",
            year: "numeric",
        }).format(new Date());
    }

    /* ==========================================
       Dashboard - Reveal Animation
    ========================================== */

    const revealElements = document.querySelectorAll(".dashboard-reveal");

    if ("IntersectionObserver" in window) {
        const revealObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;

                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                });
            },
            {
                threshold: 0.12,
            },
        );

        revealElements.forEach((element, index) => {
            element.style.transitionDelay = `${index * 100}ms`;
            revealObserver.observe(element);
        });
    } else {
        revealElements.forEach((element) => {
            element.classList.add("is-visible");
        });
    }

    /* ==========================================
       Dashboard - Statistics Counter
    ========================================== */

    const counters = document.querySelectorAll(".stat-counter");

    const animateCounter = (element) => {
        const target = Number(element.dataset.count);

        if (!Number.isFinite(target)) {
            element.textContent = "0";
            return;
        }

        const reducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)",
        ).matches;

        if (reducedMotion || target === 0) {
            element.textContent = target.toLocaleString();
            return;
        }

        const duration = 1100;
        const startTime = performance.now();

        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Ease-out animation
            const easedProgress = 1 - Math.pow(1 - progress, 4);

            const currentValue = Math.floor(target * easedProgress);

            element.textContent = currentValue.toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString();
            }
        };

        requestAnimationFrame(updateCounter);
    };

    counters.forEach((counter) => {
        animateCounter(counter);
    });

    console.log("[Dashboard] Dashboard animations initialized.");
});
