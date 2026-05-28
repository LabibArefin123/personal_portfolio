@extends('adminlte::page')

@section('title', 'Permissions List')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Permissions List</h1>
        @if (auth()->user()->hasRole('admin'))
            <button type="button" id="delete-selected" class="btn btn-danger btn-sm ms-2" title="Delete Selected">
                <i class="fas fa-trash-alt me-1"></i> Delete Selected
            </button>
        @endif
    </div>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input.</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <!-- Add Permission Form -->
            <div class="card permission-generator-card mb-4">

                <div class="card-header bg-white border-0">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <div>

                            <h5 class="mb-1 fw-bold">

                                Smart Permission Generator

                            </h5>

                            <small class="text-muted">

                                Type resource name to auto generate permissions

                            </small>

                        </div>

                        <div class="permission-counter-badge">

                            <span id="permissionSelectedCount">

                                0

                            </span>

                            Selected

                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <div class="form-group">

                        <label class="fw-semibold">

                            Resource Name

                        </label>

                        <input type="text" id="permissionResourceInput" class="form-control permission-input"
                            placeholder="Example: users, roles, products">

                    </div>

                    <!-- SELECTED PERMISSIONS -->

                    <div id="selectedPermissionWrapper" class="selected-permission-wrapper mt-4">

                    </div>

                </div>

                <div class="card-footer bg-white border-0 text-end">

                    <button type="button" id="saveAllPermissions" class="btn btn-primary save-final-btn d-none">

                        <i class="fas fa-save"></i>

                        Save Permissions
                    </button>

                </div>

            </div>

            <!-- HIDDEN FORM -->

            <form method="POST" action="{{ route('permissions.store') }}" id="permissionSaveForm">

                @csrf

                <div id="generatedPermissionInputs"></div>

            </form>

            <!-- MODAL -->

            <div class="modal fade" id="permissionGeneratorModal" tabindex="-1">

                <div class="modal-dialog modal-dialog-centered modal-lg">

                    <div class="modal-content permission-modal-content">

                        <div class="modal-header border-0">

                            <div>

                                <h5 class="modal-title fw-bold">

                                    Generated Permissions

                                </h5>

                                <small class="text-muted">

                                    Select permissions you want to add

                                </small>

                            </div>

                            <button type="button" class="btn-close" data-bs-dismiss="modal">

                            </button>

                        </div>

                        <div class="modal-body">

                            <div id="generatedPermissionList" class="generated-permission-list">

                            </div>

                        </div>

                        <div class="modal-footer border-0">

                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">

                                Cancel
                            </button>

                            <button type="button" class="btn btn-primary" id="addSelectedPermissions">

                                <i class="fas fa-check-circle"></i>

                                Add Selected Permissions
                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <script>
                window.existingPermissions = @json(\Spatie\Permission\Models\Permission::pluck('name'));
            </script>
            <!-- Permissions Table -->
            <table id="dataTables" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>SL</th>
                        <th>Permission Name</th>
                        <th class="text-center">Guard</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" class="row-checkbox" value="{{ $permission->id }}">
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class="text-center">{{ $permission->guard_name }}</td>
                            <td class="text-center">
                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('js/custom_backend/setting_management/permission/create_page/generator-core.js') }}"></script>

    <script src="{{ asset('js/custom_backend/setting_management/permission/create_page/generator-save.js') }}"></script>

    <script src="{{ asset('js/custom_backend/setting_management/permission/create_page/generator-ui.js') }}"></script>

    <script>
        $(document).ready(function() {
            let lastChecked = null;

            // Shift + Click to select range
            $('.row-checkbox').on('click', function(e) {
                if (!lastChecked) {
                    lastChecked = this;
                    return;
                }

                if (e.shiftKey) {
                    let start = $('.row-checkbox').index(this);
                    let end = $('.row-checkbox').index(lastChecked);

                    $('.row-checkbox').slice(Math.min(start, end), Math.max(start, end) + 1)
                        .prop('checked', lastChecked.checked);
                }

                lastChecked = this;

                // Update "Select All" checkbox
                const allChecked = $('.row-checkbox').length === $('.row-checkbox:checked').length;
                $('#select-all').prop('checked', allChecked);
            });

            // Select / Deselect all checkboxes
            $('#select-all').on('click', function() {
                const checked = $(this).prop('checked');
                $('.row-checkbox').prop('checked', checked);
            });

            // Uncheck "Select All" if any single checkbox is unchecked
            $('#dataTables').on('change', '.row-checkbox', function() {
                const allChecked = $('.row-checkbox').length === $('.row-checkbox:checked').length;
                $('#select-all').prop('checked', allChecked);
            });

            // Handle bulk delete
            $('#delete-selected').on('click', function() {
                const ids = $('.row-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                if (ids.length === 0) {
                    alert('Please select at least one row to delete.');
                    return;
                }

                if (!confirm('Are you sure you want to delete selected permissions?')) return;

                $.ajax({
                    url: '{{ route('permissions.deleteSelected') }}', // Route for bulk delete
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: ids
                    },
                    success: function(res) {
                        alert(res.message || 'Selected permissions deleted successfully.');
                        location.reload();
                    },
                    error: function() {
                        alert('Something went wrong!');
                    }
                });
            });
        });
    </script>

@endsection
