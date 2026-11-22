 <div class="col-lg-7">
     <div class="card about-index-summary">
         <div class="about-content-heading">
             <div class="heading-icon">
                 <i class="fas fa-align-left"></i>
             </div>

             <div>
                 <h4>Biography</h4>
                 <p>Professional introduction and background</p>
             </div>
         </div>

         @forelse($about->bio ?? [] as $paragraph)
             <p>{{ $paragraph }}</p>
         @empty
             <div class="about-empty">
                 <i class="fas fa-file-alt"></i>
                 <h5>No biography available</h5>
             </div>
         @endforelse
     </div>
 </div>
