 <div class="about-show-hero">
     <div class="about-show-hero-content">
         <div class="about-show-avatar">
             <img src="{{ asset($about->image ?: 'uploads/images/default.jpg') }}" alt="{{ $about->name }}"
                 onerror="this.onerror=null;this.src='{{ asset('uploads/images/default.jpg') }}';">
         </div>

         <div class="about-show-identity">
             <span class="about-show-badge">
                 <i class="fas fa-user-check mr-2"></i>
                 PROFESSIONAL PROFILE
             </span>

             <h2 class="mt-3">{{ $about->name }}</h2>

             <p>
                 <i class="fas fa-briefcase mr-1"></i>
                 {{ $about->role }}
             </p>

             <div class="about-action-group">

                 <span class="about-show-badge">
                     <i class="fas fa-code mr-2"></i>
                     {{ count($about->skills ?? []) }} Skills
                 </span>

                 <span class="about-show-badge">
                     <i class="fas fa-history mr-2"></i>
                     {{ count($about->experiences ?? []) }} Experiences
                 </span>
             </div>
         </div>
     </div>
 </div>
