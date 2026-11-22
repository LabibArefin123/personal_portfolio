 <div class="about-show-section">
     <div class="card about-show-card">
         <div class="about-content-heading">
             <div class="heading-icon">
                 <i class="fas fa-briefcase"></i>
             </div>

             <div>
                 <h4>Professional Experience</h4>
                 <p>Development experience, responsibilities and expertise</p>
             </div>

             <span class="about-count-badge ml-auto">
                 {{ count($about->experiences ?? []) }}
             </span>
         </div>

         @if (!empty($about->experiences))
             <div class="about-timeline">
                 @foreach ($about->experiences as $experience)
                     <div class="about-timeline-item">
                         <h5>
                             {{ $experience['title'] ?? 'Untitled Experience' }}
                         </h5>

                         <p>
                             {{ $experience['description'] ?? '' }}
                         </p>
                     </div>
                 @endforeach
             </div>
         @else
             <div class="about-empty">
                 <i class="fas fa-briefcase"></i>
                 <h5>No experience information available</h5>
             </div>
         @endif
     </div>
 </div>
