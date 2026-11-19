 <div class="contact-profile-card">
     <div class="contact-profile-main">
         <div class="contact-avatar">
             <i class="fas fa-user"></i>
         </div>

         <div class="contact-profile-info">

             <span class="contact-profile-label">
                 <i class="fas fa-address-card"></i>
                 CONTACT PROFILE
             </span>

             <h2>{{ $contact_request->name }}</h2>

             <div class="contact-profile-meta">
                 <span>
                     <i class="fas fa-envelope"></i>
                     {{ $contact_request->email }}
                 </span>

                 <span>
                     <i class="fas fa-phone-alt"></i>
                     {{ $contact_request->phone }}
                 </span>
             </div>
         </div>
     </div>

     <div class="contact-profile-side">
         <span class="profile-type-label">REQUEST TYPE</span>

         <div class="request-type-badge">
             <i class="fas fa-tag"></i>
             {{ ucfirst($contact_request->type) }}
         </div>

         <span class="profile-date">
             <i class="far fa-calendar-alt"></i>
             {{ $contact_request->created_at->format('d M Y') }}
         </span>
     </div>

 </div>
