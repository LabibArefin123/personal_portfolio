  <div class="contact-quick-actions">
      <div class="quick-action-heading">
          <h4>Quick Actions</h4>
          <p>Communicate with this contact</p>
      </div>

      <div class="quick-action-buttons">

          <a href="mailto:{{ $contact_request->email }}" class="quick-action-btn email-action">
              <i class="fas fa-envelope"></i>
              Send Email
          </a>

          <a href="tel:{{ $contact_request->phone }}" class="quick-action-btn call-action">
              <i class="fas fa-phone-alt"></i>
              Call Contact
          </a>
      </div>
  </div>
