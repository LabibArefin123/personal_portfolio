@extends('frontend.layouts.app')

@section('title', 'Services | Md. Labib Arefin - Full Stack Developer')

@section('content')

@include('frontend.welcome_page.top-bar')
@include('frontend.welcome_page.navbar')

<!-- HERO -->
<section class="service-hero">
    <div class="container">
        <div class="service-hero-content">
            <span class="service-badge">Services</span>
            <h1>Professional Software Development Services</h1>
            <p>
                I design and build scalable, production-grade systems for real business use cases —
                focusing on performance, architecture, and long-term maintainability.
            </p>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="service-section">
    <div class="container">

        <div class="service-grid">

            <!-- 1 -->
            <div class="service-card">
                <div class="service-icon">💻</div>
                <h3>Web Application Development</h3>
                <p>Modern, scalable web apps using Laravel, React, and clean architecture patterns.</p>
                <div class="service-tag">Frontend + Backend</div>
            </div>

            <!-- 2 -->
            <div class="service-card">
                <div class="service-icon">🔗</div>
                <h3>REST API Development & Integration</h3>
                <p>Secure, optimized APIs with third-party integrations and real-time communication.</p>
                <div class="service-tag">API Engineering</div>
            </div>

            <!-- 3 -->
            <div class="service-card">
                <div class="service-icon">🧾</div>
                <h3>POS, CRM & ERP Systems</h3>
                <p>Business-grade systems for sales, inventory, customer and enterprise management.</p>
                <div class="service-tag">Business Systems</div>
            </div>

            <!-- 4 -->
            <div class="service-card">
                <div class="service-icon">🏢</div>
                <h3>Business Software Solutions</h3>
                <p>Custom software tailored to real-world business workflow and operations.</p>
                <div class="service-tag">Custom Build</div>
            </div>

            <!-- 5 -->
            <div class="service-card">
                <div class="service-icon">🧠</div>
                <h3>System Architecture & Design</h3>
                <p>Scalable backend architecture design for high-performance applications.</p>
                <div class="service-tag">Architecture</div>
            </div>

            <!-- 6 -->
            <div class="service-card">
                <div class="service-icon">📈</div>
                <h3>SEO Optimization</h3>
                <p>On-page SEO, performance tuning, and structured content optimization.</p>
                <div class="service-tag">Growth</div>
            </div>

            <!-- 7 -->
            <div class="service-card">
                <div class="service-icon">🧪</div>
                <h3>System Testing & QA</h3>
                <p>Real-world testing including workflows, edge cases, and usability validation.</p>
                <div class="service-tag">Quality Assurance</div>
            </div>

        </div>

    </div>
</section>

@include('frontend.welcome_page.footer')

@endsection