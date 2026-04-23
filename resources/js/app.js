// 🔹 Core bootstrap (must be first)
import "./bootstrap";
// 🔹 Third-party libraries
import Alpine from "alpinejs";

// 🔹 Initialize libraries
window.Alpine = Alpine;
Alpine.start();

// 🔹 Styles (load after JS setup)
import "../scss/frontend/custom_language.scss";
import "../scss/frontend/back_to_top.scss";
import "../scss/frontend/welcome_page/layout/layout.scss";
import "../scss/frontend/welcome_page/hero/hero.scss";
import "../scss/frontend/welcome_page/quote/quote.scss";
import "../scss/frontend/welcome_page/about/about.scss";
import "../scss/frontend/welcome_page/service/service.scss";
import "../scss/frontend/welcome_page/skill/skill.scss";
import "../scss/frontend/welcome_page/tech/tech.scss";
import "../scss/frontend/welcome_page/technical_skill/technical_skill.scss";
import "../scss/frontend/welcome_page/experience/experience.scss";
import "../scss/frontend/welcome_page/project_section/project.scss";
import "../scss/frontend/welcome_page/footer/footer.scss";

//About Page
import "../scss/frontend/about/about.scss";

//Education Page
import "../scss/frontend/education/education.scss";

//Contact Page
import "../scss/frontend/contact/contact.scss";

//JS Section Start
import "../js/custom_frontend/scroll_progress.js";
import "../js/custom_frontend/language.js";
import "../js/custom_frontend/custom_back_to_top.js";
import "../js/custom_frontend/contact_success.js";
import "../js/custom_frontend/sweet_alert.js";
import "../js/custom_frontend/welcome_page/hero_section/card_swap.js";
import "../js/custom_frontend/welcome_page/hero_section/text_animation.js";
