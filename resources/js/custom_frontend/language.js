// ===============================
// 🔹 INIT GOOGLE TRANSLATE
// ===============================
window.googleTranslateElementInit = function () {
    new google.translate.TranslateElement(
        {
            pageLanguage: "en",
            includedLanguages: "en,bn",
            autoDisplay: false,
        },
        "google_translate_element",
    );
};

// ===============================
// 🔥 REMOVE GOOGLE TOP BAR
// ===============================
function removeGoogleBar() {
    const banner = document.querySelector("iframe.goog-te-banner-frame");
    const skip = document.querySelector(".skiptranslate");

    if (banner) banner.remove();
    if (skip) skip.remove();

    document.body.style.top = "0px";
}

// Run continuously (Google injects late)
setInterval(removeGoogleBar, 1000);

// ===============================
// 🔥 SET LANGUAGE (FIXED)
// ===============================
function setGoogleLanguage(lang) {
    let tries = 0;

    const interval = setInterval(() => {
        const select = document.querySelector(".goog-te-combo");

        if (select) {
            select.value = lang;
            select.dispatchEvent(new Event("change"));
            clearInterval(interval);
        }

        // stop after 10 seconds to avoid infinite loop
        tries++;
        if (tries > 50) clearInterval(interval);
    }, 200);
}

// ===============================
// 🔹 BUTTON LOGIC
// ===============================
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("langToggle");

    if (!btn) return; // safety

    // 🔹 Restore saved language
    const savedLang = localStorage.getItem("site_lang") || "en";

    btn.innerText = savedLang.toUpperCase();

    // Apply saved language AFTER delay (important)
    setTimeout(() => {
        if (savedLang === "bn") {
            setGoogleLanguage("bn");
        }
    }, 1500);

    // 🔹 Toggle click
    btn.addEventListener("click", function () {
        const currentLang = btn.innerText.toLowerCase();
        const newLang = currentLang === "en" ? "bn" : "en";

        setGoogleLanguage(newLang);

        btn.innerText = newLang.toUpperCase();
        localStorage.setItem("site_lang", newLang);
    });
});
