document.addEventListener("DOMContentLoaded", function () {
    const results = document.getElementById("projectResults");
    const searchInput = document.getElementById("projectSearch");
    const categorySelect = document.getElementById("projectCategory");
    const loading = document.getElementById("projectSearchLoading");
    const categoryButtons = document.querySelectorAll(
        ".portfolio-category-btn",
    );

    // Run only on the project listing page.
    if (!results || !searchInput || !categorySelect) {
        return;
    }

    const endpoint = results.dataset.url;

    if (!endpoint) {
        console.error("Project AJAX: Missing endpoint URL.");
        return;
    }

    let debounceTimer = null;
    let activeController = null;

    // Update active category buttons.
    function updateCategoryButtons(category) {
        categoryButtons.forEach((button) => {
            button.classList.toggle(
                "active",
                (button.dataset.category || "") === category,
            );
        });
    }

    // Restore search and category from URL.
    function restoreFilters() {
        const params = new URLSearchParams(window.location.search);

        searchInput.value = params.get("search") || "";
        categorySelect.value = params.get("category") || "";

        updateCategoryButtons(categorySelect.value);
    }

    // Build filter URL.
    function buildFilterUrl() {
        const url = new URL(endpoint, window.location.origin);

        const search = searchInput.value.trim();
        const category = categorySelect.value;

        if (search) {
            url.searchParams.set("search", search);
        }

        if (category) {
            url.searchParams.set("category", category);
        }

        return url;
    }

    // Load projects.
    async function loadProjects(url = null, updateHistory = true) {
        const requestUrl = url
            ? new URL(url, window.location.origin)
            : buildFilterUrl();

        // Cancel previous request.
        if (activeController) {
            activeController.abort();
        }

        const controller = new AbortController();
        activeController = controller;

        results.classList.add("is-loading");
        loading?.classList.add("active");

        try {
            const response = await fetch(requestUrl.toString(), {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Accept: "application/json",
                },
                signal: controller.signal,
            });

            if (!response.ok) {
                throw new Error("Project request failed: " + response.status);
            }

            const contentType = response.headers.get("content-type") || "";

            if (!contentType.includes("application/json")) {
                throw new Error("Server did not return a JSON response.");
            }

            const data = await response.json();

            if (typeof data.html !== "string") {
                throw new Error("Invalid project response.");
            }

            // Update project results.
            results.innerHTML = data.html;

            // Keep search and category synchronized with the URL.
            searchInput.value = requestUrl.searchParams.get("search") || "";
            categorySelect.value =
                requestUrl.searchParams.get("category") || "";

            updateCategoryButtons(categorySelect.value);

            // Add filter state to browser history.
            if (updateHistory) {
                window.history.pushState({}, "", requestUrl.toString());
            }
        } catch (error) {
            if (error.name !== "AbortError") {
                console.error("Project AJAX Error:", error);

                results.innerHTML = `
                    <div class="portfolio-project-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Unable to load projects. Please try again.</p>
                    </div>
                `;
            }
        } finally {
            // Only the latest request can remove the loading state.
            if (activeController === controller) {
                activeController = null;
                results.classList.remove("is-loading");
                loading?.classList.remove("active");
            }
        }
    }

    // Search with debounce.
    searchInput.addEventListener("input", function () {
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(function () {
            loadProjects();
        }, 350);
    });

    // Category dropdown.
    categorySelect.addEventListener("change", function () {
        updateCategoryButtons(this.value);
        loadProjects();
    });

    // Category buttons.
    categoryButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const category = this.dataset.category || "";

            categorySelect.value = category;

            updateCategoryButtons(category);

            loadProjects();
        });
    });

    // AJAX pagination.
    results.addEventListener("click", function (event) {
        const link = event.target.closest(".pagination a");

        if (!link) {
            return;
        }

        event.preventDefault();

        loadProjects(link.href);
    });

    // Browser back and forward.
    window.addEventListener("popstate", function () {
        restoreFilters();

        loadProjects(window.location.href, false);
    });

    // Initial setup.
    restoreFilters();

    console.log("Project AJAX initialized.");
});
