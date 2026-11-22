  <div class="about-show-section">
      <div class="card about-show-card">
          <div class="about-content-heading">
              <div class="heading-icon">
                  <i class="fas fa-code"></i>
              </div>

              <div>
                  <h4>Technical Expertise</h4>
                  <p>Technologies, tools and development skills</p>
              </div>

              <span class="about-count-badge ml-auto">
                  {{ count($about->skills ?? []) }}
              </span>
          </div>

          <div class="about-show-skills">
              @forelse($about->skills ?? [] as $skill)
                  <div class="about-show-skill">
                      <i class="fas fa-check-circle"></i>
                      {{ $skill }}
                  </div>
              @empty
                  <p class="text-muted small">No skills available.</p>
              @endforelse
          </div>
      </div>
  </div>
