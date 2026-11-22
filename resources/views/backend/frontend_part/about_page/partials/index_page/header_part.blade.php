 <div class="about-index-header">
     <div>
         <h1 class="mb-0">
             <i class="fas fa-user-circle text-primary mr-2"></i>
             About Management
         </h1>
         <p>Manage your public profile, skills, experience and professional highlights.</p>
     </div>

     @if ($about)
         <div class="about-index-actions">
             <a href="{{ route('about_pages.show', $about->id) }}" class="about-btn about-btn-secondary">
                 <i class="fas fa-eye"></i>
                 View Details
             </a>

             <a href="{{ route('about_pages.edit', $about->id) }}" class="about-btn about-btn-primary">
                 <i class="fas fa-edit"></i>
                 Edit About
             </a>
         </div>
     @endif
 </div>
