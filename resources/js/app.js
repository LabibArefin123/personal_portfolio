// 🔹 Core bootstrap (must be first)
import "./bootstrap";

// 🔹 Third-party libraries
import Alpine from "alpinejs";

// 🔹 Initialize libraries
window.Alpine = Alpine;
Alpine.start();


// 🔹 Styles (load after JS setup)
import "../scss/frontend/layout/layout.scss";
import "../scss/frontend/hero/hero.scss";
import "../scss/frontend/about/about.scss";
import "../scss/frontend/skill/skill.scss";
import "../scss/frontend/technical_skill/technical_skill.scss";
import "../scss/frontend/contact/contact.scss";
import "../scss/frontend/footer/footer.scss";