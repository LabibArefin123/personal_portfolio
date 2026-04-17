<!-- EXPERIENCE -->
<section class="experience-modern">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="exp-title">Experience & Work 🚀</h2>
            <p class="exp-subtitle">Real-world systems I’ve built and worked on</p>
        </div>

        <div class="timeline">

            <!-- ITEM -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>

                <div class="timeline-content">
                    <h4>Full Stack Developer</h4>
                    <span class="exp-time">2023 - Present</span>

                    <p>
                        Developed full-featured POS systems with invoice management,
                        stock tracking, multi-user authentication, and reporting dashboards.
                    </p>

                    <div class="tech-used">
                        <span>Laravel</span>
                        <span>MySQL</span>
                        <span>AJAX</span>
                    </div>
                </div>
            </div>

            <!-- ITEM -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>

                <div class="timeline-content">
                    <h4>System Integration Developer</h4>
                    <span class="exp-time">2023</span>

                    <p>
                        Integrated biometric devices (face, fingerprint, palm) with Laravel APIs.
                        Built real-time data pipelines using Node.js and TCP socket servers.
                    </p>

                    <div class="tech-used">
                        <span>Node.js</span>
                        <span>Laravel</span>
                        <span>WebSocket</span>
                    </div>
                </div>
            </div>

            <!-- ITEM -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>

                <div class="timeline-content">
                    <h4>CRM & Tender System Developer</h4>
                    <span class="exp-time">2022 - 2023</span>

                    <p>
                        Built tender management system with participation tracking,
                        document uploads, filtering, and reporting features.
                    </p>

                    <div class="tech-used">
                        <span>Laravel</span>
                        <span>DataTables</span>
                        <span>jQuery</span>
                    </div>
                </div>
            </div>

            <!-- ITEM -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>

                <div class="timeline-content">
                    <h4>Frontend & UI Developer</h4>
                    <span class="exp-time">Ongoing</span>

                    <p>
                        Designed modern dashboards, admin panels, and responsive UI
                        with focus on usability and performance.
                    </p>

                    <div class="tech-used">
                        <span>Bootstrap</span>
                        <span>Tailwind</span>
                        <span>JavaScript</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".timeline-item");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = "translateY(0)";
            }
        });
    }, { threshold: 0.3 });

    items.forEach(item => {
        item.style.opacity = 0;
        item.style.transform = "translateY(40px)";
        item.style.transition = "0.6s";
        observer.observe(item);
    });
});
</script>