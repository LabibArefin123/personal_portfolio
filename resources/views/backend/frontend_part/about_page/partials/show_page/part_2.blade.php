 <div class="about-show-section">
     <div class="card about-show-card">
         <div class="about-content-heading">
             <div class="heading-icon">
                 <i class="fas fa-user-edit"></i>
             </div>

             <div>
                 <h4>Professional Biography</h4>
                 <p>Personal introduction and professional background</p>
             </div>
         </div>

         @forelse($about->bio ?? [] as $paragraph)
             <p class="about-show-bio">
                 {{ $paragraph }}
             </p>
         @empty
             <div class="about-empty">
                 <i class="fas fa-file-alt"></i>
                 <h5>No biography available</h5>
             </div>
         @endforelse
     </div>
 </div>
