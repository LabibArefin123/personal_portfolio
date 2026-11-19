@extends('adminlte::page')

@section('title', 'Project Information Details')

@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_base.css') }}">
<link rel="stylesheet" href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_header.css') }}">
<link rel="stylesheet" href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_gallery.css') }}">
<link rel="stylesheet" href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_details.css') }}">
<link rel="stylesheet" href="{{ asset('css/backend/project_page/project_information/show_page/project_info_show_resp.css') }}">
@stop

@section('content_header')
<div class="pi-show-heading">
    <div class="pi-show-heading-content">
        <div class="pi-show-heading-icon">
            <i class="fas fa-layer-group"></i>
        </div>
        <div>
            <h1>Project Details</h1>
            <p>Explore project information, images and technical details.</p>
        </div>
    </div>

    <div class="pi-show-heading-actions">
        <a href="{{ route('project-informations.edit', $projectInformation->id) }}"
            class="pi-show-btn pi-show-edit-btn">
            <i class="fas fa-edit"></i>
            <span>Edit Project</span>
        </a>

        <a href="{{ route('project-informations.index') }}"
            class="pi-show-btn pi-show-back-btn">
            <i class="fas fa-arrow-left"></i>
            <span>Go Back</span>
        </a>
    </div>
</div>
@stop

@section('content')
@php
    $images = is_array($projectInformation->project_images)
        ? $projectInformation->project_images
        : (json_decode($projectInformation->project_images ?? '[]', true) ?: []);

    $features = is_array($projectInformation->custom_features)
        ? $projectInformation->custom_features
        : (json_decode($projectInformation->custom_features ?? '[]', true) ?: []);

    $languages = is_array($projectInformation->project_languages)
        ? $projectInformation->project_languages
        : (json_decode($projectInformation->project_languages ?? '[]', true) ?: []);
@endphp

