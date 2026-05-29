
@extends('adminlte::page')

@section('title', 'Edit Role')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Edit Role</h1>

        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary d-flex align-items-center gap-2 back-btn">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">

                <line x1="19" y1="12" x2="5" y2="12"></line>

                <polyline points="12 19 5 12 12 5"></polyline>

            </svg>

            Back
        </a>
    </div>
@stop

@section('content')

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form method="POST" action="{{ route('roles.update', $role->id) }}">

        @csrf
        @method('PUT')

        <!-- ROLE NAME -->

        <div class="form-group">

            <label for="name">

                Role Name

            </label>

            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $role->name) }}">

            @error('name')
                <small class="text-danger">

                    {{ $message }}

                </small>
            @enderror

        </div>

        <!-- PERMISSION GROUPS -->

        @foreach ($groupedPermissions as $group => $groupPermissions)
            <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">

                <h5 class="text-primary mb-0 text-uppercase">

                    {{ ucfirst($group) }}

                </h5>

                <div class="d-flex gap-2">

                    <button type="button" class="btn btn-sm btn-outline-primary select-all-btn"
                        data-group="{{ $group }}">

                        Select All
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-danger unselect-all-btn"
                        data-group="{{ $group }}">

                        Unselect All
                    </button>

                </div>

            </div>

            <div class="card shadow-lg mt-2 border-0">

                <div class="card-body">

                    <div class="row">

                        @foreach ($groupPermissions as $permission)
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-2">

                                <div class="form-check permission-check-wrapper">

                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        class="form-check-input perm-{{ $group }}"
                                        id="permission_{{ md5($permission->name) }}"
                                        {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>

                                    <label class="form-check-label permission-label"
                                        for="permission_{{ md5($permission->name) }}">

                                        {{ $permission->name }}

                                    </label>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>
        @endforeach

        <div class="text-end mt-4">

            <button type="submit" class="btn btn-success px-4">

                <i class="fas fa-save me-1"></i>

                Update Role
            </button>

        </div>

    </form>

@stop

@section('css')

    <style>
        .back-btn {
            border-radius: 10px;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
        }

        .card {
            border-radius: 16px;
        }

        .permission-check-wrapper {

            background: #f8fafc;

            padding: 12px 14px;

            border-radius: 12px;

            border: 1px solid #e2e8f0;

            transition: 0.25s ease;
        }

        .permission-check-wrapper:hover {

            border-color: #0d6efd;

            background: #eff6ff;
        }

        .permission-label {

            font-size: 14px;

            font-weight: 500;

            cursor: pointer;

            margin-left: 6px;

            word-break: break-word;
        }

        .form-check-input {

            cursor: pointer;
        }

        .btn {

            border-radius: 10px;
        }

        @media (max-width: 768px) {

            .permission-label {

                font-size: 13px;
            }

            .permission-check-wrapper {

                padding: 10px 12px;
            }
        }
    </style>

@stop

@section('js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.select-all-btn').forEach(btn => {

                btn.addEventListener('click', function() {

                    const group = this.getAttribute('data-group');

                    document.querySelectorAll(`.perm-${group}`)
                        .forEach(cb => cb.checked = true);

                });

            });

            document.querySelectorAll('.unselect-all-btn').forEach(btn => {

                btn.addEventListener('click', function() {

                    const group = this.getAttribute('data-group');

                    document.querySelectorAll(`.perm-${group}`)
                        .forEach(cb => cb.checked = false);

                });

            });

        });
    </script>

@stop