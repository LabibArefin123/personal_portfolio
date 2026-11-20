document.addEventListener("DOMContentLoaded", function () {
    function initializeProjectPreviews(root = document) {
        const previews = root.querySelectorAll(".project-preview");

        previews.forEach(function (image) {
            if (image.dataset.previewInitialized === "true") return;

            image.dataset.previewInitialized = "true";

            const websiteUrl = image.dataset.url?.trim();
            const fallbackImage =
                image.dataset.fallback || "/uploads/images/default.jpg";
            const defaultImage = "/uploads/images/default.jpg";

            if (!websiteUrl) return;

            let fallbackUsed = false;

            image.onerror = function () {
                if (!fallbackUsed) {
                    fallbackUsed = true;
                    image.src = fallbackImage;
                    return;
                }

                image.onerror = null;

                if (!image.src.endsWith(defaultImage)) {
                    image.src = defaultImage;
                }
            };

            image.src = `https://api.microlink.io/?url=${encodeURIComponent(websiteUrl)}&screenshot=true&meta=false&embed=screenshot.url`;
        });
    }

    initializeProjectPreviews();

    const results = document.getElementById("projectResults");

    if (results) {
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                mutation.addedNodes.forEach(function (node) {
                    if (node.nodeType === Node.ELEMENT_NODE) {
                        initializeProjectPreviews(node);
                    }
                });
            });
        });

        observer.observe(results, {
            childList: true,
            subtree: true,
        });
    }
});
