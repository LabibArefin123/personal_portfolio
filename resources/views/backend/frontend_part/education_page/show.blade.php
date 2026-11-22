@extends('adminlte::page')

@section('title', 'Education Page Details')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_education.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/show_page/show_responsive.css') }}">
@stop

@section('content_header')
    <div class="edu-show-heading">
        <div>
            <span class="edu-show-eyebrow">CONTENT MANAGEMENT / EDUCATION</span>
            <h1>Education Details</h1>
            <p>Complete overview of your academic profile and learning journey.</p>
        </div>

        <div class="edu-show-actions">
            <a href="{{ route('education_pages.index') }}" class="edu-show-back">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('education_pages.edit', $education_page->id) }}" class="edu-show-edit">
                <i class="fas fa-edit"></i> Edit Page
            </a>
        </div>
    </div>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{-- PAGE OVERVIEW --}}
    <div class="edu-show-hero">
        <div class="edu-show-hero-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <div class="edu-show-hero-content">
            <span class="edu-show-label">EDUCATION PAGE</span>
            <h2>{{ $education_page->title }}</h2>
            <p>{{ $education_page->subtitle }}</p>
        </div>

        <div class="edu-show-hero-status">
            @if ($education_page->is_active)
                <span class="edu-show-active">
                    <i class="fas fa-check-circle"></i> Published
                </span>
            @else
                <span class="edu-show-inactive">
                    <i class="fas fa-pause-circle"></i> Hidden
                </span>
            @endif
        </div>
    </div>

    {{-- SUMMARY --}}
    <div class="row edu-show-summary">

        <div class="col-lg-4 col-md-6">
            <div class="edu-summary-card purple">
                <div class="edu-summary-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <div>
                    <span>Qualifications</span>
                    <h3>{{ $educations->count() }}</h3>
                    <small>Total academic records</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="edu-summary-card green">
                <div class="edu-summary-icon">
                    <i class="fas fa-check-double"></i>
                </div>
                <div>
                    <span>Completed</span>
                    <h3>{{ $completedCount }}</h3>
                    <small>Completed qualifications</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="edu-summary-card blue">
                <div class="edu-summary-icon">
                    <i class="fab fa-github"></i>
                </div>
                <div>
                    <span>GitHub</span>
                    <h3>{{ $education_page->github_username ? 'Connected' : 'Not set' }}</h3>
                    <small>{{ $education_page->github_username ?? 'No username configured' }}</small>
                </div>
            </div>
        </div>

    </div>

    {{-- ACADEMIC PROFILE --}}
    <div class="edu-show-card">
        <div class="edu-show-card-header">
            <div>
                <span class="edu-section-label">PROFILE INFORMATION</span>
                <h4>Academic Profile</h4>
            </div>
            <i class="fas fa-user-graduate"></i>
        </div>

        <div class="edu-profile-content">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3>{{ $education_page->intro_title }}</h3>
                    <p>{{ $education_page->intro_description ?: 'No introduction available.' }}</p>
                </div>

                <div class="col-lg-4">
                    <div class="edu-cgpa-box">
                        <span>ACADEMIC HIGHLIGHT</span>
                        <h2>{{ $education_page->highlight_value ?: 'Not set' }}</h2>
                        <p>{{ $education_page->highlight_label ?: 'No highlight label' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ACADEMIC QUALIFICATIONS --}}
    <div class="edu-show-card">
        <div class="edu-show-card-header">
            <div>
                <span class="edu-section-label">ACADEMIC HISTORY</span>
                <h4>Academic Qualifications</h4>
            </div>
            <i class="fas fa-university"></i>
        </div>

        <div class="edu-qualification-list">
            @forelse ($educations as $item)
                <div class="edu-qualification-item">
                    <div class="edu-qualification-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>

                    <div class="edu-qualification-info">
                        <div class="edu-qualification-top">
                            <h5>{{ $item->degree }}</h5>
                            <span class="edu-year-badge">{{ $item->year ?? 'Year N/A' }}</span>
                        </div>

                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $item->institution }}
                        </p>

                        @if ($item->result)
                            <span class="edu-result-badge">{{ $item->result }}</span>
                        @endif
                    </div>

                    <div class="edu-qualification-status">
                        <span class="{{ strtolower($item->status) === 'completed' ? 'completed' : 'other' }}">
                            {{ $item->status }}
                        </span>

                        <small>
                            {{ $item->is_active ? 'Visible' : 'Hidden' }}
                        </small>
                    </div>
                </div>
            @empty
                <div class="edu-show-empty">
                    <i class="fas fa-book-open"></i>
                    <p>No academic qualifications found.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- LEARNING TIMELINE --}}
    <div class="edu-show-card">
        <div class="edu-show-card-header">
            <div>
                <span class="edu-section-label">EDUCATIONAL JOURNEY</span>
                <h4>Learning Timeline</h4>
            </div>
            <i class="fas fa-history"></i>
        </div>

        <div class="edu-show-timeline">
            @forelse ($educations->sortBy('year') as $item)
                <div class="edu-timeline-item">
                    <div class="edu-timeline-marker">
                        <i class="fas fa-check"></i>
                    </div>

                    <div class="edu-timeline-content">
                        <span>{{ $item->year ?? 'Year N/A' }}</span>
                        <h5>{{ $item->degree }}</h5>
                        <p>{{ $item->timeline_description ?: $item->institution }}</p>
                    </div>
                </div>
            @empty
                <p class="text-muted">No timeline information available.</p>
            @endforelse
        </div>
    </div>

    {{-- GITHUB INFORMATION --}}
    <div class="edu-show-card">
        <div class="edu-show-card-header">
            <div>
                <span class="edu-section-label">DEVELOPMENT ACTIVITY</span>
                <h4>GitHub Information</h4>
            </div>
            <i class="fab fa-github"></i>
        </div>

        <div class="edu-github-content">
            <div class="edu-github-profile">
                <div class="edu-github-avatar">
                    <i class="fab fa-github"></i>
                </div>
                <div>
                    <h5>{{ $education_page->github_username ?: 'GitHub not configured' }}</h5>
                    <p>{{ $education_page->github_description ?: 'No GitHub description available.' }}</p>
                </div>

                @if ($education_page->github_url)
                    <a href="{{ $education_page->github_url }}" target="_blank" rel="noopener noreferrer">
                        Visit Profile <i class="fas fa-external-link-alt"></i>
                    </a>
                @endif
            </div>

            @if (!empty($education_page->github_activities))
                <div class="edu-github-activities">
                    <h5>Technical Activities</h5>

                    <div class="row">
                        @foreach ($education_page->github_activities as $activity)
                            <div class="col-md-6">
                                <div class="edu-activity-item">
                                    <i class="fas fa-check-circle"></i>
                                    {{ $activity }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($education_page->github_chart_url)
                <div class="edu-github-chart">
                    <h5>Contribution Graph</h5>
                    <img src="{{ $education_page->github_chart_url }}" alt="GitHub contribution graph" loading="lazy">
                </div>
            @endif
        </div>
    </div>

    {{-- FOCUS CARDS --}}
    <div class="edu-show-card">
        <div class="edu-show-card-header">
            <div>
                <span class="edu-section-label">PERSONAL DEVELOPMENT</span>
                <h4>Technical Focus & Goals</h4>
            </div>
            <i class="fas fa-rocket"></i>
        </div>

        <div class="row edu-focus-row">
            @forelse ($education_page->focus_cards ?? [] as $card)
                <div class="col-lg-4 col-md-6">
                    <div class="edu-focus-card">
                        <span><i class="fas fa-lightbulb"></i></span>
                        <h5>{{ $card['title'] ?? '' }}</h5>
                        <p>{{ $card['description'] ?? '' }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">No technical focus cards configured.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- FOOTER INFO --}}
    <div class="edu-show-footer">
        <span>
            <i class="fas fa-clock"></i>
            Last updated: {{ $education_page->updated_at?->format('d M Y, h:i A') }}
        </span>

        <a href="{{ route('education_pages.edit', $education_page->id) }}">
            Update Education Page <i class="fas fa-arrow-right"></i>
        </a>
    </div>

@stop
