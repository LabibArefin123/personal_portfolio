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
            'title' => 'Full Stack Developer',
            'time' => '2023 - Present',
            'desc' => 'Developed full-featured POS systems with invoice management, stock tracking, multi-user authentication, and reporting dashboards.',
            'tech' => ['Laravel', 'MySQL', 'AJAX'],
        ],
        [
            'title' => 'System Integration Developer',
            'time' => '2023',
            'desc' => 'Integrated biometric devices with Laravel APIs and built real-time pipelines using Node.js and socket servers.',
            'tech' => ['Node.js', 'Laravel', 'WebSocket'],
        ],
        [
            'title' => 'CRM & Tender System Developer',
            'time' => '2022 - 2023',
            'desc' => 'Built tender management system with filtering, document handling, and reporting features.',
            'tech' => ['Laravel', 'DataTables', 'jQuery'],
        ],
        [
            'title' => 'Frontend & UI Developer',
            'time' => 'Ongoing',
            'desc' => 'Designed modern dashboards and responsive UI focusing on usability and performance.',
            'tech' => ['Bootstrap', 'Tailwind', 'JavaScript'],
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
