 <div class="about-form-card">
     <div class="about-form-card-header">
         <div class="about-form-icon highlight-icon">
             <i class="fas fa-star"></i>
         </div>
         <div>
             <h4>Professional Highlights</h4>
             <p>Showcase your working approach and strengths.</p>
         </div>
     </div>

     <div class="about-form-card-body">
         <div class="about-form-group">
             <label for="highlights">Highlights List</label>
             <textarea name="highlights" id="highlights" class="form-control about-large-textarea"
                 placeholder="Systems | Building reliable systems | fas fa-rocket&#10;Approach | Practical problem solving | fas fa-bolt">{{ old('highlights', $formHighlights) }}</textarea>

             <small>
                 Use this format:
                 <strong>Title | Description | Font Awesome Icon</strong>
             </small>
         </div>
     </div>
 </div>
