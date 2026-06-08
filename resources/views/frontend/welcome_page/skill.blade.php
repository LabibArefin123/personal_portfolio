<!-- SKILLS -->
<section class="skills-modern">
    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5">
            <h2 class="skills-title">My Tech Stack ⚡</h2>
            <p class="skills-subtitle">
                I build scalable systems using modern technologies & clean architecture
            </p>
        </div>

        <div class="row g-4">

            @foreach ($skills as $category => $categorySkills)
                <div class="col-lg-6">

                    <div class="modern-card">

                        <h4>{{ $category }}</h4>

                        @foreach ($categorySkills as $skill)
                            <div class="modern-skill" data-skill="{{ $skill->percentage }}">

                                <div class="skill-head">

                                    <span>{{ $skill->name }}</span>

                                    <span>{{ $skill->percentage }}%</span>

                                </div>

                                <div class="bar">
                                    <div></div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>
            @endforeach

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
