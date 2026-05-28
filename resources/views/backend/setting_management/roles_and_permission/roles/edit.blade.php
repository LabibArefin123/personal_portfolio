@extends('adminlte::page')

@section('title', 'Edit Role')

@section('css')

<link rel="stylesheet"
      href="{{ asset('css/backend/setting_management/roles/edit_page/edit.css') }}">

@stop

@section('content_header')

<div class="role-header-wrapper">

    <div>

        <h1 class="role-page-title">

            Edit Role

        </h1>

        <p class="role-page-subtitle">

            Manage role permissions and access access rules

        </p>

    </div>

    <a href="{{ route('roles.index') }}"
       class="btn btn-dark back-role-btn">

        <i class="fas fa-arrow-left"></i>

        Back
    </a>

</div>

@stop

@section('content')

@if ($errors->any())

    <div class="alert alert-danger shadow-sm border-0">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form method="POST"
      action="{{ route('roles.update', $role->id) }}">

    @csrf
    @method('PUT')

    <!-- ROLE CARD -->

    <div class="card role-main-card border-0 shadow-sm">

        <div class="card-body">

            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Role Name

                </label>

                <input type="text"
                       name="name"
                       class="form-control role-input"
                       value="{{ old('name', $role->name) }}">

            </div>

            <!-- TOOLBAR -->

            <div class="permission-toolbar">

                <div class="permission-selected-info">

                    <span id="selectedCount">

                        0

                    </span>

                    permissions selected

                </div>

                <div class="permission-toolbar-actions">

                    <button type="button"
                            class="btn btn-primary btn-sm"
                            id="selectAllPermissions">

                        <i class="fas fa-check-circle"></i>

                        Select All
                    </button>

                    <button type="button"
                            class="btn btn-outline-danger btn-sm"
                            id="unselectAllPermissions">

                        <i class="fas fa-times-circle"></i>

                        Clear
                    </button>

                </div>

            </div>

          

            <!-- SCROLLABLE CONTAINER -->

            <div class="permission-scroll-container">

                @foreach ($groupedPermissions as $group => $groupPermissions)

                    <div class="permission-group">

                        <div class="permission-group-header">

                            <div>

                                <h5>

                                    {{ ucfirst($group) }}

                                </h5>

                                <small>

                                    {{ count($groupPermissions) }} Permissions

                                </small>

                            </div>

                            <div class="d-flex gap-2">

                                <button type="button"
                                        class="btn btn-sm btn-outline-primary select-group-btn"
                                        data-group="{{ $group }}">

                                    Select
                                </button>

                                <button type="button"
                                        class="btn btn-sm btn-outline-danger unselect-group-btn"
                                        data-group="{{ $group }}">

                                    Clear
                                </button>

                            </div>

                        </div>

                        <div class="row">

                            @foreach ($groupPermissions as $permission)

                                <div class="col-xl-3 col-lg-4 col-md-6 mb-3">

                                    <label class="permission-card">

                                        <input type="checkbox"
                                               name="permissions[]"
                                               value="{{ $permission->name }}"
                                               class="permission-checkbox perm-all perm-{{ $group }}"
                                               data-name="{{ $permission->name }}"
                                               {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>

                                        <div class="permission-card-inner">

                                           

                                            <div class="permission-content">

                                                <div class="permission-title">

                                                    {{ $permission->name }}

                                                </div>

                                            </div>

                                        </div>

                                    </label>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="text-end mt-4">

                <button type="submit"
                        class="btn btn-success role-submit-btn">

                    <i class="fas fa-save"></i>

                    Update Role
                </button>

            </div>

        </div>

    </div>

</form>

@stop

@section('js')

<script src="{{ asset('js/custom_backend/setting_management/roles/edit_page/edit.js') }}"></script>

@stop