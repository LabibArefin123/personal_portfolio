@extends('adminlte::page')

@section('title', 'Portfolio Dashboard')

@section('content_header')
    <div class="dashboard-page-heading">
        <div>
            <span class="dashboard-eyebrow">
                <i class="fas fa-layer-group"></i>
                ADMINISTRATION
            </span>
            <h1>Dashboard</h1>
            <p>Welcome back! Here's an overview of your portfolio website.</p>
        </div>

        <div class="dashboard-date">
            <i class="far fa-calendar-alt"></i>
            <span id="dashboardCurrentDate"></span>
        </div>
    </div>
@stop

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/admin_page/dashboard.css') }}">
@stop

@section('content')
    <div class="container-fluid dashboard-container">
        {{-- Welcome Section --}}
        <section class="dashboard-welcome dashboard-reveal">
            <div class="dashboard-welcome-content">
                <span class="welcome-label">
                    <i class="fas fa-sparkles"></i>
                    YOUR WORKSPACE
                </span>

                <h2>Good to see you again!</h2>

                <p>
                    Manage your portfolio, showcase your projects, and keep your
                    professional information up to date — all from one place.
                </p>

                <a href="{{ route('projects.index') }}" class="welcome-action">
                    Explore Projects
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="dashboard-welcome-decoration">
                <div class="welcome-decoration-circle circle-one"></div>
                <div class="welcome-decoration-circle circle-two"></div>
                <div class="welcome-decoration-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
            </div>
        </section>

        {{-- Statistics --}}
        <section class="dashboard-section dashboard-reveal">
            <div class="dashboard-section-heading">
                <div>
                    <span class="section-eyebrow">AT A GLANCE</span>
                    <h3>Portfolio Overview</h3>
                    <p>A quick look at your portfolio content.</p>
                </div>
            </div>

            <div class="row g-3 dashboard-stat-row">

                {{-- Total Projects --}}
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="dashboard-stat-card stat-primary">
                        <div class="stat-card-top">
                            <div class="stat-icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <span class="stat-label">ALL PROJECTS</span>
                        </div>

                        <div class="stat-card-bottom">
                            <h2 class="stat-counter" data-count="{{ $projectCount }}">0</h2>
                            <span class="stat-description">Total projects</span>
                        </div>

                        <div class="stat-decoration">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                    </div>
                </div>

                {{-- Published Projects --}}
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="dashboard-stat-card stat-success">
                        <div class="stat-card-top">
                            <div class="stat-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span class="stat-label">PUBLISHED</span>
                        </div>

                        <div class="stat-card-bottom">
                            <h2 class="stat-counter" data-count="{{ $activeProjects }}">0</h2>
                            <span class="stat-description">Live projects</span>
                        </div>

                        <div class="stat-decoration">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>

                {{-- Featured Projects --}}
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="dashboard-stat-card stat-warning">
                        <div class="stat-card-top">
                            <div class="stat-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="stat-label">FEATURED</span>
                        </div>

                        <div class="stat-card-bottom">
                            <h2 class="stat-counter" data-count="{{ $featuredProjects }}">0</h2>
                            <span class="stat-description">Highlighted projects</span>
                        </div>

                        <div class="stat-decoration">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Quick Actions --}}
        <section class="dashboard-section dashboard-reveal">
            <div class="dashboard-section-heading">
                <div>
                    <span class="section-eyebrow">SHORTCUTS</span>
                    <h3>Quick Actions</h3>
                    <p>Jump directly to the sections you manage most.</p>
                </div>
            </div>

            <div class="row g-3">

                {{-- Projects --}}
                <div class="col-12 col-md-6 col-xl-4">
                    <a href="{{ route('projects.index') }}" class="dashboard-action-card">
                        <div class="action-icon action-blue">
                            <i class="fas fa-folder-open"></i>
                        </div>

                        <div class="action-content">
                            <h5>Manage Projects</h5>
                            <p>Create, edit, and publish your portfolio projects.</p>
                        </div>

                        <span class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                </div>

                {{-- About Section --}}
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="dashboard-action-card action-card-disabled">
                        <div class="action-icon action-purple">
                            <i class="fas fa-user-edit"></i>
                        </div>

                        <div class="action-content">
                            <h5>About Section</h5>
                            <p>Keep your professional profile and introduction updated.</p>
                            <span class="action-coming-soon">Coming soon</span>
                        </div>

                        <span class="action-arrow">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                {{-- Contact Requests --}}
                <div class="col-12 col-md-6 col-xl-4">
                    <a href="{{ route('contact_requests.index') }}" class="dashboard-action-card">
                        <div class="action-icon action-green">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>

                        <div class="action-content">
                            <h5>Contact Requests</h5>
                            <p>Review messages and inquiries from your website visitors.</p>
                        </div>

                        <span class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                </div>

            </div>
        </section>

        {{-- Dashboard Footer Note --}}
        <div class="dashboard-footer-note dashboard-reveal">
            <div class="footer-note-icon">
                <i class="fas fa-lightbulb"></i>
            </div>

            <div>
                <h6>Your portfolio, your story.</h6>
                <p>
                    Keep your projects and professional information fresh.
                    Every update helps visitors understand your work better.
                </p>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script src="{{ asset('js/custom_backend/dashboard_page/dashboard.js') }}"></script>
@stop
