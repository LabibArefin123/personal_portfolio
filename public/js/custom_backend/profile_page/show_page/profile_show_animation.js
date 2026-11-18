/* ==========================================================
   USER PROFILE SHOW - SCROLL ANIMATIONS
========================================================== */

(function (window) {
    "use strict";

    const ProfileShow = window.ProfileShow;

    ProfileShow.initAnimation = function () {
        const profilePage = ProfileShow.state.profilePage;

        if (!profilePage) {
            return;
        }

        /* ==========================================
           SCROLL REVEAL ANIMATION
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
    };
})(window);
