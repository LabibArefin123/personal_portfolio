 <div class="edu-show-card">
     <div class="edu-show-card-header">
         <div>
             <span class="edu-section-label">ACADEMIC HISTORY</span>
             <h4>Academic Qualifications</h4>
         </div>
         <i class="fas fa-university"></i>
     </div>

     <div class="edu-qualification-list">
         @forelse ($educations as $item)
             <div class="edu-qualification-item">
                 <div class="edu-qualification-icon">
                     <i class="fas fa-graduation-cap"></i>
                 </div>

                 <div class="edu-qualification-info">
                     <div class="edu-qualification-top">
                         <h5>{{ $item->degree }}</h5>
                         <span class="edu-year-badge">{{ $item->year ?? 'Year N/A' }}</span>
                     </div>

                     <p>
                         <i class="fas fa-map-marker-alt"></i>
                         {{ $item->institution }}
                     </p>

                     @if ($item->result)
                         <span class="edu-result-badge">{{ $item->result }}</span>
                     @endif
                 </div>

                 <div class="edu-qualification-status">
                     <span class="{{ strtolower($item->status) === 'completed' ? 'completed' : 'other' }}">
                         {{ $item->status }}
                     </span>

                     <small>
                         {{ $item->is_active ? 'Visible' : 'Hidden' }}
                     </small>
                 </div>
             </div>
         @empty
             <div class="edu-show-empty">
                 <i class="fas fa-book-open"></i>
                 <p>No academic qualifications found.</p>
             </div>
         @endforelse
     </div>
 </div>
