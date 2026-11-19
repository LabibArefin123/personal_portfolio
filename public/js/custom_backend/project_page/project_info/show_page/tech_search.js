document.addEventListener("DOMContentLoaded", function () {
    const card = document.getElementById("piTechCard");

    if (!card) return;

    const input = document.getElementById("piTechSearch");
    const clear = document.getElementById("piTechClear");
    const results = document.getElementById("piTechResults");
    const count = document.getElementById("piTechCount");
    const hint = document.getElementById("piTechHint");
    const loading = document.getElementById("piTechLoading");

    const url = card.dataset.searchUrl;
    const originalHTML = results.innerHTML;
    const originalCount = parseInt(count.textContent.trim(), 10) || 0;

    let timer = null;
    let controller = null;
    let requestNumber = 0;

    function highlightText(text, query) {
        const fragment = document.createDocumentFragment();

        if (!query) {
            fragment.appendChild(document.createTextNode(text));
            return fragment;
        }

        const lowerText = text.toLowerCase();
        const lowerQuery = query.toLowerCase();

        let position = 0;
        let index;

        while ((index = lowerText.indexOf(lowerQuery, position)) !== -1) {
            fragment.appendChild(
                document.createTextNode(text.substring(position, index)),
            );

            const mark = document.createElement("mark");
            mark.className = "pi-search-highlight";
            mark.textContent = text.substring(index, index + query.length);

            fragment.appendChild(mark);

            position = index + query.length;
        }

        fragment.appendChild(document.createTextNode(text.substring(position)));

        return fragment;
    }

    function renderResults(items, query) {
        results.replaceChildren();

        if (!items.length) {
            const empty = document.createElement("div");
            empty.className = "pi-search-empty";

            const icon = document.createElement("i");
            icon.className = "fas fa-code";

            const title = document.createElement("strong");
            title.textContent = "No matching technologies found";

            const description = document.createElement("span");
            description.textContent = "Try another technology name.";

            empty.append(icon, title, description);
            results.appendChild(empty);
            return;
        }

        const fragment = document.createDocumentFragment();

        items.forEach(function (item, index) {
            const tag = document.createElement("span");

            tag.className = "pi-show-language-tag pi-search-result";
            tag.style.animationDelay = Math.min(index * 35, 210) + "ms";

            const icon = document.createElement("i");
            icon.className = "fas fa-code-branch";

            const text = document.createElement("span");
            text.className = "pi-search-result-text";
            text.appendChild(highlightText(String(item), query));

            tag.append(icon, text);
            fragment.appendChild(tag);
        });

        results.appendChild(fragment);
    }

    async function searchTechnologies(query) {
        if (controller) {
            controller.abort();
        }

        controller = new AbortController();

        const currentRequest = ++requestNumber;

        loading.hidden = false;
        results.style.opacity = "0.45";

        try {
            const params = new URLSearchParams({
                type: "languages",
                q: query,
            });

            const response = await fetch(url + "?" + params.toString(), {
                method: "GET",
                headers: {
                    Accept: "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                },
                signal: controller.signal,
            });

            if (!response.ok) {
                throw new Error("Unable to search technologies.");
            }

            const data = await response.json();

            if (currentRequest !== requestNumber) return;

            if (!data.success) {
                throw new Error("Technology search failed.");
            }

            renderResults(data.items, query);

            count.textContent = data.count;

            hint.textContent = query
                ? `${data.count} matching technology/technologies`
                : "Showing all technologies";
        } catch (error) {
            if (error.name === "AbortError") return;

            console.error("Technology search error:", error);

            hint.textContent = "Unable to search. Please try again.";
        } finally {
            if (currentRequest === requestNumber) {
                loading.hidden = true;
                results.style.opacity = "1";
            }
        }
    }

    input.addEventListener("input", function () {
        const query = this.value.trim();

        clear.hidden = query.length === 0;

        clearTimeout(timer);

        if (!query) {
            if (controller) controller.abort();

            requestNumber++;

            results.innerHTML = originalHTML;
            count.textContent = originalCount;
            hint.textContent = "Showing all technologies";
            loading.hidden = true;
            results.style.opacity = "1";

            return;
        }

        hint.textContent = "Searching technologies...";

        timer = setTimeout(function () {
            searchTechnologies(query);
        }, 300);
    });

    clear.addEventListener("click", function () {
        input.value = "";
        input.dispatchEvent(new Event("input"));
        input.focus();
    });
});
