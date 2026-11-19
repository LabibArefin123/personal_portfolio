  <section class="pi-show-section">
      <div class="pi-show-section-heading">
          <div>
              <span class="pi-show-section-kicker">VISUAL SHOWCASE</span>
              <h3><i class="far fa-images"></i> Project Gallery</h3>
              <p>Images and screenshots associated with this project.</p>
          </div>

          <span class="pi-show-count">{{ count($images) }} Images</span>
      </div>

      <div class="pi-show-gallery-card">
          @if (count($images))
              <div class="pi-show-gallery-grid">
                  @foreach ($images as $img)
                      <a href="{{ asset($img) }}" target="_blank" rel="noopener noreferrer" class="pi-show-gallery-item">
                          <img src="{{ asset($img) }}" alt="Project image" loading="lazy">
                          <span class="pi-show-image-overlay">
                              <i class="fas fa-expand-alt"></i>
                          </span>
                      </a>
                  @endforeach
              </div>
          @else
              <div class="pi-show-empty">
                  <i class="far fa-image"></i>
                  <h5>No Project Images</h5>
                  <p>There are currently no images available for this project.</p>
              </div>
          @endif
      </div>
  </section>
