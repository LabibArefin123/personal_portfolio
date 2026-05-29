document.addEventListener("DOMContentLoaded", function () {
    /* =========================================
       ADD SELECTED PERMISSIONS
    ========================================= */

    document
        .getElementById("addSelectedPermissions")
        .addEventListener("click", function () {
            document
                .querySelectorAll(".generated-checkbox:checked")
                .forEach((checkbox) => {
                    if (!window.selectedPermissions.includes(checkbox.value)) {
                        window.selectedPermissions.push(checkbox.value);
                    }
                });

            renderSelectedPermissions();

            bootstrap.Modal.getInstance(
                document.getElementById("permissionGeneratorModal"),
            ).hide();
        });

    /* =========================================
       SAVE ALL
    ========================================= */

    document
        .getElementById("saveAllPermissions")
        .addEventListener("click", savePermissionsAjax);
});

/* =========================================
   RENDER SELECTED
========================================= */

function renderSelectedPermissions() {
    selectedPermissionWrapper.innerHTML = "";

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

                <span>${permission}</span>

                <i class="fas fa-times remove-permission"></i>

            </div>

        `;
    });

    bindRemovePermission();
}

/* =========================================
   REMOVE PERMISSION
========================================= */

function bindRemovePermission() {
    document.querySelectorAll(".remove-permission").forEach((button) => {
        button.addEventListener("click", function () {
            const permission = this.parentElement.dataset.name;

            window.selectedPermissions = window.selectedPermissions.filter(
                (item) => item !== permission,
            );

            renderSelectedPermissions();
        });
    });
}

/* =========================================
   SAVE AJAX
========================================= */

function savePermissionsAjax() {
    if (window.selectedPermissions.length === 0) {
        toastr.warning("Please select permissions first.");

        return;
    }

    fetch("/permissions", {
        method: "POST",

        headers: {
            "Content-Type": "application/json",

            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),

            Accept: "application/json",
        },

        body: JSON.stringify({
            permissions: window.selectedPermissions,
        }),
    })
        .then((response) => response.json())

        .then((data) => {
            if (data.success) {
                data.permissions.forEach((permission) => {
                    toastr.success(permission + " created successfully");
                });

                setTimeout(() => {
                    window.location.reload();
                }, 1200);
            } else {
                toastr.error("Something went wrong.");
            }
        })

        .catch(() => {
            toastr.error("Server error occurred.");
        });
}
