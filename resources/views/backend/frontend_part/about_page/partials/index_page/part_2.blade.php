  <div class="about-index-stats">
      <div class="about-stat-card">
          <div class="about-stat-icon blue">
              <i class="fas fa-layer-group"></i>
          </div>

          <div>
              <small>Total Skills</small>
              <h4>{{ count($about->skills ?? []) }}</h4>
          </div>
      </div>

      <div class="about-stat-card">
          <div class="about-stat-icon purple">
              <i class="fas fa-briefcase"></i>
          </div>

          <div>
              <small>Experience Sections</small>
              <h4>{{ count($about->experiences ?? []) }}</h4>
          </div>
      </div>

      <div class="about-stat-card">
          <div class="about-stat-icon green">
              <i class="fas fa-star"></i>
          </div>

          <div>
              <small>Highlights</small>
              <h4>{{ count($about->highlights ?? []) }}</h4>
          </div>
      </div>
  </div>
