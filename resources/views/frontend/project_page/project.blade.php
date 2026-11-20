@extends('frontend.layouts.app')

@section('title', 'Projects | Md. Labib Arefin - Full Stack Developer')

@section('meta')
    <meta name="description"
        content="Explore software projects developed by Md. Labib Arefin, including Laravel applications, CRM systems, business platforms, and mobile applications.">

    <meta property="og:title" content="Projects | Labib Arefin">
    <meta property="og:description"
        content="Explore software applications and websites designed and developed by Labib Arefin.">
    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')

    @include('frontend.custom_layout.top-bar')
    @include('frontend.custom_layout.navbar')

    <main class="portfolio-project-page">

        <section class="portfolio-project-hero">
            <div class="container">
                <span class="portfolio-project-eyebrow">
                    MY WORK & EXPERIENCE
                </span>

                <h1>Explore My Projects</h1>

                <p>
                    A collection of software applications, business systems,
                    websites, and mobile projects I've worked on.
                </p>
            </div>
        </section>

        <section class="portfolio-project-listing">
            <div class="container">

                {{-- FILTER HEADER --}}
                <div class="portfolio-project-heading">
                    <div>
                        <span>PROJECT COLLECTION</span>
                        <h2>Things I've Built</h2>
                    </div>

                    <div class="portfolio-project-count">
                        {{ $projects->total() }} Projects
                    </div>
                </div>

                {{-- SEARCH --}}
                <div class="portfolio-project-toolbar">

                    <div class="portfolio-project-search">
                        <i class="fas fa-search"></i>

                        <input type="search" id="projectSearch" placeholder="Search projects, technologies..."
                            autocomplete="off">

                        <span id="projectSearchLoading">
                            <i class="fas fa-spinner fa-spin"></i>
                        </span>
                    </div>

                    <div class="portfolio-project-filter">
                        <select id="projectCategory">
                            <option value="">All Categories</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category }}">
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                {{-- CATEGORY CHIPS --}}
                <div class="portfolio-project-categories">

                    <button type="button" class="portfolio-category-btn active" data-category="">
                        All Projects
                    </button>

                    @foreach ($categories as $category)
                        <button type="button" class="portfolio-category-btn" data-category="{{ $category }}">
                            {{ $category }}
                        </button>
                    @endforeach

                </div>

                {{-- AJAX RESULTS --}}
                <div id="projectResults" data-url="{{ route('project') }}">
                    @include('frontend.project_page.partials.project_results')
                </div>

            </div>
        </section>

    </main>

    @include('frontend.custom_layout.footer')

@endsection
