<div class="edu-edit-card">
    <div class="edu-edit-card-header">
        <div class="edu-edit-card-icon purple">
            <i class="fas fa-window-maximize"></i>
        </div>
        <div>
            <h4>Page Information</h4>
            <p>Configure the education page hero section.</p>
        </div>
    </div>

    <div class="edu-edit-card-body">
        <div class="row">

            <div class="col-md-8">
                <div class="form-group edu-form-group">
                    <label>Page Title <span>*</span></label>
                    <input type="text" name="title" class="form-control"
                        value="{{ old('title', $education_page->title) }}" required>
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group edu-form-group">
                    <label>Page Visibility</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ old('is_active', $education_page->is_active) ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ !old('is_active', $education_page->is_active) ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group edu-form-group">
                    <label>Hero Subtitle</label>
                    <textarea name="subtitle" class="form-control" rows="2">{{ old('subtitle', $education_page->subtitle) }}</textarea>
                </div>
            </div>

        </div>
    </div>
</div>
