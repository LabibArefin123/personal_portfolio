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

    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <!-- HERO -->
    <section class="project-hero">
        <div class="container">
            <h1>🚀 My Projects</h1>
            <p>Real-world systems designed, developed, and delivered</p>
        </div>
    </section>

    <!-- PROJECTS -->
    <section class="projects-section">
        <div class="container">

            <div class="project-grid">

                @forelse($projects as $project)
                    <div class="project-card {{ $project->is_highlight ? 'highlight' : '' }}">

                        <!-- TITLE -->
                        <h4>{{ $project->title }}</h4>

                        <!-- OPTIONAL ROLE TAG -->
                        @if ($project->title === 'BD Karber')
                            <span class="project-tag">Team Contribution</span>
                            <span class="project-tag">University Project</span>
                        @endif

                        <!-- DESCRIPTION -->
                        <p>{{ $project->description }}</p>

                        <!-- DETAILS (future ready) -->
                        @if ($project->details && $project->details->count())
                            <div class="project-detail">
                                @foreach ($project->details as $detail)
                                    <p>{{ $detail->description }}</p>
                                @endforeach
                            </div>
                        @endif

                        <!-- TECH -->
                        @if ($project->tech_stack)
                            <div class="tech">{{ $project->tech_stack }}</div>
                        @endif

                        <!-- LINKS (optional future use) -->
                        @if ($project->live_url || $project->github_url)
                            <div class="project-links mt-3">
                                @if ($project->live_url)
                                    <a href="{{ $project->live_url }}" target="_blank">Live</a>
                                @endif

                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank">Code</a>
                                @endif
                            </div>
                        @endif

                    </div>
                @empty
                    <p class="text-center text-muted">No projects available.</p>
                @endforelse

            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
