@extends('adminlte::page')

@section('title', 'Edit About Page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_image.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_actions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/edit_part/custom_about_edit_guidelines.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_resp.css') }}">
@stop

@section('content_header')
    <div class="about-edit-heading">
        <div>
            <span class="about-edit-eyebrow">CONTENT MANAGEMENT</span>
            <h1>Edit About Page</h1>
            <p>Update your profile, biography, skills and professional highlights.</p>
        </div>

        <a href="{{ route('about_pages.show', $about->id) }}" class="about-back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Details
        </a>
    </div>
@stop

@section('content')
    <div class="about-edit-wrapper">

        @if ($errors->any())
            <div class="about-form-alert">
                <div class="about-alert-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div>
                    <strong>Please check the form.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('about_pages.update', $about->id) }}" method="POST" enctype="multipart/form-data"
            id="aboutEditForm">

            @csrf
            @method('PUT')

            <div class="about-edit-grid">

                <div class="about-edit-main">

                    {{-- BASIC INFORMATION --}}
                    <div class="about-form-card">
                        <div class="about-form-card-header">
                            <div class="about-form-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4>Personal Information</h4>
                                <p>Manage your public profile information.</p>
                            </div>
                        </div>

                        <div class="about-form-card-body">

                            <div class="about-form-group">
                                <label for="name">Full Name <span>*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $about->name) }}" placeholder="Enter your full name" required>
                            </div>

                            <div class="about-form-group">
                                <label for="role">Professional Role <span>*</span></label>
                                <input type="text" name="role" id="role" class="form-control"
                                    value="{{ old('role', $about->role) }}" placeholder="e.g. Full Stack Developer"
                                    required>
                            </div>

                            <div class="about-form-group">
                                <label for="bio">Biography</label>
                                <textarea name="bio" id="bio" class="form-control about-large-textarea"
                                    placeholder="Write one paragraph per line...">{{ old('bio', $formBio) }}</textarea>
                                <small>Separate each biography paragraph with a blank line.</small>
                            </div>

                        </div>
                    </div>

                    {{-- SKILLS --}}
                    <div class="about-form-card">
                        <div class="about-form-card-header">
                            <div class="about-form-icon skill-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <div>
                                <h4>Technical Skills</h4>
                                <p>List your technologies and professional skills.</p>
                            </div>
                        </div>

                        <div class="about-form-card-body">
                            <div class="about-form-group">
                                <label for="skills">Skills List</label>
                                <textarea name="skills" id="skills" class="form-control about-medium-textarea"
                                    placeholder="Laravel&#10;PHP&#10;JavaScript&#10;MySQL">{{ old('skills', $formSkills) }}</textarea>
                                <small>Enter one skill per line.</small>
                            </div>
                        </div>
                    </div>

                    {{-- EXPERIENCE --}}
                    <div class="about-form-card">
                        <div class="about-form-card-header">
                            <div class="about-form-icon experience-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <h4>Professional Experience</h4>
                                <p>Manage your experience and development activities.</p>
                            </div>
                        </div>

                        <div class="about-form-card-body">
                            <div class="about-form-group">
                                <label for="experiences">Experience List</label>
                                <textarea name="experiences" id="experiences" class="form-control about-medium-textarea"
                                    placeholder="Software Engineer&#10;Full Stack Developer">{{ old('experiences', $formExperiences) }}</textarea>
                                <small>Enter one experience item per line.</small>
                            </div>
                        </div>
                    </div>

                    {{-- HIGHLIGHTS --}}
                    <div class="about-form-card">
                        <div class="about-form-card-header">
                            <div class="about-form-icon highlight-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div>
                                <h4>Professional Highlights</h4>
                                <p>Showcase your working approach and strengths.</p>
                            </div>
                        </div>

                        <div class="about-form-card-body">
                            <div class="about-form-group">
                                <label for="highlights">Highlights List</label>
                                <textarea name="highlights" id="highlights" class="form-control about-large-textarea"
                                    placeholder="Systems | Building reliable systems | fas fa-rocket&#10;Approach | Practical problem solving | fas fa-bolt">{{ old('highlights', $formHighlights) }}</textarea>

                                <small>
                                    Use this format:
                                    <strong>Title | Description | Font Awesome Icon</strong>
                                </small>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- SIDEBAR --}}
                <div class="about-edit-sidebar">

                    <div class="about-form-card about-image-card">
                        <div class="about-form-card-header">
                            <div class="about-form-icon image-icon">
                                <i class="fas fa-image"></i>
                            </div>
                            <div>
                                <h4>Profile Image</h4>
                                <p>Update your profile photo.</p>
                            </div>
                        </div>

                        <div class="about-form-card-body">

                            <div class="about-image-preview">
                                <img src="{{ $about->image ? asset($about->image) : asset('uploads/images/default.jpg') }}"
                                    id="aboutImagePreview" alt="Profile Image">
                            </div>

                            <div class="about-form-group">
                                <label for="image">Choose New Image</label>
                                <input type="file" name="image" id="image" class="form-control"
                                    accept=".jpg,.jpeg,.png,.webp">
                                <small>JPG, JPEG, PNG or WEBP. Maximum 5 MB.</small>
                            </div>

                        </div>
                    </div>

                    <div class="about-form-card about-guideline-card">
                        <div class="about-form-card-header">
                            <div class="about-form-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div>
                                <h4>Editing Tips</h4>
                                <p>Keep your profile clear and professional.</p>
                            </div>
                        </div>

                        <div class="about-form-card-body">
                            <ul class="about-guideline-list">
                                <li><i class="fas fa-check"></i> Use a clear professional image.</li>
                                <li><i class="fas fa-check"></i> Keep biography paragraphs concise.</li>
                                <li><i class="fas fa-check"></i> Add relevant technical skills.</li>
                                <li><i class="fas fa-check"></i> Keep experience items easy to understand.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="about-form-actions">
                        <button type="submit" class="about-save-btn" id="aboutSaveButton">
                            <i class="fas fa-save"></i>
                            Save Changes
                        </button>

                        <a href="{{ route('about_pages.show', $about->id) }}" class="about-cancel-btn">
                            Cancel
                        </a>
                    </div>

                </div>

            </div>
        </form>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/custom_backend/frontend_part/about_page/custom_about_edit.js') }}"></script>
@stop
