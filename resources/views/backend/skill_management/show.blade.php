@extends('adminlte::page')

@section('title', 'Skill Details')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/skills_page/show_page/skills_show.css') }}">
@stop

@section('content_header')
    <div class="skills-show-header">

        <div class="skills-show-header-content">
            <div class="skills-show-header-icon">
                <i class="fas fa-layer-group"></i>
            </div>

            <div>
                <h1>Skill Details</h1>
                <p>View skill information and portfolio proficiency.</p>
            </div>
        </div>

        <div class="skills-show-header-actions">
            <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Edit Skill
            </a>

            <a href="{{ route('skills.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to Skills
            </a>
        </div>

    </div>
@stop

@section('content')
    <div class="skills-show-page">
        <div class="row">
            {{-- MAIN SKILL DETAILS --}}
            <div class="col-lg-8">
                <div class="card skills-detail-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-info-circle mr-2 text-primary"></i>
                            Skill Information
                        </h3>

                        @if ($skill->status)
                            <span class="skill-status skill-status-active">
                                Active
                            </span>
                        @else
                            <span class="skill-status skill-status-inactive">
                                Inactive
                            </span>
                        @endif
                    </div>
                    <div class="card-body">

                        {{-- SKILL IDENTITY --}}
                        <div class="skill-identity">
                            <div class="skill-identity-icon">
                                <i class="fas fa-code"></i>
                            </div>

                            <div class="skill-identity-content">
                                <span class="show-section-label">
                                    Portfolio Skill
                                </span>

                                <h3>{{ $skill->name }}</h3>

                                <span class="skill-category-label">
                                    <i class="fas fa-folder mr-1"></i>
                                    {{ $skill->category }}
                                </span>
                            </div>
                        </div>

                        {{-- SKILL DETAILS --}}
                        <div class="show-section-label">
                            General Information
                        </div>

                        <div class="skill-details-list mb-4">
                            <div class="skill-detail-item">
                                <div class="skill-detail-label">
                                    <i class="fas fa-folder"></i>
                                    Category
                                </div>

                                <div class="skill-detail-value"> {{ $skill->category }}</div>
                            </div>

                            <div class="skill-detail-item">
                                <div class="skill-detail-label">
                                    <i class="fas fa-code"></i>
                                    Skill Name
                                </div>

                                <div class="skill-detail-value"> {{ $skill->name }}</div>
                            </div>

                            <div class="skill-detail-item">
                                <div class="skill-detail-label">
                                    <i class="fas fa-sort-numeric-down"></i>
                                    Display Position
                                </div>

                                <div class="skill-detail-value"> {{ $skill->position }} </div>
                            </div>

                            <div class="skill-detail-item">
                                <div class="skill-detail-label">
                                    <i class="fas fa-toggle-on"></i>
                                    Publication Status
                                </div>

                                <div class="skill-detail-value">
                                    @if ($skill->status)
                                        <span class="skill-status skill-status-active">
                                            Active
                                        </span>
                                    @else
                                        <span class="skill-status skill-status-inactive">
                                            Inactive
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- SKILL LEVEL --}}
                        <div class="show-section-label"> Proficiency Level </div>

                        <div class="skill-level-panel">
                            <div class="skill-level-heading">
                                <span>
                                    <i class="fas fa-chart-line mr-1"></i>
                                    Skill Proficiency
                                </span>

                                <strong> {{ $skill->percentage }}%</strong>
                            </div>

                            <div class="skill-level-track">
                                <div class="skill-level-fill"
                                    style="width: {{ max(0, min(100, (float) $skill->percentage)) }}%;">
                                </div>
                            </div>

                            <div class="skill-level-caption">
                                <span>Beginner</span>
                                <span>Intermediate</span>
                                <span>Advanced</span>
                            </div>

                        </div>

                        {{-- TIMESTAMPS --}}
                        <div class="show-section-label mt-4"> Record Information </div>

                        <div class="skill-details-list">
                            <div class="skill-detail-item">
                                <div class="skill-detail-label">
                                    <i class="fas fa-calendar-plus"></i>
                                    Created At
                                </div>

                                <div class="skill-detail-value">
                                    {{ $skill->created_at?->format('d M Y, h:i A') ?? 'Not available' }}
                                </div>
                            </div>

                            <div class="skill-detail-item">
                                <div class="skill-detail-label">
                                    <i class="fas fa-clock"></i>
                                    Last Updated
                                </div>

                                <div class="skill-detail-value">
                                    {{ $skill->updated_at?->format('d M Y, h:i A') ?? 'Not available' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">

                        <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                            Edit Skill
                        </a>

                        <a href="{{ route('skills.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Back to List
                        </a>

                    </div>

                </div>

            </div>

            {{-- SKILL PREVIEW --}}
            <div class="col-lg-4">

                <div class="card skill-preview-card">

                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-eye"></i>
                            Skill Preview
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="skill-preview-banner">

                            <div class="skill-preview-symbol">
                                <i class="fas fa-code"></i>
                            </div>

                            <h4>{{ $skill->name }}</h4>

                            <p>{{ $skill->category }}</p>

                        </div>

                        <div class="skill-preview-meta">
                            <div class="skill-preview-meta-row">
                                <span>Category</span>
                                <strong>{{ $skill->category }}</strong>
                            </div>
                            <div class="skill-preview-divider"></div>
                            <div class="skill-preview-meta-row">
                                <span>Position</span>
                                <strong>{{ $skill->position }}</strong>
                            </div>
                            <div class="skill-preview-divider"></div>
                            <div class="skill-preview-meta-row">
                                <span>Status</span>
                                @if ($skill->status)
                                    <strong class="text-success">Published</strong>
                                @else
                                    <strong class="text-danger">Unpublished</strong>
                                @endif
                            </div>
                        </div>

                        <div class="skill-preview-note">
                            <i class="fas fa-lightbulb"></i>

                            <span>
                                This is a visual preview of how the skill
                                identity appears in your portfolio.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/custom_backend/skills_page/show_page/skills_show.js') }}"></script>
@stop
