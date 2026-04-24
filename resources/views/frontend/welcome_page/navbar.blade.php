<link rel="stylesheet" href="{{ asset('css/frontend/custom_navbar.css') }}">

<nav class="navbar navbar-expand-lg navbar-dev fixed-top">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
            <div class="brand-text">
                <div class="brand-name">Labib Arefin</div>
                <div class="brand-role">Software Engineer</div>
            </div>
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav navbar-menu">

                <li class="nav-item">
                    <a href="{{ route('welcome') }}" class="nav-link active">Home</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('skills') }}" class="nav-link">Skills</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('project') }}" class="nav-link">Projects</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('service') }}" class="nav-link">Services</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('education') }}" class="nav-link">Education</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faq') }}" class="nav-link">FAQ</a>
                </li>

            </ul>
        </div>

        <!-- CTA -->
        <a href="{{ route('contact') }}" class="btn nav-btn">
            Hire Me
        </a>

    </div>
</nav>
