<section id="projects" class="home-project-section">
    <div class="container">
        <div class="home-project-heading">
            <div class="home-project-heading-content">
                <span>MY SELECTED WORK</span>
                <h2>Featured Projects</h2>
                <p>
                    A selection of software systems and applications
                    I've designed and developed.
                </p>
            </div>

            <div class="home-project-controls">
                <a href="{{ route('project') }}" class="home-project-all">
                    Explore All Projects
                    <i class="fas fa-arrow-right"></i>
                </a>

                <button type="button" class="home-project-prev" aria-label="Previous projects">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button type="button" class="home-project-next" aria-label="Next projects">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="home-project-slider">
            <div class="home-project-track" data-home-project-track>
                @forelse ($projects as $project)
                    @php
                        $fallbackImage = $project->image ? asset($project->image) : asset('uploads/images/default.jpg');
                    @endphp

                    <article class="home-project-card {{ $project->is_highlight ? 'is-featured' : '' }}"
                        data-project-reveal>
                        <div class="home-project-image">
                            <img class="project-preview" src="{{ $fallbackImage }}" data-url="{{ $project->live_url }}"
                                data-fallback="{{ $fallbackImage }}" alt="{{ $project->title }} preview" loading="lazy"
                                decoding="async">

                            @if ($project->is_highlight)
                                <span class="home-project-badge">
                                    <i class="fas fa-star"></i>
                                    Featured
                                </span>
                            @endif

                            @if ($project->live_url)
                                <span class="home-project-live-indicator">
                                    <i class="fas fa-globe"></i>
                                    Live Website
                                </span>
                            @endif
                        </div>

                        <div class="home-project-content">
                            <span class="home-project-category">
                                {{ $project->category ?: 'Software Project' }}
                            </span>

                            <h3>{{ $project->title }}</h3>

                            <p>{{ $project->description }}</p>

                            @if ($project->tech_stack)
                                <div class="home-project-tech">
                                    {{ $project->tech_stack }}
                                </div>
                            @endif

                            <div class="home-project-links">
                                @if ($project->live_url)
                                    <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer">
                                        Live Preview
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                @endif

                                @if ($project->information)
                                    <a href="{{ route('project.show', $project->id) }}">
                                        Details
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <p class="home-project-empty">
                        No featured projects available.
                    </p>
                @endforelse
            </div>
        </div>

        <div class="home-project-footer">
            <span>Discover more of my work</span>

            <a href="{{ route('project') }}">
                View All Projects
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
