  <section class="pi-show-links-card">
      <div class="pi-show-links-heading">
          <div class="pi-show-links-icon">
              <i class="fas fa-link"></i>
          </div>
          <div>
              <h4>Project Resources</h4>
              <p>Explore the project online and view its source code.</p>
          </div>
      </div>

      <div class="pi-show-links-list">

          {{-- LIVE PROJECT --}}
          @if ($projectLink)
              <a href="{{ $projectLink }}" target="_blank" rel="noopener noreferrer"
                  class="pi-show-resource-link pi-live-link">

                  <span class="pi-resource-icon">
                      <i class="fas fa-external-link-alt"></i>
                  </span>

                  <span>
                      <strong>Live Project</strong>
                      <small>Visit the project website</small>
                  </span>

                  <i class="fas fa-arrow-up-right-from-square pi-resource-arrow"></i>
              </a>
          @endif

          {{-- GITHUB REPOSITORY --}}
          @if ($githubLink)
              <a href="{{ $githubLink }}" target="_blank" rel="noopener noreferrer"
                  class="pi-show-resource-link pi-github-link">

                  <span class="pi-resource-icon">
                      <i class="fab fa-github"></i>
                  </span>

                  <span>
                      <strong>GitHub Repository</strong>
                      <small>Explore the source code</small>
                  </span>

                  <i class="fas fa-arrow-up-right-from-square pi-resource-arrow"></i>
              </a>
          @endif

          {{-- EMPTY STATE --}}
          @if (!$projectLink && !$githubLink)
              <div class="pi-show-inline-empty">
                  <i class="fas fa-link"></i>
                  No external project links available.
              </div>
          @endif

      </div>
  </section>
