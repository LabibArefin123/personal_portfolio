<!-- EXPERIENCE -->
<section class="xt-exp">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="xt-exp-title">Experience & Work 🚀</h2>
            <p class="xt-exp-subtitle">Real-world systems I’ve built and worked on</p>
        </div>

        <div class="xt-exp-timeline">

            @foreach ([
        [
            'title' => 'Software Engineer',
            'time' => '2025 - Present',
            'desc' => 'Building real-world business software including attendance tracking systems in collaboration with partners. Focused on scalable backend architecture, API design, and production-ready solutions, along with SEO-aware system structure when required.',
            'tech' => ['Laravel', 'MySQL', 'API Design', 'SEO Structure'],
        ],
        [
            'title' => 'Software Developer (Full Stack)',
            'time' => '2024 - 2025',
            'desc' => 'Developed CMS platforms, portfolio systems, and business tools with complete frontend-backend integration. Started applying SEO fundamentals such as clean URL structure, metadata handling, and performance optimization alongside real project development.',
            'tech' => ['Laravel', 'Blade', 'JavaScript', 'SEO Basics'],
        ],
        [
            'title' => 'Application Development Practice',
            'time' => '2023 - 2024',
            'desc' => 'Focused on strengthening fundamentals by building small applications like clocks, chat systems, and company websites based on provided requirements. Explored mobile development basics using React Native and learned core development concepts.',
            'tech' => ['HTML', 'CSS', 'JavaScript', 'React Native'],
        ],
        [
            'title' => 'Early Development & UI Exploration',
            'time' => '2022 - 2023',
            'desc' => 'Started web development journey by learning frontend design, responsive layouts, and basic system structure while experimenting with UI concepts and small projects.',
            'tech' => ['Bootstrap', 'Tailwind', 'jQuery'],
        ],
    ] as $item)
                <div class="xt-exp-item">
                    <div class="xt-exp-dot"></div>

                    <div class="xt-exp-content">
                        <h4>{{ $item['title'] }}</h4>
                        <span class="xt-exp-time">{{ $item['time'] }}</span>

                        <p>{{ $item['desc'] }}</p>

                        <div class="xt-exp-tech">
                            @foreach ($item['tech'] as $tech)
                                <span>{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const items = document.querySelectorAll(".xt-exp-item");

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = "translateY(0)";
                }
            });
        }, {
            threshold: 0.3
        });

        items.forEach(item => {
            observer.observe(item);
        });
    });
</script>
