<nav class="navbar navbar-dev">

    <div class="container">

        <!-- Brand -->
        <a href="{{ route('welcome') }}" class="navbar-brand">

            <div class="brand-text">

                <div class="brand-name">
                    Labib Arefin
                </div>

                <div class="brand-role">
                    Fullstack Developer & Software Engineer
                </div>

            </div>

        </a>

        <!-- Desktop Menu -->
        <ul class="navbar-nav navbar-menu mx-auto">

            <li class="nav-item">
                <a href="{{ route('welcome') }}" class="nav-link">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('project') }}" class="nav-link">
                    Projects
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('skill') }}" class="nav-link">
                    Expertise
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    About
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('education') }}" class="nav-link">
                    Education
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('faq') }}" class="nav-link">
                    FAQ
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('contact') }}" class="nav-link">
                    Contact
                </a>
            </li>

        </ul>

        <!-- Desktop Button -->
        <div class="d-none d-lg-block">

            <a href="{{ route('contact') }}" class="btn nav-btn">

                Hire Me

            </a>

        </div>

        <!-- Mobile Toggle -->
        <button class="navbar-toggle" id="mobileMenuBtn">

            <span></span>
            <span></span>
            <span></span>

        </button>

        <!-- Overlay -->
        <div class="navbar-overlay"></div>

        <!-- Sidebar -->
        <div class="navbar-sidebar">

            <div class="navbar-sidebar-header">

                <h5>Menu</h5>

                <button class="navbar-close-btn">

                    <i class="fas fa-times"></i>

                </button>

            </div>

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="{{ route('welcome') }}" class="nav-link">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('project') }}" class="nav-link">
                        Projects
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('skill') }}" class="nav-link">
                        Expertise
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('education') }}" class="nav-link">
                        Education
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faq') }}" class="nav-link">
                        FAQ
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">
                        Contact
                    </a>
                </li>

            </ul>

            <div class="mt-4">

                <a href="{{ route('contact') }}" class="btn nav-btn w-100">

                    Hire Me

                </a>

            </div>

        </div>

    </div>

</nav>
