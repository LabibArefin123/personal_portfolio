<!-- =========================
     Developer Portfolio Footer
========================= -->

<footer class="footer-dev">

    <div class="container">

        <div class="row gy-5 align-items-start">

            <!-- =========================
                 BRAND / INTRO
            ========================== -->
            <div class="col-lg-5 col-md-12">

                <div class="footer-brand">

                    <h4 class="footer-name">
                        Md. Labib Arefin
                    </h4>

                    <p class="footer-role">
                        Full Stack Software Engineer
                    </p>

                    <p class="footer-desc">
                        I build scalable and production-ready software systems using Laravel and
                        modern web technologies. My expertise includes POS, CRM, ERP, Tender
                        Management, Business Automation, API Integration, and performance-focused
                        enterprise solutions with clean architecture and real-world reliability.
                    </p>

                </div>

            </div>

            <!-- =========================
                 QUICK NAVIGATION
            ========================== -->
            <div class="col-lg-3 col-md-6">

                <div class="footer-widget">

                    <h5 class="footer-title">
                        Quick Navigation
                    </h5>

                    <ul class="footer-links">

                        <li>
                            <a href="{{ route('project') }}">
                                Projects
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('skills') }}">
                                Expertise
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}">
                                About Me
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('education') }}">
                                Education
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}">
                                Contact
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

            <!-- =========================
                 CONTACT
            ========================== -->
            <div class="col-lg-4 col-md-6">

                <div class="footer-widget">

                    <h5 class="footer-title">
                        Let’s Connect
                    </h5>

                    <div class="footer-contact-box">

                        <p class="footer-contact">
                            <span>📧</span>
                            mdlabibarefin@gmail.com
                        </p>

                        <p class="footer-contact">
                            <span>📞</span>
                            +880 1776197999
                        </p>

                    </div>

                    <p class="footer-note">
                        Available for freelance projects, remote opportunities,
                        and full-time software engineering roles.
                    </p>

                    <div class="footer-social">

                        <a href="https://github.com/LabibArefin123" target="_blank" aria-label="GitHub">

                            <i class="fab fa-github"></i>

                        </a>

                        <a href="https://www.linkedin.com/in/labib-arefin" target="_blank" aria-label="LinkedIn">

                            <i class="fab fa-linkedin-in"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- =========================
             FOOTER BOTTOM
        ========================== -->
        <div class="footer-bottom">

            <p class="mb-0">
                © {{ date('Y') }} Md. Labib Arefin.
                All Rights Reserved.
            </p>

        </div>

    </div>

</footer>
