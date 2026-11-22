 <div class="edu-show-card">
     <div class="edu-show-card-header">
         <div>
             <span class="edu-section-label">DEVELOPMENT ACTIVITY</span>
             <h4>GitHub Information</h4>
         </div>
         <i class="fab fa-github"></i>
     </div>

     <div class="edu-github-content">
         <div class="edu-github-profile">
             <div class="edu-github-avatar">
                 <i class="fab fa-github"></i>
             </div>
             <div>
                 <h5>{{ $education_page->github_username ?: 'GitHub not configured' }}</h5>
                 <p>{{ $education_page->github_description ?: 'No GitHub description available.' }}</p>
             </div>

             @if ($education_page->github_url)
                 <a href="{{ $education_page->github_url }}" target="_blank" rel="noopener noreferrer">
                     Visit Profile <i class="fas fa-external-link-alt"></i>
                 </a>
             @endif
         </div>

         @if (!empty($education_page->github_activities))
             <div class="edu-github-activities">
                 <h5>Technical Activities</h5>

                 <div class="row">
                     @foreach ($education_page->github_activities as $activity)
                         <div class="col-md-6">
                             <div class="edu-activity-item">
                                 <i class="fas fa-check-circle"></i>
                                 {{ $activity }}
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         @endif

         @if ($education_page->github_chart_url)
             <div class="edu-github-chart">
                 <h5>Contribution Graph</h5>
                 <img src="{{ $education_page->github_chart_url }}" alt="GitHub contribution graph" loading="lazy">
             </div>
         @endif
     </div>
 </div>
