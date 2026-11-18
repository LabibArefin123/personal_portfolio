 <div class="contact-page-heading">
     <div>
         <div class="contact-breadcrumb">
             <i class="fas fa-home"></i>
             <span>Dashboard</span>
             <i class="fas fa-chevron-right"></i>
             <span>Contact Requests</span>
             <i class="fas fa-chevron-right"></i>
             <strong>Details</strong>
         </div>

         <h1>Contact Request Details</h1>
         <p>Review and manage submitted contact information.</p>
     </div>

     <div class="contact-heading-actions">
         <a href="{{ route('contact_requests.edit', $contact_request->id) }}" class="contact-action-btn edit-btn">
             <i class="fas fa-edit"></i>
             <span>Edit Request</span>
         </a>

         <a href="{{ route('contact_requests.index') }}" class="contact-action-btn back-btn">
             <i class="fas fa-arrow-left"></i>
             <span>Back to List</span>
         </a>
     </div>
 </div>
