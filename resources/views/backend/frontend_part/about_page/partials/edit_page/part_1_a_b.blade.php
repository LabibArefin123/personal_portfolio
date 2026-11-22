 <div class="about-form-card">
     <div class="about-form-card-header">
         <div class="about-form-icon skill-icon">
             <i class="fas fa-code"></i>
         </div>
         <div>
             <h4>Technical Skills</h4>
             <p>List your technologies and professional skills.</p>
         </div>
     </div>

     <div class="about-form-card-body">
         <div class="about-form-group">
             <label for="skills">Skills List</label>
             <textarea name="skills" id="skills" class="form-control about-medium-textarea"
                 placeholder="Laravel&#10;PHP&#10;JavaScript&#10;MySQL">{{ old('skills', $formSkills) }}</textarea>
             <small>Enter one skill per line.</small>
         </div>
     </div>
 </div>
