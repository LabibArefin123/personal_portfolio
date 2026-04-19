@php
    $techs = [
        [
            'title' => 'Programming',
            'icon' => 'fas fa-code',
            'image' => 'image_1.jpg',
            'tags' => ['PHP', 'JavaScript', 'TypeScript', 'Python', 'C', 'C++', 'Java', 'SQL'],
        ],
        [
            'title' => 'Frameworks',
            'icon' => 'fas fa-layer-group',
            'image' => 'image_2.png',
            'tags' => ['Laravel', 'React.js', 'Bootstrap', 'Tailwind CSS', 'jQuery', 'REST API'],
        ],
        [
            'title' => 'Database',
            'icon' => 'fas fa-database',
            'image' => 'image_3.png',
            'tags' => ['MySQL', 'Database Design', 'ER Diagram', 'Data Modeling'],
        ],
        [
            'title' => 'Tools',
            'icon' => 'fas fa-tools',
            'image' => 'image_4.png',
            'tags' => ['Git', 'GitHub', 'VS Code', 'Figma', 'Canva', 'Postman'],
        ],
        [
            'title' => 'Business Software',
            'icon' => 'fas fa-briefcase',
            'image' => 'image_5.png',
            'tags' => ['POS System', 'CRM', 'Visitor Management', 'Tender Management', 'ERP'],
        ],
        [
            'title' => 'Networking',
            'icon' => 'fas fa-network-wired',
            'image' => 'image_6.png',
            'tags' => ['Cisco Packet Tracer', 'Basic Networking', 'IP Config', 'LAN Setup'],
        ],
    ];
@endphp

<section class="technical-skill-section">
    <div class="container">

        <div class="section-heading text-center">
            <span class="section-badge">Technical Skills</span>
            <h2>Technology & Development Stack</h2>
            <p>
                Technologies, programming languages, frameworks, and tools that I use to
                build scalable web applications and business software.
            </p>
        </div>

        <div class="row g-4">

            @foreach ($techs as $tech)
                <div class="col-lg-4 col-md-6">
                    <div class="tech-card preloaded">

                        <div class="tech-image is-hidden">
                            <img src="{{ asset('uploads/images/technical_skill/' . $tech['image']) }}">
                        </div>

                        <div class="tech-icon">
                            <i class="{{ $tech['icon'] }}"></i>
                        </div>

                        <h4>{{ $tech['title'] }}</h4>

                        <div class="tech-tags">
                            @foreach ($tech['tags'] as $tag)
                                <span>{{ $tag }}</span>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
<script>
    document.querySelectorAll('.tech-card').forEach(card => {
        card.addEventListener('click', function() {
            this.classList.toggle('active');
        });
    });
</script>
