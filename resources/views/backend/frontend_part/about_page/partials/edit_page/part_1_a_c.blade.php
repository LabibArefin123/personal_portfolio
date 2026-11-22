<div class="about-form-card">
    <div class="about-form-card-header">
        <div class="about-form-icon experience-icon">
            <i class="fas fa-briefcase"></i>
        </div>
        <div>
            <h4>Professional Experience</h4>
            <p>Manage your experience and development activities.</p>
        </div>
    </div>

    <div class="about-form-card-body">
        <div class="about-form-group">
            <label for="experiences">Experience List</label>
            <textarea name="experiences" id="experiences" class="form-control about-medium-textarea"
                placeholder="Software Engineer&#10;Full Stack Developer">{{ old('experiences', $formExperiences) }}</textarea>
            <small>Enter one experience item per line.</small>
        </div>
    </div>
</div>
