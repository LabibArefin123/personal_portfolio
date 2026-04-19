// 🔹 Core bootstrap (must be first)
import "./bootstrap";

// 🔹 Third-party libraries
import Alpine from "alpinejs";

// 🔹 Initialize libraries
window.Alpine = Alpine;
Alpine.start();


// 🔹 Styles (load after JS setup)
import "../scss/frontend/about/about.scss";
import "../scss/frontend/skill/skill.scss";
import "../scss/frontend/technical_skill/technical_skill.scss";
