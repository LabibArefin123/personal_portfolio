 <div class="row edu-show-summary">
     <div class="col-lg-4 col-md-6">
         <div class="edu-summary-card purple">
             <div class="edu-summary-icon">
                 <i class="fas fa-book-open"></i>
             </div>
             <div>
                 <span>Qualifications</span>
                 <h3>{{ $educations->count() }}</h3>
                 <small>Total academic records</small>
             </div>
         </div>
     </div>

     <div class="col-lg-4 col-md-6">
         <div class="edu-summary-card green">
             <div class="edu-summary-icon">
                 <i class="fas fa-check-double"></i>
             </div>
             <div>
                 <span>Completed</span>
                 <h3>{{ $completedCount }}</h3>
                 <small>Completed qualifications</small>
             </div>
         </div>
     </div>

     <div class="col-lg-4 col-md-6">
         <div class="edu-summary-card blue">
             <div class="edu-summary-icon">
                 <i class="fab fa-github"></i>
             </div>
             <div>
                 <span>GitHub</span>
                 <h3>{{ $education_page->github_username ? 'Connected' : 'Not set' }}</h3>
                 <small>{{ $education_page->github_username ?? 'No username configured' }}</small>
             </div>
         </div>
     </div>
 </div>
