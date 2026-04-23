@extends('frontend.layouts.app')

@section('title', 'FAQ | Md. Labib Arefin - Full Stack Developer')

@section('meta')
    <meta name="description"
        content="Frequently asked questions about Md. Labib Arefin, services, technologies, experience, and project workflow.">

    <meta property="og:title" content="FAQ | Labib Arefin">
    <meta property="og:description" content="Common questions regarding services, technologies, projects, and availability.">
    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')

    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <!-- HERO -->
    <section class="faq-hero">
        <div class="container">
            <div class="faq-hero-content">
                <span class="faq-badge">FAQ</span>
                <h1>Frequently Asked Questions</h1>
                <p>
                    Insights into how I design, build, and optimize real-world software systems —
                    including business applications, integrations, and optional SEO optimization.
                </p>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq-section">
        <div class="container">

            <div class="row g-5 align-items-start">
                <div class="col-lg-4">
                    <div class="faq-sidebar-card">
                        <h3>Need More Information?</h3>
                        <p>
                            If you have questions about system development, integrations, performance,
                            SEO optimization, or project workflow — feel free to reach out anytime.
                        </p>

                        <div class="faq-contact-box">
                            <div class="faq-contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>mdlabibarefin@gmail.com</span>
                            </div>

                            <div class="faq-contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <span>+880 1776-197999</span>
                            </div>

                            <div class="faq-contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Dhaka, Bangladesh</span>
                            </div>
                        </div>

                        <a href="{{ route('contact') }}" class="faq-contact-btn">
                            Contact Me
                        </a>
                    </div>
                </div>

                <!-- RIGHT FAQ -->
                <div class="col-lg-8">
                    <!-- AI INPUT BOX -->
                    <div class="faq-ai-box">
                        <div class="faq-ai-header">
                            🤖 Ask Me Anything
                        </div>

                        <input type="text" id="faqAiInput" placeholder="Type your question... (e.g. API, SEO, system)" />

                        <div class="faq-ai-suggestions">
                            <button data-q="What type of software do you build?">Software</button>
                            <button data-q="Do you work with APIs?">API</button>
                            <button data-q="Do you include SEO?">SEO</button>
                            <button data-q="Do you test systems?">Testing</button>
                        </div>
                    </div>

                    <!-- AI RESPONSE -->
                    <div id="faqAiResponse" class="faq-ai-response"></div>

                    <div class="faq-item active">
                        <button class="faq-question">
                            <span>What type of software do you build?</span>
                            <div class="faq-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>

                        <div class="faq-answer">
                            <p>
                                I build scalable business systems such as POS, CRM, Visitor Management,
                                Tender Management, ERP modules, and custom web applications — focusing on
                                real-world usability, performance, and clean architecture.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Which technologies do you use?</span>
                            <div class="faq-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>

                        <div class="faq-answer">
                            <p>
                                I work with Laravel, PHP, React, JavaScript, MySQL, and modern UI frameworks
                                like Bootstrap and Tailwind. I also build REST APIs, handle integrations,
                                and include SEO optimization when required.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Do you work on freelance or client projects?</span>
                            <div class="faq-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>

                        <div class="faq-answer">
                            <p>
                                Yes, I’m open to freelance work, client projects, startup collaborations,
                                and long-term development opportunities involving real-world systems.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Can you build full-stack applications?</span>
                            <div class="faq-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>

                        <div class="faq-answer">
                            <p>
                                Yes, I handle full-stack development — from UI/UX design to backend
                                architecture, database design, API development, authentication systems,
                                and deployment-ready applications.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Do you work with APIs and integrations?</span>
                            <div class="faq-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>

                        <div class="faq-answer">
                            <p>
                                I work with REST APIs, biometric device integrations, QR systems,
                                and real-time data workflows. I also explore advanced integrations
                                like payment gateways and automation systems.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Do you include SEO in your projects?</span>
                            <div class="faq-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>

                        <div class="faq-answer">
                            <p>
                                Yes — I can include SEO optimization when needed, including basic on-page SEO,
                                performance improvements, and structure optimization to improve visibility.
                            </p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Do you test your systems?</span>
                            <div class="faq-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>

                        <div class="faq-answer">
                            <p>
                                Yes, I perform practical testing including flow validation, login/logout behavior,
                                form submissions, and real-world usage scenarios. I also follow step-by-step logic
                                to ensure system reliability and consistency.
                            </p>
                        </div>
                    </div>

                    <!-- 8 -->
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Are your applications mobile responsive?</span>
                            <div class="faq-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </button>

                        <div class="faq-answer">
                            <p>
                                Yes, all applications are designed to be fully responsive and optimized
                                for smooth performance across desktop, tablet, and mobile devices.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')
@endsection
