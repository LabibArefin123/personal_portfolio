/* ==========================================================
   PROJECT INDEX - INTERACTIVE JAVASCRIPT
========================================================== */

document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    const projectPage = document.querySelector(".project-index-page");

    if (!projectPage) {
        return;
    }

    const prefersReducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)",
    ).matches;

    /* ==========================================
       01. SCROLL REVEAL ANIMATION
    ========================================== */

    const revealItems = projectPage.querySelectorAll(".project-reveal");

    if (prefersReducedMotion) {
        revealItems.forEach(function (item) {
            item.classList.add("is-visible");
        });
    } else if ("IntersectionObserver" in window) {
        const revealObserver = new IntersectionObserver(
            function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");

                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.12,
                rootMargin: "0px 0px -25px 0px",
            },
        );

        revealItems.forEach(function (item, index) {
            item.style.transitionDelay = `${Math.min(index * 90, 270)}ms`;

            revealObserver.observe(item);
        });
    } else {
        revealItems.forEach(function (item) {
            item.classList.add("is-visible");
        });
    }

    /* ==========================================
       02. ANIMATED STATISTICS COUNTERS
    ========================================== */

    const counters = projectPage.querySelectorAll(".project-counter");

    function animateCounter(element) {
        const target = Math.max(0, Number(element.dataset.count) || 0);

        if (prefersReducedMotion || target === 0) {
            element.textContent = target;
            return;
        }

        const duration = 1000;
        const start = performance.now();

        function updateCounter(timestamp) {
            const elapsed = timestamp - start;

            const progress = Math.min(elapsed / duration, 1);

            const eased = 1 - Math.pow(1 - progress, 3);

            element.textContent = Math.floor(target * eased);

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target;
            }
        }

        requestAnimationFrame(updateCounter);
    }

    if ("IntersectionObserver" in window && !prefersReducedMotion) {
        const counterObserver = new IntersectionObserver(
            function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);

                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.5,
            },
        );

        counters.forEach(function (counter) {
            counterObserver.observe(counter);
        });
    } else {
        counters.forEach(animateCounter);
    }

    /* ==========================================
       03. TABLE ROW ANIMATION
    ========================================== */

    const tableRows = projectPage.querySelectorAll(".project-table-row");

    tableRows.forEach(function (row, index) {
        if (prefersReducedMotion) {
            return;
        }

        row.style.opacity = "0";
        row.style.transform = "translateY(12px)";

        row.style.transition = "opacity 0.45s ease, transform 0.45s ease";

        row.style.transitionDelay = `${Math.min(index * 55, 440)}ms`;

        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                row.style.opacity = "1";
                row.style.transform = "translateY(0)";
            });
        });
    });

    /* ==========================================
       04. DELETE PROJECT CONFIRMATION
    ========================================== */

    const deleteForms = projectPage.querySelectorAll(".project-delete-form");

    deleteForms.forEach(function (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();

            if (form.dataset.confirmed === "true") {
                return;
            }

            const submitButton = form.querySelector('button[type="submit"]');

            function submitDelete() {
                form.dataset.confirmed = "true";

                if (submitButton) {
                    submitButton.disabled = true;
                }

                form.submit();
            }

            if (typeof Swal !== "undefined") {
                Swal.fire({
                    title: "Delete this project?",

                    text: "This project will be permanently removed. This action cannot be undone.",

                    icon: "warning",

                    showCancelButton: true,

                    confirmButtonText: "Yes, delete it",

                    cancelButtonText: "Keep project",

                    reverseButtons: true,

                    focusCancel: true,

                    customClass: {
                        popup: "backend-swal-popup",
                        title: "backend-swal-title",
                        htmlContainer: "backend-swal-message",
                    },
                }).then(function (result) {
                    if (result.isConfirmed) {
                        submitDelete();
                    }
                });
            } else {
                if (
                    window.confirm(
                        "Are you sure you want to delete this project?",
                    )
                ) {
                    submitDelete();
                }
            }
        });
    });

    console.log("[Projects] Premium project index initialized.");
});
