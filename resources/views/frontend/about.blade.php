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

@section('content')

    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <!-- HERO -->
    <section class="about-hero">
        <div class="container">
            <h1>About Me</h1>
            <p>Building scalable systems with clean architecture & modern UI</p>
        </div>
    </section>

    <!-- PROFILE CARD (NEW - LinkedIn Style) -->
    <section class="about-section">
        <div class="container">

            <div class="about-profile-card">
                <div class="row align-items-center g-4">

                    <!-- IMAGE -->
                    <div class="col-lg-3 text-center">
                        <div class="about-image">
                            <img src="{{ asset('uploads/images/about/developer.jpg') }}" alt="Labib Arefin">
                        </div>
                    </div>

                    <!-- INFO -->
                    <div class="col-lg-9">
                        <h2 class="about-name">Md. Labib Arefin</h2>
                        <p class="about-role">Full Stack Developer & Software Engineer</p>

                        <p class="about-desc">
                            I specialize in building scalable web applications using Laravel, JavaScript, and modern UI
                            frameworks.
                            My focus is on writing clean, maintainable code and designing systems that solve real-world
                            problems.
                        </p>

                        <p class="about-desc">
                            I have experience developing POS systems, CRM platforms, biometric integrations,
                            and custom business solutions.
                        </p>
                    </div>

                </div>
            </div>

            <!-- TECH STACK -->
            <div class="about-block">
                <h4 class="section-title">Tech Stack</h4>

                <div class="skills">
                    <span>Laravel</span>
                    <span>PHP</span>
                    <span>JavaScript</span>
                    <span>jQuery</span>
                    <span>MySQL</span>
                    <span>API Integration</span>
                    <span>Bootstrap</span>
                </div>
            </div>

            <!-- EXPERIENCE -->
            <div class="about-block">
                <h4 class="section-title">Experience</h4>

                <div class="exp-box">
                    <h6>Software Engineer</h6>
                    <p>Building real-world business software including attendance tracking systems. Focused on scalable
                        backend architecture and API design.</p>
                </div>

                <div class="exp-box">
                    <h6>Software Developer (Full Stack)</h6>
                    <p>Developed CMS platforms, portfolio systems, and business tools with complete frontend-backend
                        integration.</p>
                </div>

                <div class="exp-box">
                    <h6>Application Development Practice</h6>
                    <p>Built small systems like chat apps, clocks, and company websites to strengthen fundamentals.</p>
                </div>

                <div class="exp-box">
                    <h6>System Integration</h6>
                    <p>Worked with biometric devices, APIs, and real-time data systems.</p>
                </div>

                <div class="exp-box">
                    <h6>UI/UX Development</h6>
                    <p>Designed modern dashboards and responsive interfaces for better UX.</p>
                </div>
            </div>

            <!-- EXTRA -->
            <div class="about-extra">
                <div class="row g-4">

                    <div class="col-md-4">
                        <div class="about-card">
                            <h5>🚀 Projects</h5>
                            <p>Built real-world systems including POS, CRM, and tender platforms.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="about-card">
                            <h5>⚡ Focus</h5>
                            <p>Performance, scalability, and clean architecture are top priorities.</p>
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

    @include('frontend.welcome_page.footer')

@endsection
