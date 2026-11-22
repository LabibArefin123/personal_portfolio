 <div class="card about-index-profile">
     <div class="about-index-profile-inner">
         <div class="about-index-image">
             <img src="{{ asset($about->image ?: 'uploads/images/default.jpg') }}" alt="{{ $about->name }}"
                 data-global-image="{{ asset($about->image ?: 'uploads/images/default.jpg') }}"
                 data-caption="{{ $about->name }}" style="cursor: pointer;">
         </div>

         <div class="about-index-info">

             <span class="about-section-label">
                 <i class="fas fa-check-circle"></i>
                 Profile Overview
             </span>

             <h3>{{ $about->name }}</h3>

             <p class="role">
                 <i class="fas fa-briefcase mr-1"></i>
                 {{ $about->role }}
             </p>

             <p class="description">
                 {{ \Illuminate\Support\Str::limit(implode(' ', $about->bio ?? []), 250) }}
             </p>
         </div>
     </div>
 </div>
