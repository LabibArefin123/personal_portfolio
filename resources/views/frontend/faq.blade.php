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
        <div class="container text-center">
            <h1>Frequently Asked Questions</h1>
            <p>Answers about my development process, services, technologies, and collaboration.</p>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq-section">
        <div class="container">

            <div class="faq-wrapper">

                <div class="faq-item active">
                    <button class="faq-question">
                        What type of software do you build?
                        <span class="faq-icon">+</span>
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
                        Which technologies do you use?
                        <span class="faq-icon">+</span>
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
                        Do you work on freelance or client projects?
                        <span class="faq-icon">+</span>
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
                        Can you build full-stack applications?
                        <span class="faq-icon">+</span>
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
                        Do you work with APIs and third-party integrations?
                        <span class="faq-icon">+</span>
                    </button>

                    <div class="faq-answer">
                        <p>
                            Yes, I work with REST APIs, biometric device integration, payment gateways,
                            QR code systems, reporting systems, and third-party services.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        Are your projects mobile responsive?
                        <span class="faq-icon">+</span>
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
    </section>

    @include('frontend.welcome_page.footer')
    <script>
        document.querySelectorAll(".faq-question").forEach(item => {
            item.addEventListener("click", function() {
                const parent = this.parentElement;
                const answer = parent.querySelector(".faq-answer");
                const icon = this.querySelector(".faq-icon");

                // Close other items
                document.querySelectorAll(".faq-item").forEach(faq => {
                    if (faq !== parent) {
                        faq.classList.remove("active");
                        faq.querySelector(".faq-answer").style.maxHeight = null;
                        faq.querySelector(".faq-icon").textContent = "+";
                    }
                });

                // Toggle current
                parent.classList.toggle("active");

                if (parent.classList.contains("active")) {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    icon.textContent = "–";
                } else {
                    answer.style.maxHeight = null;
                    icon.textContent = "+";
                }
            });
        });
    </script>
@endsection
