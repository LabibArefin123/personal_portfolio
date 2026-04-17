<link rel="stylesheet" href="{{ asset('css/frontend/custom_navbar.css') }}">

<nav class="navbar navbar-expand-lg navbar-dev fixed-top">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
            <div class="brand-text">
                <div class="brand-name">Labib Arefin</div>
                <div class="brand-role">Full Stack Developer</div>
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
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('skills') }}" class="nav-link">Skills</a>
                </li>

                <li class="nav-item">
                    <a href="#projects" class="nav-link">Projects</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>

            </ul>
        </div>

        <!-- CTA -->
        <a href="{{ route('contact') }}" class="btn nav-btn">
            Hire Me
        </a>

    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const dropdown = document.getElementById('conditions_dropdown');
        const toggleLink = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');

        // Toggle on click
        toggleLink.addEventListener('click', function(e) {
            e.preventDefault();

            const isOpen = menu.classList.contains('show');

            // Close any other open dropdowns
            document.querySelectorAll('.dropdown-menu.show').forEach(el => {
                el.classList.remove('show');
            });

            // Toggle current dropdown
            menu.classList.toggle('show', !isOpen);
            toggleLink.setAttribute('aria-expanded', !isOpen);
        });

        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target)) {
                menu.classList.remove('show');
                toggleLink.setAttribute('aria-expanded', 'false');
            }
        });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const dropdown = document.getElementById('profile_dropdown');
        const toggleLink = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');

        // Toggle on click
        toggleLink.addEventListener('click', function(e) {
            e.preventDefault();

            const isOpen = menu.classList.contains('show');

            // Close any other open dropdowns
            document.querySelectorAll('.dropdown-menu.show').forEach(el => {
                el.classList.remove('show');
            });

            // Toggle current dropdown
            menu.classList.toggle('show', !isOpen);
            toggleLink.setAttribute('aria-expanded', !isOpen);
        });

        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target)) {
                menu.classList.remove('show');
                toggleLink.setAttribute('aria-expanded', 'false');
            }
        });

    });
</script>
