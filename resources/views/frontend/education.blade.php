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

@section('content')

    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    {{-- HERO --}}
    <section class="education-hero">
        <div class="container text-center">
            <h1>Education & Academic Background</h1>
            <p>My educational journey and technical growth.</p>
        </div>
    </section>

    {{-- MAIN --}}
    <section class="education-section">
        <div class="container">

            {{-- INTRO --}}
            <div class="education-intro-card">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2>Academic Profile</h2>
                        <p>
                            Built strong foundations in Computer Science with hands-on development
                            in Laravel, APIs, and real-world software systems.
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

            {{-- EDUCATION TABLE --}}
            @php
                $education = [
                    [
                        'year' => 2023,
                        'degree' => 'B.Sc. in CSE',
                        'inst' => 'Northern University Bangladesh',
                        'result' => 'CGPA: 3.52 / 4.00',
                    ],
                    [
                        'year' => 2018,
                        'degree' => 'A Levels',
                        'inst' => 'Private Candidate',
                        'result' => 'GPA: 1.50 / 5.00',
                    ],
                    [
                        'year' => 2016,
                        'degree' => 'O Levels',
                        'inst' => 'Oxford International School',
                        'result' => 'GPA: 3.50 / 5.00',
                    ],
                ];
            @endphp

            <div class="education-card">
                <div class="section-header">
                    <h3>Academic Qualifications</h3>
                </div>

                <div class="table-responsive">
                    <table class="table education-table">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Degree</th>
                                <th>Institution</th>
                                <th>Result</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($education as $item)
                                <tr>
                                    <td>{{ $item['year'] }}</td>
                                    <td>{{ $item['degree'] }}</td>
                                    <td>{{ $item['inst'] }}</td>
                                    <td>{{ $item['result'] }}</td>
                                    <td><span class="badge completed">Completed</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- TIMELINE --}}
            @php
                $timeline = [
                    ['year' => 2016, 'title' => 'O Levels', 'desc' => 'Completed secondary education'],
                    ['year' => 2018, 'title' => 'A Levels', 'desc' => 'Higher secondary (private candidate)'],
                    ['year' => 2023, 'title' => 'B.Sc. in CSE', 'desc' => 'Graduated with CGPA 3.52'],
                ];
            @endphp

            <div class="education-card mt-5">
                <div class="section-header">
                    <h3>Learning Timeline</h3>
                </div>

                <div class="timeline">
                    @foreach ($timeline as $t)
                        <div class="timeline-item">
                            <div class="timeline-year">{{ $t['year'] }}</div>
                            <div class="timeline-content">
                                <h5>{{ $t['title'] }}</h5>
                                <p>{{ $t['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- GITHUB --}}
            <div class="education-card mt-5">
                <div class="section-header d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h3>GitHub Activity</h3>
                        <p class="git-subtitle">Recent coding consistency & projects</p>
                    </div>

                    <a href="https://github.com/LabibArefin123" target="_blank" class="github-profile-btn">
                        View Profile
                    </a>
                </div>

                <div class="github-stats-wrapper">
                    <div class="row g-4">

                        <div class="col-lg-4">
                            <div class="github-info-card">
                                <h5>Active Development</h5>
                                <p>
                                    Building Laravel-based business systems with real-world use cases
                                    and API integrations.
                                </p>

                                <ul class="github-list">
                                    <li>Laravel Application Development</li>
                                    <li>Business Systems (POS, Tender, Attendance)</li>
                                    <li>API Integration & Device Connectivity</li>
                                    <li>Database Design (MySQL)</li>
                                    <li>Git & Version Control Workflow</li>
                                    <li>Frontend Development (React - Learning)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="github-image-card">
                                <img src="https://ghchart.rshah.org/6366f1/LabibArefin123" alt="GitHub Graph">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- EXTRA --}}
            @php
                $extras = [
                    ['title' => '💻 Technical Focus', 'desc' => 'Laravel, APIs, MySQL, scalable backend'],
                    ['title' => '📚 Learning', 'desc' => 'Continuously improving architecture & systems'],
                    ['title' => '🚀 Goal', 'desc' => 'Become strong software engineer in business systems'],
                ];
            @endphp

            <div class="row g-4 mt-4">
                @foreach ($extras as $ex)
                    <div class="col-md-4">
                        <div class="edu-small-card">
                            <h5>{{ $ex['title'] }}</h5>
                            <p>{{ $ex['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
