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

    <section class="about-hero">
        <div class="container">
            <h1>About Me</h1>
            <p>Building scalable systems with clean architecture & modern UI</p>
        </div>
    </section>

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
                            I build scalable business applications using Laravel and modern web technologies, focusing on
                            clean architecture,
                            maintainable code, and real-world usability. My work includes full system development — from
                            database design to UI implementation.
                        </p>

                        <p class="about-desc">
                            I have experience developing POS systems, CMS platforms, tender management systems, and
                            biometric integrations.
                            I also apply SEO best practices when required, ensuring systems are not only functional but also
                            optimized for visibility and performance.
                        </p>

                        <p class="about-desc">
                            Alongside development, I test and refine systems to ensure reliability, smooth user experience,
                            and production readiness.
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
                    <p>
                        Building real-world business software including attendance tracking systems in collaboration.
                        Focused on backend architecture, API design, and production-ready systems.
                    </p>
                </div>

                <div class="exp-box">
                    <h6>Software Developer (Full Stack)</h6>
                    <p>
                        Developed CMS platforms, portfolio systems, and business tools with full frontend-backend
                        integration.
                        Worked on structured application design and real-world requirements.
                    </p>
                </div>

                <div class="exp-box">
                    <h6>Application Development Practice</h6>
                    <p>
                        Built small applications such as chat systems, clocks, and company websites to strengthen
                        development fundamentals.
                        Explored mobile app development using React Native (Expo).
                    </p>
                </div>

                <div class="exp-box">
                    <h6>System Integration & Functional Testing</h6>
                    <p>
                        Worked with biometric devices, APIs, and real-time systems. Performed workflow-based testing
                        including login/logout flows, form submissions, and validation processes. Designed step-by-step
                        logic to verify system behavior and ensure reliability in real-world usage.
                    </p>
                </div>

                <div class="exp-box">
                    <h6>Basic Security & Penetration Testing</h6>
                    <p>
                        Conducted basic security checks on authentication systems, input handling, and user flows.
                        Identified potential issues in access control and form handling to improve system safety.
                    </p>
                </div>
                
                <div class="exp-box">
                    <h6>UI/UX & SEO Implementation</h6>
                    <p>
                        Designed responsive user interfaces and improved usability.
                        Applied SEO techniques when required to enhance performance and visibility.
                    </p>
                </div>
            </div>

            <!-- EXTRA -->
            <div class="about-extra">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="about-card">
                            <h5>🚀 Systems</h5>
                            <p>Built real-world platforms including POS, CMS, and tender management systems.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="about-card">
                            <h5>⚡ Approach</h5>
                            <p>Focus on clean architecture, scalability, and maintainable code.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="about-card">
                            <h5>🔍 Quality</h5>
                            <p>Testing, debugging, and optimizing systems for real-world reliability.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
