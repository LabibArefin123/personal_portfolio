<div class="row cr-stats-row">
    <div class="col-xl-3 col-md-6">
        <div class="cr-stat-card cr-stat-blue">
            <div class="cr-stat-content">
                <span>Total Requests</span>
                <h3>{{ number_format($totalRequests) }}</h3>
                <small>All incoming requests</small>
            </div>
            <div class="cr-stat-icon">
                <i class="fas fa-inbox"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="cr-stat-card cr-stat-green">
            <div class="cr-stat-content">
                <span>Contact Requests</span>
                <h3>{{ number_format($contactCount) }}</h3>
                <small>General inquiries</small>
            </div>
            <div class="cr-stat-icon">
                <i class="fas fa-comments"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="cr-stat-card cr-stat-purple">
            <div class="cr-stat-content">
                <span>Appointments</span>
                <h3>{{ number_format($appointmentCount) }}</h3>
                <small>Appointment inquiries</small>
            </div>
            <div class="cr-stat-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="cr-stat-card cr-stat-orange">
            <div class="cr-stat-content">
                <span>Today's Requests</span>
                <h3>{{ number_format($todayCount) }}</h3>
                <small>Received today</small>
            </div>
            <div class="cr-stat-icon">
                <i class="fas fa-calendar-day"></i>
            </div>
        </div>
    </div>

</div>
