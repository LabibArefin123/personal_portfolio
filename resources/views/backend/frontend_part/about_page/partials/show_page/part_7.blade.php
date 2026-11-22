<div class="d-flex justify-content-between align-items-center flex-wrap mt-3">
    <a href="{{ route('about_pages.index') }}" class="about-btn about-btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back to About
    </a>
    <a href="{{ route('about_pages.edit', $about->id) }}" class="about-btn about-btn-primary">
        <i class="fas fa-edit"></i>
        Update Profile
    </a>
</div>
