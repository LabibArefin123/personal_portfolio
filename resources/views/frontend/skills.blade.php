@extends('frontend.layouts.app')

@section('title', 'Skills | Md. Labib Arefin')

@section('meta')
    <meta name="description"
        content="Technical skills of Md. Labib Arefin including Laravel, PHP, JavaScript, MySQL, API integration, and system development.">
@endsection

@section('content')

    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <!-- HERO -->
    <section class="skills-hero">
        <div class="container text-center">
            <h1>Skills & Technologies</h1>
            <p>Tools and technologies I use to build real-world systems</p>
        </div>
    </section>

    <!-- SKILLS -->
    <section class="skills-section">
        <div class="container">

            <div class="row g-4">

                <!-- BACKEND -->
                <div class="col-md-6">
                    <div class="skill-card">
                        <h3>Backend & Systems</h3>

                        @foreach ([['Laravel', 95], ['PHP', 90], ['API Development & Integration', 88], ['Authentication & Authorization', 85]] as $skill)
                            <div class="skill">
                                <span>{{ $skill[0] }}</span>
                                <div class="progress">
                                    <div style="width: {{ $skill[1] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- FRONTEND -->
                <div class="col-md-6">
                    <div class="skill-card">
                        <h3>Frontend Development</h3>

                        @foreach ([['JavaScript', 85], ['jQuery', 90], ['Bootstrap', 92], ['Tailwind CSS', 80]] as $skill)
                            <div class="skill">
                                <span>{{ $skill[0] }}</span>
                                <div class="progress">
                                    <div style="width: {{ $skill[1] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- DATABASE -->
                <div class="col-md-6">
                    <div class="skill-card">
                        <h3>Database & Structure</h3>

                        @foreach ([['MySQL', 90], ['Database Design', 85]] as $skill)
                            <div class="skill">
                                <span>{{ $skill[0] }}</span>
                                <div class="progress">
                                    <div style="width: {{ $skill[1] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- TOOLS -->
                <div class="col-md-6">
                    <div class="skill-card">
                        <h3>Tools & Engineering Practice</h3>

                        @foreach ([['Git & GitHub', 85], ['AJAX', 88], ['System Testing & Debugging', 82], ['Basic Security (Validation & Flow Testing)', 75], ['SEO (Optional Implementation)', 70]] as $skill)
                            <div class="skill">
                                <span>{{ $skill[0] }}</span>
                                <div class="progress">
                                    <div style="width: {{ $skill[1] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
