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

<link rel="stylesheet" href="{{ asset('css/frontend/faq/custom_faq.css') }}">

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
                    Everything you may want to know about my workflow, technologies,
                    software development process, and collaboration.
                </p>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq-section">
        <div class="container">

            <div class="row g-5 align-items-start">

                <!-- LEFT INFO -->
                <div class="col-lg-4">
                    <div class="faq-sidebar-card">
                        <h3>Need More Information?</h3>
                        <p>
                            If you have any additional questions regarding software development,
                            project workflow, pricing, or technology stack, feel free to contact me.
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
                    <div class="faq-wrapper">

                        <div class="faq-item active">
                            <button class="faq-question">
                                <span>What type of software do you build?</span>
                                <div class="faq-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </button>

                            <div class="faq-answer">
                                <p>
                                    I mainly build business software such as POS systems, CRM software,
                                    Visitor Management Systems, Tender Management platforms, ERP modules,
                                    inventory systems, and custom web applications.
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
                                    I primarily work with Laravel, PHP, React.js, JavaScript, MySQL,
                                    Bootstrap, Tailwind CSS, REST APIs, and Git/GitHub workflows.
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
                                    Yes, I am open to freelance projects, client work, startup collaborations,
                                    and long-term software development opportunities.
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
                                    Yes, I handle both frontend and backend development including UI design,
                                    database architecture, API development, authentication, dashboards,
                                    and deployment-ready systems.
                                </p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                <span>Do you work with APIs and third-party integrations?</span>
                                <div class="faq-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </button>

                            <div class="faq-answer">
                                <p>
                                    I have experience working with REST APIs, biometric device connectivity,
                                    QR code systems, and data integration workflows. I am continuously learning
                                    more advanced third-party integrations, payment gateways, and automation systems
                                    to improve my backend development skills.
                                </p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-question">
                                <span>Are your projects mobile responsive?</span>
                                <div class="faq-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </button>

                            <div class="faq-answer">
                                <p>
                                    Yes, all of my websites and applications are designed to work smoothly
                                    across desktop, tablet, and mobile devices.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

    <script>
        document.querySelectorAll(".faq-question").forEach(question => {
            question.addEventListener("click", function() {
                const currentItem = this.parentElement;
                const currentAnswer = currentItem.querySelector(".faq-answer");
                const currentIcon = currentItem.querySelector(".faq-icon i");

                document.querySelectorAll(".faq-item").forEach(item => {
                    const answer = item.querySelector(".faq-answer");
                    const icon = item.querySelector(".faq-icon i");

                    if (item !== currentItem) {
                        item.classList.remove("active");
                        answer.style.maxHeight = null;
                        icon.classList.remove("fa-minus");
                        icon.classList.add("fa-plus");
                    }
                });

                currentItem.classList.toggle("active");

                if (currentItem.classList.contains("active")) {
                    currentAnswer.style.maxHeight = currentAnswer.scrollHeight + "px";
                    currentIcon.classList.remove("fa-plus");
                    currentIcon.classList.add("fa-minus");
                } else {
                    currentAnswer.style.maxHeight = null;
                    currentIcon.classList.remove("fa-minus");
                    currentIcon.classList.add("fa-plus");
                }
            });
        });

        document.querySelector(".faq-item.active .faq-answer").style.maxHeight =
            document.querySelector(".faq-item.active .faq-answer").scrollHeight + "px";
    </script>

@endsection
