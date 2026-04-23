<!-- LEFT CONTENT -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- LEFT CONTENT -->
            <div class="col-lg-7 hero-content">

                <h2 class="hero-title">
                    Hi, I'm <span class="robot-text" id="robotText">Labib Arefin</span>
                </h2>

                <h2 class="hero-subtitle">
                    Full Stack Developer & Software Engineer
                </h2>

                <p class="hero-description">
                    I build scalable business applications using Laravel,
                    with experience across frontend and backend technologies
                    including React and API integration.
                </p>

                <div class="hero-buttons">

                    <a href="#projects" class="btn hero-btn-primary">
                        🚀 View Projects
                    </a>

                    <!-- CV WRAPPER -->
                    <div class="cv-wrapper">
                        <a href="{{ asset('files/CV_Labib.pdf') }}" target="_blank" class="btn hero-btn-outline">
                            👁️ View CV
                        </a>

                        <a href="{{ asset('files/CV_Labib.pdf') }}" download class="cv-download">
                            ⬇
                        </a>
                    </div>

                </div>

                <!-- TECH TAGS -->
                <div class="hero-tech">
                    <span>Laravel</span>
                    <span>API Integration</span>
                    <span>MySQL</span>
                    <span>React (App Developer)</span>
                </div>

            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-5 hero-image">
                <div class="hero-card-stack">

                    <div class="hero-card third-card">
                        <img src="{{ asset('uploads/images/about/developer3.jpg') }}" alt="Developer 3">
                    </div>

                    <div class="hero-card second-card">
                        <img src="{{ asset('uploads/images/about/developer.jpg') }}" alt="Developer">
                    </div>

                    <div class="hero-card main-card">
                        <img src="{{ asset('uploads/images/about/developer2.jpg') }}" alt="Developer 2">
                    </div>

                    <div class="hero-floating-box">
                        <h5>3+ Years Experience</h5>
                        <p>Laravel systems • API integration • Exploring mobile apps with Expo</p>
                    </div>

                </div>
            </div>
        </div>
</section>
