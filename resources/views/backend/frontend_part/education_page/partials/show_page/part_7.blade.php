 <div class="edu-show-card">
     <div class="edu-show-card-header">
         <div>
             <span class="edu-section-label">PERSONAL DEVELOPMENT</span>
             <h4>Technical Focus & Goals</h4>
         </div>
         <i class="fas fa-rocket"></i>
     </div>

     <div class="row edu-focus-row">
         @forelse ($education_page->focus_cards ?? [] as $card)
             <div class="col-lg-4 col-md-6">
                 <div class="edu-focus-card">
                     <span><i class="fas fa-lightbulb"></i></span>
                     <h5>{{ $card['title'] ?? '' }}</h5>
                     <p>{{ $card['description'] ?? '' }}</p>
                 </div>
             </div>
         @empty
             <div class="col-12">
                 <p class="text-muted">No technical focus cards configured.</p>
             </div>
         @endforelse
     </div>
 </div>
