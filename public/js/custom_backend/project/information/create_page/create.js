document.addEventListener("DOMContentLoaded", function () {
    const projectSelect = document.getElementById("projectSelect");
    const confirmBtn = document.getElementById("confirmProject");
    const cancelBtn = document.getElementById("cancelProject");
    const step2 = document.getElementById("step2");

    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");

    const dynamicFields = document.getElementById("dynamicFields");

    // =========================
    // STEP CONTROL
    // =========================
    confirmBtn.addEventListener("click", function () {
        if (!projectSelect.value) {
            alert("Please select project");
            return;
        }
        step2.style.display = "block";
    });

    cancelBtn.addEventListener("click", function () {
        projectSelect.value = "";
        step2.style.display = "none";
        dynamicFields.innerHTML = "";
        imagePreview.innerHTML = "";
    });

    // =========================
    // IMAGE PREVIEW
    // =========================
    imageInput.addEventListener("change", function () {
        imagePreview.innerHTML = "";

        Array.from(this.files).forEach((file) => {
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = new Image();
                img.src = e.target.result;

                img.onload = function () {
                    const safe = file.size < 5 * 1024 * 1024;

                    imagePreview.innerHTML += `
                        <div class="col-md-4 mb-3">
                            <div class="card p-2">
                                <img src="${e.target.result}" style="width:100%;height:180px;object-fit:cover">

                                <div class="mt-2 small">
                                    <div><b>${file.name}</b></div>
                                    <div>Size: ${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                                    <div>Dimension: ${this.width} x ${this.height}</div>

                                    <div class="${safe ? "text-success" : "text-danger"}">
                                        ${safe ? "✔ Safe" : "✖ Too Large"}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                };
            };

            reader.readAsDataURL(file);
        });
    });

    // =========================
    // ALL BUTTONS (FIXED)
    // =========================
    document.querySelectorAll(".add-field").forEach((button) => {
        button.addEventListener("click", function () {
            const field = this.dataset.field;

            const isMulti = ["custom_features", "project_languages"].includes(
                field,
            );

            const wrapper = document.createElement("div");
            wrapper.classList.add("mb-2");

            // =========================
            // MULTI INPUT (FEATURES + LANGUAGES)
            // =========================
            if (isMulti) {
                wrapper.innerHTML = `
                    <div class="d-flex gap-2 mb-2 align-items-start">

                        <input type="text"
                            name="${field}[]"
                            class="form-control"
                            placeholder="Enter ${field.replace("_", " ")}">

                        <button type="button" class="btn btn-success add-row">+</button>
                        <button type="button" class="btn btn-danger remove-row">×</button>

                    </div>
                `;

                dynamicFields.appendChild(wrapper);

                attachMultiEvents(wrapper);
            }

            // =========================
            // SINGLE INPUT (ALL OTHERS)
            // =========================
            else {
                // prevent duplicates
                if (document.querySelector(`[data-single="${field}"]`)) {
                    return;
                }

                let inputHTML = "";

                if (["project_link", "github_link"].includes(field)) {
                    inputHTML = `<input type="text" name="${field}" class="form-control" placeholder="Enter ${field.replace("_", " ")}">`;
                } else {
                    inputHTML = `<textarea name="${field}" class="form-control" rows="3" placeholder="Enter ${field.replace("_", " ")}"></textarea>`;
                }

                wrapper.innerHTML = `
                    <div data-single="${field}" class="mb-3">
                        <label class="form-label text-capitalize">${field.replace("_", " ")}</label>
                        ${inputHTML}
                    </div>
                `;

                dynamicFields.appendChild(wrapper);
            }
        });
    });

    // =========================
    // MULTI FIELD EVENTS
    // =========================
    function attachMultiEvents(wrapper) {
        wrapper
            .querySelector(".remove-row")
            .addEventListener("click", function () {
                wrapper.remove();
            });

        wrapper
            .querySelector(".add-row")
            .addEventListener("click", function () {
                const clone = wrapper.cloneNode(true);
                clone.querySelector("input").value = "";

                dynamicFields.appendChild(clone);

                attachMultiEvents(clone);
            });
    }
});
