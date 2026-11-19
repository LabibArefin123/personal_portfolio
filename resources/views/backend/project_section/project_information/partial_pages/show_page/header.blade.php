<div class="pi-show-heading">
    <div class="pi-show-heading-content">
        <div class="pi-show-heading-icon">
            <i class="fas fa-layer-group"></i>
        </div>
        <div>
            <h1>Project Details</h1>
            <p>Explore project information, images and technical details.</p>
        </div>
    </div>

    <div class="pi-show-heading-actions">
        <a href="{{ route('project-informations.edit', $projectInformation->id) }}" class="pi-show-btn pi-show-edit-btn">
            <i class="fas fa-edit"></i>
            <span>Edit Project</span>
        </a>

        <a href="{{ route('project-informations.index') }}" class="pi-show-btn pi-show-back-btn">
            <i class="fas fa-arrow-left"></i>
            <span>Go Back</span>
        </a>
    </div>
</div>
