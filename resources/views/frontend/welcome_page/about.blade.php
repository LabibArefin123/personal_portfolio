<section id="about" class="about-modern is-loading">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- LEFT IMAGE -->
            <div class="col-lg-5 text-center">
                <div class="about-img-wrapper">
                    <img src="{{ asset('uploads/images/about/developer.jpg') }}" alt="Labib Arefin" class="about-img">
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-7">

                <h2 class="about-title">
                    I Build Systems, Not Just Interfaces ⚡
                </h2>

                <p class="about-text">
                    I'm a full stack developer focused on building real-world software that solves business problems.
                    I work primarily with Laravel to develop scalable backend systems, while also handling frontend
                    integration using modern tools like React when needed.
                </p>

                <p class="about-text">
                    My work goes beyond development — I design complete solutions including system architecture,
                    API integrations, and performance optimization. When projects require it, I also consider SEO
                    structure and visibility to ensure the software delivers real business value.
                </p>

                <p class="about-text">
                    I enjoy working on complex logic, connecting systems, and turning raw requirements into stable,
                    maintainable applications that actually work in production environments.
                </p>

                <!-- HIGHLIGHTS -->
                <div class="about-highlights">

                    <div class="highlight-box">
                        <h4>⚙️ System Development</h4>
                        <p>POS, CMS, Tender Systems & business applications</p>
                    </div>

                    <div class="highlight-box">
                        <h4>🔗 Integration & APIs</h4>
                        <p>Device connectivity, APIs & real-time data handling</p>
                    </div>

                    <div class="highlight-box">
                        <h4>📈 Performance & SEO</h4>
                        <p>Optimized systems with optional SEO-focused structure</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    window.addEventListener("load", () => {
        const img = document.querySelector(".about-img");

        if (!img) return;

        // ⏳ delay before animation starts
        setTimeout(() => {
            img.classList.add("animate-in");
        }, 500); // 👉 change to 5000 if you REALLY want 5 seconds
    });
</script>
