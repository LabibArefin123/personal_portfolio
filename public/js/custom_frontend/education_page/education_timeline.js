document.addEventListener("DOMContentLoaded", () => {
    const timelines = document.querySelectorAll(".timeline");

    if (!timelines.length) return;

    const prefersReducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)",
    ).matches;

    timelines.forEach((timeline) => {
        const items = Array.from(timeline.querySelectorAll(".timeline-item"));

        if (!items.length) return;

        // Make every item visible if animation is not supported.
        if (prefersReducedMotion || !("IntersectionObserver" in window)) {
            timeline.style.setProperty("--timeline-progress", "100%");

            items.forEach((item) => {
                item.classList.add("is-visible");
            });

            return;
        }

        let visibleCount = 0;
        let animationFrame = null;

        // Initialize reveal state.
        timeline.classList.add("timeline--ready");

        // Update timeline progress.
        const updateProgress = () => {
            const visibleItems = items.filter((item) =>
                item.classList.contains("is-visible"),
            );

            visibleCount = visibleItems.length;

            const progress = items.length
                ? (visibleCount / items.length) * 100
                : 0;

            timeline.style.setProperty("--timeline-progress", `${progress}%`);
        };

        // Reveal observer.
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;

                    const item = entry.target;

                    const index = items.indexOf(item);

                    // Stagger each milestone.
                    item.style.transitionDelay = `${index * 100}ms`;

                    item.classList.add("is-visible");

                    observer.unobserve(item);
                });

                updateProgress();
            },
            {
                threshold: 0.2,
                rootMargin: "0px 0px -50px 0px",
            },
        );

        items.forEach((item) => {
            observer.observe(item);
        });

        // Refresh progress after layout changes.
        const handleResize = () => {
            if (animationFrame) {
                cancelAnimationFrame(animationFrame);
            }

            animationFrame = requestAnimationFrame(updateProgress);
        };

        window.addEventListener("resize", handleResize, {
            passive: true,
        });

        // Initial state.
        updateProgress();
    });
});
