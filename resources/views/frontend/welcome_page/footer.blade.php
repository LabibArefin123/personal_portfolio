<!-- Footer -->
<footer class="footer-dev">
    <div class="container">
        <div class="row gy-4">

            <!-- BRAND -->
            <div class="col-md-4">
                <h5 class="footer-name">Md. Labib Arefin</h5>
                <p class="footer-role">Full Stack Software Engineer</p>

                <p class="footer-desc" style="text-align: justify; text-justify: inter-word;">
                    I build scalable and production-ready software systems using Laravel and modern web technologies.
                    My focus is on business applications like POS, CRM, Tender Management, and ERP systems with clean
                    architecture,
                    performance optimization, API integration, SEO-friendly structure, and real-world system
                    reliability.
                </p>
            </div>
            <!-- QUICK LINKS -->
            <div class="col-md-2">
                <h6 class="footer-title">Explore</h6>
                <ul class="footer-links">

                    <li><a href="{{ route('skills') }}">Expertise</a></li>
                    <li><a href="{{ route('project') }}">Projects</a></li>
                    <li><a href="{{ route('service') }}">Services</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('education') }}">Education</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>

                </ul>
            </div>

            <!-- SERVICES -->
            <div class="col-md-3">
                <h6 class="footer-title">Core Services</h6>

                <ul class="footer-links">
                    <li>Laravel Web Applications</li>
                    <li>REST API Development & Integration</li>
                    <li>POS / CRM / ERP Systems</li>
                    <li>Business Automation Software</li>
                    <li>System Architecture & Optimization</li>
                    <li>Performance & SEO Engineering</li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div class="col-md-3">
                <h6 class="footer-title">Let’s Connect</h6>

                <p class="footer-contact">📧 mdlabibarefin@gmail.com</p>
                <p class="footer-contact">📞 +880 1776197999</p>

                <p class="footer-note">
                    Available for freelance & full-time opportunities
                </p>

                <div class="footer-social">
                    <a href="https://github.com" target="_blank"><i class="fab fa-github"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

        </div>

        <!-- BOTTOM -->
        <div class="footer-bottom">
            © {{ date('Y') }} Md. Labib Arefin. All rights reserved.
        </div>

    </div>

</footer>
