 <div class="d-flex justify-content-between align-items-center flex-wrap mt-3">
     <small class="text-muted">
         <i class="far fa-clock mr-1"></i>
         Last updated:
         {{ $about->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
     </small>

     <a href="{{ route('about_pages.show', $about->id) }}" class="about-btn about-btn-primary">
         <i class="fas fa-external-link-alt"></i>
         Explore Full Profile
     </a>
 </div>