<div class="container-fluid pi-show-page">

    {{-- PROJECT OVERVIEW --}}
    <section class="pi-show-overview-card">
        <div class="pi-show-overview-top">
            <div class="pi-show-project-icon">
                <i class="fas fa-project-diagram"></i>
            </div>

            <div class="pi-show-project-heading">
                <span class="pi-show-eyebrow">PROJECT INFORMATION</span>
                <h2>{{ $projectInformation->project?->title ?? 'Project Not Available' }}</h2>
                <span class="pi-show-project-subtitle">Project overview and documentation</span>
            </div>

            <div class="pi-show-overview-status">
                <span class="pi-show-status-dot"></span>
                Project Details
            </div>
        </div>

        <div class="pi-show-overview-divider"></div>

        <div class="pi-show-overview-content">
            <div class="pi-show-section-label">
                <i class="fas fa-align-left"></i>
                Project Overview
            </div>

            <p>{{ $projectInformation->overview ?: 'No project overview has been provided yet.' }}</p>
        </div>
    </section>

    {{-- PROJECT IMAGES --}}
    <section class="pi-show-section">
        <div class="pi-show-section-heading">
            <div>
                <span class="pi-show-section-kicker">VISUAL SHOWCASE</span>
                <h3><i class="far fa-images"></i> Project Gallery</h3>
                <p>Images and screenshots associated with this project.</p>
            </div>

            <span class="pi-show-count">{{ count($images) }} Images</span>
        </div>

        <div class="pi-show-gallery-card">
            @if (count($images))
                <div class="pi-show-gallery-grid">
                    @foreach ($images as $img)
                        <a href="{{ asset($img) }}" target="_blank" rel="noopener noreferrer"
                            class="pi-show-gallery-item">
                            <img src="{{ asset($img) }}" alt="Project image" loading="lazy">
                            <span class="pi-show-image-overlay">
                                <i class="fas fa-expand-alt"></i>
                            </span>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="pi-show-empty">
                    <i class="far fa-image"></i>
                    <h5>No Project Images</h5>
                    <p>There are currently no images available for this project.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- FEATURES AND LANGUAGES --}}
    <div class="row pi-show-info-row">

        {{-- FEATURES --}}
        <div class="col-lg-6 mb-4">
            <section class="pi-show-detail-card">
                <div class="pi-show-detail-header">
                    <div class="pi-show-detail-icon pi-feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div>
                        <h4>Key Features</h4>
                        <p>Important project capabilities</p>
                    </div>
                    <span class="pi-show-count">{{ count($features) }}</span>
                </div>

                <div class="pi-show-detail-body">
                    @forelse ($features as $item)
                        <div class="pi-show-list-item">
                            <span class="pi-show-list-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <span>{{ $item }}</span>
                        </div>
                    @empty
                        <div class="pi-show-inline-empty">
                            <i class="far fa-star"></i>
                            No features added yet.
                        </div>
                    @endforelse
                </div>
            </section>
        </div>

        {{-- LANGUAGES --}}
        <div class="col-lg-6 mb-4">
            <section class="pi-show-detail-card">
                <div class="pi-show-detail-header">
                    <div class="pi-show-detail-icon pi-language-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div>
                        <h4>Technologies & Languages</h4>
                        <p>Tools and technologies used</p>
                    </div>
                    <span class="pi-show-count">{{ count($languages) }}</span>
                </div>

                <div class="pi-show-detail-body pi-show-language-list">
                    @forelse ($languages as $item)
                        <span class="pi-show-language-tag">
                            <i class="fas fa-code-branch"></i>
                            {{ $item }}
                        </span>
                    @empty
                        <div class="pi-show-inline-empty">
                            <i class="fas fa-code"></i>
                            No languages added yet.
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>

    {{-- CHALLENGES --}}
    <section class="pi-show-story-card pi-challenge-card">
        <div class="pi-show-story-icon">
            <i class="fas fa-mountain"></i>
        </div>
        <div class="pi-show-story-content">
            <span class="pi-show-story-label">PROJECT JOURNEY</span>
            <h4>Challenges</h4>
            <p>{{ $projectInformation->challenges ?: 'No challenges have been documented.' }}</p>
        </div>
    </section>

    {{-- SOLUTION --}}
    <section class="pi-show-story-card pi-solution-card">
        <div class="pi-show-story-icon">
            <i class="fas fa-lightbulb"></i>
        </div>
        <div class="pi-show-story-content">
            <span class="pi-show-story-label">PROBLEM SOLVING</span>
            <h4>Solution</h4>
            <p>{{ $projectInformation->solution ?: 'No solution details have been provided.' }}</p>
        </div>
    </section>

    {{-- CONCLUSION --}}
    <section class="pi-show-story-card pi-conclusion-card">
        <div class="pi-show-story-icon">
            <i class="fas fa-flag-checkered"></i>
        </div>
        <div class="pi-show-story-content">
            <span class="pi-show-story-label">FINAL THOUGHTS</span>
            <h4>Conclusion</h4>
            <p>{{ $projectInformation->conclusion ?: 'No conclusion has been provided.' }}</p>
        </div>
    </section>

    {{-- PROJECT LINKS --}}
    <section class="pi-show-links-card">
        <div class="pi-show-links-heading">
            <div class="pi-show-links-icon">
                <i class="fas fa-link"></i>
            </div>
            <div>
                <h4>Project Resources</h4>
                <p>Explore the project online and view its source code.</p>
            </div>
        </div>

        <div class="pi-show-links-list">
            @if ($projectInformation->project_link)
                <a href="{{ $projectInformation->project_link }}" target="_blank"
                    rel="noopener noreferrer" class="pi-show-resource-link pi-live-link">
                    <span class="pi-resource-icon"><i class="fas fa-external-link-alt"></i></span>
                    <span>
                        <strong>Live Project</strong>
                        <small>Visit the project website</small>
                    </span>
                    <i class="fas fa-arrow-up-right-from-square pi-resource-arrow"></i>
                </a>
            @endif

            @if ($projectInformation->github_link)
                <a href="{{ $projectInformation->github_link }}" target="_blank"
                    rel="noopener noreferrer" class="pi-show-resource-link pi-github-link">
                    <span class="pi-resource-icon"><i class="fab fa-github"></i></span>
                    <span>
                        <strong>GitHub Repository</strong>
                        <small>Explore the source code</small>
                    </span>
                    <i class="fas fa-arrow-up-right-from-square pi-resource-arrow"></i>
                </a>
            @endif

            @if (!$projectInformation->project_link && !$projectInformation->github_link)
                <div class="pi-show-inline-empty">
                    <i class="fas fa-link"></i>
                    No external project links available.
                </div>
            @endif
        </div>
    </section>

</div>
@stop