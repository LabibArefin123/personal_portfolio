document.addEventListener("DOMContentLoaded", () => {
    const previews = document.querySelectorAll(".project-preview");
    previews.forEach((image) => {
        const websiteUrl = image.dataset.url;

        if (!websiteUrl) return;

        try {
            const encodedUrl = encodeURIComponent(websiteUrl);

            image.src = `https://api.microlink.io/?url=${encodedUrl}&screenshot=true&meta=false&embed=screenshot.url`;

            image.onerror = () => {
                image.src = "/images/project-placeholder.jpg";
            };
        } catch (error) {
            console.error("Project preview failed:", websiteUrl);
        }
    });
});
