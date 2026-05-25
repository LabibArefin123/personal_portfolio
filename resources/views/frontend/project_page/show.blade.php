@extends('frontend.layouts.app')

@section('title', $project->title)

@section('content')

    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <section class="project-show-page">

        <div class="container">

            <!-- HERO -->
            <div class="project-hero-section">

                <h1>{{ $project->title }}</h1>

                <p>
                    {{ $project->description }}
                </p>

            </div>

            <!-- IMAGES -->
            @if ($project->information?->project_images)

                <div class="project-gallery">

                    @foreach ($project->information->project_images as $image)
                        <img src="{{ asset($image) }}">
                    @endforeach

                </div>

            @endif

            <!-- OVERVIEW -->
            <div class="project-section">

                <h2>Overview</h2>

                <p>
                    {{ $project->information?->overview }}
                </p>

            </div>

            <!-- FEATURES -->
            @if ($project->information?->custom_features)

                <div class="project-section">

                    <h2>Core Features</h2>

                    <ul>

                        @foreach ($project->information->custom_features as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            <!-- TECHNOLOGIES -->
            @if ($project->information?->project_languages)

                <div class="project-section">

                    <h2>Technologies</h2>

                    <div class="tech-stack">

                        @foreach ($project->information->project_languages as $tech)
                            <span>{{ $tech }}</span>
                        @endforeach

                    </div>

                </div>

            @endif

            <!-- CHALLENGES -->
            <div class="project-section">

                <h2>Challenges</h2>

                <p>
                    {{ $project->information?->challenges }}
                </p>

            </div>

            <!-- SOLUTION -->
            <div class="project-section">

                <h2>Solution</h2>

                <p>
                    {{ $project->information?->solution }}
                </p>

            </div>

            <!-- CONCLUSION -->
            <div class="project-section">

                <h2>Conclusion</h2>

                <p>
                    {{ $project->information?->conclusion }}
                </p>

            </div>

        </div>

    </section>

@endsection
