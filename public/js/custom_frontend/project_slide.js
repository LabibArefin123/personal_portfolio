document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector("[data-home-project-track]");
    const previous = document.querySelector(".home-project-prev");
    const next = document.querySelector(".home-project-next");

    if (!track) return;

    const getScrollAmount = () => {
        const card = track.querySelector(".home-project-card");

        if (!card) return track.clientWidth;

        const gap = parseFloat(getComputedStyle(track).gap) || 0;

        return card.getBoundingClientRect().width + gap;
    };

    previous?.addEventListener("click", function () {
        track.scrollBy({
            left: -getScrollAmount(),
            behavior: "smooth",
        });
    });

    next?.addEventListener("click", function () {
        track.scrollBy({
            left: getScrollAmount(),
            behavior: "smooth",
        });
    });

    function updateControls() {
        const maxScroll = track.scrollWidth - track.clientWidth;

        if (previous) {
            previous.disabled = track.scrollLeft <= 2;
        }

        if (next) {
            next.disabled = track.scrollLeft >= maxScroll - 2;
        }
    }

    track.addEventListener("scroll", updateControls, { passive: true });

    window.addEventListener("resize", updateControls);

    updateControls();
});
