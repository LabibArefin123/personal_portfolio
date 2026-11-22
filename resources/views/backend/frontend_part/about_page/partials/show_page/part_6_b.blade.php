<div class="col-md-6">
    <div class="about-info-line">
        <span>Created At</span>
        <strong>
            {{ $about->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
        </strong>
    </div>

    <div class="about-info-line">
        <span>Last Updated</span>
        <strong>
            {{ $about->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
        </strong>
    </div>

    <div class="about-info-line">
        <span>Profile Image</span>
        <strong>
            {{ $about->image ? 'Available' : 'Not Available' }}
        </strong>
    </div>
</div>
