document.addEventListener("DOMContentLoaded", () => {
    /* ==========================================
       System Dashboard - Reveal Animation
    ========================================== */

    const revealElements = document.querySelectorAll(".system-reveal");

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
       System Dashboard - Statistics Counter
    ========================================== */

    const counters = document.querySelectorAll(".system-counter");

    const animateCounter = (element) => {
        const target = Number(element.dataset.count);
        const decimals = Number(element.dataset.decimals || 0);

        if (!Number.isFinite(target)) {
            element.textContent = "0";
            return;
        }

        const reducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)",
        ).matches;

        const formatValue = (value) => {
            return value.toLocaleString("en-US", {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals,
            });
        };

        if (reducedMotion || target === 0) {
            element.textContent = formatValue(target);
            return;
        }

        const duration = 1100;
        const startTime = performance.now();

        const updateCounter = (currentTime) => {
            const progress = Math.min((currentTime - startTime) / duration, 1);

            const easedProgress = 1 - Math.pow(1 - progress, 4);
            const currentValue = target * easedProgress;

            element.textContent = formatValue(
                progress === 1 ? target : currentValue,
            );

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        };

        requestAnimationFrame(updateCounter);
    };

    counters.forEach(animateCounter);

    console.log("[System Dashboard] Monitoring dashboard initialized.");
});
