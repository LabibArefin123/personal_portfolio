 <div class="about-form-actions">
     <button type="submit" class="about-save-btn" id="aboutSaveButton">
         <i class="fas fa-save"></i>
         Save Changes
     </button>

     <a href="{{ route('about_pages.show', $about->id) }}" class="about-cancel-btn">
         Cancel
     </a>
 </div>
