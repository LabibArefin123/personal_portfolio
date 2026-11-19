<div class="contact-section-card submission-card">
    <div class="section-card-heading">
        <div class="section-heading-icon submission-icon">
            <i class="fas fa-clock"></i>
        </div>

        <div>
            <h3>Submission Details</h3>
            <p>Request timeline information</p>
        </div>
    </div>

    <div class="submission-details">
        <div class="submission-detail-item">
            <span>Submitted Date</span>
            <strong>
                {{ $contact_request->created_at->format('d F Y') }}
            </strong>
        </div>

        <div class="submission-detail-item">
            <span>Submission Time</span>
            <strong>
                {{ $contact_request->created_at->format('h:i A') }}
            </strong>
        </div>

        <div class="submission-detail-item">
            <span>Request ID</span>
            <strong>#{{ $contact_request->id }}</strong>
        </div>
    </div>
</div>
