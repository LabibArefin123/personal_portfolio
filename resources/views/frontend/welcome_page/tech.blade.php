<!-- TECH STACK -->
<section class="xt-tech">
    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5">
            <h2 class="xt-tech-title">Technologies I Use 🚀</h2>
            <p class="xt-tech-subtitle">
                I leverage modern tools and frameworks to build scalable, maintainable,
                and high-performance applications across frontend, backend, and system architecture.
            </p>
        </div>

        <!-- TABS -->
        <div class="xt-tech-tabs text-center mb-4">
            <button class="active" data-tab="backend">Backend</button>
            <button data-tab="frontend">Frontend</button>
            <button data-tab="tools">Tools</button>
        </div>

        @php
            $backend = [
                [
                    'Laravel',
                    'bi-layers',
                    'I use Laravel to design clean, scalable backend systems with MVC architecture, secure authentication, and efficient database handling for real-world applications.',
                ],
                [
                    'PHP',
                    'bi-filetype-php',
                    'Core server-side language I use to build dynamic web applications, process business logic, and handle data securely and efficiently.',
                ],
                [
                    'REST API',
                    'bi-plug',
                    'I design and integrate RESTful APIs to enable seamless communication between frontend, backend, and third-party services.',
                ],
                [
                    'MySQL',
                    'bi-database',
                    'I structure and optimize relational databases using MySQL to ensure fast queries, data integrity, and scalable storage solutions.',
                ],
            ];

            $frontend = [
                [
                    'JavaScript',
                    'bi-filetype-js',
                    'I build interactive and dynamic user interfaces using modern JavaScript, enhancing user experience and responsiveness.',
                ],
                [
                    'React',
                    'bi-lightning-charge',
                    'I develop component-based frontend applications using React for better performance, scalability, and maintainability.',
                ],
                [
                    'Bootstrap',
                    'bi-bootstrap',
                    'I use Bootstrap to rapidly design responsive and mobile-first user interfaces with clean and consistent styling.',
                ],
                [
                    'AJAX',
                    'bi-arrow-repeat',
                    'I implement AJAX to handle asynchronous data loading, improving user experience without full page reloads.',
                ],
            ];

            $tools = [
                [
                    'GitHub',
                    'bi-github',
                    'I manage version control, collaboration, and code deployment workflows efficiently using Git and GitHub.',
                ],
                [
                    'VS Code',
                    'bi-code-slash',
                    'My primary development environment for writing, debugging, and managing code with powerful extensions.',
                ],
                [
                    'Figma',
                    'bi-pencil-square',
                    'I design UI/UX layouts and prototypes using Figma before implementing them into real applications.',
                ],
                [
                    'Canva',
                    'bi-palette',
                    'I create visual assets, presentations, and UI elements to enhance overall project aesthetics.',
                ],
            ];
        @endphp

        <!-- CONTENT -->
        @foreach (['backend' => $backend, 'frontend' => $frontend, 'tools' => $tools] as $key => $group)
            <div class="xt-tech-content {{ $loop->first ? 'active' : '' }}" id="{{ $key }}">
                <div class="row g-3">
                    @foreach ($group as $tech)
                        <div class="col-lg-6">
                            <div class="xt-tech-card">
                                <div class="xt-tech-icon">
                                    <i class="bi {{ $tech[1] }}"></i>
                                </div>
                                <div class="xt-tech-info">
                                    <h6>{{ $tech[0] }}</h6>
                                    <p>{{ $tech[2] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".xt-tech-tabs button");
        const contents = document.querySelectorAll(".xt-tech-content");

        tabs.forEach(tab => {
            tab.addEventListener("click", () => {
                tabs.forEach(t => t.classList.remove("active"));
                tab.classList.add("active");

                contents.forEach(c => c.classList.remove("active"));
                document.getElementById(tab.dataset.tab).classList.add("active");
            });
        });
    });
</script>
