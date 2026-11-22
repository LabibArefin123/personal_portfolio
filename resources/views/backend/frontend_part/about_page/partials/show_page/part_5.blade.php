 <div class="about-show-section">
     <div class="about-content-heading mb-3">
         <div class="heading-icon">
             <i class="fas fa-star"></i>
         </div>

         <div>
             <h4>Professional Highlights</h4>
             <p>Core strengths, working approach and quality standards</p>
         </div>
     </div>

     <div class="row">
         @forelse($about->highlights ?? [] as $highlight)
             <div class="col-lg-4 col-md-6 mb-3">
                 <div class="about-show-highlight">
                     <div class="about-highlight-icon">{{ $highlight['icon'] ?? '⭐' }}</div>
                     <h5>{{ $highlight['title'] ?? 'Untitled' }}</h5>
                     <p>{{ $highlight['description'] ?? '' }}</p>
                 </div>
             </div>
         @empty

             <div class="col-12">
                 <div class="card">
                     <div class="about-empty">
                         <i class="fas fa-star"></i>
                         <h5>No highlights available</h5>
                     </div>
                 </div>
             </div>
         @endforelse
     </div>
 </div>
