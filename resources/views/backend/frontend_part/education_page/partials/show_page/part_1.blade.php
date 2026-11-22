  <div class="edu-show-hero">
      <div class="edu-show-hero-icon">
          <i class="fas fa-graduation-cap"></i>
      </div>

      <div class="edu-show-hero-content">
          <span class="edu-show-label">EDUCATION PAGE</span>
          <h2>{{ $education_page->title }}</h2>
          <p>{{ $education_page->subtitle }}</p>
      </div>

      <div class="edu-show-hero-status">
          @if ($education_page->is_active)
              <span class="edu-show-active">
                  <i class="fas fa-check-circle"></i> Published
              </span>
          @else
              <span class="edu-show-inactive">
                  <i class="fas fa-pause-circle"></i> Hidden
              </span>
          @endif
      </div>
  </div>
