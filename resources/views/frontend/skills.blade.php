@extends('frontend.layouts.app')

@section('title', 'Skills | Md. Labib Arefin')

@section('meta')
    <meta name="description"
        content="Technical skills of Md. Labib Arefin including Laravel, PHP, JavaScript, MySQL, API integration, and system development.">
@endsection

@section('content')

    @include('frontend.custom_layout.top-bar')
    @include('frontend.custom_layout.navbar')

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

                @forelse($skills as $category => $categorySkills)

                    <div class="col-md-6">

                        <div class="skill-card">

                            <h3>{{ $category }}</h3>

                            @foreach ($categorySkills as $skill)
                                <div class="skill">

                                    <span>{{ $skill->name }}</span>

                                    <div class="progress">

                                        <div style="width: {{ $skill->percentage }}%"></div>

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">
                        <p>No skills found.</p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>

    @include('frontend.custom_layout.footer')

@endsection
