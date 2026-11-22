 <div class="col-lg-5">
     <div class="card about-index-summary">
         <div class="about-content-heading">
             <div class="heading-icon">
                 <i class="fas fa-code"></i>
             </div>

             <div>
                 <h4>Technology Stack</h4>
                 <p>Technical skills and expertise</p>
             </div>
         </div>

         <div class="about-index-skills">
             @forelse($about->skills ?? [] as $skill)
                 <span>{{ $skill }}</span>
             @empty
                 <p class="text-muted small">No skills added yet.</p>
             @endforelse
         </div>
     </div>
 </div>
