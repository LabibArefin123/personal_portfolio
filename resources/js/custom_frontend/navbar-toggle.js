document.addEventListener("DOMContentLoaded", () => {
    const navbarCollapse = document.getElementById("navbarCollapse");

    const navbarToggler = document.querySelector(".navbar-toggler");

    const navLinks = document.querySelectorAll(".navbar-menu .nav-link");

    if (!navbarCollapse) return;

    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
        toggle: false,
    });

    // CLOSE ON LINK CLICK
    navLinks.forEach((link) => {
        link.addEventListener("click", () => {
            if (window.innerWidth < 992) {
                bsCollapse.hide();
            }
        });
    });

    // CLOSE WHEN CLICK OUTSIDE
    document.addEventListener("click", (event) => {
        const isInsideNavbar =
            navbarCollapse.contains(event.target) ||
            navbarToggler.contains(event.target);

        if (!isInsideNavbar && navbarCollapse.classList.contains("show")) {
            bsCollapse.hide();
        }
    });

    // CLOSE ON ESC
    document.addEventListener("keydown", (event) => {
        if (
            event.key === "Escape" &&
            navbarCollapse.classList.contains("show")
        ) {
            bsCollapse.hide();
        }
    });
});
