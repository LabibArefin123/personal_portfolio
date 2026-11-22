<div class="row edu-stat-row">
    <div class="col-lg-4 col-md-6">
        <div class="edu-stat-card stat-purple">
            <div class="edu-stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div>
                <span>Education Profiles</span>
                <h3>{{ $profiles->total() }}</h3>
                <small>Available page profiles</small>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="edu-stat-card stat-blue">
            <div class="edu-stat-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div>
                <span>Qualifications</span>
                <h3>{{ $educationCount }}</h3>
                <small>Total academic records</small>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="edu-stat-card stat-green">
            <div class="edu-stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <span>Active Qualifications</span>
                <h3>{{ $activeEducationCount }}</h3>
                <small>Visible on frontend</small>
            </div>
        </div>
    </div>

</div>
