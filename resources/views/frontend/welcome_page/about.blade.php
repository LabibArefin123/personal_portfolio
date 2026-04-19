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
                    Not Just Code — I Build Systems ⚡
                </h2>

                <p class="about-text">
                    I'm a full stack developer focused on building real-world applications that solve business problems.
                    From POS systems to biometric integrations, I design and develop complete solutions — not just UI.
                </p>

                <p class="about-text">
                    I enjoy working on complex logic, system architecture, and making things work smoothly behind the
                    scenes.
                    Clean code, performance, and scalability are always my priorities.
                </p>

                <!-- HIGHLIGHTS -->
                <div class="about-highlights">

                    <div class="highlight-box">
                        <h4>⚙️ System Builder</h4>
                        <p>POS, CRM, Tender Management & automation tools</p>
                    </div>

                    <div class="highlight-box">
                        <h4>🔗 Integration Beginner</h4>
                        <p>Biometric devices, APIs & real-time data systems</p>
                    </div>

                    <div class="highlight-box">
                        <h4>🎯 Problem Solver</h4>
                        <p>Turning complex requirements into simple solutions</p>
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
