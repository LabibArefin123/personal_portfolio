<div class="portfolio-project-grid">

    @forelse ($projects as $project)
        <article class="portfolio-project-card {{ $project->is_highlight ? 'is-highlighted' : '' }}">

            <div class="portfolio-project-image">

                @if ($project->image)
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" loading="lazy">
                @else
                    <img src="{{ asset('uploads/images/default.jpg') }}" alt="{{ $project->title }}" loading="lazy">
                @endif

                @if ($project->is_highlight)
                    <span class="portfolio-project-featured">
                        <i class="fas fa-star"></i>
                        Featured
                    </span>
                @endif

                <span class="portfolio-project-category">
                    {{ $project->category ?: 'Software Project' }}
                </span>

            </div>

            <div class="portfolio-project-content">

                <h3>{{ $project->title }}</h3>

                <p>{{ $project->description }}</p>

                @if ($project->tech_stack)
                    <div class="portfolio-project-tech">
                        {{ $project->tech_stack }}
                    </div>
                @endif

                <div class="portfolio-project-actions">

                    @if ($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer"
                            class="portfolio-project-live">
                            <i class="fas fa-external-link-alt"></i>
                            Live Preview
                        </a>
                    @endif

                    @if ($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                            class="portfolio-project-github">
                            <i class="fab fa-github"></i>
                            GitHub
                        </a>
                    @endif

                    @if ($project->information)
                        <a href="{{ route('project.show', $project->id) }}" class="portfolio-project-details">
                            Details
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif

                </div>

            </div>

        </article>

    @empty

        <div class="portfolio-project-empty">
            <i class="fas fa-folder-open"></i>
            <h3>No Projects Found</h3>
            <p>Try another search term or select a different category.</p>
        </div>
    @endforelse

</div>

{{-- PAGINATION --}}
@if ($projects->hasPages())
    <div class="portfolio-project-pagination">
        {{ $projects->links() }}
    </div>
@endif
