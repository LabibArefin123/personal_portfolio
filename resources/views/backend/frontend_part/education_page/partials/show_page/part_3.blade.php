<div class="edu-show-card">
    <div class="edu-show-card-header">
        <div>
            <span class="edu-section-label">PROFILE INFORMATION</span>
            <h4>Academic Profile</h4>
        </div>
        <i class="fas fa-user-graduate"></i>
    </div>

    <div class="edu-profile-content">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>{{ $education_page->intro_title }}</h3>
                <p>{{ $education_page->intro_description ?: 'No introduction available.' }}</p>
            </div>

            <div class="col-lg-4">
                <div class="edu-cgpa-box">
                    <span>ACADEMIC HIGHLIGHT</span>
                    <h2>{{ $education_page->highlight_value ?: 'Not set' }}</h2>
                    <p>{{ $education_page->highlight_label ?: 'No highlight label' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
