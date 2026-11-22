<div class="edu-show-heading">
    <div>
        <span class="edu-show-eyebrow">CONTENT MANAGEMENT / EDUCATION</span>
        <h1>Education Details</h1>
        <p>Complete overview of your academic profile and learning journey.</p>
    </div>

    <div class="edu-show-actions">
        <a href="{{ route('education_pages.index') }}" class="edu-show-back">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <a href="{{ route('education_pages.edit', $education_page->id) }}" class="edu-show-edit">
            <i class="fas fa-edit"></i> Edit Page
        </a>
    </div>
</div>
