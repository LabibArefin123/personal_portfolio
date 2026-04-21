// 🔹 Core bootstrap (must be first)
import "./bootstrap";

// 🔹 Third-party libraries
import Alpine from "alpinejs";

// 🔹 Initialize libraries
window.Alpine = Alpine;
Alpine.start();

// 🔹 Styles (load after JS setup)
import "../scss/frontend/welcome_page/layout/layout.scss";
import "../scss/frontend/welcome_page/hero/hero.scss";
import "../scss/frontend/welcome_page/quote/quote.scss";
import "../scss/frontend/welcome_page/about/about.scss";
import "../scss/frontend/welcome_page/service/service.scss";
import "../scss/frontend/welcome_page/skill/skill.scss";
import "../scss/frontend/welcome_page/tech/tech.scss";
import "../scss/frontend/welcome_page/technical_skill/technical_skill.scss";
import "../scss/frontend/welcome_page/experience/experience.scss";
import "../scss/frontend/welcome_page/footer/footer.scss";

//Contact Page
import "../scss/frontend/contact/contact.scss";
