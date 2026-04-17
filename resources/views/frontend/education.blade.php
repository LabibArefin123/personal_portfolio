@extends('frontend.layouts.app')

@section('title', 'Education | Md. Labib Arefin - Full Stack Developer')

@section('meta')
    <meta name="description"
        content="Education background, academic qualifications, certifications, and learning journey of Md. Labib Arefin.">

    <meta property="og:title" content="Education | Labib Arefin">
    <meta property="og:description" content="Explore the academic background and qualifications of Md. Labib Arefin.">
    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="profile">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/education/custom_education.css') }}">

@section('content')

    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <!-- HERO -->
    <section class="education-hero">
        <div class="container text-center">
            <h1>Education & Academic Background</h1>
            <p>My educational journey, academic qualifications, and technical growth.</p>
        </div>
    </section>

    <!-- MAIN SECTION -->
    <section class="education-section">
        <div class="container">

            <!-- INTRO CARD -->
            <div class="education-intro-card">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2>Academic Profile</h2>
                        <p>
                            I have built my technical foundation through formal education in Computer Science
                            and continuous practical development experience in Laravel, React, API development,
                            and software engineering.
                        </p>
                    </div>

                    <div class="col-lg-4 text-lg-end">
                        <div class="education-highlight">
                            <h3>3.52 / 4.00</h3>
                            <span>B.Sc. CGPA</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EDUCATION TABLE -->
            <div class="education-card">
                <div class="section-header">
                    <h3>Academic Qualifications</h3>
                </div>

                <div class="table-responsive">
                    <table class="table education-table">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Degree / Examination</th>
                                <th>Institution</th>
                                <th>Result</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>2023</td>
                                <td>B.Sc. in Computer Science & Engineering</td>
                                <td>Northern University Bangladesh (NUB)</td>
                                <td>CGPA: 3.52 / 4.00</td>
                                <td><span class="badge completed">Completed</span></td>
                            </tr>

                            <tr>
                                <td>2018</td>
                                <td>A Levels</td>
                                <td>Private Candidate</td>
                                <td>GPA: 1.50 / 5.00</td>
                                <td><span class="badge completed">Completed</span></td>
                            </tr>

                            <tr>
                                <td>2016</td>
                                <td>O Levels</td>
                                <td>Oxford International School</td>
                                <td>GPA: 3.50 / 5.00</td>
                                <td><span class="badge completed">Completed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TIMELINE -->
            <div class="education-card mt-5">
                <div class="section-header">
                    <h3>Learning Timeline</h3>
                </div>

                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-year">2016</div>
                        <div class="timeline-content">
                            <h5>Completed O Levels</h5>
                            <p>Finished secondary education from Oxford International School.</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-year">2018</div>
                        <div class="timeline-content">
                            <h5>Completed A Levels</h5>
                            <p>Completed higher secondary education as a private candidate.</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-year">2023</div>
                        <div class="timeline-content">
                            <h5>B.Sc. in CSE</h5>
                            <p>Graduated from Northern University Bangladesh with a CGPA of 3.52.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EXTRA SECTION -->
            <div class="row g-4 mt-4">

                <div class="col-md-4">
                    <div class="edu-small-card">
                        <h5>💻 Technical Focus</h5>
                        <p>Laravel, React, REST API, MySQL, and modern full stack development.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="edu-small-card">
                        <h5>📚 Continuous Learning</h5>
                        <p>Always learning new frameworks, system architecture, and scalable backend solutions.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="edu-small-card">
                        <h5>🚀 Career Goal</h5>
                        <p>To become a senior full stack engineer focused on business software and enterprise systems.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
