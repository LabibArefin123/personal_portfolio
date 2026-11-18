/* ==========================================================
   USER PROFILE SHOW PAGE
========================================================== */

document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    const profilePage = document.querySelector(".profile-page-container");

    if (!profilePage) {
        return;
    }

    /* ==========================================
       01. SCROLL REVEAL ANIMATION
    ========================================== */

    const revealItems = profilePage.querySelectorAll(".profile-reveal");

    if ("IntersectionObserver" in window) {
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
                rootMargin: "0px 0px -30px 0px",
            },
        );

        revealItems.forEach(function (item, index) {
            item.style.transitionDelay = `${Math.min(index * 70, 280)}ms`;
            revealObserver.observe(item);
        });
    } else {
        revealItems.forEach(function (item) {
            item.classList.add("is-visible");
        });
    }

    /* ==========================================
       02. PROFILE COMPLETION PROGRESS
    ========================================== */

    const progressBar = profilePage.querySelector(".profile-progress-bar");

    if (progressBar) {
        const progress = Math.min(
            100,
            Math.max(0, Number(progressBar.dataset.progress) || 0),
        );

        requestAnimationFrame(function () {
            progressBar.style.width = `${progress}%`;
        });
    }

    /* ==========================================
       03. ANIMATED PROFILE STRENGTH CIRCLE
    ========================================== */

    const strengthCircle = profilePage.querySelector(
        ".profile-strength-circle",
    );

    if (strengthCircle) {
        const completion = Math.min(
            100,
            Math.max(0, Number(strengthCircle.dataset.completion) || 0),
        );

        const prefersReducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)",
        ).matches;

        const setCircleProgress = function (value) {
            const degrees = value * 3.6;

            strengthCircle.style.background = `
                conic-gradient(
                    #2563eb ${degrees}deg,
                    #edf1f7 ${degrees}deg
                )
            `;
        };

        if (prefersReducedMotion) {
            setCircleProgress(completion);
        } else {
            let current = 0;
            const duration = 1100;
            const start = performance.now();

            function animateCircle(timestamp) {
                const elapsed = timestamp - start;
                const progress = Math.min(elapsed / duration, 1);

                // Smooth ease-out animation.
                const eased = 1 - Math.pow(1 - progress, 3);

                current = completion * eased;
                setCircleProgress(current);

                if (progress < 1) {
                    requestAnimationFrame(animateCircle);
                }
            }

            requestAnimationFrame(animateCircle);
        }
    }

    /* ==========================================
       04. EDIT PROFILE CONFIRMATION
    ========================================== */

    const editButtons = profilePage.querySelectorAll(
        "#editProfileBtn, #heroEditProfileBtn, #quickEditProfileBtn",
    );

    editButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const destination = button.getAttribute("href");

            if (!destination) {
                return;
            }

            if (typeof Swal !== "undefined") {
                Swal.fire({
                    title: "Edit your profile?",
                    text: "You can update your personal and contact information.",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, continue",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    buttonsStyling: true,
                    customClass: {
                        popup: "backend-swal-popup",
                        title: "backend-swal-title",
                        htmlContainer: "backend-swal-message",
                    },
                }).then(function (result) {
                    if (result.isConfirmed) {
                        window.location.href = destination;
                    }
                });
            } else {
                if (window.confirm("Do you want to edit your profile?")) {
                    window.location.href = destination;
                }
            }
        });
    });

    /* ==========================================
       05. COPY PROFILE INFORMATION
    ========================================== */

    const copyButtons = profilePage.querySelectorAll(".profile-copy-btn");

    copyButtons.forEach(function (button) {
        button.addEventListener("click", async function () {
            const value = button.dataset.copy;

            if (!value) {
                return;
            }

            try {
                await navigator.clipboard.writeText(value);

                const icon = button.querySelector("i");

                button.classList.add("is-copied");

                if (icon) {
                    icon.classList.remove("fa-copy");
                    icon.classList.add("fa-check");
                }

                if (typeof Swal !== "undefined") {
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        title: "Copied successfully",
                        text: value,
                        showConfirmButton: false,
                        timer: 1800,
                        timerProgressBar: true,
                        customClass: {
                            popup: "backend-swal-popup",
                            title: "backend-swal-title",
                        },
                    });
                }

                window.setTimeout(function () {
                    button.classList.remove("is-copied");

                    if (icon) {
                        icon.classList.remove("fa-check");
                        icon.classList.add("fa-copy");
                    }
                }, 1800);
            } catch (error) {
                console.error(
                    "[User Profile] Clipboard operation failed:",
                    error,
                );

                if (typeof Swal !== "undefined") {
                    Swal.fire({
                        icon: "error",
                        title: "Unable to copy",
                        text: "Please copy the information manually.",
                    });
                } else {
                    window.alert("Unable to copy. Please copy it manually.");
                }
            }
        });
    });

    console.log("[User Profile] Premium profile page initialized.");
});
