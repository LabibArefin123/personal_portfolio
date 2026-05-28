<nav class="navbar navbar-expand-lg navbar-dev fixed-top">

    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('welcome') }}">

            <div class="brand-text">

                <div class="brand-name">
                    Labib Arefin
                </div>

                <div class="brand-role">
                    Fullstack Developer & Software Engineer
                </div>

            </div>

        </a>

        <!-- MOBILE TOGGLER -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse"
             id="navbarCollapse">

            <ul class="navbar-nav navbar-menu mx-auto">

                <li class="nav-item">
                    <a href="{{ route('welcome') }}"
                       class="nav-link">

                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('project') }}"
                       class="nav-link">

                        Projects
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('skills') }}"
                       class="nav-link">

                        Expertise
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about') }}"
                       class="nav-link">

                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('education') }}"
                       class="nav-link">

                        Education
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faq') }}"
                       class="nav-link">

                        FAQ
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}"
                       class="nav-link">

                        Contact
                    </a>
                </li>

            </ul>

            <!-- MOBILE CTA -->
            <div class="mobile-nav-cta d-lg-none">

                <a href="{{ route('contact') }}"
                   class="btn nav-btn w-100">

                    Hire Me
                </a>

            </div>

        </div>

        <!-- DESKTOP CTA -->
        <div class="d-none d-lg-block">

            <a href="{{ route('contact') }}"
               class="btn nav-btn">

                Hire Me
            </a>

        </div>

    </div>

</nav>