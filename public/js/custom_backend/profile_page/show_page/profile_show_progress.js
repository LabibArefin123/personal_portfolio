/* ==========================================================
   USER PROFILE SHOW - PROFILE PROGRESS
========================================================== */

(function (window) {
    "use strict";

    const ProfileShow = window.ProfileShow;

    ProfileShow.initProgress = function () {
        const profilePage = ProfileShow.state.profilePage;

        if (!profilePage) {
            return;
        }

        /* ==========================================
           01. PROFILE COMPLETION PROGRESS BAR
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
           02. ANIMATED PROFILE STRENGTH CIRCLE
        ========================================== */

        const strengthCircle = profilePage.querySelector(
            ".profile-strength-circle",
        );

        if (!strengthCircle) {
            return;
        }

        const completion = Math.min(
            100,
            Math.max(0, Number(strengthCircle.dataset.completion) || 0),
        );

        const prefersReducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)",
        ).matches;

        /* Update circle background. */

        const setCircleProgress = function (value) {
            const degrees = value * 3.6;

            strengthCircle.style.background = `
                conic-gradient(
                    #2563eb ${degrees}deg,
                    #edf1f7 ${degrees}deg
                )
            `;
        };

        /* Respect reduced motion preference. */

        if (prefersReducedMotion) {
            setCircleProgress(completion);

            return;
        }

        /* ==========================================
           SMOOTH CIRCLE ANIMATION
        ========================================== */

        const duration = 1100;
        const start = performance.now();

        function animateCircle(timestamp) {
            const elapsed = timestamp - start;

            const progress = Math.min(elapsed / duration, 1);

            // Smooth ease-out animation.

            const eased = 1 - Math.pow(1 - progress, 3);

            const current = completion * eased;

            setCircleProgress(current);

            if (progress < 1) {
                requestAnimationFrame(animateCircle);
            }
        }

        requestAnimationFrame(animateCircle);
    };
})(window);
