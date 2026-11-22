<div class="edu-show-footer">
    <span>
        <i class="fas fa-clock"></i>
        Last updated: {{ $education_page->updated_at?->format('d M Y, h:i A') }}
    </span>

    <a href="{{ route('education_pages.edit', $education_page->id) }}">
        Update Education Page <i class="fas fa-arrow-right"></i>
    </a>
</div>
