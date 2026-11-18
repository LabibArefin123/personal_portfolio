@extends('adminlte::page')

@section('title', 'Edit Project')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_fields.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_resp.css') }}">
@stop

@section('content_header')
    <div class="project-form-page-header project-reveal">
        <div class="project-form-heading">
            <span class="project-form-eyebrow">PORTFOLIO MANAGEMENT</span>
            <h1>Edit Project</h1>
            <p>Update your project details, image, and publishing settings.</p>
        </div>


        <a href="{{ route('projects.index') }}" class="project-back-btn">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Projects</span>
        </a>
    </div>
@stop

@section('content')
    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data"
        class="project-form" id="projectForm">
        @csrf
        @method('PUT')
        <div class="project-form-card project-reveal">
            <div class="project-form-card-header">
                <div class="project-form-card-icon">
                    <i class="fas fa-edit"></i>
                </div>

                <div>
                    <h3>Update Project Information</h3>
                    <p>Make changes to your existing project details.</p>
                </div>
            </div>

            <div class="project-form-card-body">

                @if ($errors->any())
                    <div class="project-validation-summary">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            <strong>Please check the following fields:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="project-form-section">
                    <div class="project-form-section-heading">
                        <span class="project-section-number">01</span>
                        <div>
                            <h4>Basic Details</h4>
                            <p>Update the project title, technology, and description.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 project-form-group">
                            <label for="title">Project Title <span>*</span></label>
                            <input type="text" id="title" name="title" class="form-control"
                                value="{{ old('title', $project->title) }}" placeholder="Enter project title" required>
                            @error('title')
                                <small class="project-field-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 project-form-group">
                            <label for="tech_stack">Tech Stack</label>
                            <input type="text" id="tech_stack" name="tech_stack" class="form-control"
                                value="{{ old('tech_stack', $project->tech_stack) }}"
                                placeholder="Laravel, MySQL, Bootstrap">
                            @error('tech_stack')
                                <small class="project-field-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 project-form-group">
                            <label for="description">Project Description</label>
                            <textarea id="description" name="description" rows="6" class="form-control"
                                placeholder="Describe your project, its features, and purpose...">{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <small class="project-field-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="project-form-divider"></div>

                <div class="project-form-section">
                    <div class="project-form-section-heading">
                        <span class="project-section-number">02</span>
                        <div>
                            <h4>Project Links</h4>
                            <p>Manage the live demo and source code links.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 project-form-group">
                            <label for="live_url">Live URL</label>
                            <div class="project-input-icon">
                                <i class="fas fa-globe"></i>
                                <input type="url" id="live_url" name="live_url" class="form-control"
                                    value="{{ old('live_url', $project->live_url) }}" placeholder="https://example.com">
                            </div>
                            @error('live_url')
                                <small class="project-field-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 project-form-group">
                            <label for="github_url">GitHub URL</label>
                            <div class="project-input-icon">
                                <i class="fab fa-github"></i>
                                <input type="url" id="github_url" name="github_url" class="form-control"
                                    value="{{ old('github_url', $project->github_url) }}"
                                    placeholder="https://github.com/username/project">
                            </div>
                            @error('github_url')
                                <small class="project-field-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="project-form-divider"></div>

                <div class="project-form-section">
                    <div class="project-form-section-heading">
                        <span class="project-section-number">03</span>
                        <div>
                            <h4>Project Image</h4>
                            <p>Upload a replacement image or keep the current one.</p>
                        </div>
                    </div>

                    <div class="project-image-edit-layout">
                        <div class="project-upload-area" id="projectUploadArea">
                            <input type="file" name="image" id="projectImage" accept="image/*" hidden>

                            <div class="project-upload-content" id="projectUploadContent">
                                <div class="project-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <h5>Choose a new image</h5>
                                <p>Click here to replace the current project image</p>
                                <span>Image files only</span>
                            </div>

                            <div class="project-image-preview" id="projectImagePreview">
                                <img src="" alt="New project image preview" id="projectPreviewImage">
                                <button type="button" class="project-remove-image" id="removeProjectImage">
                                    <i class="fas fa-times"></i>
                                </button>
                                <span>New image preview</span>
                            </div>
                        </div>

                        <div class="project-current-image">
                            <span class="project-current-image-label">CURRENT IMAGE</span>

                            @if ($project->image)
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                            @else
                                <div class="project-no-image">
                                    <i class="fas fa-image"></i>
                                    <span>No image available</span>
                                </div>
                            @endif

                            <p>Existing project image</p>
                        </div>
                    </div>

                    @error('image')
                        <small class="project-field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="project-form-divider"></div>

                <div class="project-form-section">
                    <div class="project-form-section-heading">
                        <span class="project-section-number">04</span>
                        <div>
                            <h4>Publishing Settings</h4>
                            <p>Manage the visibility and featured status of this project.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 project-form-group">
                            <label for="status">Project Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status', $project->status) == '1' ? 'selected' : '' }}>
                                    Published</option>
                                <option value="0" {{ old('status', $project->status) == '0' ? 'selected' : '' }}>
                                    Draft</option>
                            </select>
                        </div>

                        <div class="col-md-6 project-form-group">
                            <label for="is_highlight">Featured Project</label>
                            <select name="is_highlight" id="is_highlight" class="form-control">
                                <option value="0"
                                    {{ old('is_highlight', $project->is_highlight) == '0' ? 'selected' : '' }}>No</option>
                                <option value="1"
                                    {{ old('is_highlight', $project->is_highlight) == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <div class="project-form-card-footer">
                <a href="{{ route('projects.index') }}" class="project-cancel-btn">
                    <i class="fas fa-times"></i>
                    Cancel
                </a>

                <button type="submit" class="project-submit-btn">
                    <i class="fas fa-save"></i>
                    Update Project
                </button>
            </div>
        </div>
    </form>
@stop

@section('js')
    <script src="{{ asset('js/custom_backend/project_page/form_part/project_form.js') }}"></script>
@stop
