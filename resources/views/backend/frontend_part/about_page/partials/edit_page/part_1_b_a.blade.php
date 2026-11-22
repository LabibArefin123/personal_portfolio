<div class="about-form-card about-image-card">
    <div class="about-form-card-header">
        <div class="about-form-icon image-icon">
            <i class="fas fa-image"></i>
        </div>
        <div>
            <h4>Profile Image</h4>
            <p>Update your profile photo.</p>
        </div>
    </div>

    <div class="about-form-card-body">
        <div class="about-image-preview">
            <img src="{{ $about->image ? asset($about->image) : asset('uploads/images/default.jpg') }}"
                id="aboutImagePreview" alt="Profile Image">
        </div>

        <div class="about-form-group">
            <label for="image">Choose New Image</label>
            <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
            <small>JPG, JPEG, PNG or WEBP. Maximum 5 MB.</small>
        </div>
    </div>
</div>
