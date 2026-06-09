document.addEventListener("DOMContentLoaded", () => {
    const menuBtn = document.getElementById("mobileMenuBtn");

    const sidebar = document.querySelector(".navbar-sidebar");

    const overlay = document.querySelector(".navbar-overlay");

    const closeBtn = document.querySelector(".navbar-close-btn");

    if (!menuBtn || !sidebar || !overlay) {
        return;
    }

    function openMenu() {
        sidebar.classList.add("show");

        overlay.classList.add("show");

        document.body.style.overflow = "hidden";
    }

    function closeMenu() {
        sidebar.classList.remove("show");

        overlay.classList.remove("show");

        document.body.style.overflow = "";
    }

    menuBtn.addEventListener("click", openMenu);

    if (closeBtn) {
        closeBtn.addEventListener("click", closeMenu);
    }

    overlay.addEventListener("click", closeMenu);

    document.querySelectorAll(".navbar-sidebar .nav-link").forEach((link) => {
        link.addEventListener("click", closeMenu);
    });

    document.addEventListener("touchstart", function (e) {
        if (
            sidebar.classList.contains("show") &&
            !sidebar.contains(e.target) &&
            !menuBtn.contains(e.target)
        ) {
            closeMenu();
        }
    });
});
