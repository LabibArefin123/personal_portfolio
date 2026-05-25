document.addEventListener("DOMContentLoaded", function () {
    const data = window.editData;

    const projectSelect = document.getElementById("projectSelect");
    const confirmBtn = document.getElementById("confirmProject");
    const cancelBtn = document.getElementById("cancelProject");

    const dynamicFields = document.getElementById("dynamicFields");

    // =========================
    // STEP CONTROL
    // =========================
    confirmBtn.addEventListener("click", function () {
        document.getElementById("step2").style.display = "block";
    });

    cancelBtn.addEventListener("click", function () {
        location.reload();
    });

    // =========================
    // LOAD EXISTING DATA
    // =========================
    function loadArray(field, values) {
        if (!values) return;

        values.forEach((val) => {
            createMultiField(field, val);
        });
    }

    function createMultiField(field, value = "") {
        const wrapper = document.createElement("div");

        wrapper.innerHTML = `
            <div class="d-flex gap-2 mb-2 align-items-start">

                <input type="text"
                    name="${field}[]"
                    class="form-control"
                    value="${value}">

                <button type="button" class="btn btn-success add-row">+</button>
                <button type="button" class="btn btn-danger remove-row">×</button>

            </div>
        `;

        dynamicFields.appendChild(wrapper);

        wrapper.querySelector(".remove-row").addEventListener("click", () => {
            wrapper.remove();
        });

        wrapper.querySelector(".add-row").addEventListener("click", () => {
            createMultiField(field, "");
        });
    }

    // =========================
    // INIT MULTI FIELDS
    // =========================
    loadArray("custom_features", data.custom_features);
    loadArray("project_languages", data.project_languages);

    // =========================
    // SINGLE FIELD LOADER
    // =========================
    function setValue(name, value, type = "text") {
        const wrapper = document.createElement("div");

        wrapper.innerHTML = `
            <div class="mb-3" data-single="${name}">
                <label>${name.replace("_", " ")}</label>
                ${
                    type === "textarea"
                        ? `<textarea name="${name}" class="form-control">${value || ""}</textarea>`
                        : `<input type="text" name="${name}" class="form-control" value="${value || ""}">`
                }
            </div>
        `;

        dynamicFields.appendChild(wrapper);
    }

    setValue("challenges", data.challenges, "textarea");
    setValue("solution", data.solution, "textarea");
    setValue("conclusion", data.conclusion, "textarea");
    setValue("project_link", data.project_link);
    setValue("github_link", data.github_link);
});
