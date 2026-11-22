document.addEventListener("DOMContentLoaded", function () {
    const activityRows = document.getElementById("activityRows");
    const focusRows = document.getElementById("focusRows");
    const addActivity = document.getElementById("addActivity");
    const addFocus = document.getElementById("addFocus");

    if (!activityRows && !focusRows) return;

    let focusIndex = Number(focusRows?.dataset.nextIndex || 0);

    function addDynamicRow(container, name, placeholder) {
        if (!container) return;

        const row = document.createElement("div");
        row.className = "edu-dynamic-row";

        const input = document.createElement("input");
        input.type = "text";
        input.name = name;
        input.className = "form-control";
        input.placeholder = placeholder;

        const remove = document.createElement("button");
        remove.type = "button";
        remove.className = "edu-remove-small-btn";
        remove.setAttribute("data-remove-dynamic", "");
        remove.innerHTML = '<i class="fas fa-times"></i>';

        row.append(input, remove);
        container.appendChild(row);
    }

    addActivity?.addEventListener("click", function () {
        addDynamicRow(
            activityRows,
            "github_activities[]",
            "Enter technical activity",
        );
    });

    addFocus?.addEventListener("click", function () {
        if (!focusRows) return;

        const index = focusIndex++;
        const row = document.createElement("div");

        row.className = "edu-focus-form";

        row.innerHTML = `
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="form-group edu-form-group">
                        <label>Card Title</label>
                        <input type="text" name="focus_cards[${index}][title]" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group edu-form-group">
                        <label>Description</label>
                        <input type="text" name="focus_cards[${index}][description]" class="form-control">
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="button" class="edu-remove-small-btn" data-remove-dynamic>
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;

        focusRows.appendChild(row);
    });

    document.addEventListener("click", function (event) {
        const button = event.target.closest("[data-remove-dynamic]");

        if (!button) return;

        button.closest(".edu-dynamic-row, .edu-focus-form")?.remove();
    });
});
