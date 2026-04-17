<!-- SKILLS -->
<section class="skills-modern">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="skills-title">My Tech Stack ⚡</h2>
            <p class="skills-subtitle">
                I build scalable systems using modern technologies & clean architecture
            </p>
        </div>

        <div class="row g-4">

            <!-- CARD -->
            <div class="col-lg-6">
                <div class="modern-card">

                    <h4>Backend Development</h4>

                    <div class="modern-skill" data-skill="95">
                        <div class="skill-head">
                            <span>Laravel</span>
                            <span>95%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                    <div class="modern-skill" data-skill="90">
                        <div class="skill-head">
                            <span>PHP</span>
                            <span>90%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                    <div class="modern-skill" data-skill="88">
                        <div class="skill-head">
                            <span>REST API</span>
                            <span>88%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- FRONTEND -->
            <div class="col-lg-6">
                <div class="modern-card">

                    <h4>Frontend Development</h4>

                    <div class="modern-skill" data-skill="90">
                        <div class="skill-head">
                            <span>JavaScript</span>
                            <span>90%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                    <div class="modern-skill" data-skill="92">
                        <div class="skill-head">
                            <span>Bootstrap</span>
                            <span>92%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                    <div class="modern-skill" data-skill="85">
                        <div class="skill-head">
                            <span>jQuery</span>
                            <span>85%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- DATABASE -->
            <div class="col-lg-6">
                <div class="modern-card">

                    <h4>Database</h4>

                    <div class="modern-skill" data-skill="90">
                        <div class="skill-head">
                            <span>MySQL</span>
                            <span>90%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                    <div class="modern-skill" data-skill="85">
                        <div class="skill-head">
                            <span>Database Design</span>
                            <span>85%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- TOOLS -->
            <div class="col-lg-6">
                <div class="modern-card">

                    <h4>Tools & Systems</h4>

                    <div class="modern-skill" data-skill="85">
                        <div class="skill-head">
                            <span>Git & GitHub</span>
                            <span>85%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                    <div class="modern-skill" data-skill="88">
                        <div class="skill-head">
                            <span>AJAX</span>
                            <span>88%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                    <div class="modern-skill" data-skill="85">
                        <div class="skill-head">
                            <span>System Architecture</span>
                            <span>85%</span>
                        </div>
                        <div class="bar">
                            <div></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        const skills = document.querySelectorAll(".modern-skill");

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bar = entry.target.querySelector(".bar div");
                    const value = entry.target.getAttribute("data-skill");

                    bar.style.width = value + "%";
                }
            });
        }, {
            threshold: 0.5
        });

        skills.forEach(skill => observer.observe(skill));

    });
</script>
