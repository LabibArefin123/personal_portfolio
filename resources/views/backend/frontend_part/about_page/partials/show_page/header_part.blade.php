<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div>
        <h1 class="mb-1">
            <i class="fas fa-id-card text-primary mr-2"></i>
            About Details
        </h1>
        <p class="text-muted mb-0 small">
            Complete professional profile information
        </p>
    </div>

    <div class="about-action-group">
        <a href="{{ route('about_pages.index') }}" class="about-btn about-btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Back
        </a>

        <a href="{{ route('about_pages.edit', $about->id) }}" class="about-btn about-btn-primary">
            <i class="fas fa-edit"></i>
            Edit Profile
        </a>
    </div>
</div>
