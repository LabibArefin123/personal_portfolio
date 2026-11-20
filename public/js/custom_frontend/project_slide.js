document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".home-project-slider");
    const track = document.querySelector("[data-home-project-track");
    const previousButton = document.querySelector(".home-project-prev");
    const nextButton = document.querySelector(".home-project-next");

    if (!slider || !track) return;

    if (track.dataset.loopInitialized === "true") return;

    const originalCards = Array.from(track.children);

    if (originalCards.length === 0) return;

    track.dataset.loopInitialized = "true";

    // Duplicate cards to create a seamless loop.
    originalCards.forEach(function (card) {
        track.appendChild(card.cloneNode(true));
    });

    let position = 0;
    let loopWidth = 0;
    let lastTime = 0;
    let paused = false;
    let animationFrame = null;

    const speed = 35;

    // Calculate the width of the original card collection.
    function calculateWidth() {
        loopWidth = track.scrollWidth / 2;

        if (position >= loopWidth && loopWidth > 0) {
            position = position % loopWidth;
        }

        updatePosition();
    }

    // Keep the slider position within the original collection.
    function normalizePosition() {
        if (loopWidth <= 0) return;

        position = ((position % loopWidth) + loopWidth) % loopWidth;
    }

    function updatePosition() {
        track.style.transform = `translate3d(${-position}px, 0, 0)`;
    }

    // Continuous scrolling.
    function animate(timestamp) {
        if (!lastTime) lastTime = timestamp;

        const delta = Math.min((timestamp - lastTime) / 1000, 0.05);
        lastTime = timestamp;

        if (!paused && loopWidth > 0) {
            position += speed * delta;

            if (position >= loopWidth) {
                position -= loopWidth;
            }

            updatePosition();
        }

        animationFrame = requestAnimationFrame(animate);
    }

    // Pause when hovering or focusing the slider.
    slider.addEventListener("mouseenter", function () {
        paused = true;
    });

    slider.addEventListener("mouseleave", function () {
        paused = false;
    });

    slider.addEventListener("focusin", function () {
        paused = true;
    });

    slider.addEventListener("focusout", function (event) {
        if (!slider.contains(event.relatedTarget)) {
            paused = false;
        }
    });

    // Previous button.
    previousButton?.addEventListener("click", function () {
        paused = true;
        position -= 320;
        normalizePosition();
        updatePosition();
    });

    // Next button.
    nextButton?.addEventListener("click", function () {
        paused = true;
        position += 320;
        normalizePosition();
        updatePosition();
    });

    // Recalculate on resize.
    window.addEventListener("resize", calculateWidth);

    // Initialize.
    requestAnimationFrame(function () {
        calculateWidth();
        animationFrame = requestAnimationFrame(animate);
    });

    // Respect reduced-motion preferences.
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        paused = true;
    }
});
