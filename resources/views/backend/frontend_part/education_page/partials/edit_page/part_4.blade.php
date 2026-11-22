<div class="edu-edit-card">

    <div class="edu-edit-card-header">
        <div class="edu-edit-card-icon dark">
            <i class="fab fa-github"></i>
        </div>
        <div>
            <h4>GitHub Information</h4>
            <p>Configure your GitHub profile and contribution graph.</p>
        </div>
    </div>

    <div class="edu-edit-card-body">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group edu-form-group">
                    <label>GitHub Username</label>
                    <input type="text" name="github_username" class="form-control"
                        value="{{ old('github_username', $education_page->github_username) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group edu-form-group">
                    <label>GitHub Profile URL</label>
                    <input type="url" name="github_url" class="form-control"
                        value="{{ old('github_url', $education_page->github_url) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group edu-form-group">
                    <label>GitHub Chart URL</label>
                    <input type="url" name="github_chart_url" class="form-control"
                        value="{{ old('github_chart_url', $education_page->github_chart_url) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group edu-form-group">
                    <label>GitHub Section Title</label>
                    <input type="text" name="github_title" class="form-control"
                        value="{{ old('github_title', $education_page->github_title) }}">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group edu-form-group">
                    <label>GitHub Description</label>
                    <textarea name="github_description" class="form-control" rows="2">{{ old('github_description', $education_page->github_description) }}</textarea>
                </div>
            </div>

        </div>

        {{-- GITHUB ACTIVITIES --}}
        <div class="edu-dynamic-section">
            <div class="edu-dynamic-heading">
                <h5>Technical Activities</h5>
                <button type="button" class="edu-add-small-btn" id="addActivity">
                    <i class="fas fa-plus"></i> Add Activity
                </button>
            </div>

            <div id="activityRows">
                @foreach (old('github_activities', $education_page->github_activities ?? []) as $activity)
                    <div class="edu-dynamic-row">
                        <input type="text" name="github_activities[]" class="form-control"
                            value="{{ $activity }}" placeholder="Enter technical activity">

                        <button type="button" class="edu-remove-small-btn" data-remove-dynamic>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
