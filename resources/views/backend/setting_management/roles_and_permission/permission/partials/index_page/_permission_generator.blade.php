{{-- Smart Permission Generator --}}
<div class="card permission-generator-card mb-4">

    {{-- Generator Header --}}
    <div class="card-header bg-white border-0">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h5 class="mb-1 fw-bold">
                    <i class="fas fa-magic text-primary me-1"></i>
                    Smart Permission Generator
                </h5>

                <small class="text-muted">
                    Type resource name to auto generate permissions
                </small>
            </div>

            <div class="permission-counter-badge">
                <span id="permissionSelectedCount">0</span>
                Selected
            </div>

        </div>
    </div>

    {{-- Generator Body --}}
    <div class="card-body">

        <div class="form-group">
            <label for="permissionResourceInput" class="fw-semibold">
                Resource Name
            </label>

            <input type="text" id="permissionResourceInput" class="form-control permission-input"
                placeholder="Example: users, roles, products" autocomplete="off">
        </div>

        {{-- Selected Permissions --}}
        <div id="selectedPermissionWrapper" class="selected-permission-wrapper mt-4">
        </div>

    </div>

    {{-- Generator Footer --}}
    <div class="card-footer bg-white border-0 text-end">

        <button type="button" id="saveAllPermissions" class="btn btn-primary save-final-btn d-none">

            <i class="fas fa-save me-1"></i>
            Save Permissions

        </button>

    </div>

</div>


{{-- ==========================================
    Hidden Permission Save Form
========================================== --}}

<form method="POST" action="{{ route('permissions.store') }}" id="permissionSaveForm">

    @csrf

    <div id="generatedPermissionInputs"></div>

</form>
