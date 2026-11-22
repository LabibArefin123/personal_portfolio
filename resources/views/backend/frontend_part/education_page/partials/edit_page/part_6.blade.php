<div class="edu-edit-footer">
    <div>
        <i class="fas fa-shield-alt"></i>
        Your changes will be saved to the education database.
    </div>

    <div class="edu-edit-footer-actions">
        <a href="{{ route('education_pages.show', $education_page->id) }}" class="edu-cancel-btn">
            Cancel
        </a>

        <button type="submit" class="edu-save-btn" id="educationSaveButton">
            <i class="fas fa-save"></i> Save Changes
        </button>
    </div>
</div>
