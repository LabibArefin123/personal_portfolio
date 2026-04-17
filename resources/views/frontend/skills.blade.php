@extends('frontend.layouts.app')

@section('title', 'Skills | Md. Labib Arefin')

@section('meta')
<meta name="description"
    content="Explore the technical skills of Md. Labib Arefin including Laravel, PHP, JavaScript, MySQL, and full-stack system development.">
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/skill/custom_skill.css') }}">

@section('content')

    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <!-- HERO -->
    <section class="skills-hero">
        <div class="container text-center">
            <h1>My Skills</h1>
            <p>Technologies & tools I use to build scalable systems</p>
        </div>
    </section>

    <!-- SKILLS -->
    <section class="skills-section">
        <div class="container">

            <div class="row g-4">

                <!-- BACKEND -->
                <div class="col-md-6">
                    <div class="skill-card">
                        <h3>Backend Development</h3>

                        <div class="skill">
                            <span>Laravel</span>
                            <div class="progress"><div style="width: 95%"></div></div>
                        </div>

                        <div class="skill">
                            <span>PHP</span>
                            <div class="progress"><div style="width: 90%"></div></div>
                        </div>

                        <div class="skill">
                            <span>REST API</span>
                            <div class="progress"><div style="width: 88%"></div></div>
                        </div>

                        <div class="skill">
                            <span>Authentication & Authorization</span>
                            <div class="progress"><div style="width: 85%"></div></div>
                        </div>

                    </div>
                </div>

                <!-- FRONTEND -->
                <div class="col-md-6">
                    <div class="skill-card">
                        <h3>Frontend Development</h3>

                        <div class="skill">
                            <span>JavaScript</span>
                            <div class="progress"><div style="width: 85%"></div></div>
                        </div>

                        <div class="skill">
                            <span>jQuery</span>
                            <div class="progress"><div style="width: 90%"></div></div>
                        </div>

                        <div class="skill">
                            <span>Bootstrap</span>
                            <div class="progress"><div style="width: 92%"></div></div>
                        </div>

                        <div class="skill">
                            <span>Tailwind CSS</span>
                            <div class="progress"><div style="width: 80%"></div></div>
                        </div>

                    </div>
                </div>

                <!-- DATABASE -->
                <div class="col-md-6">
                    <div class="skill-card">
                        <h3>Database</h3>

                        <div class="skill">
                            <span>MySQL</span>
                            <div class="progress"><div style="width: 90%"></div></div>
                        </div>

                        <div class="skill">
                            <span>Database Design</span>
                            <div class="progress"><div style="width: 85%"></div></div>
                        </div>

                    </div>
                </div>

                <!-- TOOLS -->
                <div class="col-md-6">
                    <div class="skill-card">
                        <h3>Tools & Others</h3>

                        <div class="skill">
                            <span>Git & GitHub</span>
                            <div class="progress"><div style="width: 85%"></div></div>
                        </div>

                        <div class="skill">
                            <span>AJAX</span>
                            <div class="progress"><div style="width: 88%"></div></div>
                        </div>

                        <div class="skill">
                            <span>Biometric Integration</span>
                            <div class="progress"><div style="width: 80%"></div></div>
                        </div>

                        <div class="skill">
                            <span>System Architecture</span>
                            <div class="progress"><div style="width: 85%"></div></div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- FOOTER --}}
    @include('frontend.welcome_page.footer')

@endsection