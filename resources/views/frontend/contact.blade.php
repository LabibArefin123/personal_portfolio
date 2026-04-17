@extends('frontend.layouts.app')

@section('title', 'Contact | Md. Labib Arefin')

@section('meta')
    <meta name="description"
        content="Contact Md. Labib Arefin, Full Stack Developer specializing in Laravel, React, POS, CRM, and scalable web systems.">

    <meta property="og:title" content="Contact | Labib Arefin">
    <meta property="og:description"
        content="Get in touch for freelance projects, collaborations, or full-time opportunities.">
    <meta property="og:image" content="{{ asset('images/portfolio/preview.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/contact/custom_contact.css') }}">

@section('content')

    {{-- NAVBAR --}}
    @include('frontend.welcome_page.top-bar')
    @include('frontend.welcome_page.navbar')

    <!-- HERO / BANNER -->
    <div class="contact-hero">
        <div class="overlay"></div>

        <div class="container text-center">
            <h1>Let's Work Together 🚀</h1>
            <p>Have a project, idea, or opportunity? Let’s talk.</p>
        </div>
    </div>

    <!-- CONTACT SECTION -->
    <section class="contact-dev-section">
        <div class="container">

            <div class="row g-4">

                <!-- LEFT: FORM -->
                <div class="col-lg-7">
                    <div class="contact-card">

                        <h3>Send Me a Message</h3>

                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input name="name" placeholder="Your Name" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input name="email" type="email" placeholder="Your Email" class="form-control"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input name="phone" placeholder="Phone (optional)" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input name="subject" placeholder="Subject" class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <textarea name="message" rows="5" placeholder="Your Message..." class="form-control" required></textarea>
                                </div>
                            </div>

                            <button class="btn contact-btn w-100">
                                🚀 Send Message
                            </button>

                        </form>
                    </div>
                </div>

                <!-- RIGHT: INFO -->
                <div class="col-lg-5">
                    <div class="contact-info-card">

                        <h3>Contact Info</h3>

                        <p class="contact-desc">
                            I'm open to freelance projects, collaborations, and full-time opportunities.
                        </p>

                        <div class="info-box">
                            <span>📧 Email</span>
                            <p>labibarefin@gmail.com</p>
                        </div>

                        <div class="info-box">
                            <span>📞 Phone</span>
                            <p>+880 1776-197999</p>
                        </div>

                        <div class="info-box">
                            <span>📍 Location</span>
                            <p>Dhaka, Bangladesh</p>
                        </div>

                        <!-- SOCIAL -->
                        <div class="contact-social">
                            <a href="https://github.com/LabibArefin123" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>

                            <a href="https://linkedin.com/in/labib-arefin" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- FOOTER --}}
    @include('frontend.welcome_page.footer')

@endsection
