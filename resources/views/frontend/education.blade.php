
@extends('frontend.layouts.app')

@section('title', ($profile->title ?? 'Education & Academic Background') . ' | Md. Labib Arefin - Full Stack Developer')

@section('meta')
    <meta name="description" content="{{ $profile->subtitle ?? 'Education background, academic qualifications, certifications, and learning journey of Md. Labib Arefin.' }}">
    <meta property="og:title" content="{{ $profile->title ?? 'Education | Labib Arefin' }}">
    <meta property="og:description" content="{{ $profile->subtitle ?? 'Explore the academic background and qualifications of Md. Labib Arefin.' }}">
    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="profile">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')

    @include('frontend.custom_layout.top-bar')
    @include('frontend.custom_layout.navbar')

    {{-- HERO --}}
    <section class="education-hero">
        <div class="container text-center">
            <h1>{{ $profile->title ?? 'Education & Academic Background' }}</h1>
            <p>{{ $profile->subtitle ?? 'My educational journey and technical growth.' }}</p>
        </div>
    </section>

    {{-- MAIN --}}
    <section class="education-section">
        <div class="container">

            {{-- INTRO --}}
            @if ($profile)
                <div class="education-intro-card">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2>{{ $profile->intro_title }}</h2>
                            <p>{{ $profile->intro_description }}</p>
                        </div>

                        <div class="col-lg-4 text-lg-end">
                            @if ($profile->highlight_value)
                                <div class="education-highlight">
                                    <h3>{{ $profile->highlight_value }}</h3>
                                    <span>{{ $profile->highlight_label }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            {{-- EDUCATION TABLE --}}
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
                            @forelse ($educations as $item)
                                <tr>
                                    <td>{{ $item->year ?? '—' }}</td>
                                    <td>{{ $item->degree }}</td>
                                    <td>{{ $item->institution }}</td>
                                    <td>{{ $item->result ?? '—' }}</td>
                                    <td>
                                        <span class="badge {{ strtolower($item->status) === 'completed' ? 'completed' : '' }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        No academic qualifications available.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- TIMELINE --}}
            <div class="education-card mt-5">
                <div class="section-header">
                    <h3>Learning Timeline</h3>
                </div>

                <div class="timeline">
                    @forelse ($timeline as $item)
                        <div class="timeline-item">
                            <div class="timeline-year">
                                {{ $item->year ?? '—' }}
                            </div>

                            <div class="timeline-content">
                                <h5>{{ $item->degree }}</h5>
                                <p>{{ $item->timeline_description ?? $item->institution }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center py-3">
                            No learning timeline available.
                        </p>
                    @endforelse
                </div>
            </div>

            {{-- GITHUB --}}
            @if ($profile && $profile->github_username)
                <div class="education-card mt-5">
                    <div class="section-header d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h3>{{ $profile->github_title ?? 'GitHub Activity' }}</h3>
                            <p class="git-subtitle">
                                {{ $profile->github_description ?? 'Recent coding consistency & projects' }}
                            </p>
                        </div>

                        @if ($profile->github_url)
                            <a href="{{ $profile->github_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="github-profile-btn">
                                View Profile
                            </a>
                        @endif
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

                                    @if (!empty($profile->github_activities))
                                        <ul class="github-list">
                                            @foreach ($profile->github_activities as $activity)
                                                <li>{{ $activity }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-8">
                                @if ($profile->github_chart_url)
                                    <div class="github-image-card">
                                        <img
                                            src="{{ $profile->github_chart_url }}"
                                            alt="GitHub contribution graph for {{ $profile->github_username }}"
                                            loading="lazy">
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @endif

            {{-- EXTRA FOCUS CARDS --}}
            @if (!empty($profile?->focus_cards))
                <div class="row g-4 mt-4">
                    @foreach ($profile->focus_cards as $item)
                        <div class="col-md-4">
                            <div class="edu-small-card">
                                <h5>{{ $item['title'] ?? '' }}</h5>
                                <p>{{ $item['description'] ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    @include('frontend.custom_layout.footer')

@endsection
