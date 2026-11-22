 <div class="edu-show-card">
     <div class="edu-show-card-header">
         <div>
             <span class="edu-section-label">EDUCATIONAL JOURNEY</span>
             <h4>Learning Timeline</h4>
         </div>
         <i class="fas fa-history"></i>
     </div>

     <div class="edu-show-timeline">
         @forelse ($educations->sortBy('year') as $item)
             <div class="edu-timeline-item">
                 <div class="edu-timeline-marker">
                     <i class="fas fa-check"></i>
                 </div>

                 <div class="edu-timeline-content">
                     <span>{{ $item->year ?? 'Year N/A' }}</span>
                     <h5>{{ $item->degree }}</h5>
                     <p>{{ $item->timeline_description ?: $item->institution }}</p>
                 </div>
             </div>
         @empty
             <p class="text-muted">No timeline information available.</p>
         @endforelse
     </div>
 </div>
