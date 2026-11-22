 <div class="about-form-card">
     <div class="about-form-card-header">
         <div class="about-form-icon">
             <i class="fas fa-user"></i>
         </div>
         <div>
             <h4>Personal Information</h4>
             <p>Manage your public profile information.</p>
         </div>
     </div>

     <div class="about-form-card-body">
         <div class="about-form-group">
             <label for="name">Full Name <span>*</span></label>
             <input type="text" name="name" id="name" class="form-control"
                 value="{{ old('name', $about->name) }}" placeholder="Enter your full name">
         </div>

         <div class="about-form-group">
             <label for="role">Professional Role <span>*</span></label>
             <input type="text" name="role" id="role" class="form-control"
                 value="{{ old('role', $about->role) }}" placeholder="e.g. Full Stack Developer">
         </div>

         <div class="about-form-group">
             <label for="bio">Biography</label>
             <textarea name="bio" id="bio" class="form-control about-large-textarea"
                 placeholder="Write one paragraph per line...">{{ old('bio', $formBio) }}</textarea>
             <small>Separate each biography paragraph with a blank line.</small>
         </div>
     </div>
 </div>
