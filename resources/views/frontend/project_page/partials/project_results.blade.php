<div class="portfolio-project-grid">
    @forelse ($projects as $project)
        @php
            $fallbackImage = $project->image ? asset($project->image) : asset('uploads/images/default.jpg');
        @endphp

        <article class="portfolio-project-card {{ $project->is_highlight ? 'is-highlighted' : '' }}">

            {{-- PROJECT IMAGE --}}
            <div class="portfolio-project-image">

                <img class="project-preview" src="{{ $fallbackImage }}" data-url="{{ $project->live_url }}"
                    data-fallback="{{ $fallbackImage }}" alt="{{ $project->title }} website preview" loading="lazy"
                    decoding="async">

                @if ($project->is_highlight)
                    <span class="portfolio-project-featured">
                        <i class="fas fa-star"></i>
                        Featured
                    </span>
                @endif

                @if ($project->live_url)
                    <span class="portfolio-project-live">
                        <span class="live-dot"></span>
                        Live Website
                    </span>
                @endif

                <span class="portfolio-project-category">
                    {{ $project->category ?: 'Software Project' }}
                </span>

            </div>

            {{-- PROJECT CONTENT --}}
            <div class="portfolio-project-content">

                <h3>{{ $project->title }}</h3>

                <p>
                    {{ $project->description }}
                </p>

                @if ($project->tech_stack)
                    <div class="portfolio-project-tech">
                        <strong>Technologies:</strong>
                        {{ $project->tech_stack }}
                    </div>
                @endif

                {{-- PROJECT ACTIONS --}}
                <div class="portfolio-project-actions">

                    @if ($project->live_url)
                        <a href="{{ $project->live_url }}" class="portfolio-project-live-link" target="_blank"
                            rel="noopener noreferrer">
                            <i class="fas fa-external-link-alt"></i>
                            Live Preview
                        </a>
                    @endif

                    @if ($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-github"></i>
                            Source Code
                        </a>
                    @endif

                    @if ($project->information)
                        <a href="{{ route('project.show', $project->id) }}">
                            <i class="fas fa-arrow-right"></i>
                            Details
                        </a>
                    @endif

                </div>

            </div>

        </article>

    @empty
        <div class="portfolio-project-empty">
            <i class="fas fa-folder-open"></i>
            <h3>No Projects Found</h3>
            <p>
                Try changing your search keyword or category filter.
            </p>
        </div>
    @endforelse
</div>

{{-- PAGINATION --}}
@if ($projects->hasPages())
    <div class="portfolio-project-pagination">
        {{ $projects->links() }}
    </div>
@endif
