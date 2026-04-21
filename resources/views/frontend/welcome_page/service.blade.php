<section class="xt-service">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="xt-service-title">What I Do 💼</h2>
            <p class="xt-service-subtitle">
                I help businesses build scalable, modern, and user-friendly digital solutions.
            </p>
        </div>

        @php
            $services = [
                [
                    'icon' => 'bi-code-slash',
                    'title' => 'Full Stack Development',
                    'desc' =>
                        'Building complete web applications from frontend to backend using modern technologies like Laravel and React.',
                ],
                [
                    'icon' => 'bi-window',
                    'title' => 'Frontend Development',
                    'desc' =>
                        'Creating responsive, fast, and visually appealing UI using JavaScript, Bootstrap, and modern frameworks.',
                ],
                [
                    'icon' => 'bi-server',
                    'title' => 'Backend Systems',
                    'desc' =>
                        'Designing scalable backend architectures, APIs, and database systems for performance and security.',
                ],
                [
                    'icon' => 'bi-plug',
                    'title' => 'API Development',
                    'desc' => 'Developing RESTful APIs for mobile apps, web apps, and third-party integrations.',
                ],
                [
                    'icon' => 'bi-diagram-3',
                    'title' => 'System Design',
                    'desc' => 'Planning efficient system architecture and workflows for scalable applications.',
                ],
                [
                    'icon' => 'bi-brush',
                    'title' => 'UI/UX Design',
                    'desc' => 'Designing clean and user-friendly interfaces using Figma and modern design principles.',
                ],
            ];
        @endphp

        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="xt-service-card">

                        <div class="xt-service-icon">
                            <i class="bi {{ $service['icon'] }}"></i>
                        </div>

                        <h5>{{ $service['title'] }}</h5>
                        <p>{{ $service['desc'] }}</p>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
