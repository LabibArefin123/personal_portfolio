 @extends('adminlte::page')

@section('title', 'Project Details')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/show_page/project_show_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/show_page/project_show_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/show_page/project_show_image.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/show_page/project_show_info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/project_page/show_page/project_show_resp.css') }}">
@stop

@section('content_header')
    <div class="project-show-header">
        <div class="project-show-heading">
            <span class="project-show-eyebrow">PORTFOLIO MANAGEMENT</span>
            <h1>Project Details</h1>
            <p>Explore the information and resources for this portfolio project.</p>
        </div>

        <div class="project-show-header-actions">
            <a href="{{ route('projects.edit', $project->id) }}" class="project-show-edit-btn">
                <i class="fas fa-edit"></i>
                <span>Edit Project</span>
            </a>

            <a href="{{ route('projects.index') }}" class="project-show-back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Projects</span>
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="project-show-layout">
        {{-- IMAGE PANEL --}}
        <div class="project-show-image-column">
            <div class="project-show-image-card">

                <div class="project-show-image-wrapper">
                    @if ($project->image)
                        <img
                            src="{{ asset($project->image) }}"
                            alt="{{ $project->title }}"
                            class="project-show-main-image"
                        >
                    @else
                        <div class="project-show-no-image">
                            <i class="fas fa-image"></i>
                            <span>No project image available</span>
                        </div>
                    @endif

                    @if ($project->is_highlight)
                        <span class="project-show-featured-ribbon">
                            <i class="fas fa-star"></i>
                            Featured
                        </span>
                    @endif
                </div>

                <div class="project-show-image-caption">
                    <span class="project-show-caption-label">PROJECT PREVIEW</span>
                    <h3>{{ $project->title }}</h3>
                    <p>Portfolio project showcase</p>
                </div>
            </div>

            {{-- QUICK STATUS --}}
            <div class="project-show-status-card">
                <div class="project-show-status-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>

                <div class="project-show-status-content">
                    <span>PROJECT STATUS</span>
                    @if ($project->status)
                        <strong class="project-show-status-published">
                            <i class="fas fa-check-circle"></i>
                            Published
                        </strong>
                    @else
                        <strong class="project-show-status-draft">
                            <i class="fas fa-file-alt"></i>
                            Draft
                        </strong>
                    @endif
                </div>

                <span class="project-show-status-indicator {{ $project->status ? 'is-published' : 'is-draft' }}"></span>
            </div>
        </div>

        {{-- INFORMATION PANEL --}}
        <div class="project-show-info-column">
            <div class="project-show-info-card">

                <div class="project-show-card-heading">
                    <div class="project-show-card-heading-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>

                    <div>
                        <h3>Project Information</h3>
                        <p>Essential details about this project.</p>
                    </div>
                </div>

                <div class="project-show-info-body">

                    {{-- TITLE --}}
                    <div class="project-show-detail-item">
                        <span class="project-show-detail-label">
                            <i class="fas fa-heading"></i>
                            Project Title
                        </span>
                        <strong class="project-show-detail-value">
                            {{ $project->title }}
                        </strong>
                    </div>

                    {{-- TECH STACK --}}
                    <div class="project-show-detail-item">
                        <span class="project-show-detail-label">
                            <i class="fas fa-code"></i>
                            Technology Stack
                        </span>

                        <div class="project-show-tech-value">
                            @if ($project->tech_stack)
                                {{ $project->tech_stack }}
                            @else
                                <span class="project-show-not-available">Not specified</span>
                            @endif
                        </div>
                    </div>

                    {{-- STATUS --}}
                    <div class="project-show-detail-item">
                        <span class="project-show-detail-label">
                            <i class="fas fa-toggle-on"></i>
                            Publishing Status
                        </span>

                        @if ($project->status)
                            <span class="project-show-badge project-show-badge-published">
                                <i class="fas fa-check-circle"></i>
                                Published
                            </span>
                        @else
                            <span class="project-show-badge project-show-badge-draft">
                                <i class="fas fa-file-alt"></i>
                                Draft
                            </span>
                        @endif
                    </div>

                    {{-- FEATURED --}}
                    <div class="project-show-detail-item">
                        <span class="project-show-detail-label">
                            <i class="fas fa-star"></i>
                            Featured Project
                        </span>

                        @if ($project->is_highlight)
                            <span class="project-show-badge project-show-badge-featured">
                                <i class="fas fa-star"></i>
                                Featured
                            </span>
                        @else
                            <span class="project-show-badge project-show-badge-normal">
                                <i class="fas fa-minus-circle"></i>
                                Not Featured
                            </span>
                        @endif
                    </div>

                </div>
            </div>

            {{-- PROJECT LINKS --}}
            <div class="project-show-links-card">

                <div class="project-show-card-heading">
                    <div class="project-show-card-heading-icon project-show-links-icon">
                        <i class="fas fa-link"></i>
                    </div>

                    <div>
                        <h3>Project Resources</h3>
                        <p>Explore the live project and source code.</p>
                    </div>
                </div>

                <div class="project-show-links-body">

                    @if ($project->live_url)
                        <a href="{{ $project->live_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="project-show-resource-link">
                            <span class="project-show-resource-icon project-show-live-icon">
                                <i class="fas fa-globe"></i>
                            </span>

                            <span class="project-show-resource-text">
                                <strong>Live Website</strong>
                                <small>{{ $project->live_url }}</small>
                            </span>

                            <i class="fas fa-external-link-alt project-show-resource-arrow"></i>
                        </a>
                    @else
                        <div class="project-show-resource-link is-unavailable">
                            <span class="project-show-resource-icon project-show-live-icon">
                                <i class="fas fa-globe"></i>
                            </span>

                            <span class="project-show-resource-text">
                                <strong>Live Website</strong>
                                <small>Link not provided</small>
                            </span>
                        </div>
                    @endif

                    @if ($project->github_url)
                        <a href="{{ $project->github_url }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="project-show-resource-link">
                            <span class="project-show-resource-icon project-show-github-icon">
                                <i class="fab fa-github"></i>
                            </span>

                            <span class="project-show-resource-text">
                                <strong>GitHub Repository</strong>
                                <small>{{ $project->github_url }}</small>
                            </span>

                            <i class="fas fa-external-link-alt project-show-resource-arrow"></i>
                        </a>
                    @else
                        <div class="project-show-resource-link is-unavailable">
                            <span class="project-show-resource-icon project-show-github-icon">
                                <i class="fab fa-github"></i>
                            </span>

                            <span class="project-show-resource-text">
                                <strong>GitHub Repository</strong>
                                <small>Link not provided</small>
                            </span>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- PROJECT DESCRIPTION --}}
    <div class="project-show-description-card">

        <div class="project-show-card-heading">
            <div class="project-show-card-heading-icon project-show-description-icon">
                <i class="fas fa-align-left"></i>
            </div>

            <div>
                <h3>Project Description</h3>
                <p>More about the purpose, features, and functionality of this project.</p>
            </div>
        </div>

        <div class="project-show-description-content">
            @if ($project->description)
                {!! nl2br(e($project->description)) !!}
            @else
                <div class="project-show-empty-description">
                    <i class="far fa-comment-dots"></i>
                    <span>No description has been added for this project yet.</span>
                </div>
            @endif
        </div>
    </div>

@stop