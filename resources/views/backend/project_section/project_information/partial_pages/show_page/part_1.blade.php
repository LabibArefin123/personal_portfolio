<section class="pi-show-overview-card">
    <div class="pi-show-overview-top">
        <div class="pi-show-project-icon">
            <i class="fas fa-project-diagram"></i>
        </div>

        <div class="pi-show-project-heading">
            <span class="pi-show-eyebrow">PROJECT INFORMATION</span>
            <h2>{{ $projectInformation->project?->title ?? 'Project Not Available' }}</h2>
            <span class="pi-show-project-subtitle">Project overview and documentation</span>
        </div>

        <div class="pi-show-overview-status">
            <span class="pi-show-status-dot"></span>
            Project Details
        </div>
    </div>

    <div class="pi-show-overview-divider"></div>

    <div class="pi-show-overview-content">
        <div class="pi-show-section-label">
            <i class="fas fa-align-left"></i>
            Project Overview
        </div>

        <p>{{ $projectInformation->overview ?: 'No project overview has been provided yet.' }}</p>
    </div>
</section>
