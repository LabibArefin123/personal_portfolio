<section id="projects" class="projects-section">

    <div class="container">

        <!-- TITLE -->
        <div class="section-header text-center">

            <h2>🚀 My Projects</h2>

            <p>
                Real-world systems I’ve designed and developed
            </p>

        </div>

        <div class="row g-4">

            @foreach ($projects as $project)
                <div class="col-xl-3 col-lg-4 col-md-6">

                    <div class="project-card {{ $project->is_highlight ? 'highlight' : '' }}">

                        {{-- PROJECT IMAGE --}}
                        @if (!$project->image && $project->live_url)
                            <div class="project-image">

                                
                                <img class="project-preview" data-url="{{ $project->live_url }}"
                                    src="{{ asset('images/project-placeholder.jpg') }}" alt="{{ $project->title }}">

                            </div>
                            
                        @endif


                        <div class="project-content">

                            {{-- TITLE --}}
                            <h4>{{ $project->title }}</h4>

                            {{-- DESCRIPTION --}}
                            <p>{{ $project->description }}</p>

                            {{-- TECH --}}
                            @if ($project->tech_stack)
                                <div class="tech">

                                    {{ $project->tech_stack }}

                                </div>
                            @endif

                            {{-- BUTTONS --}}
                            <div class="project-links mt-3">

                                {{-- LIVE --}}
                                @if ($project->live_url)
                                    <a href="{{ $project->live_url }}" target="_blank" class="live-btn">

                                        Live Preview

                                    </a>
                                @endif

                                {{-- GITHUB --}}
                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="github-btn">

                                        GitHub

                                    </a>
                                @endif

                                {{-- VIEW PROJECT --}}
                                @if ($project->information)
                                    <a href="{{ route('project.show', $project->id) }}" class="view-project-btn">

                                        View Project

                                    </a>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</section>
