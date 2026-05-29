window.selectedPermissions = [];

window.generatedPermissions = [];

const resourceInput = document.getElementById("permissionResourceInput");

const generatedPermissionList = document.getElementById(
    "generatedPermissionList",
);

const selectedPermissionWrapper = document.getElementById(
    "selectedPermissionWrapper",
);

const selectedCount = document.getElementById("permissionSelectedCount");

const saveAllButton = document.getElementById("saveAllPermissions");

const modal = new bootstrap.Modal(
    document.getElementById("permissionGeneratorModal"),
);

/* =========================================
   RESOURCE ACTIONS
========================================= */

const resourceActions = [
    "index",
    "create",
    "store",
    "show",
    "edit",
    "update",
    "destroy",
    "delete",
    "status",
    "manage",
];

/* =========================================
   GENERATE PERMISSIONS
========================================= */

resourceInput.addEventListener("keyup", function () {
    const resource = this.value.trim().toLowerCase();

    if (resource.length < 2) {
        return;
    }

    generatedPermissions = resourceActions.map((action) => {
        return `${resource}.${action}`;
    });

    generatedPermissions = generatedPermissions.filter((permission) => {
        return !window.existingPermissions.includes(permission);
    });

    renderGeneratedPermissions();

    modal.show();
});

/* =========================================
   RENDER GENERATED
========================================= */

function renderGeneratedPermissions() {
    generatedPermissionList.innerHTML = "";

    if (generatedPermissions.length === 0) {
        generatedPermissionList.innerHTML = `

            <div class="alert alert-warning mb-0">

                All permissions already exist.

            </div>

        `;

        return;
    }

    generatedPermissions.forEach((permission) => {
        generatedPermissionList.innerHTML += `

            <label class="generated-permission-item">

                <input type="checkbox"
                       class="generated-checkbox"
                       value="${permission}">

                <div class="generated-permission-content">

                    <div class="generated-circle"></div>

                    <div class="permission-text-group">

                        <strong>${permission}</strong>

                    </div>

                </div>

            </label>

        `;
    });
}
