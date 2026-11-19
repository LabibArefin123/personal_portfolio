 <div class="contact-section-card message-card">
     <div class="section-card-heading">
         <div class="section-heading-icon message-icon">
             <i class="fas fa-comment-alt"></i>
         </div>

         <div>
             <h3>Message Details</h3>
             <p>Original message submitted by the contact</p>
         </div>
     </div>

     <div class="message-content">
         <div class="message-top-line">
             <span>
                 <i class="fas fa-quote-left"></i>
                 CONTACT MESSAGE
             </span>

             <span class="message-date">
                 {{ $contact_request->created_at->format('d M Y') }}
             </span>
         </div>

         <div class="message-text">
             @if (filled($contact_request->message))
                 {{ $contact_request->message }}
             @else
                 <div class="empty-message">
                     <i class="far fa-comment-dots"></i>
                     <strong>No message provided</strong>
                     <span>This contact request does not contain a message.</span>
                 </div>
             @endif
         </div>

     </div>

     <div class="message-footer">
         <div>
             <i class="fas fa-shield-alt"></i>
             Contact information is displayed securely.
         </div>
     </div>
 </div>
