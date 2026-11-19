  <div class="contact-section-card">
      <div class="section-card-heading">
          <div class="section-heading-icon">
              <i class="fas fa-user-circle"></i>
          </div>

          <div>
              <h3>Contact Information</h3>
              <p>Personal and communication details</p>
          </div>
      </div>

      <div class="contact-information-list">
          {{-- NAME --}}
          <div class="contact-info-item">
              <div class="contact-info-icon name-icon">
                  <i class="fas fa-user"></i>
              </div>

              <div class="contact-info-content">
                  <span>Full Name</span>
                  <strong>{{ $contact_request->name }}</strong>
              </div>
          </div>

          {{-- EMAIL --}}
          <div class="contact-info-item">
              <div class="contact-info-icon email-icon">
                  <i class="fas fa-envelope"></i>
              </div>

              <div class="contact-info-content">
                  <span>Email Address</span>
                  <a href="mailto:{{ $contact_request->email }}">
                      {{ $contact_request->email }}
                  </a>
              </div>

              <a href="mailto:{{ $contact_request->email }}" class="info-action" title="Send Email">
                  <i class="fas fa-external-link-alt"></i>
              </a>
          </div>

          {{-- PHONE --}}
          <div class="contact-info-item">
              <div class="contact-info-icon phone-icon">
                  <i class="fas fa-phone-alt"></i>
              </div>

              <div class="contact-info-content">
                  <span>Phone Number</span>
                  <a href="tel:{{ $contact_request->phone }}">
                      {{ $contact_request->phone }}
                  </a>
              </div>

              <a href="tel:{{ $contact_request->phone }}" class="info-action" title="Call Contact">
                  <i class="fas fa-phone"></i>
              </a>
          </div>

          {{-- TYPE --}}
          <div class="contact-info-item">
              <div class="contact-info-icon type-icon">
                  <i class="fas fa-layer-group"></i>
              </div>

              <div class="contact-info-content">
                  <span>Request Category</span>
                  <strong>{{ ucfirst($contact_request->type) }}</strong>
              </div>
          </div>
      </div>
  </div>
