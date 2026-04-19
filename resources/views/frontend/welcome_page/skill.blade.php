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

            {{-- Backend --}}
            <div class="col-lg-6">
                <div class="modern-card">
                    <h4>Backend Development</h4>

                    @foreach ([['Laravel', 95], ['PHP', 90], ['REST API', 88]] as $skill)
                        <div class="modern-skill" data-skill="{{ $skill[1] }}">
                            <div class="skill-head">
                                <span>{{ $skill[0] }}</span>
                                <span>{{ $skill[1] }}%</span>
                            </div>
                            <div class="bar">
                                <div></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Frontend --}}
            <div class="col-lg-6">
                <div class="modern-card">
                    <h4>Frontend Development</h4>

                    @foreach ([['JavaScript', 90], ['Bootstrap', 92], ['jQuery', 85]] as $skill)
                        <div class="modern-skill" data-skill="{{ $skill[1] }}">
                            <div class="skill-head">
                                <span>{{ $skill[0] }}</span>
                                <span>{{ $skill[1] }}%</span>
                            </div>
                            <div class="bar">
                                <div></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Database --}}
            <div class="col-lg-6">
                <div class="modern-card">
                    <h4>Database</h4>

                    @foreach ([['MySQL', 90], ['Database Design', 85]] as $skill)
                        <div class="modern-skill" data-skill="{{ $skill[1] }}">
                            <div class="skill-head">
                                <span>{{ $skill[0] }}</span>
                                <span>{{ $skill[1] }}%</span>
                            </div>
                            <div class="bar">
                                <div></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Tools --}}
            <div class="col-lg-6">
                <div class="modern-card">
                    <h4>Tools & Systems</h4>

                    @foreach ([['Git & GitHub', 85], ['AJAX', 88], ['System Architecture', 85]] as $skill)
                        <div class="modern-skill" data-skill="{{ $skill[1] }}">
                            <div class="skill-head">
                                <span>{{ $skill[0] }}</span>
                                <span>{{ $skill[1] }}%</span>
                            </div>
                            <div class="bar">
                                <div></div>
                            </div>
                        </div>
                    @endforeach
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
