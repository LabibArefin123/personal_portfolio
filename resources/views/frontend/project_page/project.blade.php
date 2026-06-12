@extends('frontend.layouts.app')

@section('title', 'Projects | Md. Labib Arefin - Full Stack Developer')

@section('meta')
    <meta name="description"
        content="Explore projects by Md. Labib Arefin including POS systems, CRM platforms, tender management systems, and modern web applications.">

    <meta property="og:title" content="Projects | Labib Arefin">
    <meta property="og:description" content="Real-world software systems built with Laravel, React, and modern technologies.">
    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')

    @include('frontend.custom_layout.top-bar')
    @include('frontend.custom_layout.navbar')

    <section class="project-hero">

        <div class="container">

            <h1>🚀 My Projects</h1>

            <p>
                Real-world systems designed, developed, and delivered
            </p>

        </div>

    </section>

    <section class="projects-section">

        <div class="container">

            <div class="project-grid">

                @forelse($projects as $project)
                    <div class="project-card {{ $project->is_highlight ? 'highlight' : '' }}">

                        {{-- PROJECT IMAGE --}}
                        @if (!$project->image && $project->live_url)
                            <div class="project-image">


                                <img class="project-preview" data-url="{{ $project->live_url }}"
                                    src="{{ asset('images/project-placeholder.jpg') }}" alt="{{ $project->title }}">

                            </div>
                        @endif

                        <!-- CONTENT -->
                        <div class="project-content">

                            <!-- TITLE -->
                            <h4>{{ $project->title }}</h4>

                            <!-- TAG -->
                            @if ($project->title === 'BD Karber')
                                <span class="project-tag">
                                    Team Contribution
                                </span>

                                <span class="project-tag">
                                    University Project
                                </span>
                            @endif

                            <!-- DESCRIPTION -->
                            <p>{{ $project->description }}</p>

                            <!-- TECH -->
                            @if ($project->tech_stack)
                                <div class="tech">

                                    {{ $project->tech_stack }}

                                </div>
                            @endif

                        </div>

                        <!-- HOVER BUTTON -->
                        @if ($project->information)
                            <div class="project-hover-btn">

                                <a href="{{ route('project.show', $project->id) }}" class="view-project-btn">

                                    View Project

                                </a>

                            </div>
                        @endif

                    </div>
                @empty

                    <p class="text-center text-muted">
                        No projects available.
                    </p>
                @endforelse

            </div>

        </div>

    </section>

    @include('frontend.custom_layout.footer')

@endsection
