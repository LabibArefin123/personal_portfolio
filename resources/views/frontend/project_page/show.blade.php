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
            <div class="project-gallery">

                @foreach ($project->information->project_images as $image)
                    <div class="project-image">

                        <img src="{{ asset($image) }}" alt="{{ $project->title }}" class="zoomable-image" data-bs-toggle="modal"
                            data-bs-target="#imageZoomModal" data-image="{{ asset($image) }}">

                    </div>
                @endforeach

            </div>

            <!-- IMAGE ZOOM MODAL -->

            <div class="modal fade" id="imageZoomModal" tabindex="-1" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered modal-xl">

                    <div class="modal-content image-zoom-modal">

                        <!-- CLOSE BUTTON -->
                        <button type="button" class="btn-close modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
                        </button>

                        <div class="modal-body">

                            <img src="" id="zoomedImage" class="img-fluid">

                        </div>

                    </div>

                </div>

            </div>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const zoomImages = document.querySelectorAll('.zoomable-image');

            const zoomedImage = document.getElementById('zoomedImage');

            zoomImages.forEach(image => {

                image.addEventListener('click', function() {

                    const imageSrc = this.getAttribute('data-image');

                    zoomedImage.src = imageSrc;
                });
            });
        });
    </script>
@endsection
