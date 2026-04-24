<section id="projects" class="projects-section">
    <div class="container">

        <!-- TITLE -->
        <div class="section-header text-center">
            <h2>🚀 My Projects</h2>
            <p>Real-world systems I’ve designed and developed</p>
        </div>

        <div class="row g-4">

            <!-- BidTrack -->
            @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="project-card {{ $project->is_highlight ? 'highlight' : '' }}">
                        <div class="project-content">
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->description }}</p>
                            <div class="tech">{{ $project->tech_stack }}</div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
