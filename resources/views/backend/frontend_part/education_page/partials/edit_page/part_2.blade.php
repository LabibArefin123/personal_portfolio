<div class="edu-edit-card">

    <div class="edu-edit-card-header">
        <div class="edu-edit-card-icon blue">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div>
            <h4>Academic Profile</h4>
            <p>Manage your academic introduction and result highlight.</p>
        </div>
    </div>

    <div class="edu-edit-card-body">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group edu-form-group">
                    <label>Introduction Title <span>*</span></label>
                    <input type="text" name="intro_title" class="form-control"
                        value="{{ old('intro_title', $education_page->intro_title) }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group edu-form-group">
                    <label>Highlight Value</label>
                    <input type="text" name="highlight_value" class="form-control" placeholder="3.52 / 4.00"
                        value="{{ old('highlight_value', $education_page->highlight_value) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group edu-form-group">
                    <label>Highlight Label</label>
                    <input type="text" name="highlight_label" class="form-control" placeholder="B.Sc. CGPA"
                        value="{{ old('highlight_label', $education_page->highlight_label) }}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group edu-form-group">
                    <label>Introduction Description</label>
                    <textarea name="intro_description" class="form-control" rows="4">{{ old('intro_description', $education_page->intro_description) }}</textarea>
                </div>
            </div>

        </div>
    </div>
</div>
