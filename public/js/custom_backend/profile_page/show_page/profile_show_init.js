/* ==========================================================
   USER PROFILE SHOW - MAIN INITIALIZATION
========================================================== */

(function (window, document) {
    "use strict";

    window.ProfileShow = window.ProfileShow || {};

    const ProfileShow = window.ProfileShow;

    ProfileShow.state = {
        profilePage: null,
        editButtons: null,
        copyButtons: null,
    };

    /* ==========================================
       MAIN INITIALIZATION
    ========================================== */

    document.addEventListener("DOMContentLoaded", function () {
        const state = ProfileShow.state;

        state.profilePage = document.querySelector(".profile-page-container");

        if (!state.profilePage) {
            return;
        }

        state.editButtons = state.profilePage.querySelectorAll(
            "#editProfileBtn, #heroEditProfileBtn, #quickEditProfileBtn",
        );

        state.copyButtons =
            state.profilePage.querySelectorAll(".profile-copy-btn");

        /* Initialize individual modules. */

        ProfileShow.initAnimation();
        ProfileShow.initProgress();
        ProfileShow.initActions();
        ProfileShow.initCopy();

        console.log("[User Profile] Premium profile page initialized.");
    });
})(window, document);
