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

<link rel="stylesheet" href="{{ asset('css/frontend/about/custom_about.css') }}">

@section('content')

    {{-- NAVBAR --}}
    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <!-- HERO -->
    <section class="about-hero">
        <div class="container text-center">
            <h1>About Me</h1>
            <p>Building scalable systems with clean architecture & modern UI</p>
        </div>
    </section>

    <!-- MAIN -->
    <section class="about-section">
        <div class="container">

            <div class="row align-items-center g-5">

                <!-- LEFT IMAGE -->
                <div class="col-lg-4 text-center">
                    <div class="about-image">
                        <img src="{{ asset('uploads/images/about/developer.jpg') }}" alt="Labib Arefin">
                    </div>
                </div>

                <!-- RIGHT CONTENT -->
                <div class="col-lg-8">
                    <h2 class="about-name">Md. Labib Arefin</h2>
                    <p class="about-role">Full Stack Developer</p>

                    <p class="about-desc">
                        I specialize in building scalable web applications using Laravel, JavaScript, and modern UI
                        frameworks.
                        My focus is on writing clean, maintainable code and designing systems that solve real-world
                        problems.
                    </p>

                    <p class="about-desc">
                        I have experience developing POS systems, CRM platforms, biometric integrations,
                        and custom business solutions. I enjoy turning complex requirements into simple,
                        efficient, and user-friendly systems.
                    </p>

                    <!-- SKILLS -->
                    <h4 class="section-title">Tech Stack</h4>
                    <div class="skills">
                        <span>Laravel</span>
                        <span>PHP</span>
                        <span>JavaScript</span>
                        <span>jQuery</span>
                        <span>MySQL</span>
                        <span>REST API</span>
                        <span>Bootstrap</span>
                        <span>Tailwind</span>
                    </div>

                    <!-- EXPERIENCE -->
                    <h4 class="section-title mt-4">Experience</h4>

                    <div class="exp-box">
                        <h6>Full Stack Developer</h6>
                        <p>Developed POS systems, inventory management, and business automation tools.</p>
                    </div>

                    <div class="exp-box">
                        <h6>System Integration</h6>
                        <p>Worked with biometric devices, APIs, and real-time data systems.</p>
                    </div>

                    <div class="exp-box">
                        <h6>UI/UX Development</h6>
                        <p>Designed modern dashboards and responsive interfaces for better user experience.</p>
                    </div>

                </div>

            </div>

            <!-- EXTRA SECTION -->
            <div class="about-extra">

                <div class="row g-4">

                    <div class="col-md-4">
                        <div class="about-card">
                            <h5>🚀 Projects</h5>
                            <p>Built real-world systems including POS, CRM, and tender management platforms.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="about-card">
                            <h5>⚡ Focus</h5>
                            <p>Performance, scalability, and clean architecture are my top priorities.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="about-card">
                            <h5>🤝 Collaboration</h5>
                            <p>Open to freelance work, team collaboration, and long-term opportunities.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    {{-- FOOTER --}}
    @include('frontend.welcome_page.footer')

@endsection
