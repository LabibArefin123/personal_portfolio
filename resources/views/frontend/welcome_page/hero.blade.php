<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT CONTENT -->
            <div class="col-lg-6 hero-content">

                <h1 class="hero-title">
                    Hi, I'm <span>Labib Arefin</span>
                </h1>

                <h2 class="hero-subtitle">
                    Full Stack Developer
                </h2>

                <p class="hero-description">
                    I build powerful web applications using Laravel & React — including POS systems, CRM software,
                    and Tender Management platforms.
                </p>

                <div class="hero-buttons">
                    <a href="#projects" class="btn hero-btn-primary">
                        🚀 View Projects
                    </a>

                    <a href="#contact" class="btn hero-btn-outline">
                        📩 Contact Me
                    </a>
                </div>

                <!-- TECH TAGS -->
                <div class="hero-tech">
                    <span>Laravel</span>
                    <span>React</span>
                    <span>REST API</span>
                    <span>MySQL</span>
                </div>

            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-6 hero-image">
                <div class="hero-card-stack">

                    <div class="hero-card third-card">
                        <img src="{{ asset('uploads/images/about/developer3.jpg') }}" alt="Developer 3">
                    </div>

                    <div class="hero-card second-card">
                        <img src="{{ asset('uploads/images/about/developer.jpg') }}" alt="Developer">
                    </div>

                    <div class="hero-card main-card">
                        <img src="{{ asset('uploads/images/about/developer2.jpg') }}" alt="Developer 2">
                    </div>

                    <div class="hero-floating-box">
                        <h5>3+ Years Experience</h5>
                        <p>Laravel, React & Business Software Development</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const stack = document.querySelector(".hero-card-stack");

        if (!stack) return;

        let cards = [
            stack.querySelector(".main-card"),
            stack.querySelector(".second-card"),
            stack.querySelector(".third-card")
        ];

        function updateCardClasses() {
            cards.forEach(card => {
                card.classList.remove("main-card", "second-card", "third-card");
            });

            cards[0].classList.add("main-card");
            cards[1].classList.add("second-card");
            cards[2].classList.add("third-card");
        }

        stack.addEventListener("click", function() {
            const firstCard = cards.shift();
            cards.push(firstCard);
            updateCardClasses();
        });

        setInterval(() => {
            const firstCard = cards.shift();
            cards.push(firstCard);
            updateCardClasses();
        }, 10000);
    });
</script>
