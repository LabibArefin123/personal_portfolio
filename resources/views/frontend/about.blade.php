@extends('frontend.layouts.app')

@section('title', 'About | Md. Labib Arefin - Full Stack Developer')

@section('meta')
    <meta name="description"
        content="Learn about Md. Labib Arefin, a Full Stack Developer specializing in Laravel, React, POS systems, CRM platforms, and scalable web applications.">

    <meta property="og:title" content="About | Labib Arefin">
    <meta property="og:description"
        content="Full Stack Developer focused on building modern, scalable, and efficient web systems.">
    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="profile">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@extends('frontend.layouts.app')

@section('title', 'About Me')

@section('content')

    @include('frontend.custom_layout.top-bar')
    @include('frontend.custom_layout.navbar')

    {{-- ABOUT HERO --}}
    <section class="about-hero">
        <div class="container">
            <h1>About Me</h1>
            <p>Building scalable systems with clean architecture & modern UI</p>
        </div>
    </section>

    @if ($about)

        <section class="about-section">
            <div class="container">

                {{-- PROFILE --}}
                <div class="about-profile-card">
                    <div class="row align-items-center g-4">

                        {{-- PROFILE IMAGE --}}
                        <div class="col-lg-3 text-center">
                            <div class="about-image">
                                <img src="{{ asset($about->image ?: 'uploads/images/default.jpg') }}"
                                    alt="{{ $about->name }}" loading="lazy">
                            </div>
                        </div>

                        {{-- PROFILE INFORMATION --}}
                        <div class="col-lg-9">

                            <h2 class="about-name">
                                {{ $about->name }}
                            </h2>

                            <p class="about-role">
                                {{ $about->role }}
                            </p>

                            @foreach ($about->bio ?? [] as $paragraph)
                                <p class="about-desc">
                                    {{ $paragraph }}
                                </p>
                            @endforeach

                        </div>

                    </div>
                </div>


                {{-- TECH STACK --}}
                @if (!empty($about->skills))
                    <div class="about-block">

                        <h4 class="section-title">
                            Tech Stack
                        </h4>

                        <div class="skills">
                            @foreach ($about->skills as $skill)
                                <span>{{ $skill }}</span>
                            @endforeach
                        </div>

                    </div>
                @endif


                {{-- EXPERIENCE --}}
                @if (!empty($about->experiences))
                    <div class="about-block">

                        <h4 class="section-title">
                            Experience
                        </h4>

                        @foreach ($about->experiences as $experience)
                            <div class="exp-box">

                                <h6>
                                    {{ $experience['title'] ?? '' }}
                                </h6>

                                <p>
                                    {{ $experience['description'] ?? '' }}
                                </p>

                            </div>
                        @endforeach

                    </div>
                @endif


                {{-- HIGHLIGHTS --}}
                @if (!empty($about->highlights))
                    <div class="about-extra">

                        <div class="row g-4">

                            @foreach ($about->highlights as $highlight)
                                <div class="col-md-4">

                                    <div class="about-card">

                                        <h5>
                                            {{ $highlight['icon'] ?? '' }}
                                            {{ $highlight['title'] ?? '' }}
                                        </h5>

                                        <p>
                                            {{ $highlight['description'] ?? '' }}
                                        </p>

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                @endif

            </div>
        </section>
    @else
        <section class="about-section">
            <div class="container">
                <p>About information is currently unavailable.</p>
            </div>
        </section>

    @endif

    @include('frontend.custom_layout.footer')

@endsection
