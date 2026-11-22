document.addEventListener("DOMContentLoaded", function () {
    const educationRows = document.getElementById("educationRows");
    const educationTemplate = document.getElementById("educationTemplate");
    const educationEmpty = document.getElementById("educationEmpty");
    const addEducation = document.getElementById("addEducation");
    const addEducationEmpty = document.getElementById("addEducationEmpty");

    if (!educationRows || !educationTemplate) return;

    let educationIndex = Number(educationRows.dataset.nextIndex || 0);

    function updateEducationState() {
        const rows = educationRows.querySelectorAll("[data-row]");

        if (educationEmpty) {
            educationEmpty.style.display = rows.length ? "none" : "block";
        }

        rows.forEach((row, index) => {
            const label = row.querySelector(".edu-row-index");

            if (label) {
                label.textContent = "RECORD " + (index + 1);
            }
        });
    }

    function addEducationRow() {
        const index = educationIndex++;
        const fragment = educationTemplate.content.cloneNode(true);
        const row = fragment.querySelector("[data-row]");

        if (!row) return;

        row.querySelectorAll("[data-name]").forEach((input) => {
            input.name = `educations[${index}][${input.dataset.name}]`;
        });

        const id = document.createElement("input");
        id.type = "hidden";
        id.name = `educations[${index}][id]`;
        id.value = "";

        const rowContent = row.querySelector(".row");

        if (rowContent) {
            row.insertBefore(id, rowContent);
        } else {
            row.appendChild(id);
        }

        const order = row.querySelector('[data-name="sort_order"]');

        if (order) {
            order.value = index + 1;
        }

        educationRows.appendChild(fragment);
        updateEducationState();
    }

    addEducation?.addEventListener("click", addEducationRow);
    addEducationEmpty?.addEventListener("click", addEducationRow);

    educationRows.addEventListener("click", function (event) {
        const button = event.target.closest("[data-remove-row]");

        if (!button) return;

        button.closest("[data-row]")?.remove();
        updateEducationState();
    });

    updateEducationState();
});
