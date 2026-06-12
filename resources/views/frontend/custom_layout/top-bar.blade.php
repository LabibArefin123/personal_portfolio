<div class="portfolio-topbar">

    <div class="container">

        <div class="topbar-inner">

            <!-- LEFT -->
            <div class="top-info">

                <a href="mailto:mdlabibarefin@gmail.com" class="top-link">
                    <i class="fas fa-envelope"></i>

                    <span class="top-text">
                        Contact Me
                    </span>
                </a>

                <a href="tel:+8801776197999" class="top-link mobile-phone-link">
                    <i class="fas fa-phone-alt"></i>

                    <span class="top-text">
                        +880 1776-197999
                    </span>
                </a>

                <span class="top-link">
                    <i class="fas fa-users"></i>
                    Total:
                    {{ number_format($visitorStats['total_visitors']) }}
                </span>

                <span class="top-link">
                    <i class="fas fa-user-check"></i>
                    Online:
                    {{ $visitorStats['online_users'] }}
                </span>

                <span class="top-link">
                    <i class="fas fa-clock"></i>
                    Last 5m:
                    {{ $visitorStats['last_5_minutes'] }}
                </span>

                </div>

                    <!-- RIGHT -->
                    <div class="top-social">

                        <a href="https://www.linkedin.com/in/labib-arefin" target="_blank" class="social-icon">

                            <i class="fab fa-linkedin-in"></i>

                        </a>

                        <a href="https://github.com/LabibArefin123" target="_blank" class="social-icon">

                            <i class="fab fa-github"></i>

                        </a>

                    </div>

            </div>

        </div>

    </div>
