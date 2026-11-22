<div class="card about-index-experience">
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
        <div class="about-content-heading mb-0">
            <div class="heading-icon">
                <i class="fas fa-history"></i>
            </div>

            <div>
                <h4>Experience Overview</h4>
                <p>Professional experience and responsibilities</p>
            </div>
        </div>

        <a href="{{ route('about_pages.show', $about->id) }}" class="text-primary small font-weight-bold">
            View All <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    @forelse(array_slice($about->experiences ?? [], 0, 3) as $experience)
        <div class="about-index-experience-item">
            <div>
                <h6>{{ $experience['title'] ?? 'Untitled Experience' }}</h6>
                <span>
                    {{ \Illuminate\Support\Str::limit($experience['description'] ?? '', 120) }}
                </span>
            </div>

            <span class="about-count-badge">
                <i class="fas fa-check"></i>
            </span>
        </div>
    @empty

        <div class="about-empty">
            <i class="fas fa-briefcase"></i>
            <h5>No experience added</h5>
            <p>Experience entries will appear here.</p>
        </div>
    @endforelse
</div>
