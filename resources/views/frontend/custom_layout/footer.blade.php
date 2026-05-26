<!-- =========================
     Developer Portfolio Footer
========================= -->
<!-- =========================
     FOOTER QUICK NAVIGATION
========================= -->

<div class="footer-nav-wrapper">

    <div class="container">

        <div class="footer-nav-links">

            <a href="{{ route('project') }}">
                Projects
            </a>

            <a href="{{ route('skills') }}">
                Expertise
            </a>

            <a href="{{ route('about') }}">
                About
            </a>

            <a href="{{ route('education') }}">
                Education
            </a>

            <a href="{{ route('contact') }}">
                Contact
            </a>

        </div>

    </div>

</div>

<footer class="footer-dev">

    <div class="container">

        <div class="row gy-4 align-items-center justify-content-between">

            <!-- =========================
                 BRAND / INTRO
            ========================== -->
            <div class="col-lg-7 col-md-12">

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


            <!-- =========================
                 CONTACT
            ========================== -->
            <div class="col-lg-4 col-md-12">

                <div class="footer-widget">

                    <h5 class="footer-title">
                        Let’s Connect
                    </h5>

                    <div class="footer-contact-box">

                        <div class="footer-contact-card">

                            <!-- EMAIL -->
                            <div class="footer-contact-item">

                                <div class="contact-left">

                                    <span class="contact-icon">
                                        📧
                                    </span>

                                    <div>

                                        <div class="contact-label">
                                            Email Address
                                        </div>

                                        <div class="contact-value">
                                            mdlabibarefin@gmail.com
                                        </div>

                                    </div>

                                </div>

                                <div class="contact-actions">

                                    <a href="mailto:mdlabibarefin@gmail.com" class="contact-btn">

                                        Send Email
                                    </a>

                                    <button class="contact-btn copy-email-btn" data-email="mdlabibarefin@gmail.com">

                                        Copy
                                    </button>

                                </div>

                            </div>

                            <!-- PHONE -->
                            <div class="footer-contact-item">

                                <div class="contact-left">

                                    <span class="contact-icon">
                                        📞
                                    </span>

                                    <div>

                                        <div class="contact-label">
                                            Phone Number
                                        </div>

                                        <div class="contact-value">
                                            +880 1776-197999
                                        </div>

                                    </div>

                                </div>

                                <div class="contact-actions">

                                    <a href="tel:+8801776197999" class="contact-btn">

                                        Call Me
                                    </a>

                                    <a href="https://wa.me/8801776197999" target="_blank"
                                        class="contact-btn whatsapp-btn">

                                        WhatsApp
                                    </a>

                                </div>

                            </div>

                        </div>
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
