document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("addSelectedPermissions")
        .addEventListener("click", function () {
            document
                .querySelectorAll(".generated-checkbox:checked")
                .forEach((cb) => {
                    if (!window.selectedPermissions.includes(cb.value)) {
                        window.selectedPermissions.push(cb.value);
                    }
                });

            renderSelectedPermissions();

            bootstrap.Modal.getInstance(
                document.getElementById("permissionGeneratorModal"),
            ).hide();
        });

    document
        .getElementById("saveAllPermissions")
        .addEventListener("click", function () {
            document.getElementById("permissionSaveForm").submit();
        });
});

function renderSelectedPermissions() {
    selectedPermissionWrapper.innerHTML = "";

    generatedPermissionInputs.innerHTML = "";

    selectedCount.innerText = window.selectedPermissions.length;

    if (window.selectedPermissions.length > 0) {
        saveAllButton.classList.remove("d-none");
    } else {
        saveAllButton.classList.add("d-none");
    }

    window.selectedPermissions.forEach((permission) => {
        selectedPermissionWrapper.innerHTML += `

            <div class="selected-permission-badge"
                 data-name="${permission}">

                ${permission}

                <i class="fas fa-times remove-permission"></i>

            </div>

        `;

        generatedPermissionInputs.innerHTML += `

            <input type="hidden"
                   name="permissions[]"
                   value="${permission}">

        `;
    });

    bindRemovePermission();
}

function bindRemovePermission() {
    document.querySelectorAll(".remove-permission").forEach((btn) => {
        btn.addEventListener("click", function () {
            const permission = this.parentElement.dataset.name;

            window.selectedPermissions = window.selectedPermissions.filter(
                (item) => item !== permission,
            );

            renderSelectedPermissions();
        });
    });
}
