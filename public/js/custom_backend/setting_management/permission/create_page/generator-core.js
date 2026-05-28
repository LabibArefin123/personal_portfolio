window.selectedPermissions = [];

window.generatedPermissions = [];

const crudActions = [
    "view",
    "create",
    "edit",
    "delete",
    "show",
    "status",
    "index",
    "manage",
];

const resourceInput = document.getElementById("permissionResourceInput");

const generatedPermissionList = document.getElementById(
    "generatedPermissionList",
);

const selectedPermissionWrapper = document.getElementById(
    "selectedPermissionWrapper",
);

const generatedPermissionInputs = document.getElementById(
    "generatedPermissionInputs",
);

const selectedCount = document.getElementById("permissionSelectedCount");

const saveAllButton = document.getElementById("saveAllPermissions");

const modal = new bootstrap.Modal(
    document.getElementById("permissionGeneratorModal"),
);

resourceInput.addEventListener("keyup", function () {
    const value = this.value.trim().toLowerCase();

    if (!value.endsWith("s")) {
        return;
    }

    generatedPermissions = crudActions.map((action) => {
        return `${action} ${value}`;
    });

    generatedPermissions = generatedPermissions.filter((permission) => {
        return !window.existingPermissions.includes(permission);
    });

    renderGeneratedPermissions();

    modal.show();
});

function renderGeneratedPermissions() {
    generatedPermissionList.innerHTML = "";

    generatedPermissions.forEach((permission) => {
        generatedPermissionList.innerHTML += `

            <label class="generated-permission-item">

                <input type="checkbox"
                       class="generated-checkbox"
                       value="${permission}">

                <div class="generated-permission-content">

                    <div class="generated-circle"></div>

                    <span>

                        ${permission}

                    </span>

                </div>

            </label>

        `;
    });
}
