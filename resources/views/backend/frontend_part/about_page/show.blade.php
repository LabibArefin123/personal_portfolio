@extends('adminlte::page')

@section('title', 'About Details')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_bio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_skills.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/show_part/custom_about_show_highlights.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/about_page/custom_about_responsive.css') }}">
@stop

@section('content_header')
    @include('backend.frontend_part.about_page.partials.show_page.header_part')
@stop

@section('content')
    <div class="about-admin">
        {{-- PROFILE HERO --}}
        <div class="about-show-hero">
            <div class="about-show-hero-content">
                <div class="about-show-avatar">
                    <img src="{{ asset($about->image ?: 'uploads/images/default.jpg') }}" alt="{{ $about->name }}"
                        onerror="this.onerror=null;this.src='{{ asset('uploads/images/default.jpg') }}';">
                </div>

                <div class="about-show-identity">
                    <span class="about-show-badge">
                        <i class="fas fa-user-check mr-2"></i>
                        PROFESSIONAL PROFILE
                    </span>

                    <h2 class="mt-3">{{ $about->name }}</h2>

                    <p>
                        <i class="fas fa-briefcase mr-1"></i>
                        {{ $about->role }}
                    </p>

                    <div class="about-action-group">

                        <span class="about-show-badge">
                            <i class="fas fa-code mr-2"></i>
                            {{ count($about->skills ?? []) }} Skills
                        </span>

                        <span class="about-show-badge">
                            <i class="fas fa-history mr-2"></i>
                            {{ count($about->experiences ?? []) }} Experiences
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- BIOGRAPHY --}}
        <div class="about-show-section">

            <div class="card about-show-card">

                <div class="about-content-heading">
                    <div class="heading-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>

                    <div>
                        <h4>Professional Biography</h4>
                        <p>Personal introduction and professional background</p>
                    </div>
                </div>

                @forelse($about->bio ?? [] as $paragraph)
                    <p class="about-show-bio">
                        {{ $paragraph }}
                    </p>

                @empty

                    <div class="about-empty">
                        <i class="fas fa-file-alt"></i>
                        <h5>No biography available</h5>
                    </div>
                @endforelse

            </div>

        </div>


        {{-- TECH STACK --}}
        <div class="about-show-section">

            <div class="card about-show-card">

                <div class="about-content-heading">

                    <div class="heading-icon">
                        <i class="fas fa-code"></i>
                    </div>

                    <div>
                        <h4>Technical Expertise</h4>
                        <p>Technologies, tools and development skills</p>
                    </div>

                    <span class="about-count-badge ml-auto">
                        {{ count($about->skills ?? []) }}
                    </span>

                </div>

                <div class="about-show-skills">

                    @forelse($about->skills ?? [] as $skill)
                        <div class="about-show-skill">
                            <i class="fas fa-check-circle"></i>
                            {{ $skill }}
                        </div>

                    @empty

                        <p class="text-muted small">No skills available.</p>
                    @endforelse

                </div>

            </div>

        </div>


        {{-- EXPERIENCE TIMELINE --}}
        <div class="about-show-section">

            <div class="card about-show-card">

                <div class="about-content-heading">

                    <div class="heading-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>

                    <div>
                        <h4>Professional Experience</h4>
                        <p>Development experience, responsibilities and expertise</p>
                    </div>

                    <span class="about-count-badge ml-auto">
                        {{ count($about->experiences ?? []) }}
                    </span>

                </div>

                @if (!empty($about->experiences))

                    <div class="about-timeline">

                        @foreach ($about->experiences as $experience)
                            <div class="about-timeline-item">

                                <h5>
                                    {{ $experience['title'] ?? 'Untitled Experience' }}
                                </h5>

                                <p>
                                    {{ $experience['description'] ?? '' }}
                                </p>

                            </div>
                        @endforeach

                    </div>
                @else
                    <div class="about-empty">
                        <i class="fas fa-briefcase"></i>
                        <h5>No experience information available</h5>
                    </div>

                @endif

            </div>

        </div>


        {{-- PROFESSIONAL HIGHLIGHTS --}}
        <div class="about-show-section">

            <div class="about-content-heading mb-3">

                <div class="heading-icon">
                    <i class="fas fa-star"></i>
                </div>

                <div>
                    <h4>Professional Highlights</h4>
                    <p>Core strengths, working approach and quality standards</p>
                </div>

            </div>

            <div class="row">

                @forelse($about->highlights ?? [] as $highlight)
                    <div class="col-lg-4 col-md-6 mb-3">

                        <div class="about-show-highlight">

                            <div class="about-highlight-icon">
                                {{ $highlight['icon'] ?? '⭐' }}
                            </div>

                            <h5>
                                {{ $highlight['title'] ?? 'Untitled' }}
                            </h5>

                            <p>
                                {{ $highlight['description'] ?? '' }}
                            </p>

                        </div>

                    </div>

                @empty

                    <div class="col-12">
                        <div class="card">
                            <div class="about-empty">
                                <i class="fas fa-star"></i>
                                <h5>No highlights available</h5>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>

        </div>


        {{-- RECORD INFORMATION --}}
        <div class="card about-show-card">

            <div class="about-content-heading">
                <div class="heading-icon">
                    <i class="fas fa-database"></i>
                </div>

                <div>
                    <h4>Record Information</h4>
                    <p>About profile database information</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="about-info-line">
                        <span>Record ID</span>
                        <strong>#{{ $about->id }}</strong>
                    </div>

                    <div class="about-info-line">
                        <span>Profile Name</span>
                        <strong>{{ $about->name }}</strong>
                    </div>

                    <div class="about-info-line">
                        <span>Designation</span>
                        <strong>{{ $about->role }}</strong>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="about-info-line">
                        <span>Created At</span>
                        <strong>
                            {{ $about->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                        </strong>
                    </div>

                    <div class="about-info-line">
                        <span>Last Updated</span>
                        <strong>
                            {{ $about->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
                        </strong>
                    </div>

                    <div class="about-info-line">
                        <span>Profile Image</span>
                        <strong>
                            {{ $about->image ? 'Available' : 'Not Available' }}
                        </strong>
                    </div>

                </div>

            </div>

        </div>


        {{-- BOTTOM ACTIONS --}}
        <div class="d-flex justify-content-between align-items-center flex-wrap mt-3">

            <a href="{{ route('about_pages.index') }}" class="about-btn about-btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Back to About
            </a>

            <a href="{{ route('about_pages.edit', $about->id) }}" class="about-btn about-btn-primary">
                <i class="fas fa-edit"></i>
                Update Profile
            </a>

        </div>

    </div>

@stop
