<div class="about-show-header">

    <div class="about-show-heading">
        <span class="about-show-eyebrow">
            PROFILE OVERVIEW
        </span>

        <h1>
            <i class="fas fa-id-card"></i>
            About Details
        </h1>

        <p>
            Complete professional profile information
        </p>
    </div>

    <div class="about-show-actions">

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
