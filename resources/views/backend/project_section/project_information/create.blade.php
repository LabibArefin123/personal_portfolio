@extends('adminlte::page')

@section('title', 'Create Project Information')

@section('adminlte_css')
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/form_page/project_info_form_base.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/form_page/project_info_form_header.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/form_page/project_info_form_fields.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/form_page/project_info_form_builder.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/backend/project_page/project_information/form_page/project_info_form_resp.css') }}">
@stop

@section('content')
    <div class="container-fluid pi-form-page">

        <div class="pi-form-heading">
            <div class="pi-form-heading-icon">
                <i class="fas fa-folder-plus"></i>
            </div>
            <div>
                <h1>Create Project Information</h1>
                <p>Add project overview, images, features and technical details.</p>
            </div>
        </div>

        <form id="projectInfoForm" method="POST" action="{{ route('project-informations.store') }}"
            enctype="multipart/form-data">
            @csrf

            {{-- PROJECT SELECTION --}}
            <div class="card pi-form-card">
                <div class="card-header pi-form-card-header">
                    <div class="pi-form-card-title">
                        <span class="pi-form-step">01</span>
                        <div>
                            <h5>Select Project</h5>
                            <p>Choose the project this information belongs to.</p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="pi-project-selection">
                        <div class="pi-form-group pi-project-select">
                            <label for="projectSelect">Project <span>*</span></label>
                            <select name="project_id" id="projectSelect" class="form-control">
                                <option value="">Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="pi-project-controls">
                            <button type="button" id="confirmProject" class="pi-btn pi-btn-confirm">
                                <i class="fas fa-check"></i> Confirm
                            </button>
                            <button type="button" id="cancelProject" class="pi-btn pi-btn-cancel">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- OVERVIEW --}}
            <div class="card pi-form-card">
                <div class="card-header pi-form-card-header">
                    <div class="pi-form-card-title">
                        <span class="pi-form-step">02</span>
                        <div>
                            <h5>Project Overview</h5>
                            <p>Write a short introduction about the project.</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="pi-form-group">
                        <label for="overview">Overview</label>
                        <textarea name="overview" id="overview" class="form-control" rows="5"
                            placeholder="Describe the project, its purpose and main objectives...">{{ old('overview') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div id="step2" class="pi-step-two" style="display:none">

                {{-- IMAGES --}}
                <div class="card pi-form-card">
                    <div class="card-header pi-form-card-header">
                        <div class="pi-form-card-title">
                            <span class="pi-form-step">03</span>
                            <div>
                                <h5>Project Images</h5>
                                <p>Upload screenshots or images that represent your project.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="imageInput" class="pi-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Choose project images</span>
                            <small>Select one or multiple image files</small>
                        </label>
                        <input type="file" id="imageInput" multiple class="form-control pi-file-input" accept="image/*">
                        <div id="imagePreview" class="row pi-image-preview"></div>
                    </div>
                </div>

                {{-- DYNAMIC BUILDER --}}
                <div class="card pi-form-card">
                    <div class="card-header pi-form-card-header">
                        <div class="pi-form-card-title">
                            <span class="pi-form-step">04</span>
                            <div>
                                <h5>Project Details Builder</h5>
                                <p>Add structured information to describe your project in detail.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="pi-builder-toolbar">
                            <span class="pi-builder-label">Add a section</span>
                            <div class="pi-builder-buttons">
                                <button type="button" class="pi-builder-btn add-field" data-field="custom_features">
                                    <i class="fas fa-star"></i> Features
                                </button>
                                <button type="button" class="pi-builder-btn add-field" data-field="project_languages">
                                    <i class="fas fa-code"></i> Languages
                                </button>
                                <button type="button" class="pi-builder-btn add-field" data-field="challenges">
                                    <i class="fas fa-exclamation-circle"></i> Challenges
                                </button>
                                <button type="button" class="pi-builder-btn add-field" data-field="solution">
                                    <i class="fas fa-lightbulb"></i> Solution
                                </button>
                                <button type="button" class="pi-builder-btn add-field" data-field="conclusion">
                                    <i class="fas fa-flag-checkered"></i> Conclusion
                                </button>
                            </div>
                        </div>

                        <div id="dynamicFields" class="pi-dynamic-fields"></div>
                    </div>
                </div>

                <div class="pi-form-submit-area">
                    <button type="submit" class="pi-submit-btn">
                        <i class="fas fa-save"></i>
                        Save Project Information
                    </button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/custom_backend/project/information/create_page/create.js') }}"></script>
@stop
