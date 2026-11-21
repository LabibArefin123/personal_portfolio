@extends('adminlte::page')

@section('title', 'About Management')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_resp.css') }}">
@stop

@section('content_header')
    <div class="about-index-header">
        <div>
            <h1 class="mb-0">
                <i class="fas fa-user-circle text-primary mr-2"></i>
                About Management
            </h1>
            <p>Manage your public profile, skills, experience and professional highlights.</p>
        </div>

        @if ($about)
            <div class="about-index-actions">
                <a href="{{ route('about_pages.show', $about->id) }}" class="about-btn about-btn-secondary">
                    <i class="fas fa-eye"></i>
                    View Details
                </a>

                <a href="{{ route('about_pages.edit', $about->id) }}" class="about-btn about-btn-primary">
                    <i class="fas fa-edit"></i>
                    Edit About
                </a>
            </div>
        @endif
    </div>
@stop

@section('content')
    <div class="about-admin">
        @if ($about)
            {{-- PROFILE OVERVIEW --}}
            <div class="card about-index-profile">
                <div class="about-index-profile-inner">
                    <div class="about-index-image">
                        <img src="{{ asset($about->image ?: 'uploads/images/default.jpg') }}" alt="{{ $about->name }}"
                            onerror="this.onerror=null;this.src='{{ asset('uploads/images/default.jpg') }}';">
                    </div>

                    <div class="about-index-info">

                        <span class="about-section-label">
                            <i class="fas fa-check-circle"></i>
                            Profile Overview
                        </span>

                        <h3>{{ $about->name }}</h3>

                        <p class="role">
                            <i class="fas fa-briefcase mr-1"></i>
                            {{ $about->role }}
                        </p>

                        <p class="description">
                            {{ \Illuminate\Support\Str::limit(implode(' ', $about->bio ?? []), 250) }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- STATISTICS --}}
            <div class="about-index-stats">

                <div class="about-stat-card">
                    <div class="about-stat-icon blue">
                        <i class="fas fa-layer-group"></i>
                    </div>

                    <div>
                        <small>Total Skills</small>
                        <h4>{{ count($about->skills ?? []) }}</h4>
                    </div>
                </div>

                <div class="about-stat-card">
                    <div class="about-stat-icon purple">
                        <i class="fas fa-briefcase"></i>
                    </div>

                    <div>
                        <small>Experience Sections</small>
                        <h4>{{ count($about->experiences ?? []) }}</h4>
                    </div>
                </div>

                <div class="about-stat-card">
                    <div class="about-stat-icon green">
                        <i class="fas fa-star"></i>
                    </div>

                    <div>
                        <small>Highlights</small>
                        <h4>{{ count($about->highlights ?? []) }}</h4>
                    </div>
                </div>

            </div>


            {{-- CONTENT ROW --}}
            <div class="row mt-3">

                {{-- BIOGRAPHY --}}
                <div class="col-lg-7">

                    <div class="card about-index-summary">

                        <div class="about-content-heading">
                            <div class="heading-icon">
                                <i class="fas fa-align-left"></i>
                            </div>

                            <div>
                                <h4>Biography</h4>
                                <p>Professional introduction and background</p>
                            </div>
                        </div>

                        @forelse($about->bio ?? [] as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @empty
                            <div class="about-empty">
                                <i class="fas fa-file-alt"></i>
                                <h5>No biography available</h5>
                            </div>
                        @endforelse

                    </div>

                </div>


                {{-- TECH STACK --}}
                <div class="col-lg-5">

                    <div class="card about-index-summary">

                        <div class="about-content-heading">
                            <div class="heading-icon">
                                <i class="fas fa-code"></i>
                            </div>

                            <div>
                                <h4>Technology Stack</h4>
                                <p>Technical skills and expertise</p>
                            </div>
                        </div>

                        <div class="about-index-skills">

                            @forelse($about->skills ?? [] as $skill)
                                <span>{{ $skill }}</span>
                            @empty
                                <p class="text-muted small">No skills added yet.</p>
                            @endforelse

                        </div>

                    </div>

                </div>

            </div>


            {{-- RECENT EXPERIENCE --}}
            <div class="card about-index-experience">

                <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">

                    <div class="about-content-heading mb-0">
                        <div class="heading-icon">
                            <i class="fas fa-history"></i>
                        </div>

                        <div>
                            <h4>Experience Overview</h4>
                            <p>Professional experience and responsibilities</p>
                        </div>
                    </div>

                    <a href="{{ route('about_pages.show', $about->id) }}" class="text-primary small font-weight-bold">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>

                </div>

                @forelse(array_slice($about->experiences ?? [], 0, 3) as $experience)
                    <div class="about-index-experience-item">

                        <div>
                            <h6>{{ $experience['title'] ?? 'Untitled Experience' }}</h6>
                            <span>
                                {{ \Illuminate\Support\Str::limit($experience['description'] ?? '', 120) }}
                            </span>
                        </div>

                        <span class="about-count-badge">
                            <i class="fas fa-check"></i>
                        </span>

                    </div>

                @empty

                    <div class="about-empty">
                        <i class="fas fa-briefcase"></i>
                        <h5>No experience added</h5>
                        <p>Experience entries will appear here.</p>
                    </div>
                @endforelse

            </div>


            {{-- FOOTER INFORMATION --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap mt-3">

                <small class="text-muted">
                    <i class="far fa-clock mr-1"></i>
                    Last updated:
                    {{ $about->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
                </small>

                <a href="{{ route('about_pages.show', $about->id) }}" class="about-btn about-btn-primary">
                    <i class="fas fa-external-link-alt"></i>
                    Explore Full Profile
                </a>

            </div>
        @else
            <div class="card">
                <div class="about-empty">
                    <i class="fas fa-user-plus"></i>
                    <h5>About Profile Not Found</h5>
                    <p>No About page information is currently available.</p>
                </div>
            </div>

        @endif

    </div>

@stop
